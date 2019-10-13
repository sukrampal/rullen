<br></br>
		<!-- checkout-area start -->
		<div class="checkout-area pb-50">
			<div class="container">
				<form method="post" class="row" action="<?php echo base_url(); ?>cart/order" onsubmit="return printDiv('printMe');">
					<div class="col-lg-6">
						<div class="checkbox-form">
							<h3>Billing Details</h3>
							<div class="row">
								<div class="col-lg-12">
									<?php if ($error = $this->session->flashdata('order_msg')) { ?>
										<p style="color: green; padding-bottom:10px;"> <?php echo  $error; ?><p>
										<?php } ?>
							<?php if($error = $this->session->flashdata('msg')) {  ?>
								<p style="color: red; padding-bottom:10px;"> <?php echo  $error; ?><p>
								<?php } ?>
								</div>
								<?php foreach($details as $D){  ?>
								<div class="col-lg-12">
									<div class="checkout-form-list">
										<label>Your Name </label>
										<input type="text" name="uname" value="<?php echo $D['username']; ?>"  placeholder="Enter First Name" />
										<span class="text-danger"><p style="color:red" <?php echo form_error("username"); ?></span>
									</div>
								</div>

								<div class="col-lg-12">
									<div class="checkout-form-list">
										<label>Address</label>
										<input type="text" name="address" value="<?php echo $D['address']; ?>" placeholder="Street address" />
										<span class="text-danger"><p style="color:red;" <?php echo form_error("address"); ?> </span>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="checkout-form-list">
										<label>Email Address <span class="required">*</span></label>
										<input type="email" name="email" value="<?php echo $D['email']; ?>" placeholder="Enter Email Address" />
										<span class="text-danger"><p style="color:red" <?php echo form_error("email"); ?></span>
									</div>
								</div>


								<div class="col-lg-6">
									<div class="checkout-form-list">
										<label>Suburb <span class="required">*</span></label>
										<input type="text" value="<?php echo $D['suburb']; ?>" name="suburb" placeholder="Suburb" />
										<span class="text-danger"><p style="color:red" <?php echo form_error("suburb"); ?></span>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="checkout-form-list">
										<label>Postcode / Zip <span class="required">*</span></label>
										<input type="text" name="postcode" value="<?php echo $D['postcode']; ?>" placeholder="Postcode / Zip" />
										<span class="text-danger"><p style="color:red" <?php echo form_error("postcode"); ?></span>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="checkout-form-list">
										<label>City <span class="required">*</span></label>
										<input type="text" name="city" value="<?php echo $D['city']; ?>" placeholder="Town / City" />
										<span class="text-danger"><p style="color:red" <?php echo form_error("city"); ?></span>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="checkout-form-list">
										<label>Phone  <span class="required">*</span></label>
										<input type="text" name="phone" value="<?php echo  $D['phone']; ?>" placeholder="Enter Mobile Number" />
										<span class="text-danger"><p style="color:red" <?php echo form_error("phone"); ?></span>
									</div>
								</div>
           	<?php } ?>
							</div>

						</div>
					</div>
					<div class="col-lg-6" id='printMe'>
						<div class="your-order">
							<h3>Your order</h3>
							<div class="your-order-table table-responsive">
								<table>

									<thead>
										<tr>
											<th class="product-name">Product</th>
											<th class="product-total">Price<small></small></th>
										</tr>
									</thead>
									<tbody>
                    <?php $i = 1; ?>
										<?php //prd($this->cart->contents()); ?>
                    <?php foreach ($this->cart->contents() as $items): ?>
										<tr class="cart_item">
											<td class="product-name"><?php echo $items['name']; ?><strong class="product-quantity">  (<?php echo $items['qty']; ?>)</strong>

												<input type ="hidden" name= "product_title[]" value="<?php echo $items['name']; ?>" />
												<input type ="hidden" name= "p_qty[]" value="<?php echo $items['qty']; ?>" />
												<input type ="hidden" name= "product_id[]" value="<?php echo $items['product_id']; ?>" />
												<input type ="hidden" name= "item_price[]" value="<?php echo $items['item_price']; ?>" />
												<input type ="hidden" name= "price[]" value="<?php echo $items['price']; ?>" />
										  	<input type="hidden" name="user_id" value="<?php echo $user = $this->session->userdata('id');  ?>" />
												<input type="hidden" name="username" value="<?php echo $user = $this->session->userdata('username');  ?>" />
											</td>
											<td class="product-total">
												<span class="amount">$<?php echo $items['qty_price']; ?></span>
											</td>
										</tr>

                    <?php $i++; ?>

                    <?php endforeach; ?>
									</tbody>
									<tfoot>

										<tr class="shipping">
											<th>Local Delivery</th>
											<td>

												<ul>
													<li>


														<label>
															<?php $i = 1; ?>
															<?php foreach ($this->cart->contents() as $items): ?>

															 <span class="amount">$<?php echo $items['shipping']; ?></span>
															<?php $i++; ?>
																	<?php endforeach; ?>
														</label>

													</li>
													<!-- <li>
														<input type="radio" />
														<label>Free Shipping:</label>
													</li> -->
													<li></li>
												</ul>

											</td>
										</tr>
										<tr class="order-total">
											<th>Order Total</th>
											<td><strong><span class="amount">$<?php echo $this->cart->format_number($this->cart->total()); ?></span></strong>
												<input type="hidden" name="price" value="<?php echo $this->cart->total(); ?>" />
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="payment-method">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="card">
										<div class="card-header" role="tab" id="headingOne">
											<h4 class="card-title">
												<div class="order-button-payment">
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

												</a>
												</div>
											</h4>

										</div>
										<div id="collapseOne" class="collapse show" data-parent="#accordion" aria-labelledby="headingOne">
											<!-- <div class="card-body payment-content">

												Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.
											</div> -->
										</div>
									</div>

									<div class="card">
										<div class="card-header" role="tab" id="headingThree">
											<h4 class="card-title panel-img">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                      For Online Payment Click To Get Details
														<!-- <input type="submit" value="For Online Payment Click To Get Details" /> -->

													</a>
											</h4>
										</div>
										<div id="collapseThree" class="collapse" data-parent="#accordion" aria-labelledby="headingThree">
											<div class="card-body payment-content">
												Please send full payment in our bank account<br>
												<b>Account Name:</b> Rullen Tech Limited<br>
												<b>Account Number:</b> 02 0865 0071078 000<br>
												<b>Reference Number:</b> <?php echo $user = $this->session->userdata('id');  ?></br>
												Your order will not be delivered until we confirm<br>
												full payment in our bank account.<br>
												Do you have any further query, fill free to contact us.
												<div class="order-button-payment">
													<input type="submit" value="Place Order" />
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="order-button-payment">
									<input type="submit" name="cash" value="Cash On Delivery" />
									<!-- <input type="submit" value="Pay Online" /> -->
									<!-- onclick="printDiv('printMe')" -->
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- checkout-area end -->
		<!-- contact-area-start -->

		<script>
		function printDiv(divName){
			/*w=window.open();
			w.document.write(document.getElementById(divName).innerHTML);
			w.print();
			w.close();*/
			/*var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			console.log('originalContents',originalContents);
			document.body.innerHTML = originalContents;*/
			return true;
		}

	</script>
