<!-- contact-area-start -->
<div class="contact-area ptb-40">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 mar_b-30">
        <div class="contuct-info text-center">
          <h4>Sign up for news & offers!</h4>
          <p>You may safely unsubscribe at any time</p>
        </div>
      </div>
      <div class="col-xl-6 col-lg-7 offset-lg-1">
        <div class="search-box">
          <form action="<?php echo base_url(); ?>home/subscribe" method="post">
            <input type="email" name ="email" placeholder="Enter your email address" required/>
            <span class="text-danger"><?php echo form_error('email'); ?></span>
            <button><span class="lnr lnr-envelope"></span></button>
          </form>
          <?php if($error = $this->session->flashdata('subscribe')) { ?>
            <p class="text-success" style="padding:10px;"><strong>Congratulations, </strong><?php echo $error; ?></p>
          <?php } ?>
          <?php if($error = $this->session->flashdata('error')) { ?>
            <p class="text-success" style="padding:10px;"><?php echo $error; ?></p>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- contact-area-end -->

<!-- footer-area-start -->
<div class="footer-area ptb-80">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 mar_b-30">
        <div class="footer-wrapper">
          <div class="footer-logo">
            <a href="#"><img  src="<?php echo base_url(); ?>assets/img/banner/<?php echo $footer_logo['image']; ?>" alt="" /></a>
          </div>
          <p>We are 100% New Zealand owned business, specilize in Antiques, vintage, mid-century furniture, Lighting and Rugs.</p>
          <ul>
            <li>
              <span>Address : </span> 32 Durham Street South, Sydenham, Christchurch.
            </li>
            <li>
              <span>Phone: </span> +64 21770211
            </li>
            <li>
              <span>Email:</span> <a href="mailto:info@rullenantiques.co.nz">info@rullenantiques.co.nz</a>
            </li>
          </ul>
          <ul class="footer-social">
            <li><a href="https://www.facebook.com/Rullen-Antiques-Furniture-529871434030204/"><i class="fa fa-facebook"></i></a></li>
            <li><a href="<?php echo base_url(); ?>home/index"><i class="fa fa-twitter"></i></a></li>
            <li><a href="<?php echo base_url(); ?>home/index"><i class="fa fa-youtube"></i></a></li>
            <li><a href="<?php echo base_url(); ?>home/index"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="<?php echo base_url(); ?>home/index"><i class="fa fa-flickr"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-2 col-md-3 hidden-sm col-xs-12 mar_b-30">
        <div class="footer-wrapper">
          <div class="footer-title">
            <a href="#"><h3>useful links</h3></a>
          </div>
          <div class="footer-wrapper">
            <ul class="usefull-link">
              <li><a href="<?php echo base_url(); ?>home/contact">Contact us</a></li>
              <li><a href="home/contact">Site map</a></li>
              <li><a href="home/about">About us</a></li>
              <li><a href="#">Specials</a></li>
              <li><a href="<?php echo base_url(); ?>cart/index">My Cart</a></li>
              <li><a href="<?php echo base_url(); ?>home/contact">Custom service</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-3 hidden-md hidden-sm col-xs-12 mar_b-30">
        <div class="footer-wrapper">
          <div class="footer-title">
            <a href="#"><h3>Opening Hours</h3></a>
          </div>
          <div class="footer-wrapper">
            <div class="footer-wrapper-strong">
              <div class="wrapper-strong-span">
              <strong><a href="#">Monday: 10am-6pm</a></strong></br>
              <strong><a href="#">Tuesday: 10am-6pm</a></strong></br>
              <strong><a href="#">Wednesday: 10am-6pm</a></strong></br>
              <strong><a href="#">Thursday: 10am-6pm</a></strong></br>
              <strong><a href="#">Friday: 10am-6pm</a></strong></br>
              <strong><a href="#">Saturday: 10am-6pm</a></strong></br>
              <strong><a href="#">Sunday: 10am-6pm</a></strong></br>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="footer-wrapper">
          <div class="footer-title">
            <a href="#"><h3>some images</h3></a>
          </div>
          <div class="footer-wrapper-img">
            <a href="#"><img src="<?php echo base_url(); ?>assets/img/footer/11.jpg" alt="" /></a>
            <a href="#"><img src="<?php echo base_url(); ?>assets/img/footer/12.jpg" alt="" /></a>
            <a href="#"><img src="<?php echo base_url(); ?>assets/img/footer/13.jpg" alt="" /></a>
            <a href="#"><img src="<?php echo base_url(); ?>assets/img/footer/14.jpg" alt="" /></a>
            <a href="#"><img src="<?php echo base_url(); ?>assets/img/footer/15.jpg" alt="" /></a>
            <a href="#"><img src="<?php echo base_url(); ?>assets/img/footer/16.jpg" alt="" /></a>
          </div>
          <a href="https://www.facebook.com/Rullen-Antiques-Furniture-529871434030204/">Follow us on facebook <i class="fa fa-angle-double-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- footer-area-end -->
<!-- .copyright-area-start -->
<div class="copyright-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mar_b-30">
        <div class="copyright text-left">
          <p>2019 @ All Rights Reserved - <a href="#">Rullen Furniture</a></p>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="copyright-img text-right">
          <a href="#"><img src="<?php echo base_url(); ?>assets/img/payment.png" alt="" /></a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- .copyright-area-end -->
<style>
.loader{ position: fixed;left: 0px;top: 0px;width:100%;height:100%;z-index: 9999;background: url('<?php echo base_url(); ?>assets/img/banner/pageloader.gif') 50% 50% no-repeat rgb(249,249,249);}

</style>

<!-- all js here -->
<!-- jquery latest version -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.12.0.min.js"></script>
<!-- bootstrap js -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.countdown.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.sticky.js"></script>


<!-- owl.carousel js -->
    <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<!-- meanmenu js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.meanmenu.js"></script>
<!-- jquery-ui js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
<!-- nivo.slider js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.nivo.slider.js"></script>
<!-- wow js -->
    <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
<!-- scrolly js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.scrolly.js"></script>
<!-- magnific-popup js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
<!-- plugins js -->
    <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<!-- main js -->
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script language="javascript">

             $('document').ready(function(e) {

                  $(".loader").fadeOut("slow");
                 });

         </script>
</body>
</html>
