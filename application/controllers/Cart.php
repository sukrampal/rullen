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
  }

  $this->cart->update($data);
  redirect('cart');
}

   public function remove_item($rowid) {
    $rowid = $this->uri->segment(3);
    $remove = $this->cart->remove($rowid);
    redirect('cart');
  }
  public function checkout(){
    $this->navbar();
    $this->load->view('checkout');
    $this->footer();
  }
  public function order(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules("first_name", "First name ", 'required');
    $this->form_validation->set_rules("last_name", "Last name ", 'required');
    $this->form_validation->set_rules("address", "Address ", 'required');
    $this->form_validation->set_rules("city", "City", 'required');
    $this->form_validation->set_rules("country", "Country ", 'required');
    $this->form_validation->set_rules("postcode", "Postcode/zip", 'required');
    $this->form_validation->set_rules("email", "Email ", 'required');
    $this->form_validation->set_rules("phone", "contact number", 'required');
    if($this->form_validation->run()){
    $this->load->model('mdl_home');
    // prd($_POST);
    $data = array(
    'first_name' => $this->input->post('first_name'),
    'last_name' => $this->input->post('last_name'),
    'address' => $this->input->post('address'),
    'city' => $this->input->post('city'),
    'country' => $this->input->post('country'),
    'postcode' => $this->input->post('postcode'),
    'email' => $this->input->post('email'),
    'phone' => $this->input->post('phone'),
    'product_id' => implode(", ",$this->input->post('product_id')),
    'product_title' => implode(", ", $this->input->post('product_title')),
    'qty' => implode(", ", $this->input->post('p_qty')),
    'item_price' => implode(", ", $this->input->post('item_price')),
    'price' => $this->input->post('price'),

  );                                   // prd($data);
    $this->mdl_home->order($data);
    $this->ordered();

}else{
  $this->checkout();
}
}
  public function ordered(){
      $this->destroy();
    echo 'order successfull';


  }

}
