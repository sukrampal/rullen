<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Rullen-Furniture</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.png" />
        <!-- Place favicon.ico in the root directory -->
		<!-- google-font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<!-- animate css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/meanmenu.min.css">
		<!-- nivo-slider css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nivo-slider.css">
		<!-- magnific-popup css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/magnific-popup.css">
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
		<!--linearicons css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/linearicons-icon-font.min.css">
		<!-- font-awesome css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
		<!-- style css -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
		<!-- responsive css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css" />
		<!-- modernizr css -->
        <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>

		<header>

			<div class="header-bottom-area ptb-50">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-2 col-sm-3 col-xs-12">
							<div class="logo">
								<a href="<?php echo base_url(); ?>home/index"><img style="height:55px; width:120px" src="<?php echo base_url(); ?>assets/img/banner/<?php echo $logo['image']; ?>" alt="" /></a>
							</div>
						</div>
						<div class="col-lg-7 col-md-7 hidden-sm hidden-xs">
							<div class="single-header-bottom-info">
								<div class="header-bottom-icon">
									<span class="lnr lnr-rocket"></span>
								</div>
								<div class="header-bottom-text">
									<h3>Christchurch</h3>
                <p>32 Durham Street</p>
                <p>Sydenham, NZ</p>
								</div>
							</div>
							<div class="single-header-bottom-info">
								<div class="header-bottom-icon">
									<span class="lnr lnr-phone"></span>
								</div>
								<div class="header-bottom-text">
									<h3>SUPPORT 24/7</h3>
									<p>+64 21770211</p>
                <a href="mailto:Sukramror0001@gmail.com">info@rullenantiques.co.nz</a>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-9 col-xs-12">
							<div class="header-bottom-right">
								<div class="shop-cart">
									<a <?php if($this->uri->segment(1) == "cart" && $this->uri->segment(2) == "index"){ ?> style="color:#c2a773" <?php } ?> href="<?php echo base_url(); ?>cart/index"><span class="lnr lnr-cart"></span>My Cart - items (<?php echo $this->cart->total_items(); ?>)</a>
								</div>

								<div class="shop-cart-hover fix">

									<ul>

										<li>
                      <?php $i = 1; ?>

                      <?php foreach ($this->cart->contents() as $items): ?>

											<div class="cart-img">
												<img src="<?php echo base_url(); ?>assets/img/<?php echo $items['image']; ?>" alt="" />
											</div>
											<div class="cart-content">
												<h4><a href=""><?php echo $items['name']; ?></a></h4>
												<span>Quantity: <?php echo $items['qty']; ?></span>
												<span class="cart-price">$<?php echo $items['price']; ?></span>
											</div>

                      <?php $i++; ?>

                      <?php endforeach; ?>
										</li>

										<li class="total-price"><span>$<?php echo $this->cart->format_number($this->cart->total()); ?></span></li>
										<li class="checkout-bg">
											<a href="<?php echo base_url(); ?>cart/checkout">checkout <i class="fa fa-angle-right"></i></a>
										</li>

									</ul>

								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- header-end -->
		<!-- mainmenu-area-start -->
		<div class="mainmenu-area bg-color-1" id="main_h">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-9 hidden-xs">
        <?php $uri = $this->uri->segment(2); ?>
						<div class="mainmenu hidden-xs">
							<nav>
								<ul>
									<li  class="<?php if($uri == "index" && $this->uri->segment(1) == "home"){ ?> active <?php } ?>"><a href="<?php echo base_url(); ?>home/index">Home</a>

									</li>
									<li class="<?php if($uri == "gallery" || $uri == "shop") { ?>active <?php } ?>"><a href="<?php echo base_url();?>home/gallery">Products</a>
									</li>
									<li class="<?php if($uri == "about") { ?>active <?php } ?>"><a href="<?php echo base_url(); ?>home/about">About Us</a>

									</li>

									<li class="<?php if($uri == "contact") { ?>active <?php } ?>"><a href="<?php echo base_url(); ?>home/contact">contact us</a></li>

                  <?php if($this->session->userdata('authenticated')){ ?>
                  <li class="click_menu"><a href="#"><?php $user = $this->session->userdata('username'); echo $user; ?> <i class="fa fa-angle-down"></i></a>
										<ul class="click_menu_show">
											<!--<li><a href="customer-login.html">Compare Products</a></li> -->
											<!-- <li><a href="customer-login.html">Profile setting</a></li> -->
                      <li><a href="#"><?php echo anchor('#', 'Profile'); ?></a></li>
                      <li><a href="#"><?php echo anchor('home/password_change', 'Change Password'); ?></a></li>
                      <li><a href="#"><?php echo anchor('home/my_order', 'Orders History'); ?></a></li>
                      <li><a href="#"><?php echo anchor('home/logout', 'logout'); ?></a></li>

										</ul>
									</li>
                <?php }else{ ?>
                  <li class="click_menu"><a href="<?php echo base_url(); ?>home/login">My Account <i class="fa fa-angle-down"></i></a>
										<ul class="click_menu_show">
											<!--<li><a href="customer-login.html">Compare Products</a></li> -->
											<!-- <li><a href="customer-login.html">Profile setting</a></li> -->
                      <li><a href="<?php echo base_url(); ?>home/login">signup</a></li>
                      <li><a href="<?php echo base_url(); ?>home/login">sign in</a></li>

										</ul>
									</li>
                <?php } ?>
								</ul>
							</nav>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="menu-search-box">
							<form action="<?php echo base_url(); ?>home/search" method ="post">
								<input type="text" name="search" id="searchvalue" placeholder="Search here..." required/>
								<button><span class="lnr lnr-magnifier" id="searchvalue" name="submit"></span></button>
              </form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mobile-menu-area hidden-sm hidden-md hidden-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mobile-menu">
							<nav id="mobile-menu">
								<ul>
									<li class="active"><a href="<?php echo base_url(); ?>home/index">Home</a>

									</li>
									<li><a href="<?php echo base_url(); ?>home/gallery">Products</a>
										<ul>
											<!-- <li><a href="#">Beds</a> -->
                        <?php foreach($navbar as $nav){ ?>
											<a href="<?php echo base_url(); ?>home/shop/<?php echo $nav['cat_title']; ?>/<?php echo $nav['cat_id']; ?>"><?php echo $nav['cat_title']; ?></a>
                    <?php } ?>
                    	</li>

										</ul>
									</li>

									<li><a href="<?php echo base_url(); ?>home/contact">contact Us</a></li>
                  <li><a href="<?php echo base_url(); ?>home/about">About Us</a>
                    <?php if($this->session->userdata('authenticated')){ ?>
                    <li class="click_menu"><a href="#"><?php $user = $this->session->userdata('username'); echo $user; ?> <i class="fa fa-angle-down"></i></a>
  										<ul class="click_menu_show">
  											<!--<li><a href="customer-login.html">Compare Products</a></li> -->
  											<!-- <li><a href="customer-login.html">Profile setting</a></li> -->
                        <li><a href="<?php echo base_url(); ?>home/login"><?php echo anchor('#', 'profile'); ?></a></li>
                        <li><a href="<?php echo base_url(); ?>home/login"><?php echo anchor('home/password_change', 'Change Password'); ?></a></li>
                        <li><a href="<?php echo base_url(); ?>home/login"><?php echo anchor('home/my_order/'.$user = $this->session->userdata('id'), 'Orders History'); ?></a></li>
                        <li><a href="<?php echo base_url(); ?>home/login"><?php echo anchor('home/logout', 'logout'); ?></a></li>

  										</ul>
  									</li>
                  <?php }else{ ?>
                    <li class="click_menu"><a href="#">My Account <i class="fa fa-angle-down"></i></a>
  										<ul class="click_menu_show">
  											<!--<li><a href="customer-login.html">Compare Products</a></li> -->
  											<!-- <li><a href="customer-login.html">Profile setting</a></li> -->
                        <li><a href="<?php echo base_url(); ?>home/login">signup</a></li>
                        <li><a href="<?php echo base_url(); ?>home/login">sign in</a></li>

  										</ul>
  									</li>
                  <?php } ?>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- mainmenu-area-end -->
