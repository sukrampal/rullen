<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Cart</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">


    </head>
    <body>

		<!-- entry-header-area start -->
		<div class="entry-header-area pt-40">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="entry-header">
							<h1 class="entry-title">Cart</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- entry-header-area end -->
		<!-- cart-main-area start -->

		<div class="cart-main-area ptb-40">

			<div class="container">

				<div class="row">

					<div class="">

						<form action="<?php echo base_url(); ?>cart/update" method="post">

              <?php if($error = $this->session->flashdata('qty')){ ?>
              <p style="color:red">  <?php echo $error; ?></p>
              <?php } ?>

							<div class="table-content table-responsive">

                <!-- <div class="desktop"> -->
								<table>
                  <?php if(!empty($this->cart->contents())){ ?>
									<thead>
										<tr>
											<th class="product-thumbnail">Product</th>
											<!-- <th class="product-name">Product</th> -->
											<!-- <th class="product-price">Price</th> -->
											<th class="product-quantity">Qty</th>
                      <!-- <th class="product-quantity"><small>Local Delivery Charges<br> per item</small></th> -->
											<th class="product-subtotal">Total</th>
											<th class="product-remove">Remove</th>
										</tr>
									</thead>
									<tbody>
                    <?php $i = 1; ?>

                    <?php foreach ($this->cart->contents() as $items): ?>
										<tr>
											<td class="product-thumbnail"><a ><img src="<?php echo base_url(); ?>assets/img/<?php echo $items['image']; ?>" alt="" /></a> <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><br></a></h5><span class="text-muted font-weight-normal font-italic d-block text-capitalize"><b><?php echo $items['name']; ?></b></span>
                      </div></td>
											<!-- <td class="product-name text-capitalize"><a><?php echo $items['name']; ?></a></td> -->
											<!-- <td class="product-price"><span class="amount">$<?php echo $items['item_price']; ?></span></td> -->
											<td class="product-quantity"><input type="number" name="qty[<?php echo $items['rowid']; ?>][]" value="<?php echo $items['qty']; ?>" /><input type="hidden" name="qty[<?php echo $items['rowid']; ?>][]" value="<?php echo ($items['item_price']); ?>"><input type="hidden" name="qty[<?php echo $items['rowid']; ?>][]" value="<?php echo ($items['shipping']); ?>"><input type="hidden" name="qty[<?php echo $items['rowid']; ?>][]" value="<?php echo ($items['id']); ?>"></td>

                     <!-- <td class="product-price"><span class="amount">$<?php echo $items['shipping']; ?></span></td> -->
											<td class="product-subtotal"><?php echo $this->cart->format_number($items['qty_price']); ?></td>
											<td class="product-remove"><a href="<?php echo base_url(); ?>cart/remove_item/<?php echo $items['rowid']; ?>"><i name="remove" class="fa fa-trash" ></i></a></td>

										</tr>

                    <?php $i++; ?>

                    <?php endforeach; ?>

									</tbody>
                <?php }else{ ?>
                  <p class="text-capitalize" style="text-align:center;">please select an item to cart, Thank you</p>
                  <?php } ?>
								</table>

							</div>
							<div class="row">
								<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
									<div class="buttons-cart">
										<input type="submit" value="Update Cart" />
										<a href="<?php echo base_url(); ?>home/gallery">Continue Shopping</a>
									</div>

								</div>
								<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
									<div class="cart_totals">
										<h2>Cart Totals</h2>
                    <br>
										<table>
											<tbody>

                        <br><tr class="cart-subtotal">

                            <th>Local Delivery</th>
                            <?php $i = 1; ?>

                            <?php $shipping = 0; foreach ($this->cart->contents() as $items){
                              $shipping += $this->cart->format_number($items['shipping']);
                              $i++;
                            } ?>
                            <td><span class="amount">$<?php echo $shipping; ?></span></td>
                          </tr>

												<tr class="order-total">

													<th>Total</th>
													<td>
														<strong class="amount">$<?php echo $this->cart->format_number($this->cart->total()); ?><span class="amount" ></span></strong>
													</td>
												</tr>
											</tbody>

										</table>


									</div>

                  <div class="wc-proceed-to-checkout">
                    <a href="<?php echo base_url(); ?>cart/checkout">Proceed to Checkout</a>
                  </div>
								</div>
							</div>

						</form>

					</div>

				</div>

			</div>

		</div>
		<!-- cart-main-area end -->

		<!-- footer-area-start -->

    </body>
</html>

<!-- <style>
@media only screen and (max-width: 600px){
.desktop {
  display: none;
  visibility: hidden;
}
}
@media only screen and (min-width: 600px){
.mobile {
  display: none;
  visibility: hidden;
}
}
</style> -->
