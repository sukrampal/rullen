<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

   public function login(){
     if($this->session->userdata('authenticated')){
       redirect (base_url() . 'home/index');
     }else{
     $this->navbar();
     $this->load->view('login');
     $this->footer();
    }
   }
   public function can_login(){
     $this->load->library('form_validation');
       $this->form_validation->set_rules('email', 'Email', 'required');
       $this->form_validation->set_rules('password', 'Password', 'required');

       if($this->form_validation->run()){
         $email = $this->security->xss_clean($this->input->post('email'));
         $password = $this->security->xss_clean(md5($this->input->post('password')));
         $this->load->model('mdl_home');
        $user =  $this->mdl_home->can_login($email, $password);

        if($user){
          $userdata = array(
            'id' => $user->user_id,
            'email' => $user->email,
            'username' => $user->username,
            'authenticated' => TRUE
          );
          $this->session->set_userdata($userdata);
          redirect (base_url() . 'home/my_profile');
        }else{
          $this->session->set_flashdata('error_msg', 'Invalid Email or Password');
          // redirect (base_url() . 'home/login');
          redirect (base_url() . 'home/login');
        }
      }else{
        $this->login();
      }
     }
          public function logout(){
            $this->session->unset_userdata('authenticated');
            redirect (base_url() .'home/login');
          }

          public function signup(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('uname', 'Username', 'trim|required|alpha');
            $this->form_validation->set_rules('mail', 'Email', 'required|valid_email|is_unique[user.email]', array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists, Please Sign In.'
        ));
            $this->form_validation->set_rules('pass', 'Password', 'required|min_length[5]|max_length[12]|alpha_numeric|callback_password_check', array(
            'required'       => 'You have not provided %s.',
            'password_check' => ' %s must contain alphabetic and numeric values.'
            ));
            $this->form_validation->set_rules('c_password', 'Confirm Password', 'required|matches[pass]');
            if($this->form_validation->run()){
              $this->load->model('mdl_home');
              $data = array(
                'username' => $this->input->post('uname'),
                'email' => $this->input->post('mail'),
                'password' =>md5($this->input->post('pass')),
              );
              $this->mdl_home->sign_up($data);
              if($this->input->post('subscribe')){
                $this->load->model('mdl_home');
                $data1 = array(
                'email' =>  $this->input->post('mail'),
                 );
                $this->mdl_home->subscribe($data1);
              }

            $to = $this->input->post('mail');
            // $to = $this->input->post('mail');
            $subject = 'Rullen-Furniture';
            $from = 'sukramror0001@gmail.com';
            $emailContent ='Hi..' .$this->input->post('uname').', you are successfully registered at Rullen-Furniture having'.'<br>'.'<b>Email id:</b> '.$this->input->post('mail').'<br>'.'<b>Password:</b> '.$this->input->post('pass').'<br>'.'Please visit our website rullenantiques.co.nz for latest furniture-items';

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

                 $email = $this->security->xss_clean($this->input->post('mail'));
                 $password = $this->security->xss_clean(md5($this->input->post('pass')));
                 $this->load->model('mdl_home');
                $user =  $this->mdl_home->can_login($email, $password);
                if($user){
                  $userdata = array(
                    'id' => $user->user_id,
                    'email' => $user->email,
                    'username' => $user->username,
                    // 'last_name' => $user->last_name,
                    'authenticated' => TRUE
                  );
                  $this->session->set_userdata($userdata);
                  redirect (base_url() . 'home/my_profile');
                }
  }else{
    $this->login();
  }
          }
    public function password_check($str)
    {
       if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
         return TRUE;
       }
       return FALSE;
    }

    public function index(){
      //prd($this->cart->contents());
        $this->load->model('mdl_home');
        $data['captions'] = $this->mdl_home->get_caption();
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
        $data['banner1'] = $this->mdl_home->gallery_banner1();
        $data['banner2'] = $this->mdl_home->gallery_banner2();
        $data['banner3'] = $this->mdl_home->gallery_banner3();
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
        $data['banner1'] = $this->mdl_home->gallery_banner1();
        $data['banner2'] = $this->mdl_home->gallery_banner2();
        $data['banner3'] = $this->mdl_home->gallery_banner3();
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
          'per_page'         => 13,
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
        $data['banner1'] = $this->mdl_home->gallery_banner1();
        $data['banner2'] = $this->mdl_home->gallery_banner2();
        $data['banner3'] = $this->mdl_home->gallery_banner3();
        $data['var_shop'] = $this->mdl_home->get_gallery($config['per_page'], $this->uri->segment(3));   //for pagination  get_gallery($config['per_page'], $this->uri->segment(3))
        $this->navbar();
        // $this->load->view('header');
        $this->load->view('gallery', $data);
        $this->footer();

          }
        public function about(){
          $this->load->model('mdl_home');
          $data['banner'] = $this->mdl_home->about_banner();
          $data['about_text'] = $this->mdl_home->get_about();
          $this->navbar();
          $this->load->view('about', $data);
          $this->footer();
        }

        public function send(){
          $this->load->library('form_validation');
          $this->form_validation->set_rules('name', '', 'trim|required');
          $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
          $this->form_validation->set_rules('phone', '', 'required|min_length[9]|max_length[12]');
          $this->form_validation->set_rules('message', '', 'required');
          if($this->form_validation->run()){
          $to = 'info@rullenantiques.co.nz';
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
        public function forget_password(){
          $this->navbar();
          $this->load->view('forget_password');
          $this->footer();
        }
        public function retrieve_password(){
          $this->load->library('form_validation');
          $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
          if($this->form_validation->run()){
              $emailto = $this->input->post('email');
              //      $six_digit_random_number = mt_rand(100000, 999999);
              // $this->session->set_userdata('otp', $six_digit_random_number);

              $this->load->model('mdl_home');
              $pass= $this->mdl_home->retrieve_password($emailto); //prd($pass);
              if(!empty($pass)){
                $to = $emailto;
                $subject = 'Rullen-Furniture';
                $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 5);
                $from = 'info@rullenantiques.co.nz';
                /*foreach($pass as $p){*/
                  $emailContent = 'Hi.. '.$pass['username'].', here are your detail to sign in at Rullen-Furniture:' .'<br>';
                  $emailContent  .='Email id: '. $pass['email'].'<br>';  //('Click on link to reset your password '.$this->session->userdata['otp'] )
                  $emailContent  .='Password: '. $token;
                  $emailContent  .='<br>This is auto generated password, please update it.';
                  $emailContent .= '<br>'.'If you have any further query, fill free to contact us at info@rullenantiques.co.nz';
                //}
                // $emailContent .=$this->input->post('name');
                $config['protocol']    = 'smtp';
                $config['smtp_host']    = 'ssl://smtp.gmail.com';
              //  $config['protocol']    = 'mail';
              //  $config['smtp_host']    = 'smtp.office365.com';
              //  $config['smtp_port']    = '587';
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
                   $this->mdl_home->update_forget_password($emailto, $data);
                   $this->session->set_flashdata('msg',"Email has been sent to you with username and password, please check your inbox, Thank you");
                   $this->session->set_flashdata('msg_class','alert-success');
                       return redirect('home/forget_password');
                }
                else
                {
                   show_error($this->email->print_debugger());
                }
              }
              else
              {
                $this->session->set_flashdata('error1'," This email is not registered, Pease register first.");
                return redirect('home/forget_password');
              }
          }
          else
          {
          // redirect ('home/forget_password');
          $this->forget_password();
          }
        }

        public function subscribe(){
          $this->load->library('form_validation');
          $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|is_unique[subscribe.email]');
          if($this->form_validation->run()){
          $this->load->model('mdl_home');
          $data = array(
            'email' => $this->input->post('email'),
            'unsub_btn' => 'Unsubscribe',
          );
          $this->mdl_home->subscribe($data);

          $to = $this->input->post('email');
          // $to = $this->input->post('mail');
          $subject = 'Rullen-Furniture';
          $from = 'sukramror0001@gmail.com';
          $emailContent ='Thank you for subscribing with us'.'<br>'.'we will keep you updated with our new stock and promotions.'.'<br>'.'If you have any query, fill free to contact us through our website or email us at info@rullenantiques.co.nz';

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


         $this->session->set_flashdata('subscribe', 'You have been successfully subscribed to our newsletter.');
         // $this->session->set_flashdata('.sg')
            return  redirect ($_SERVER["HTTP_REFERER"]);
        }
        else{
          $this->session->set_flashdata('error', 'You are already subscribed, Thank You.');
            redirect ($_SERVER["HTTP_REFERER"]);
        }
      }
      public function password_change(){
        if($this->session->userdata('authenticated')){
          $this->navbar();
          $this->load->view('password_change');
          $this->footer();

        }else{
        redirect (base_url() . 'home/login');
      }
    }
      public function change_password(){
         if($this->session->userdata('authenticated')){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('new_pass', 'New Password', 'required|min_length[5]|max_length[12]|alpha_numeric|callback_password_check', array(
        'required'       => 'You have not provided %s.',
        'password_check' => ' %s must contain alphabetic and numeric values.'
        ));
        $this->form_validation->set_rules('c_pass', 'Confirm Password', 'trim|required|matches[new_pass]');
        if($this->form_validation->run()){
        $this->load->model('mdl_home');
        $old_pass = md5($this->input->post('old_pass'));
        $user_id = $this->input->post('user_id');
        $result = $this->mdl_home->check_old_password($user_id, $old_pass); //prd($result->password);
        if($result->password == $old_pass){
         $data = array(
           'password' => md5($this->input->post('new_pass')),
           // $user_id =>$this->input->post('user_id'),
         );
         $this->mdl_home->update_password($data, $user_id);
         $to = $this->session->userdata('email');
         // $to = $this->input->post('mail');
         $subject = 'Rullen-Furniture';
         $from = 'sukramror0001@gmail.com';
         $emailContent ='Hi..' .$this->session->userdata('username').', your password has been changed successfully';
         $emailContent .='<br>'. 'Now your login details are as follow:';
         $emailContent .='<br> Email id: '.$this->session->userdata('email');
         $emailContent .='<br> Password: '.$this->input->post('new_pass');
         $emailContent .='<br> Thank You';

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

         $this->session->set_flashdata('msg1', ', Your password has been changed successfully');
         return redirect ('home/password_change');
        }else{
          $this->session->set_flashdata('msg', 'Old password does not match');
          return redirect ('home/password_change');
        }

        }else{
          $this->password_change();
        }
      }else{
        redirect (base_url(). 'home/login');
      }
    }
      public function my_order(){
        if($this->session->userdata('authenticated')){
          $this->load->model('mdl_home');
          $data['my_order'] = $this->mdl_home->my_order();
        $this->navbar();
        $this->load->view('my_order', $data);
        $this->footer();
      }else{
        redirect (base_url(). 'home/login');
      }
    }
    public function cancel_order(){
      if($this->session->userdata('authenticated')){
      $id = $this->uri->segment(3);
      $this->load->model('mdl_home');
      // $data['delivery_button'] = ' ';
      $data['cancel_button'] = ' ';
      // $data['shipping_btn'] = ' ';
      $data['delivery_status'] = 'Cancelled';
      $this->mdl_home->cancel_order($id, $data);
      // $to = $this->session->userdata('email');
      // // $to = $this->input->post('mail');
      // $subject = 'Rullen-Furniture';
      // $from = 'sukramror0001@gmail.com';
      // $emailContent ='Hi..' .$this->session->userdata('username').', Your order has been cancelled successfully';
      // $emailContent .='<br>'.'If you have any further query, feel free to contact us at info@rullenantiques.co.nz or call us at +64 21770211,'.'<br>'.' Thank you.';
      //
      // $config['protocol']    = 'smtp';
      // $config['smtp_host']    = 'ssl://smtp.gmail.com';
      // $config['smtp_port']    = '465';
      // $config['smtp_timeout'] = '60';
      // $config['smtp_user']    = 'sukramror0001@gmail.com';
      // $config['smtp_pass']    = 'Sukram@123';
      // $config['charset']    = 'utf-8';
      // $config['newline']    = "\r\n";
      // $config['mailtype'] = 'html';
      // $config['validation'] = TRUE;
      //
      // $this->email->initialize($config);
      // $this->email->set_mailtype("html");
      // $this->email->from($from);
      // $this->email->to($to);
      // $this->email->subject($subject);
      // $this->email->message($emailContent);
      //
      // // return redirect('email_send');
      // if($this->email->send())
      //      {
      //      }
      //      else
      //      {
      //          show_error($this->email->print_debugger());
      //      }

      redirect ('home/my_order');
    }else{
      redirect (base_url(). 'home/login');
    }
    }
    public function my_profile(){
      if($this->session->userdata('authenticated')){
      $this->load->model('mdl_home');
      $user_id = $this->session->userdata('id');
      $user_email = $this->session->userdata('email');
      $data['userdetail'] = $this->mdl_home->get_profile($user_id);
      $data['unsub_btn'] = $this->mdl_home->get_unsub_btn($user_email);    //prd($data);
      $this->navbar();
      $this->load->view('profile', $data);
      $this->footer();
    }else{
      redirect (base_url(). 'home/login');
    }
    }
    public function update_profile(){
      if($this->session->userdata('authenticated')){
      $user_id = $this->session->userdata('id');
      $this->load->model('mdl_home');
      $data['update'] = $this->mdl_home->fetch_single_data($user_id);
      $this-> navbar();
      $this->load->view('profile', $data);
      $this->footer();
    }else{
      redirect (base_url(). 'home/login');
    }
    }
    public function update_details(){
      if($this->session->userdata('authenticated')){
      $this->load->model('mdl_home');
      $this->load->library('form_validation');
      $user_id = $this->session->userdata('id');
      $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha');
      // $this->form_validation->set_rules('email', 'Email', 'trim|required');
      $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');
      $this->form_validation->set_rules('address', 'Address', 'required');
      $this->form_validation->set_rules('suburb', 'Subrub', 'trim|required|alpha');
      $this->form_validation->set_rules('postcode', 'Postcode', 'trim|required|numeric');
      $this->form_validation->set_rules('city', 'City', 'trim|required|alpha');
      $this->form_validation->set_rules('country', 'Country', 'required');
      if($this->form_validation->run()){
        $data = array(
          'username' => $this->input->post('username'),
          // 'email' => $this->input->post('email'),
          'phone' => $this->input->post('phone'),
          'address' => $this->input->post('address'),
          'suburb' => $this->input->post('suburb'),
          'postcode' => $this->input->post('postcode'),
          'city' => $this->input->post('city'),
          'country' => $this->input->post('country'),
        );                                        //prd($data);
        $this->mdl_home->update_profile($data, $user_id);
        $this->session->set_flashdata('success_msg', 'Your details has been updated successfully');
           redirect ('home/my_profile');
      }else{
        $this->update_profile();
      }
      }else{
        redirect (base_url(). 'home/login');
      }
     }
     public function add_to_wishlist(){
       if($this->session->userdata('authenticated')){
       $this->load->model('mdl_home');
       $id  = $this->uri->segment(3);  //prd($id);
       $data = array(
         'p_id' => $id,
         'uzr_id' => $this->session->userdata('id'),
       );   //prd($data);
       $this->mdl_home->add_to_wishlist($data);
        redirect ('home/my_wishlist');
      }else{
        redirect (base_url(). 'home/login');
      }
     }
    public function my_wishlist(){
      $uzr_id = $this->session->userdata('id');
      $this->load->model('mdl_home');
      $data['wishlist'] = $this->mdl_home->get_wishlist($uzr_id);
      $this->navbar();
      $this->load->view('wishlist', $data);// prd($data);
      $this->footer();
    }
    public function remove_wishitem(){
      $p_id = $this->uri->segment(3);// prd($p_id);
      $this->load->model('mdl_home');
      $this->mdl_home->remove_wishitem($p_id);
      $this->session->set_flashdata('wishlist', 'Your item has been successfully removed from your wishlist.');
      $this->my_wishlist();
    }
    public function unsubscribe(){
      $id = $this->uri->segment(3); //prd($id);
      $this->load->model('mdl_home');
      $this->mdl_home->unsubscribe($id);
      $this->session->set_flashdata('unsubscribe', 'You Are Unsubscribed From Our Newletters, Thank you.');
      $this->my_profile();
    }

}
