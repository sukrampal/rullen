<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Cart extends CI_Controller {
    public function index(){
      $this->load->model('mdl_home');
      $data['var_shop'] = $this->mdl_home->shop();
      $this->navbar();
      $this->load->view('cart', $data);
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
      $this->load->model('admin/mdl_admin');
      $data['footer_context']  = $this->mdl_admin->get_footer_context();
      $data['monday'] = $this->mdl_home->monday();
      $data['tuesday'] = $this->mdl_home->tuesday();
      $data['wednesday'] = $this->mdl_home->wednesday();
      $data['thursday'] = $this->mdl_home->thursday();
      $data['friday'] = $this->mdl_home->friday();
      $data['saturday'] = $this->mdl_home->saturday();
      $data['sunday'] = $this->mdl_home->sunday();
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
      if($this->input->post('qty') > $row->qty){
        $this->session->set_flashdata('qty', 'Sorry, only '.$row->qty.' item(s) left in our stock.');
      redirect ($_SERVER["HTTP_REFERER"]);
      }
      //echo $qty; pr($row);
      $data = array(
        'id'           => $id,
        'qty'          => $qty,
        'item_price'   => $row->product_price,
        'qty_price'    => $row->product_price*$qty,
        'price'        => $row->product_price + $row->shipping,
        'name'         => $row->product_title,
        'shipping'     => $row->shipping*$qty,
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
    $id = $p[3];
    $this->db->select('*');
    $this->db->from('products');
    $this->db->where('product_id', $id);
    $query = $this->db->get();
    $row = $query->row();

    if($p[0] > $row->qty){
      $p[0] = $row->qty;
      $this->session->set_flashdata('qty', 'Sorry, only '.$row->qty.' item(s) left in our stock.');
    //redirect ($_SERVER["HTTP_REFERER"]);
    }
    $data[$i]['rowid'] = $k;
    $data[$i]['qty'] = $p[0];
    $data[$i]['qty_price'] = $p[0] * $p[1];
    $data[$i]['shipping'] = $p[0] * $p[2];
    $i++;

  }              //prd($p[0);


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
    $this->load->helper('date');
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
    //prd($_POST);

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
    'shipping_btn'   => 'Ready to Ship',
    'date' => date('y-d-m',NOW()),

  );

  foreach($this->input->post('product_id') as $key => $p)
  {
    $order["products"][$key]["product_id"] = $p;
  }
  foreach($this->input->post('product_title') as $key => $p)
  {
    $order["products"][$key]["product_title"] = $p;
  }
  foreach($this->input->post('p_qty') as $key => $p)
  {
    $order["products"][$key]["p_qty"] = $p;
  }
  foreach($this->input->post('item_price') as $key => $p)
  {
    $order["products"][$key]["item_price"] = $p;
  }
  unset($order["product_id"]);
  unset($order["product_title"]);
  unset($order["p_qty"]);
  unset($order["qty"]);
  unset($order["item_price"]);
  //prd($order);
  $this->session->set_userdata('order',$order);  // prd($order);
  // $this->session->set_flashdata($order);

  // $this->session->set_flashdata('price', $this->input->post('price'));

    // opt mail
    $six_digit_random_number = mt_rand(100000, 999999);
    $this->session->set_userdata('otp', $six_digit_random_number);
    $this->session->set_tempdata('otp', $six_digit_random_number, 600);
    $to = $this->session->userdata('email');
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

// $this->session->set_flashdata('otp', 'We have sent you an otp at '.$this->input->post('email').' which is valid for 10 minutes, please enter here.');
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
//prd($_POST);

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
'payment_method' => 'In Bank Account',
'shipping_btn'   => 'Ready to Ship',
'date' => date('Y-m-d',NOW()),

);

foreach($this->input->post('product_id') as $key => $p)
{
$order["products"][$key]["product_id"] = $p;
}
foreach($this->input->post('product_title') as $key => $p)
{
$order["products"][$key]["product_title"] = $p;
}
foreach($this->input->post('p_qty') as $key => $p)
{
$order["products"][$key]["p_qty"] = $p;
}
foreach($this->input->post('item_price') as $key => $p)
{
$order["products"][$key]["item_price"] = $p;
}
unset($order["product_id"]);
unset($order["product_title"]);
unset($order["p_qty"]);
unset($order["qty"]);
unset($order["item_price"]);
//prd($order);
$this->session->set_userdata('order',$order);//prd($this->session->userdata('product_id'));

// $this->mdl_home->order($data);
// opt mail
$six_digit_random_number = mt_rand(100000, 999999);
$this->session->set_userdata('otp', $six_digit_random_number);
$this->session->set_tempdata('otp', $six_digit_random_number, 600);
$to = $this->session->userdata('email');
// $to = $this->input->post('mail');
$subject = 'Rullen-Furniture';
$from = 'sukramror0001@gmail.com';
$emailContent ='Hi..' .$this->session->userdata('username').', Here is your OTP to place your order'.('OTP: '.$this->session->userdata['otp'] );

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

// $this->session->set_flashdata('otp', 'We have sent you an otp at '.$this->input->post('email').' which is valid for 10 minutes, please enter here.');
$this->verify_otp1();

}else{
$this->checkout();
}
}else {
 // echo 'Your email sent...!!!! ';
 $this->session->set_flashdata('msg',"Please select atleast 1 product to place order");
 // $this->session->set_flashdata('msg_class','alert-success');
     return redirect('cart/checkout');

}
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
    public function verify_otp1(){
 if($this->session->userdata('authenticated')){
      $this->navbar();
      $this->load->view('verify_otp1');
      $this->footer();
    }else{
      redirect (base_url(). 'home/login');
    }
    }

   public function otp_verification(){
if($this->session->userdata('authenticated')){
     if($this->input->post('otp') == $this->session->userdata('otp')){
       $this->load->model('mdl_home');
       $order = $this->session->userdata('order');
       $this->mdl_home->order($order);

        $to = $order["email"];
        // $to = $this->input->post('mail');
        $subject = 'Rullen-Furniture';
        $from = 'sukramror0001@gmail.com';

        $products = "";
        foreach($order["products"] as $p)
        {
          $products .= '<tr>
            <td>'.$p["product_id"].'</td>
            <td>'.$p["product_title"].'</td>
            <td>'.$p["p_qty"].'</td>
            <td>'.$p["item_price"].'</td>
            <td>'.$order["payment_method"].'</td>
            <td>'.($p["p_qty"] * $p["item_price"]).'</td>
          </tr>';
        }


        $emailContent = 'Hi.. '.$order["username"].', Your order has been placed successfully, please check the details below';
        $emailContent .='<br>'.'<!DOCTYPE html>

    <html>
    <head>
    <style>
    table,th,td {
      border: 1px solid #1b1e2d94;
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
        <th>Payment Mode</th>
        <th>Total Price Per Item</th>
      </tr>'.$products.'
      <tr>
        <td colspan="5">Total Price(<small>Include Shipping</small>)</td>
        <td>'.$order['price'].'</td>
      </tr>
    </table>

    </body>
    </html>
    ';
    $emailContent .='<br>'.'Your order will be delivered soon.';
    $emailContent .='<br>'.'If you have any further query, feel free to contact us at info@rullenantiques.co.nz, Thank You';

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

     }else{
         $this->session->set_flashdata('verify_otp', 'OTP not verified, Please try again');
         redirect ('cart/verify_otp');
       }
      }
      else{
        redirect (base_url(). 'home/login');
     }
   }
   public function otp_verification1(){
if($this->session->userdata('authenticated')){
     if($this->input->post('otp') == $this->session->userdata('otp')){
       $this->load->model('mdl_home');
       $order = $this->session->userdata('order');
       $this->mdl_home->order($order);

        $to = $order["email"];
        // $to = $this->input->post('mail');
        $subject = 'Rullen-Furniture';
        $from = 'sukramror0001@gmail.com';

        $products = "";
        foreach($order["products"] as $p)
        {
          $products .= '<tr>
            <td>'.$p["product_id"].'</td>
            <td>'.$p["product_title"].'</td>
            <td>'.$p["p_qty"].'</td>
            <td>'.$p["item_price"].'</td>
            <td>'.$order["payment_method"].'</td>
            <td>'.($p["p_qty"] * $p["item_price"]).'</td>
          </tr>';
        }


        $emailContent = 'Hi.. '.$order["username"].', Your order has been placed successfully, please check the details below';
        $emailContent .='<br>'.'<!DOCTYPE html>

    <html>
    <head>
    <style>
    table,th,td {
      border: 1px solid #1b1e2d94;
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
        <th>Payment Mode</th>
        <th>Total Price Per Item</th>
      </tr>'.$products.'
      <tr>
        <td colspan="5">Total Price(<small>Include Shipping</small>)</td>
        <td>'.$order['price'].'</td>
      </tr>
    </table>

    </body>
    </html>
    ';
    $emailContent .='<br>'.'<b>Account Name:</b>'.' Rullen Tech Limited,';
    $emailContent .='<br>'.'<b>Account Number:</b>'.'  02 0865 0071078 000';
    $emailContent .='<br>'.'<b>Reference Number: </b>'.$this->session->userdata('id');
    $emailContent .='<br>'.'Please send full payment in our bank account.';
    $emailContent .='<br>'.'Your order will not proceed, untill we confirm full payment in our bank account. ';
    $emailContent .='<br>'.'if you have any further query, feel free to contact us at info@rullenantiques.co.nz';
    $emailContent .='<br>'.'or you may call us at +64 21770211, Thank you';

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

     }else{
         $this->session->set_flashdata('verify_otp', 'OTP not verified, Please try again');
         redirect ('cart/verify_otp1');
       }
      }
      else{
        redirect (base_url(). 'home/login');
     }
   }
  public function ordered(){

      $this->destroy();
    $this->session->set_flashdata('order_msg', 'Your order has been placed successfully, please check your email account for confirmation, Thank you');
 return redirect('cart/checkout');

}
}
