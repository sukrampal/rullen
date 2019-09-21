<?php
 class Admin_model extends CI_Model
 {
      function can_login($username, $password)
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



 }
