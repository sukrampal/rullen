<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
      public function index()
      {
        if($this->session->userdata('username') != '')
          {
            redirect (base_url() . 'admin/home/dashboard');
               // echo '<p class="text-success">Welcome - '.$this->session->userdata('username').'</p>';
               // echo '<label><a href="'.base_url().'Admin/home/logout">Logout</a></label>';
          }
          else
          {
               $this->load->view("admin/login");
          }
      // $this->load->view("Admin/login");
      }
      function login_validation()
      {
          $this->load->library('form_validation');
          $this->form_validation->set_rules('username', 'Username', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');
          if($this->form_validation->run())
      {
                  //true
              $username = $this->input->post('username');
              $password = md5($this->input->post('password'));
              //model function
              $this->load->model('admin/mdl_admin');
              if($this->mdl_admin->can_login($username, $password))
                  {
                    $session_data = array(
                    'username'     =>     $username
                    );
                    $this->session->set_userdata($session_data);
                    redirect(base_url() . 'admin/home/dashboard');
                  }
                  else
                  {
                     $this->session->set_flashdata('error', 'Invalid Username and Password');
                     redirect(base_url() . 'admin/home/index');
                  }
               }else {
                  //false
                  $this->index();
              }
             }
        function dashboard(){
          $this->load->model('admin/mdl_admin');
          $this->load->library('pagination');
          $config = [
            'base_url'         => base_url('admin/home/dashboard'),
            'per_page'         => 10,
            'total_rows'       => $this->mdl_admin->num_rows(),
            'full_tag_open'    =>"<ul class='pagination'>",
            'full_tag_close'   =>"</ul>",
            'first_tag_open'   =>'<li>',
            'first_tag_close'  =>'</li>',
            'last_tag_open'    =>'<li>',
            'last_tag_close'   =>'</li>',
            'next_tag_open'    =>'<li>',
            'next_tag_close'   =>'</li>',
            'prev_tag_open'    =>'<li>',
            'prev_tag_close'   =>'</li>',
            'num_tag_open'     =>'<li>',
            'num_tag_close'    =>'</li>',
            'cur_tag_open'     =>"<li class='active'><a>",
            'cur_tag_close'    =>'</a></li>',
          ];
          $this->pagination->initialize($config);
          $data['orders'] = $this->mdl_admin->get_order($config['per_page'], $this->uri->segment(4));
          $this->navbar();
          $this->load->view('admin/dashboard', $data);
          $this->load->view('admin/footer');
          // if($this->session->userdata('username') != '')
          //    {
          //         echo '<p class="text-success">Welcome - '.$this->session->userdata('username').'</p>';
          //         // echo '<label><a href="'.base_url().'Admin/home/logout">Logout</a></label>';
          //    }
          //    else
          //    {
          //         redirect(base_url() . 'Admin/home/index');
          //    }
        }
        function logout()
            {
                 $this->session->unset_userdata('username');
                 redirect(base_url() . 'admin/home/index');
            }
            public function navbar(){
              if($this->session->userdata('username') != '')
                 {
                   $this->load->view('admin/header');

                 }else{
                 redirect(base_url() . 'admin/home/index');
                 }
            }
        public function add_category(){
                $this->load->library('form_validation');
                $this->form_validation->set_rules("cat_title", " ", 'required');
                if($this->form_validation->run()){
                  $this->load->model('admin/mdl_admin');
                  $data =array(
                'cat_title' => $this->input->post('cat_title')
              );
                 if($this->input->post('update')){
                   $this->mdl_admin->update_category($data, $this->input->post('hidden_id'));
                   redirect ("admin/home/updated");
                 }
                if($this->input->post("insert")){
                $this->mdl_admin->insert_category($data);
                redirect ("admin/home/inserted");
              }
                }else{
                 $this->category();
                }
        }
        public function inserted(){
          $this->category();
          if($this->session->userdata('username') != '')
             {
             }else{
             redirect(base_url() . 'admin/home/index');
             }
            }

        public function category(){
          if($this->session->userdata('username') != '')
             {
               $this->load->model('admin/mdl_admin');
               $data['category'] = $this->mdl_admin->get_category();
               $this-> navbar();
               // $this->load->view('admin/header');
               $this->load->view('admin/category', $data);
               $this->load->view('admin/footer');
             }
             else
             {
                redirect(base_url() . 'admin/home/index');
             }
        }
        public function delete_category(){
          $id = $this->uri->segment(4);
          $this->load->model('admin/mdl_admin');
          $this->mdl_admin->delete_category($id);
          redirect ("admin/home/deleted");
        }
        public function deleted(){
          $this->category();
        }
        public function update_category(){
          $user_id = $this->uri->segment(4);
          $this->load->model('admin/mdl_admin');
          $data['update'] = $this->mdl_admin->fetch_single_data($user_id);
          $data['category'] = $this->mdl_admin->get_category();
        //  $this->load->view('admin/header');
          $this-> navbar();
          $this->load->view('admin/category', $data);
          $this->load->view('admin/footer');
        }
        public function updated(){
          $this->category();
        }
        public function product(){
               $this->load->model('admin/mdl_admin');
               $this->load->library('pagination');
               $config = [
                 'base_url'         => base_url('admin/home/product'),
                 'per_page'         => 10,
                 'total_rows'       => $this->mdl_admin->num_rows(),
                 'full_tag_open'    =>"<ul class='pagination'>",
                 'full_tag_close'   =>"</ul>",
                 'first_tag_open'   =>'<li>',
                 'first_tag_close'  =>'</li>',
                 'last_tag_open'    =>'<li>',
                 'last_tag_close'   =>'</li>',
                 'next_tag_open'    =>'<li>',
                 'next_tag_close'   =>'</li>',
                 'prev_tag_open'    =>'<li>',
                 'prev_tag_close'   =>'</li>',
                 'num_tag_open'     =>'<li>',
                 'num_tag_close'    =>'</li>',
                 'cur_tag_open'     =>"<li class='active'><a>",
                 'cur_tag_close'    =>'</a></li>',
               ];
               $this->pagination->initialize($config);
               $data['products'] = $this->mdl_admin->get_product($config['per_page'], $this->uri->segment(4));
               $this-> navbar();
               //$this->load->view('admin/header');
               $this->load->view('admin/product', $data);
               $this->load->view('admin/footer');
        }

        public function new_product(){
               $this->load->model('admin/mdl_admin');

               $data['products'] = $this->mdl_admin->get_new_product();
               $this-> navbar();
               //$this->load->view('admin/header');
               $this->load->view('admin/new_products', $data);
               $this->load->view('admin/footer');
        }
        public function delete_new_product(){
          $id = $this->uri->segment(4);
          $this->load->model('admin/mdl_admin');
          $data['new_product'] = 0;
          $this->mdl_admin->delete_new_product($data, $id);
          redirect ('admin/home/new_product_deleted');
        }
        public function new_product_deleted(){
          $this->new_product();
        }

        public function do_upload(){
                          $this->load->helper('date');
                         $data['product_title'] = $this->input->post('product_title');
                         $data['product_cat'] = $this->input->post('product_cat');
                         $data['product_desc'] = $this->input->post('product_desc');
                         $data['product_price'] = $this->input->post('product_price');
                         $data['old_price'] = $this->input->post('old_price');
                         $data['shipping'] = $this->input->post('shipping');
                         $data['qty'] = $this->input->post('quantity');
                         $data['in_stk'] = 'IN STOCK';
                         $data['date'] =  date('y-d-m',NOW());
                         $data['product_keywords'] = $this->input->post('product_keywords');
                         $config['upload_path']  = './assets/img/';
                         $config['allowed_types'] = 'gif|jpeg|jpg|png';
                         $this->load->library('upload', $config);
                            if (!$this->upload->do_upload('product_image0')) {
                            $error = array('error' => $this->upload->display_errors());
                            } else {
                            $fileData = $this->upload->data();
                            $data['product_image'] = $fileData['file_name'];
                            }
                            if (!$this->upload->do_upload('product_image1')) {
                              $error = array('error' => $this->upload->display_errors());
                              } else {
                              $fileData = $this->upload->data();
                              $data['product_image1'] = $fileData['file_name'];
                            }
                            if (!$this->upload->do_upload('product_image2')) {
                              $error = array('error' => $this->upload->display_errors());
                              } else {
                              $fileData = $this->upload->data();
                              $data['product_image2'] = $fileData['file_name'];
                            }
                            if (!$this->upload->do_upload('product_image3')) {
                              $error = array('error' => $this->upload->display_errors());
                              } else {
                              $fileData = $this->upload->data();
                              $data['product_image3'] = $fileData['file_name'];
                            }
                            if($this->input->post('new_product')){
                              $data['new_product'] = 1;
                            }
                                                              //  prd($data);
                            $this->load->model('admin/mdl_admin');
                            $this->mdl_admin->insert_product($data);
                            redirect ('admin/home/product_inserted');

                        }
                            public function product_inserted(){
                              $this->product();
                            }
                            public function delete_product(){
                              $id = $this->uri->segment(4);
                              $this->load->model('admin/mdl_admin');
                              $this->mdl_admin->delete_product($id);
                              redirect ('admin/home/delete');
                            }
                            public function delete(){
                              $this->product();
                            }

                              public function add_product(){
                              $this->load->model('admin/mdl_admin');
                              $this->mdl_admin->get_category();
                              $data['category'] = $this->mdl_admin->get_category();
                              $this-> navbar();
                              //$this->load->view('admin/header');
                              $this->load->view('admin/add_product', $data);
                              $this->load->view('admin/footer');
                            }
                            public function update_product(){
                              $id = $this->uri->segment(4);
                              $this->load->model('admin/mdl_admin');
                              $data['single_product'] = $this->mdl_admin->fetch_single_product($id);
                              $data['category'] = $this->mdl_admin->get_category();
                              $data['product_cat'] = $this->mdl_admin->get_product_cat($id);
                              $this-> navbar();
                              //$this->load->view('admin/header');
                              $this->load->view('admin/add_product', $data);         //prd($data);
                              $this->load->view('admin/footer');
                            }
                            public function product_updated(){
                              $this->load->model('admin/mdl_admin');
                              // $data['product_image'] = $this->input->post('product_img');      doesn't work
                              if(!empty($_FILES)){
                              // if($this->input->post('product_image0')){            doesn't work
                              $config['upload_path']  = './assets/img/';
                              $config['allowed_types'] = 'gif|jpeg|jpg|png';
                              $this->load->library('upload', $config);
                                 if (!$this->upload->do_upload('product_image0')) {
                                 $error = array('error' => $this->upload->display_errors());
                                 } else {
                                 $fileData = $this->upload->data();
                                  $data['product_image']= $fileData['file_name'];
                               }
                             }
                             if(!empty($_FILES)){
                             // if($this->input->post('product_image0')){            doesn't work
                             $config['upload_path']  = './assets/img/';
                             $config['allowed_types'] = 'gif|jpeg|jpg|png';
                             $this->load->library('upload', $config);
                                if (!$this->upload->do_upload('product_image1')) {
                                $error = array('error' => $this->upload->display_errors());
                                } else {
                                $fileData = $this->upload->data();
                                 $data['product_image1']= $fileData['file_name'];
                              }
                            }
                            if(!empty($_FILES)){
                            // if($this->input->post('product_image0')){            doesn't work
                            $config['upload_path']  = './assets/img/';
                            $config['allowed_types'] = 'gif|jpeg|jpg|png';
                            $this->load->library('upload', $config);
                               if (!$this->upload->do_upload('product_image2')) {
                               $error = array('error' => $this->upload->display_errors());
                               } else {
                               $fileData = $this->upload->data();
                                $data['product_image2']= $fileData['file_name'];
                             }
                           }
                           if(!empty($_FILES)){
                           // if($this->input->post('product_image0')){            doesn't work
                           $config['upload_path']  = './assets/img/';
                           $config['allowed_types'] = 'gif|jpeg|jpg|png';
                           $this->load->library('upload', $config);
                              if (!$this->upload->do_upload('product_image3')) {
                              $error = array('error' => $this->upload->display_errors());
                              } else {
                              $fileData = $this->upload->data();
                               $data['product_image3']= $fileData['file_name'];
                            }
                          }
                          if($this->input->post('new_product')){
                            $data['new_product'] = 1;
                          }
                              $data['product_title'] = $this->input->post('product_title');
                              $data['product_cat'] = $this->input->post('product_cat');
                              $data['product_desc'] = $this->input->post('product_desc');
                              $data['product_price'] = $this->input->post('product_price');
                              $data['old_price'] = $this->input->post('old_price');
                              $data['shipping'] = $this->input->post('shipping');
                              $data['qty'] = $this->input->post('quantity');
                              $data['product_keywords'] = $this->input->post('product_keywords');


                            $this->input->post('update');     //prd($data);
                            $this->mdl_admin->update_product($data, $this->input->post('hidden_id'));
                            redirect ("admin/home/product_update");
                            }

                            public function product_update(){
                              $this->product();
                            }

                            public function search(){
                              $this->load->model('admin/mdl_admin');
                              $search_term = $this->input->post('search');
                              $data['products'] = $this->mdl_admin->get_search($search_term);
                              $this-> navbar();
                              //$this->load->view('admin/header');
                              $this->load->view('admin/search_product', $data);
                              $this->load->view('admin/footer');
                            }
                            public function shipping(){
                              $id = $this->uri->segment(4);
                              $this->load->model('admin/mdl_admin');
                              $data['shipping_btn'] = Shipped;
                              $this->mdl_admin->shipping($id, $data);
                              $data['email'] = $this->mdl_admin->get_orderforemail($id);   //prd($data);
                              foreach($data as $e){
                              $to = $e['email'];
                              $subject = 'Rullen-Furniture';
                              $from = 'sukramror0001@gmail.com';

                              $emailContent = 'Hi.. '.$e['username'].', Your product is ready for shipping, will be delivered soon';
                              $emailContent .= 'If you have any further query, feel free to contact us at info@rullenantiques.co.nz or call us at +64 21770211';
                              }
                              // $emailContent .=$this->input->post('name');
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
                                       // echo 'Your email sent...!!!! ';

                                           return redirect('admin/home/dashboard');
                                   }
                                   else
                                   {
                                       show_error($this->email->print_debugger());
                                   }
                              redirect ('admin/home/dashboard');

                            }

                            public function cancel_order(){
                              $id = $this->uri->segment(4);
                              $this->load->model('admin/mdl_admin');
                              // $data['delivery_status'] = 'Cancelled';
                              // $data['delivery_button'] = ' ';
                              // $data['cancel_button'] = ' ';
                              $data1 = array(
                                'delivery_status' => 'Cancelled',
                                'delivery_button' => ' ',
                                'cancel_button' => ' ',
                                'shipping_btn'   => ' ',
                              );
                              $this->mdl_admin->cancel_order($id, $data1);
                              $data['email'] = $this->mdl_admin->get_orderforemail($id);   //prd($data);
                              foreach($data as $e){
                              $to = $e['email'];
                              $subject = 'Rullen-Furniture';
                              $from = 'sukramror0001@gmail.com';

                              $emailContent = 'Hi.. '.$e['username'].', Your product having product id'.$e['product_id'].' has been cancelled successfully';
                              $emailContent .='<br>'.'If you have any further query, feel free to contact us at info@rullenantiques.co.nz or call us at +64 21770211';

                              }
                              // $emailContent .=$this->input->post('name');
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
                                       // echo 'Your email sent...!!!! ';

                                           return redirect('admin/home/dashboard');
                                   }
                                   else
                                   {
                                       show_error($this->email->print_debugger());
                                   }
                              redirect ('admin/home/order_cancelled');
                            }
                            public function order_cancelled(){
                              $this->dashboard();
                            }
                            public function banner() {
                              $this->navbar();
                              $this->load->model('admin/mdl_admin');
                              $data['banner'] = $this->mdl_admin->get_banners();
                              $this->load->view('admin/banners', $data);
                              $this->load->view('admin/footer');
                            }
                            public function show_update_banner() {
                              $id = $this->uri->segment(4);
                              $this->navbar();
                              $this->load->model('admin/mdl_admin');
                              $data['update_bnr'] = $this->mdl_admin->fetch_single_banner($id);
                              $data['banner'] = $this->mdl_admin->get_banners();
                              $this->load->view('admin/banners', $data);
                              $this->load->view('admin/footer');
                            }
                            public function update_banner(){
                              $this->load->model('admin/mdl_admin');
                              $config['upload_path']  = './assets/img/banner/';
                              $config['allowed_types'] = 'gif|jpeg|jpg|png';
                              $this->load->library('upload', $config);
                                 if (!$this->upload->do_upload('image')) {
                                 $error = array('error' => $this->upload->display_errors());
                                 } else {
                                 $fileData = $this->upload->data();
                                  $data['image']= $fileData['file_name'];
                                  $this->input->post('update');     //prd($data);
                                  $this->mdl_admin->update_banner($data, $this->input->post('hidden_id'));
                                  redirect ("admin/home/banner_updated");
                               }
                            }
                            public function banner_updated(){
                              $this->banner();
                            }
                            public function password_change(){
                              $this-> navbar();
                              //$this->load->view('admin/header');
                              $this->load->view('admin/password_change');
                              $this->load->view('admin/footer');
                            }

                          public function change_password(){
                            $this->load->library('form_validation');
                            $this->form_validation->set_rules('uname', 'Username', 'trim|required|alpha');
                            $this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required');
                            $this->form_validation->set_rules('new_pass', 'New Password', 'trim|required');
                            $this->form_validation->set_rules('c_pass', 'Confirm Password', 'trim|required|matches[new_pass]');
                            if($this->form_validation->run()){
                            $this->load->model('admin/mdl_admin');
                            $uname = $this->input->post('uname');
                            $old_pass = md5($this->input->post('old_pass'));
                            $result = $this->mdl_admin->check_old_password($uname, $old_pass);
                            if($result == true){
                             $data = array(
                               'password' => md5($this->input->post('new_pass')),
                               // $user_id =>$this->input->post('user_id'),
                             );
                             $this->mdl_admin->update_password($data, $uname);
                             $this->session->set_flashdata('msg1', ', Your password has been changed successfully');
                             return redirect ('admin/home/password_change');
                            }else{
                              $this->session->set_flashdata('msg', 'Old password does not match');
                              return redirect ('admin/home/password_change');
                            }
                          }
                          $this->password_change();
                          }

                          public function deliver(){
                            $id  = $this->uri->segment(4);
                            $this->load->model('admin/mdl_admin');
                            // $data['delivery_status'] = 'Delivered';
                            // $data['cancel_button'] = ' ';
                            // $data['delivery_button'] = ' ';
                            // $data['shipping_btn'] = ' ';
                            $data2 = array(
                              'delivery_status' => 'Delivered',
                              'cancel_button' => ' ',
                              'delivery_button' => ' ',
                              'shipping_btn' => ' ',
                            );

                            $this->mdl_admin->delivery_status($data2, $id);
                            $data['email'] = $this->mdl_admin->get_orderforemail($id);
                            foreach($data as $e){
                            $to = $e['email'];
                            $name = $e['username'];
                            $product_title = $e['product_title'];
                            $subject = 'Rullen-Furniture';
                            $from = 'sukramror0001@gmail.com';

                            $emailContent = 'Hi.. '.$name.', Your product '.$product_title.' has been delivered successfully';
                            $emailContent .= '<br>'.'If you have any further query, feel free to contact us at info@rullenantiques.co.nz or call us at +64 21770211';

}
                            // $emailContent .=$this->input->post('name');
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
                                     // echo 'Your email sent...!!!! ';

                                         return redirect('admin/home/dashboard');
                                 }
                                 else
                                 {
                                     show_error($this->email->print_debugger());
                                 }
                            redirect ('admin/home/dashboard');
                          }


                          public function forget_password(){
                            $this->load->model('admin/mdl_admin');
                            $pass['pass']= $this->mdl_admin->retrieve_password(); //prd($password);
                            $to = $this->input->post('email');
                            $subject = 'Rullen-Furniture';
                            $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 5);
                            $from = 'sukramror0001@gmail.com';
                            foreach($pass as $p){
                            $emailContent = 'Hi.. '.$p['username'].', here are your detail to sign in as admin at Rullen-Furniture:' .'<br>';
                            $emailContent  .='Username: '. $p['username'].'<br>';
                            $emailContent  .='Password: '. $token;
                            $emailContent  .='<br> This is an auto generated password, Please change it in your account setting.';

                    }
                            // $emailContent .=$this->input->post('name');

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
                                     // echo 'Your email sent...!!!! ';
                                     $data['password'] = md5($token);
                                     $this->mdl_admin->update_forget_password($to, $data);
                                     $this->session->set_flashdata('msg',"Email has been sent to you with username and password, please check your inbox, Thank you");
                                     $this->session->set_flashdata('msg_class','alert-success');
                                         return redirect('admin/home/index');
                                 }
                                 else
                                 {
                                     show_error($this->email->print_debugger());
                                 }
                           }


                           public function about(){
                             $this->load->model('admin/mdl_admin');
                             $data['about_text'] = $this->mdl_admin->get_about();

                             $this->navbar();
                             $this->load->view('admin/about', $data);
                             $this->load->view('admin/footer');
                           }
                           public function update_about(){
                             $this->load->model('admin/mdl_admin');
                             $this->load->library('form_validation');
                             $this->form_validation->set_rules('about', 'About', 'required');
                             if($this->form_validation->run()){
                               $data = array(
                                 'about' => $this->input->post('about'),
                               );
                               $this->mdl_admin->update_about($data);
                               $this->session->set_flashdata('msg', ' About Us page has been updated successfully');
                               redirect ('admin/home/about');
                             }
                             else{
                               $this->about();
                             }
                           }
                           public function captions(){
                             $this->load->model('admin/mdl_admin');
                             $data['captions'] = $this->mdl_admin->get_caption();
                             $this->navbar();
                             $this->load->view('admin/caption', $data);
                             $this->load->view('admin/footer');
                           }
                           public function update_caption(){
                             $this->load->model('admin/mdl_admin');
                             $this->load->library('form_validation');
                             $this->form_validation->set_rules('caption1', '', 'required');
                             $this->form_validation->set_rules('caption2', '', 'required');
                             if($this->form_validation->run()){
                               $data = array(
                               'caption1' => $this->input->post('caption1'),
                               'caption2' => $this->input->post('caption2'),
                             );
                             $this->mdl_admin->update_caption($data);
                             $this->session->set_flashdata('msg', 'Captions has been updated successfully');
                             return redirect('admin/home/captions');
                           }else{
                             $this->captions();
                           }

                           }
                           public function subscribe(){
                             $this->load->model('admin/mdl_admin');
                             $this->load->library('pagination');
                             $config = [
                               'base_url'         => base_url('admin/home/subscribe'),
                               'per_page'         => 12,
                               'total_rows'       => $this->mdl_admin->num_rows(),
                               'full_tag_open'    =>"<ul class='pagination'>",
                               'full_tag_close'   =>"</ul>",
                               'first_tag_open'   =>'<li>',
                               'first_tag_close'  =>'</li>',
                               'last_tag_open'    =>'<li>',
                               'last_tag_close'   =>'</li>',
                               'next_tag_open'    =>'<li>',
                               'next_tag_close'   =>'</li>',
                               'prev_tag_open'    =>'<li>',
                               'prev_tag_close'   =>'</li>',
                               'num_tag_open'     =>'<li>',
                               'num_tag_close'    =>'</li>',
                               'cur_tag_open'     =>"<li class='active'><a>",
                               'cur_tag_close'    =>'</a></li>',
                             ];
                             $this->pagination->initialize($config);
                             $total = $this->mdl_admin->total_subscriber();
                             $data['total_sbscribe'] = $total[0]->no;      // prd($data);
                             $data['subscribe'] = $this->mdl_admin->get_subscribe($config['per_page'], $this->uri->segment(4));
                             $this->navbar();
                             $this->load->view('admin/subscribe', $data);
                             $this->load->view('admin/footer');
                           }
                           public function mail_to_subscriber(){
                             $email = $this->input->post('email');
                             if(!empty($email)){
                               $this->load->library('form_validation');
                               $this->form_validation->set_rules('subscribe', ' ', 'required');
                               if($this->form_validation->run()){

                            $email = $this->input->post('email');
                             $file_data = $this->upload_file();  //prd($file_data);


                            for($i =0; $i < sizeof($email); $i++){
                              $to = $email;  //prd($email);
                              $subject = 'Rullen-Furniture';
                              $from = 'sukramror0001@gmail.com';

                              $emailContent = $this->input->post('subscribe');
                              // $emailContent .=$this->input->post('name');

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
                              $this->email->attach($file_data['full_path']);

                              // return redirect('email_send');
                              if($this->email->send())
                                   {
                                    if(delete_files($file_data['file_path']));
                                    {
                                       // echo 'Your email sent...!!!! ';
                                       $this->session->set_flashdata('msg',"Email has been sent to the selected users.");
                                       $this->session->set_flashdata('msg_class','alert-success');
                                           return redirect('admin/home/subscribe');
                                   }
                                 }
                                   else
                                   {
                                       show_error($this->email->print_debugger());
                                   }
                            }
                          return  redirect ('admin/home/subscribe');
                        }else{
                          $this->subscribe();
                        }
                      }else{
                          $this->session->set_flashdata('email', 'Please select at least one email address to send data, Thank you');
                          redirect('admin/home/subscribe');
                        }}

                           public function upload_file(){

                             if(!empty($_FILES)){
                             // if($this->input->post('product_image0')){            doesn't work
                             $config['upload_path']  = './assets/img/subscribe/';
                             $config['allowed_types'] = 'gif|jpeg|jpg|png';
                             $this->load->library('upload', $config);
                                if (!$this->upload->do_upload('file')) {
                                $error = array('error' => $this->upload->display_errors());
                                } else {
                                $fileData = $this->upload->data();
                              return $this->upload->data();
                              }
                            }

                           }
                           public function report(){
                             $this->navbar();
                             $this->load->view('admin/report');
                             $this->load->view('admin/footer');
                           }
                           public function generate_report(){
                             $this->load->library('form_validation');
                             $this->form_validation->set_rules('from', ' ', 'required|callback_date_valid');
                             $this->form_validation->set_rules('to', ' ', 'required|callback_date_valid');
                             if($this->form_validation->run()){
                             $from = $this->input->post('from');
                             $to = $this->input->post('to');
                             $this->load->model('admin/mdl_admin');
                             $total = $this->mdl_admin->get_selling($to, $from);
                             $data['total_selling'] = $total[0]->no; //prd($total[0]->no);
                             $total1 = $this->mdl_admin->get_purchase($to, $from);
                             $data['total_purchase'] = $total1[0]->no;
                             $result = $total[0]->no - $total1[0]->no;


                             $this->session->set_flashdata('report', 'Total selling for the time period from '.$this->input->post('from').' to '.$this->input->post('to').' is
                              <b>$'.$total[0]->no.'</b>.');
                              $this->session->set_flashdata('report1', 'Total purchasing for the time period from '.$this->input->post('from').' to '.$this->input->post('to').' is
                               <b>$'.$total1[0]->no.'</b>.');
                               if($total[0]->no > $total1[0]->no){
                               $this->session->set_flashdata('report2', 'Profit for the time period from '.$this->input->post('from').' to '.$this->input->post('to').' is
                                <b>'.$data.'</b>.'); }
                                if($total1[0]->no > $total[0]->no){
                                  $this->session->set_flashdata('report3', 'Loss for the time period from '.$this->input->post('from').' to '.$this->input->post('to').' is
                                   <b>'.$result.'</b>.');
                                }
                              $this->report();
                           }else{
                             $this->report();
                           }
                         }
                         public function date_valid($date)
                              {
                              $parts = explode("-", $date);
                              if (count($parts) == 3) {
                              if (checkdate($parts[2], $parts[1], $parts[0]))
                              {
                              return TRUE;
                              }
                              }
                              $this->form_validation->set_message('date_valid', 'The Date field must be YYYY-DD-MM');
                              return false;
                              }
                        public function out_of_stock(){
                          $id = $this->uri->segment(4);
                          $this->load->model('admin/mdl_admin');
                          $data = array(
                            'in_stk' => 'IN STOCK',
                            'out_stk' => ' ',
                            'qty' => '1',
                          );
                          $this->mdl_admin->out_of_stock($id, $data);
                          $this->session->set_flashdata('out', 'Congratulation, Your Product Is In Stock Now.');
                            return  redirect ($_SERVER["HTTP_REFERER"]);
                        }
                        public function in_stock(){
                          $id = $this->uri->segment(4);
                          $this->load->model('admin/mdl_admin');
                          $data = array(
                            'out_stk' => 'OUT OF STOCK',
                            'in_stk' => ' ',
                            'qty' => '0',
                          );
                          $this->mdl_admin->in_stock($id, $data);
                          $this->session->set_flashdata('in', 'Selected Product Is Out Of Stock Now.');
                          redirect ('admin/home/product');
                        }
                        public function out_of_stock_item_list(){
                          $this->load->model('admin/mdl_admin');
                          $data['out_of_stock'] = $this->mdl_admin->out_of_stock_item_list(); //prd($data);
                          $this->navbar();
                          $this->load->view('admin/product', $data);
                          $this->load->view('admin/footer');
                        }
                        public function opening_hours(){
                          $this->load->model('admin/mdl_admin');
                          $data['opening_hours'] = $this->mdl_admin->get_opening_hours();
                          $this->navbar();
                          $this->load->view('admin/opening_hours', $data); //prd($data);
                          $this->load->view('admin/footer');
                        }
                        public function change_time(){
                          $id = $this->uri->segment(4);
                          $this->load->model('admin/mdl_admin');
                          $data['opening_hours'] = $this->mdl_admin->get_opening_hours();
                          $data['change_time'] = $this->mdl_admin->fetch_time($id);
                          $this->navbar();
                          $this->load->view('admin/opening_hours', $data); //prd($data);
                          $this->load->view('admin/footer');
                        }
                        public function time_changed(){
                             $id = $this->input->post('hidden_id');
                            $this->load->model('admin/mdl_admin');
                            $data = array(
                              'timing' => $this->input->post('time'),
                            );
                            $this->mdl_admin->update_time($id, $data);
                            $this->session->set_flashdata('time', 'Time has been updated successfully');
                            redirect ('admin/home/opening_hours');
                        }
                        public function footer_context(){
                          $this->load->model('admin/mdl_admin');
                          $data['footer_context']  = $this->mdl_admin->get_footer_context();
                          $this->navbar();
                          $this->load->view('admin/about', $data); //prd($data);
                          $this->load->view('admin/footer');
                        }
                        public function update_footer_context(){
                          $this->load->library('form_validation');
                          $this->form_validation->set_rules('text', 'Text', 'required');
                          if($this->form_validation->run()){
                            $data = array(
                              'text' => $this->input->post('text'),
                            );
                            $this->load->model('admin/mdl_admin');
                            $this->mdl_admin->update_footer_context($data);
                            $this->session->set_flashdata('context', ' Footer Context has been updated successfully');
                            redirect ('admin/home/footer_context');
                          }else{
                            $this->footer_context();
                          }
                        }
                      }
