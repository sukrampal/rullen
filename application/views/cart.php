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

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

						<form action="<?php echo base_url(); ?>cart/update" method="post">

							<div class="table-content table-responsive">

								<table>
									<thead>
										<tr>
											<th class="product-thumbnail">Image</th>
											<th class="product-name">Product</th>
											<th class="product-price">Price</th>
											<th class="product-quantity">Quantity</th>
                      <th class="product-quantity">Shipping<small>(per quantity)</small></th>
											<th class="product-subtotal">Total</th>
											<th class="product-remove">Remove</th>
										</tr>
									</thead>
									<tbody>
                    <?php $i = 1; ?>

                    <?php foreach ($this->cart->contents() as $items): ?>
										<tr>
											<td class="product-thumbnail"><a href="#"><img src="<?php echo base_url(); ?>assets/img/<?php echo $items['image']; ?>" alt="" /></a></td>
											<td class="product-name text-capitalize"><a href="#"><?php echo $items['name']; ?></a></td>
											<td class="product-price"><span class="amount">$<?php echo $items['item_price']; ?></span></td>
											<td class="product-quantity"><input type="number" name="qty[<?php echo $items['rowid']; ?>][]" value="<?php echo $items['qty']; ?>" /><input type="hidden" name="qty[<?php echo $items['rowid']; ?>][]" value="<?php echo ($items['qty'] * $items['item_price']); ?>"></td>
                      <td class="product-price"><span class="amount">$<?php echo $items['shipping']; ?></span></td>
											<td class="product-subtotal"><?php echo $this->cart->format_number($items['subtotal']); ?></td>
											<td class="product-remove"><a href="<?php echo base_url(); ?>cart/remove_item/<?php echo $items['rowid']; ?>"><i name="remove" class="fa fa-times" ></i></a></td>

										</tr>
                    <?php $i++; ?>

                    <?php endforeach; ?>

									</tbody>

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
