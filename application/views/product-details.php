<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Product Details</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">


    </head>
    <body>


		<!-- all-hyperion-page-start -->
		<div class="all-hyperion-page">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<!-- product-simple-area-start -->
						<div class="product-simple-area ptb-80">
                <?php foreach($var_product as $prdct) { ?>
							<div class="row">
								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
									<div class="tab-content">

										<div class="tab-pane active" id="view1">
											<a class="image-link" href="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image']; ?>"><img style="height:300px" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image']; ?>" width="500" height="333" alt=""></a>
										</div>
                    <div class="tab-pane" id="view2">
                      <a class="image-link" href="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image1']; ?>"><img style="height:300px" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image1']; ?>" width="500" height="333" alt=""></a>
                    </div>
                    <div class="tab-pane" id="view3">
                      <a class="image-link" href="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image2']; ?>"><img style="height:300px" src=	"<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image2']; ?>" width="500" height="333" alt=""></a>
                    </div>
                    <div class="tab-pane" id="view4">
                      <a class="image-link" href="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image3']; ?>"><img style="height:300px" src=	"<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image3']; ?>" width="500" height="333" alt=""></a>
                    </div>

									</div>
									  <!-- Nav tabs -->
									<ul class="sinple-tab-menu" role="tablist">

										<li class=" active"><a href="#view1" data-toggle="tab"><img style="height:50px" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image']; ?>" alt="" /></a></li>
										<li><a href="#view2" data-toggle="tab"><img style="height:50px" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image1']; ?>" alt="" /></a></li>
                    <li><a href="#view3" data-toggle="tab"><img style="height:50px" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image2']; ?>" alt="" /></a></li>
                    <li><a href="#view4" data-toggle="tab"><img style="height:50px"  src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image3']; ?>" alt="" /></a></li>
									</ul>
							   </div>
								<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
									<div class="product-simple-content">
										<div class="sinple-c-title">
											<h3 class="text-capitalize" style="font-family:Bell MT;"><?php echo $prdct['product_title']; ?></h3>
										</div>
										<div class="checkbox">
											<span><i class="fa fa-check-square" aria-hidden="true"></i>In stock</span>
										</div>

											<h4 style="font-family:Bell MT;">$<?php echo $prdct['product_price']; ?></h4>

										<div class="quick-add-to-cart">
											<form method="post" action="<?php echo base_url(); ?>cart/add/<?php echo $prdct['product_id']; ?>" class="cart">
												<div class="numbers-row">
													<label  for="french-hens">Qty:</label>
													<input type="number" name="qty" id="french-hens" value="1">
												</div>

												<button class="single_add_to_cart_button hyper-page" type="submit"><span class="lnr lnr-cart"></span>Add to cart</button>
											</form>
										</div>
										<br><br>
										<p class="text-capitalize"><?php echo $prdct['product_desc']; ?></p>
									</div>
								</div>
							</div>
              <?php } ?>
						</div>
						<!-- product-simple-area-end -->
						<div class="product-info-detailed pb-80">
							<div class="row">
								<div class="col-lg-12">
									<div class="product-info-tab">
										<!-- Nav tabs -->

											<!-- Tab panes -->

									</div>
								</div>
							</div>
						</div>
						<div class="upsell-product">
							<div class="upsell-product-title">
								<h3 class="text-uppercase">Related Products</h3>
							</div>

							<div class="row dotted-style3">
								<div class="upsell-product-active">
                  <?php foreach($var_shop as $shp){ ?>
									<div class="col-lg-12">
										<div class="single-new-product">
											<div class="product-img">
												<a href="<?php echo base_url(); ?>home/product_details/<?php echo $shp['product_cat']; ?>/<?php echo $shp['product_title']; ?>/<?php echo $shp['product_id']; ?>">
													<img style="height:200px;" src="<?php echo base_url(); ?>assets/img/<?php echo $shp['product_image']; ?>" class="first_img" alt="" />
												</a>
												<div class="new-product-action feature-action">

													<a href="<?php echo base_url(); ?>cart/add/<?php echo $shp['product_id']; ?>"><span class="lnr lnr-cart cart_pad"></span>Add to Cart</a>

												</div>
											</div>
											<div class="product-content text-center">
												<a href="<?php echo base_url(); ?>home/product_details/<?php echo $shp['product_cat']; ?>/<?php echo $shp['product_title']; ?>/<?php echo $shp['product_id']; ?>"><h3><?php echo $shp['product_title']; ?></h3></a>

												<h4>$<?php echo $shp['product_price']; ?></h4>
											</div>
										</div>
									</div>

                <?php } ?>
								</div>
							</div>
						</div>

					</div>
          <br>
          <br>

				</div>
			</div>
		</div>
		<!-- all-hyperion-page-end -->




    </body>
</html>


