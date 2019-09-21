<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
      public function index()
      {
      $this->load->view("Admin/login");
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
              $password = $this->input->post('password');
              //model function
              $this->load->model('Admin/Admin_model');
              if($this->Admin_model->can_login($username, $password))
                  {
                    $session_data = array(
                    'username'     =>     $username
                    );
                    $this->session->set_userdata($session_data);
                    redirect(base_url() . 'Admin/home/dashboard');
                  }
                  else
                  {
                     $this->session->set_flashdata('error', 'Invalid Username and Password');
                     redirect(base_url() . 'Admin/home/index');
                  }
               }else {
                  //false
                  $this->index();
              }
             }
        function dashboard(){
          $this->load->model('admin/mdl_admin');
          $data['orders'] = $this->mdl_admin->get_order();
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
                 redirect(base_url() . 'Admin/home/index');
            }
            public function navbar(){
              if($this->session->userdata('username') != '')
                 {
                   $this->load->view('admin/header');

                 }else{
                 redirect(base_url() . 'Admin/home/index');
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
             redirect(base_url() . 'Admin/home/index');
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
                redirect(base_url() . 'Admin/home/index');
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
          // $this->load->library('form_validation');
                         $data['product_title'] = $this->input->post('product_title');
                         $data['product_cat'] = $this->input->post('product_cat');
                         $data['product_desc'] = $this->input->post('product_desc');
                         $data['product_price'] = $this->input->post('product_price');
                         $data['old_price'] = $this->input->post('old_price');
                         $data['shipping'] = $this->input->post('shipping');
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
                            public function delete_order(){
                              $id = $this->uri->segment(4);
                              $this->load->model('admin/mdl_admin');
                              $this->mdl_admin->delete_order($id);
                              redirect ('admin/home/order_deleted');
                            }
                            public function order_deleted(){
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

                          }
