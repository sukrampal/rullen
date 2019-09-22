
		<!-- contuct-form-area-start -->
			<div class="login-area ptb-80">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="login-title">
								<h3>Registered Customers</h3>
								<span>If you have an account, sign in with your email address.</span>
							</div>
							<div class="login-form">
								<form method='post' action="<?php echo base_url(); ?>home/can_login">
									<div class="form-group login-page">
										<label for="exampleInputEmail1">Email </label>
										<input type="text" name="email" class="form-control">
                    <span class="text-danger"><p style="color: red" <?php echo form_error('email'); ?> </span>
                  </div>
									<div class="form-group login-page">
										<label for="exampleInputPassword1">Password </label>
										<input type="Password" name="password" class="form-control" >
                    <span class="text-danger"><p style="color: red" <?php echo form_error('password'); ?> </span>
                  </div>
									<button type="submit" class="btn btn-default login-btn">Sign In</button>
                  <?php
                       echo '<label class="text-danger">'.$this->session->flashdata("error_msg").'</label>';
                  ?>
								</form>
							</div>
							<a href="#" class="back">Forgot Your Password?</a>
						</div>
						<div class="col-md-6">
							<div class="login-title">
								<h3>New Customers</h3>
								<span>Creating an account has many benefits: check out faster, keep more than one address, track orders and more.</span>
							</div>
								<form action="#">
									<div class="form-group login-page">
										<label for="exampleInputEmail1">Username</label>
										<input type="text" name="username" class="form-control">
										<span class="text-danger"><p style="color: red" <?php echo form_error('username'); ?> </span>
									</div>
									<div class="form-group login-page">
										<label for="exampleInputEmail1">Email </label>
										<input type="text" name="email" class="form-control">
										<span class="text-danger"><p style="color: red" <?php echo form_error('email'); ?> </span>
									</div>
									<div class="form-group login-page">
										<label for="exampleInputPassword1">Password </label>
										<input type="Password" name="password" class="form-control" >
										<span class="text-danger"><p style="color: red" <?php echo form_error('password'); ?> </span>
									</div>
									<div class="form-group login-page">
										<label for="exampleInputPassword1">Confirm Password </label>
										<input type="Password" name="c_password" class="form-control" >
										<span class="text-danger"><p style="color: red" <?php echo form_error('c_password'); ?> </span>
									</div>
									<div class="col-8">
					          <div class="form-group">
					            <input type="checkbox" name="new_product"  placeholder="" autocomplete="off" >
					            <label><b>Subscribe to our newsletter</b> </label>
					          </div>
					        </div>
									<button type="submit" class="btn btn-default login-btn">Create an Account</button>
								</form>
						</div>
					</div>
				</div>
			</div>
		<!-- contuct-form-area-end -->
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
							<form action="#">
								<input type="email" placeholder="Enter your email address" />
								<button><span class="lnr lnr-envelope"></span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- contact-area-end -->
