
		<!-- mainmenu-area-end -->
		<!-- page-title-wrapper-start -->

		<!-- page-title-wrapper-end -->
		<!-- wishlist-area start -->
		<div class="wishlist-area pt-80 pb-30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="wishlist-content">
							<form action="#">
								<div class="wishlist-title">
									<h2>My wishlist</h2>
								</div>


								<div class="wishlist-table table-responsive">
                  <?php if($error = $this->session->flashdata('wishlist')) { ?>
                    <p style="color:green;"><?php echo $error; ?></p>
                  <?php } ?>
									<table>
                    <?php if(!empty($wishlist)){ ?>
										<thead>
											<tr>
												<th class="product-remove"><span class="nobr">Remove</span></th>
												<th class="product-thumbnail">Image</th>
												<th class="product-name"><span class="nobr">Product Name</span></th>
												<th class="product-price"><span class="nobr"> Unit Price </span></th>
												<th class="product-stock-stauts"><span class="nobr"> Stock Status </span></th>
												<!-- <th class="product-add-to-cart"><span class="nobr">add-to-cart </span></th> -->
											</tr>
										</thead>
										<tbody>

                      <?php foreach ($wishlist as $w) { ?>
											<tr>
												<td class="product-remove"><a href="<?php echo base_url(); ?>home/remove_wishitem/<?php echo $w['product_id']; ?>"><i class="fa fa-trash"></i></a></td>
												<td class="product-thumbnail"><a href="<?php echo base_url(); ?>home/product_details/<?php echo $w['product_cat']; ?>/<?php echo $w['product_title']; ?>/<?php echo $w['product_id']; ?>"><img src="<?php echo base_url(); ?>assets/img/<?php echo $w['product_image']; ?>" alt="" /></a></td>
												<td class="product-name"><a href="<?php echo base_url(); ?>home/product_details/<?php echo $w['product_cat']; ?>/<?php echo $w['product_title']; ?>/<?php echo $w['product_id']; ?>"><?php echo $w['product_title']; ?></a></td>
												<td class="product-price"><span class="amount">$<?php echo $w['product_price']; ?></span></td>
												<td class="product-stock-status"><span class="wishlist-in-stock"><button type="button" class="btn btn-outline-secondary"><b style="color:green"><?php echo $w['in_stk']; ?></b><b style="color:red"><?php echo $w['out_stk']; ?></b></button></span></td>
												<!-- <td class="product-add-to-cart"><a href="#"> Add to Cart</a></td> -->
											</tr>
										<?php } ?>

										</tbody>
                  <?php }else{ ?>
                    <p class="text-capitalize" style="text-align:center;">sorry, you haven't selected any item in your wishlist</p>
                  <?php } ?>
									</table>
								</div>
                <div class="buttons-cart">

                  <a href="<?php echo base_url(); ?>home/gallery">Continue Shopping</a>
                </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
