<?php
 class Mdl_admin extends CI_Model
 {
   public function can_login($username, $password)
   {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('Admin');
        //SELECT * FROM admin WHERE username = '$username' AND password = '$password'
        if($query->num_rows() > 0)
        {
             return true;
        }
        else
        {
             return false;
        }
   }
     public function insert_category($data){
       $this->db->insert("categories", $data);
     }
     public function get_category(){
        $result = $this->db->get('categories')->result_array();
        return $result;
     }
     public function delete_category($id){
       $this->db->where('cat_id', $id);
       $this->db->delete('categories');
     }
     public function fetch_single_data($id){
       $result= $this->db->where('cat_id', $id)->get('categories')->result_array();
       return $result;
     }
     public function fetch_single_product($id){
       $result = $this->db->where('product_id',$id)->get('products')->result_array();
       return $result;
     }
     public function update_category($data, $id){
       $this->db->where('cat_id', $id);
       $this->db->update('categories', $data);
     }
     public function get_product($limit, $offset){
       $result = $this->db->limit($limit, $offset)->order_by('product_id', 'desc')->get('products')->result_array();
       return $result;
     }
     public function get_new_product(){
       $result  = $this->db->where('new_product', 1)->get('products')->result_array();
       return $result;
     }
     public function delete_new_product($data, $id){
       $this->db->where('product_id', $id);
       $this->db->update('products', $data);
     }
     public function num_rows(){
       $result = $this->db->get('products');
       return $result->num_rows();
     }
     public function delete_product($id){
       $res = $this->db->select('product_image,product_image1,product_image2,product_image3')->where('product_id', $id)->get('products')->row_array();
       unlink('./assets/img/'.$res['product_image']);
       unlink('./assets/img/'.$res['product_image1']);
       unlink('./assets/img/'.$res['product_image2']);
       unlink('./assets/img/'.$res['product_image3']);
       $this->db->where('product_id', $id)->delete('products');
     }
     public function insert_product($data){
       $this->db->insert('products', $data);
     }
     // public function add_n_product($data){
     //   $this->db->insert('new_products', $data);
     // }
     public function get_product_cat($id){
       $result= $this->db->where('product_id', $id)->get('products')->result_array();
       return $result;
     }
     public function update_product($data, $id){
       $this->db->where('product_id', $id);
       $this->db->update('products', $data);
     }
     public function get_search($search_term='default'){
      $result = $this->db->like('product_keywords', $search_term)->get('products')->result_array();
      return $result;
     }
     public function get_order($limit, $offset){
       // $this->db->order_by('order_id', 'desc');
       $result = $this->db->limit($limit, $offset)->order_by('order_id', 'desc')->get('orders')->result_array();
       return $result;
     }
     public function cancel_order($id, $data){
       $this->db->where('order_id', $id);
       $this->db->update('orders', $data);
     }
     public function get_banners(){
       $result = $this->db->get('banner')->result_array();
       return $result;
     }
    public function fetch_single_banner($id){
      $result = $this->db->where('id', $id)->get('banner')->result_array();
      return $result;
    }
    public function update_banner($data, $id){
      $this->db->where('id', $id);
      $this->db->update('banner', $data);
    }
    public function check_old_password($uname, $old_pass){
      $this->db->where('username', $uname);
      $this->db->where('password', $old_pass);
      $query = $this->db->get('admin');
      if($query->num_rows() == 1 ){
        return $query->row();
        // return true;
      }else{
        return false;
      }
    }
    public function update_password($data, $uname){
      $this->db->where('username', $uname);
      $this->db->update('admin', $data);
    }
    public function update_forget_password($to, $data){
      $this->db->where('email', $to);
      $this->db->update('admin', $data);
    }
    public function delivery_status($data2, $id){
      $this->db->where('order_id', $id);
      $this->db->update('orders', $data2);
    }
    public function retrieve_password(){
      $result = $this->db->get('admin')->row_array();
      return $result;
    }
    public function update_about($data){
      $this->db->where('id', 1)->update('about', $data);
    }
    public function get_about(){
      $result = $this->db->get('about')->result_array();
      return $result;
    }
    public function update_caption($data){
      $this->db->where('id', 1)->update('captions', $data);
    }
    public function get_caption(){
      $result = $this->db->get('captions')->result_array();
      return $result;
    }
    public function get_orderforemail($id){
      $result = $this->db->where('order_id', $id)->get('orders')->row_array();
      return $result;
    }
    public function shipping($id, $data){
      $this->db->where('order_id', $id)->update('orders', $data);
    }
    public function get_subscribe($limit, $offset){
      $result = $this->db->limit($limit, $offset)->get('subscribe')->result_array();
      return $result;
    }
    public function total_subscriber(){
      $this->db->select("count(*) as no");
    $query = $this->db->get("subscribe");
    return $query->result();
    }
    public function report($to, $from){
      $this->db->select("sum(price) as no");
  $this->db->from('sum');
  $this->db->where('date <', $to);
  $this->db->where('date >', $from);
  $query = $this->db->get();
  return $query->result();
    }
    // public function get_report($to, $from){
    //   $this->db->select('*');
    //   $this->db->from('orders');
    //   $this->db->where('date <', $to);
    //   $this->db->where('date >', $from);
    //   $query = $this->db->get();
    //   return $query->result();
    // }
 }
