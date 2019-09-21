<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index(){
      //prd($this->cart->contents());
        $this->load->model('mdl_home');
        $data['banner'] = $this->mdl_home->get_banner();// prd($data);
        $data['banner2']= $this->mdl_home->get_banner2(); //prd($data);
        $data['sukram'] = $this->mdl_home->get_new_products();
      //  $this->load->view('header');
        $this->navbar();
        $this->load->view('home',$data);
        $this->footer();
      }

      public function navbar(){
        $this->load->model('mdl_home');
        $data['logo'] = $this->mdl_home->get_header_logo();
        $data['navbar'] = $this->mdl_home->get_category();
        $this->load->view('header',$data);
      }
      public function footer(){
        $data['footer_logo'] = $this->mdl_home->get_footer_logo();
        $this->load->view('footer', $data);
      }

     public function contact(){
        $this->navbar();
        $this->load->view('contact');
        $this->footer();
    }

    public function shop(){
        // $id = $this->uri->segment(3);
        $this->load->model('mdl_home');
        // $this->load->library('pagination');
        // $config = [
        //   'base_url'         => base_url('home/gallery'),
        //   'per_page'         => 15,
        //   'total_rows'       => $this->mdl_home->num_rows(),
        //   'full_tag_open'    =>"<ul class='pagination'>",
        //   'full_tag_close'   =>"</ul>",
        //   'first_tag_open'   =>'<li>',
        //   'first_tag_close'  =>'</li>',
        //   'last_tag_open'    =>'<li>',
        //   'last_tag_close'   =>'</li>',
        //   'next_tag_open'    =>'<li>',
        //   'next_tag_close'   =>'</li>',
        //   'prev_tag_open'    =>'<li>',
        //   'prev_tag_close'   =>'</li>',
        //   'num_tag_open'     =>'<li>',
        //   'num_tag_close'    =>'</li>',
        //   'cur_tag_open'     =>"<li class='active'><a>",
        //   'cur_tag_close'    =>'</a></li>',
        // ];
        // $this->pagination->initialize($config);
        $data['banner'] = $this->mdl_home->gallery_banner();
        $data['var_shop'] = $this->mdl_home->shop();   //for pagination write  [shop($config['per_page'], $this->uri->segment(5))]
        $data['category'] = $this->mdl_home->get_category();
        $this->navbar();
        // $this->load->view('header');
        $this->load->view('shop', $data);
        $this->footer();

  }


      public function product_details(){
        $this->load->model('mdl_home');
        // $data['var_product'] = $this->mdl_home->get_new_product_details();
        $data['var_product'] = $this->mdl_home->get_product_details();
        $data['var_shop'] = $this->mdl_home->get_related_product();
        $this->navbar();
        $this->load->view('product-details', $data);
        $this->footer();
      }

      public function search(){

        $this->load->model('mdl_home');
        $search_term = $this->input->post('search');
        $data['banner'] = $this->mdl_home->gallery_banner();
        $data['var_shop'] = $this->mdl_home->get_search($search_term);
        $this->navbar();
        // $this->load->view('header');
        $this->load->view('shop', $data);
        $this->footer();
      }

      public function gallery(){
        $this->load->model('mdl_home');
        $this->load->library('pagination');
        $config = [
          'base_url'         => base_url('home/gallery'),
          'per_page'         => 15,
          'total_rows'       => $this->mdl_home->num_rows(),
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
        $this->pagination->create_links();
        $data['banner'] = $this->mdl_home->gallery_banner();
        $data['var_shop'] = $this->mdl_home->get_gallery($config['per_page'], $this->uri->segment(3));   //for pagination  get_gallery($config['per_page'], $this->uri->segment(3))
        $this->navbar();
        // $this->load->view('header');
        $this->load->view('gallery', $data);
        $this->footer();

          }
        public function about(){
          $this->load->model('mdl_home');
          $data['banner'] = $this->mdl_home->about_banner();
          $this->navbar();
          $this->load->view('about', $data);
          $this->footer();
        }

        public function send(){
          $this->load->library('form_validation');
          $this->form_validation->set_rules('name', '', 'required|alpha');
          $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
          $this->form_validation->set_rules('phone', '', 'required|min_length[9]|max_length[12]|regex_match[/^[0-9]{10}$/]');
          $this->form_validation->set_rules('message', '', 'required');
          if($this->form_validation->run()){
          $to = 'sukramror0001@gmail.com';
          $subject = 'Rullen-Furniture';
          $from = 'sukramror0001@gmail.com';
          $emailContent  ='Name: '.$this->input->post('name').'<br>';
          $emailContent .='Contact No. '.$this->input->post('phone').'<br>';
          $emailContent .='Email: '.$this->input->post('email').'<br>';
          $emailContent .='Query: '.$this->input->post('message');
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
                   $this->session->set_flashdata('msg',"Your query has been sent successfully");
                   $this->session->set_flashdata('msg_class','alert-success');
                       return redirect('home/contact');

               }
               else
               {
                   show_error($this->email->print_debugger());
               }
        }else{
          $this->contact();
        }
}
}
