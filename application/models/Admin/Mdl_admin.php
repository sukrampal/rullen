<?php
 class Mdl_admin extends CI_Model
 {
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
       $this->db->where('product_id', $id);
       unlink('./assets/img/'.$group_picture);
       $this->db->delete('products');
     }
     public function insert_product($data){
       $this->db->insert('products', $data);
     }
     public function add_n_product($data){
       $this->db->insert('new_products', $data);
     }
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
     public function get_order(){
       $this->db->order_by('order_id', 'desc');
       $result = $this->db->get('orders')->result_array();
       return $result;
     }
     public function delete_order($id){
       $this->db->where('order_id', $id);
       $this->db->delete('orders');
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
 }
