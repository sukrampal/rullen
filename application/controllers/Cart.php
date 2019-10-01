<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Cart extends CI_Controller {
    public function index(){
      $this->navbar();
      $this->load->view('cart');
      $this->footer();
    }

    public function navbar(){
      $this->load->model('mdl_home');
      $data['logo'] = $this->mdl_home->get_header_logo();
      $data['navbar'] = $this->mdl_home->get_category();
      $this->load->view('header',$data);
    }
    public function footer(){
      $this->load->model('mdl_home');
      $data['footer_logo'] = $this->mdl_home->get_footer_logo();
      $this->load->view('footer', $data);
    }

    public function destroy()
    {
      $this->cart->destroy();
    }
    public function add($id){
      $this->db->select('*');
      $this->db->from('products');
      $this->db->where('product_id', $id);
      $query = $this->db->get();
      $row = $query->row();
      $qty = 1;

      if($this->input->post('qty')){
          $qty = $this->input->post('qty');
      }
      //echo $qty; pr($row);
      $data = array(
        'id'           => $id,
        'qty'          => $qty,
        'item_price'   => $row->product_price,
        'qty_price'    => $row->product_price*$qty,
        'price'        => $row->product_price + $row->shipping,
        'name'         => $row->product_title,
        'shipping'     => $row->shipping,
        'image'        => $row->product_image,
        'product_id'   => $row->product_id,


        // 'options' => array('Size' => 'L', 'Color' => 'Red')
);
//prd($data);
$this->cart->insert($data);

redirect ('cart/index');
}

public function update(){
  $pro = $_POST['qty'];
  $data = array();
  $i = 0;
  foreach($pro as $k=>$p)
  {
    $data[$i]['rowid'] = $k;
    $data[$i]['qty'] = $p[0];
    $data[$i]['qty_price'] = $p[1];
    $i++;
  }              //prd($p);

  $this->cart->update($data);
  redirect('cart');
}

   public function remove_item($rowid) {
    $rowid = $this->uri->segment(3);
    $remove = $this->cart->remove($rowid);
    redirect('cart');
  }
  public function checkout(){
    if($this->session->userdata('authenticated')){
     $user_id = $this->session->userdata('id');
      $this->navbar();
      $this->load->model('mdl_home');
      $data['details'] = $this->mdl_home->get_detail($user_id);
      $this->load->view('checkout', $data);
      $this->footer();

    }else{
    redirect (base_url() . 'home/login');
  }}
  public function order(){
    if($this->session->userdata('authenticated')){
    if($this->input->post('cash')){
      if(!empty($this->input->post('product_id'))){
    $this->load->library('form_validation');
    $this->form_validation->set_rules("uname", "Username ", 'required');
    $this->form_validation->set_rules("address", "Address ", 'required');
    $this->form_validation->set_rules("city", "City", 'required');
    $this->form_validation->set_rules("suburb", "Suburb ", 'required');
    $this->form_validation->set_rules("postcode", "Postcode/zip", 'required');
    $this->form_validation->set_rules("email", "Email ", 'required');
    $this->form_validation->set_rules("phone", "contact number", 'required');
    if($this->form_validation->run()){
    $this->load->model('mdl_home');

    // prd($data);
    $order = array(
    'username' => $this->input->post('uname'),
    'address' => $this->input->post('address'),
    'city' => $this->input->post('city'),
    'suburb' => $this->input->post('suburb'),
    'postcode' => $this->input->post('postcode'),
    'email' => $this->input->post('email'),
    'phone' => $this->input->post('phone'),
    'product_id' => implode(", ", $this->input->post('product_id')),
    'product_title' => implode(", ", $this->input->post('product_title')),
    'qty' => implode(", ", $this->input->post('p_qty')),
    'item_price' => implode(", ", $this->input->post('item_price')),
    'price' => $this->input->post('price'),
    'user_id' => $this->input->post('user_id'),
    'delivery_status' => 'Pending',
    'cancel_button' => 'Cancel',
    'delivery_button' => 'Delivered',
    'payment_method' => 'Cash on Delivery',
    'shipping_btn'   => 'Ready to Ship'

  );
  $this->session->set_userdata('order',$order);//prd($this->session->userdata('product_id'));
  $this->session->set_flashdata($order);//prd($this->session->flashdata('product_id'));
                              // prd($data);
  $this->session->set_flashdata('price', $this->input->post('price'));
    // $this->mdl_home->order($data);
    // opt mail
    $six_digit_random_number = mt_rand(100000, 999999);
    $this->session->set_userdata('otp', $six_digit_random_number);
    $to = 'sukramror0001@gmail.com';
    // $to = $this->input->post('mail');
    $subject = 'Rullen-Furniture';
    $from = 'sukramror0001@gmail.com';
    $emailContent ='Hi..' .$this->input->post('username').', Here is your OTP to place your order'.('OTP: '.$this->session->userdata['otp'] );

    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '60';
    $config['smtp_user']    = 'sukramror0001@gmail.com';
    $config['smtp_pass']    = 'Sukram@123';
    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html';
    $config['validation'] = TRUE;

    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($emailContent);

    // return redirect('email_send');
    if($this->email->send())
         {
         }
         else
         {
             show_error($this->email->print_debugger());
         }
    // otp mail end
//     $to = 'sukramror0001@gmail.com';
//     // $to = $this->input->post('mail');
//     $subject = 'Rullen-Furniture';
//     $from = 'sukramror0001@gmail.com';
//     $emailContent = 'Hi.. '.$this->input->post('username').', Your order has been placed successfully having details shown below';
//     $emailContent .='<br>'.'<!DOCTYPE html>
// <html>
// <head>
// <style>
// table,th,td {
//   border: 1px solid blue;
// }
// </style>
// </head>
// <body>
//
// <table>
//   <tr>
//     <th>Product Id</th>
//     <th>Product Name</th>
//     <th>Product Quantity</th>
//     <th>Price Per Item</th>
//     <th>Total Price</th>
//     <th>Payment Mode</th>
//   </tr>
//   <tr>
//     <td>'.implode(", ", $this->input->post('product_id')).'</td>
//     <td>'.implode(", ", $this->input->post('product_title')).'</td>
//     <td>'.implode(", ", $this->input->post('p_qty')).'</td>
//     <td>'.implode(", ", $this->input->post('item_price')).'</td>
//     <td>'.$this->input->post('price').'</td>
//     <td>'.'Cash on delivery</td>
//   </tr>
//
// </table>
//
// </body>
// </html>
// ';
// $emailContent .='<br>'.'Thanks for shopping with us, your order will be delivered soon.';
//
//     $config['protocol']    = 'smtp';
//     $config['smtp_host']    = 'ssl://smtp.gmail.com';
//     $config['smtp_port']    = '465';
//     $config['smtp_timeout'] = '60';
//     $config['smtp_user']    = 'sukramror0001@gmail.com';
//     $config['smtp_pass']    = 'Sukram@123';
//     $config['charset']    = 'utf-8';
//     $config['newline']    = "\r\n";
//     $config['mailtype'] = 'html';
//     $config['validation'] = TRUE;
//
//     $this->email->initialize($config);
//     $this->email->set_mailtype("html");
//     $this->email->from($from);
//     $this->email->to($to);
//     $this->email->subject($subject);
//     $this->email->message($emailContent);
//
//     // return redirect('email_send');
//     if($this->email->send())
//          {
//          }
//          else
//          {
//              show_error($this->email->print_debugger());
//          }

    $this->verify_otp();

}else{
  $this->checkout();
}
}else {
     // echo 'Your email sent...!!!! ';
     $this->session->set_flashdata('msg',"Please select atleast 1 product to place order");
     // $this->session->set_flashdata('msg_class','alert-success');
         return redirect('cart/checkout');

 }
}else{
  echo 'online payment method is not yet working';
}
}else{
  redirect (base_url(). 'home/login');
}
}
    public function verify_otp(){
 if($this->session->userdata('authenticated')){
      $this->navbar();
      $this->load->view('verify_otp');
      $this->footer();
    }else{
      redirect (base_url(). 'home/login');
    }
    }

   public function otp_verification(){

     if($this->input->post('otp') == $this->session->userdata('otp')){
       $this->load->model('mdl_home');
       $this->mdl_home->order($this->session->userdata('order'));

        $to = 'sukramror0001@gmail.com';
        // $to = $this->input->post('mail');
        $subject = 'Rullen-Furniture';
        $from = 'sukramror0001@gmail.com';
        $emailContent = 'Hi.. '.$this->session->userdata('username').', Your order has been placed successfully having details shown below';
        $emailContent .='<br>'.'<!DOCTYPE html>
    <html>
    <head>
    <style>
    table,th,td {
      border: 1px solid blue;
    }
    </style>
    </head>
    <body>

    <table>
      <tr>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Product Quantity</th>
        <th>Price Per Item</th>
        <th>Total Price</th>
        <th>Payment Mode</th>
      </tr>
      <tr>
        <td>'.$this->session->flashdata('product_id').'</td>
        <td>'.$this->session->flashdata('product_title').'</td>
        <td>'.$this->session->flashdata('p_qty').'</td>
        <td>'.$this->session->flashdata('item_price').'</td>
        <td>'.$this->session->flashdata('price').'</td>
        <td>'.'Cash on delivery</td>
      </tr>

    </table>

    </body>
    </html>
    ';
    $emailContent .='<br>'.'Thanks for shopping with us, your order will be delivered soon.';

        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '60';
        $config['smtp_user']    = 'sukramror0001@gmail.com';
        $config['smtp_pass']    = 'Sukram@123';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html';
        $config['validation'] = TRUE;

        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);

        // return redirect('email_send');
        if($this->email->send())
             {
             }
             else
             {
                 show_error($this->email->print_debugger());
             }

        $this->ordered();

     }
       else{
         $this->session->set_flashdata('verify_otp', 'OTP not verified, Please try again');
         redirect ('cart/verify_otp');
       }
 }
  public function ordered(){

      $this->destroy();
    $this->session->set_flashdata('order_msg', 'Your order has been placed successfully, please check your email account for confirmation, Thank you');
 return redirect('cart/checkout');

}
}
