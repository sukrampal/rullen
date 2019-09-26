<?php
 class Mdl_home extends CI_Model
 {
        public function can_login($email, $password){
          $this->db->where('email', $email);
          $this->db->where('password', $password);
          $query = $this->db->get('user');
          if($query->num_rows() == 1 ){
            return $query->row();
            // return true;
          }else{
            return false;
          }
        }
        public function sign_up($data){
          // prd($data);
          $this->db->insert('user', $data);
        }
        public function get_new_products(){
        $result = $this->db->where('new_product', 1)->get('products')->result_array();
        //  $this->db->where('product_id', 1);
        return $result;
              }
        public function get_banner(){
        $result = $this->db->where('id', 1)->get('banner')->row_array();
        return $result;
              }
        public function get_banner2(){
         $result = $this->db->where('id', 2)->get('banner')->row_array();
        return $result;
        }
        public function gallery_banner(){
         $result = $this->db->where('id', 4)->get('banner')->row_array();
        return $result;
        }
        public function about_banner(){
          $result = $this->db->where('id', 5)->get('banner')->row_array();
          return $result;
        }
        public function get_header_logo(){
          $result = $this->db->where('id', 6)->get('banner')->row_array();
          return $result;
        }
        public function get_footer_logo(){
          $result = $this->db->where('id', 7)->get('banner')->row_array();
          return $result;
        }

        public function shop(){         // for pagination shop($limit, $offset)

        $id = $this->uri->segment(4);
        $result = $this->db->where('product_cat', $id)->get('products')->result_array();   //for pagination where('product_cat', $id)->limit($limit, $offset)->get('products')
        return $result;
        }
        public function get_category(){
          // $this->db->limit(2);
          // $this->db->order_by('cat_id', 'desc');
        $result = $this->db->get('categories')->result_array();
        return $result;
        }
        public function get_product_details(){
          $id = $this->uri->segment(5);
          $result = $this->db->where('product_id', $id)->get('products')->result_array();
          return $result;
        }
        // public function get_new_product_details(){
        //   $id = $this->uri->segment(4);
        //   $result = $this->db->where('product_id', $id)->get('new_products')->result_array();
        //   return $result;
        // }
        public function get_search($search_term='default'){
           $this->db->select('*');
           $this->db->from('products');
           $this->db->like('product_keywords',$search_term);
           $query = $this->db->get();
           return $query->result_array();
        }
        public function get_related_product(){
          $id = $this->uri->segment(3);
          $this->db->order_by('product_cat','random');
          $result = $this->db->where('product_cat', $id)->get('products')->result_array();
          return $result;
        }
        public function get_gallery($limit, $offset){     // for pagination get_gallery($limit, $offset){
          $result = $this->db->limit($limit, $offset)->get('products')->result_array();   //db->limit($limit, $offset)->get('products')->
          return $result;
        }
        public function num_rows(){
          $result = $this->db->get('products');
          return $result->num_rows();
        }
        public function order($data){
           return $this->db->insert("orders", $data);
        }
      public function retrieve_password($emailto){
        $result = $this->db->where('email', $emailto)->get('user')->row_array();
        return $result;
      }
      public function subscribe($data){
        $this->db->insert('subscribe', $data);
      }
      public function check_old_password($user_id, $old_pass){
        $this->db->where('user_id', $user_id);
        $this->db->where('password', $old_pass);
        $query = $this->db->get('user');
        if($query->num_rows() == 1 ){
          return $query->row();
          // return true;
        }else{
          return false;
        }
      }
      public function update_password($data, $user_id){
        $this->db->where('user_id', $user_id);
        $this->db->update('user', $data);
      }
      public function my_order(){
        $id  = $this->session->userdata('id');
        $result = $this->db->where('user_id', $id)->get('orders')->result_array();
        return $result;
      }
}
