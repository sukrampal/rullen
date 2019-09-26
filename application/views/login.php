
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
										<input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control">
                    <span class="text-danger"><p style="color: red" <?php echo form_error('email'); ?> </span>
                  </div>
									<div class="form-group login-page">
										<label>Password </label>
										<input type="Password" name="password" id="typepas" class="form-control" >
                    <span class="text-danger"><p style="color: red" <?php echo form_error('password'); ?> </span>
											<input type="checkbox" onclick="Toggle1()">
											 <small style="color:#666666">Show Password</small>
                  </div>
									<button type="submit" class="btn btn-default login-btn">Sign In</button>
                  <?php
                       echo '<label class="text-danger">'.$this->session->flashdata("error_msg").'</label>';
                  ?>
								</form>
							</div>
							<a href="<?php echo base_url(); ?>home/forget_password" class="back">Forgot Your Password?</a>
						</div>
						<div class="col-md-6">
							<div class="login-title">
								<h3>New Customers</h3>
								<span>Creating an account has many benefits: check out faster, keep more than one address, track orders and more.</span>
							</div>
								<form method="post" action="<?php echo base_url(); ?>home/signup">
									<div class="form-group login-page">
										<label for="exampleInputEmail1">Username</label>
										<input type="text" name="uname" value="<?php echo set_value('uname'); ?>" class="form-control">
										<span class="text-danger"><p style="color: red" <?php echo form_error('uname'); ?> </span>
									</div>
									<div class="form-group login-page">
										<label for="exampleInputEmail1">Email </label>
										<input type="text" name="mail" value="<?php echo set_value('mail'); ?>" class="form-control">
										<span class="text-danger"><p style="color: red" <?php echo form_error('mail'); ?> </span>
									</div>
									<div class="form-group login-page">
										<label>Password </label>
										<input type="Password" name="pass" id="typepass" value="<?php echo set_value('pass'); ?>" class="form-control" >
											<input type="checkbox" onclick="Toggle()">
                       <small style="color:#666666">Show Password</small>
											 <span class="text-success"><p style="color: red" <?php echo form_error('pass'); ?> </span>
									</div>
									<div class="form-group login-page">
										<label for="exampleInputPassword1">Confirm Password </label>
										<input type="Password" name="c_password" value="<?php echo set_value('c_password'); ?>" class="form-control" >
										<span class="text-danger"><p style="color: red" <?php echo form_error('c_password'); ?> </span>
									</div>
									<div class="col-8">
					          <div class="form-group login-page">
					            <input type="checkbox" name="subscribe"  placeholder="" autocomplete="off" >
					            <label>Subscribe to our newsletter</label>
					          </div>
					        </div>
									<button type="submit" class="btn btn-default login-btn">Create an Account</button>
								</form>
						</div>
					</div>
				</div>
			</div>
		<!-- contuct-form-area-end -->


		<script>
	     // Change the type of input to password or text
	         function Toggle() {
	             var temp = document.getElementById("typepass");
	             if (temp.type === "password") {
	                 temp.type = "text";
	             }
	             else {
	                 temp.type = "password";
	             }
	         }
					 function Toggle1() {
							var temp = document.getElementById("typepas");
							if (temp.type === "password") {
									temp.type = "text";
							}
							else {
									temp.type = "password";
							}
					}
	 </script>
