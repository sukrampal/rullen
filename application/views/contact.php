<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Contuct Us</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">


    </head>
    <body>


		<!-- page-title-wrapper-end -->
		<!-- google-map-area-start -->
		<div class="google-map-area ptb-80">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="google-map" id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2891.9272729042627!2d172.63192191515878!3d-43.545557890847086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d318b9a48a31057%3A0x6ec61ac1d5540db8!2sRullen%20Antiques%20%26%20Furniture!5e0!3m2!1sen!2snz!4v1567240225427!5m2!1sen!2snz"  frameborder="200" style="border:20%;" allowfullscreen=""></iframe>
              <style>
                  .google-map {
                      position: relative;
                      padding-bottom: 20%; // This is the aspect ratio
                      height: 0;
                      overflow: hidden;
                  }
                  .google-map iframe {
                      position: absolute;
                      top: 0;
                      left: 0;
                      width: 100% !important;
                      height: 100% !important;
                  }
              </style>
						</div>
					</div>
				</div>
			</div>
		</div>
    <br></br><br></br><br></br>
		<!-- google-map-area-end -->

		<!-- contuct-form-area-start -->
			<div class="contuct-form-area pb-80">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="contuct-form">
                <?php if($error = $this->session->flashdata('msg')){ ?>
                  <p style="color: green;"><strong>Success!</strong> <?php echo  $error; ?><p>
             <?php } ?>
								<form method="post" action="<?php echo base_url(); ?>home/send">
									<div class="form-group contuct_f">
										<label for="exampleInputEmail1">Name <span>*</span></label>
										<input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control"  placeholder="Name" autocomplete="off"></input>
                    <span class="text-danger"><p style="color: red" <?php echo form_error('name'); ?> </span>
                  </div>
									<div class="form-group contuct_f">
										<label for="exampleInputPassword1">Email <span>*</span></label>
										<input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control"  placeholder="Email" autocomplete="off"></input>
                    <span class="text-danger"> <p style="color:red"<?php echo form_error('email'); ?> </span>
                  </div>
									<div class="form-group contuct_f">
										<label for="exampleInputPassword1">Phone Number</label>
										<input type="text" name="phone" value="<?php echo set_value('phone'); ?>" class="form-control"  placeholder="Phone Number" autocomplete="off"></input>
                    <span class="text-danger"><p style="color:red" <?php echo form_error('phone'); ?></span>
                  </div>
									<div class="form-group contuct_f">
										<label for="exampleInputPassword1">What is on your mind? <span>*</span></label>
										<textarea name="message" value="<?php echo set_value('message'); ?>" class="form-control" rows="3"></textarea>
                    <span class="text-danger"><p style="color:red;" <?php echo form_error('message'); ?></span>
									</div>
									<button type="submit" class="btn btn-default contact-btn">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- contuct-form-area-end -->
		<!-- contact-area-start -->
		<div class="contact-area ptb-40">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mar_b-30">
						<div class="contuct-info text-center">
							<h4>Sign up for news & offers!</h4>
							<p>You may safely unsubscribe at any time</p>
						</div>
					</div>
					<div class="col-lg-6 col-md-8 col-sm-12 col-lg-offset-1 col-xs-12">
						<div class="search-box">
							<form action="#">
								<input type="email" placeholder="Enter your email address"/>
								<button><span class="lnr lnr-envelope"></span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- contact-area-end -->




		<script>
          // Get the HTML DOM element that will contain your map
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(40.6700, -73.9400),
                    map: map,
                    title: 'Snazzy!'
                });
            }
		</script>
		<!-- plugins js -->
        <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
		<!-- main js -->
        <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    </body>
</html>
