<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Shop</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- modernizr css -->
    </head>
    <body>

		<!-- page-title-wrapper-start -->
		<div class="page-title-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="page-title">
							<h3></h3>
            <img style="width:1920px" src="<?php echo base_url(); ?>assets/img/banner/<?php echo $banner['image']; ?>" alt="" >
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- page-title-wrapper-end -->
		<!-- bedroom-all-product-area-start -->
		<div class="bedroom-all-product-area ptb-80">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-1">
            <div class="category-area-start ">
              <div class="caregory">
                <h3 class="bedroom-side-title">category</h3>
                  <?php foreach($navbar as $nav) { ?>
                <ul>
                  <li><a href="<?php echo base_url(); ?>home/shop/<?php echo str_replace(" ","",$nav['cat_title']); ?>/<?php echo $nav['cat_id']; ?>"><?php echo $nav['cat_title']; ?></a></li>

                </ul>
              <?php } ?>
              </div>
            </div>


					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<!-- category-products-area-start -->
						<div class="caregory-products-area">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<ul class="tab_menu">
										<li class="active"><a href="#viewed" data-toggle="tab"><i class="fa fa-th"></i></a></li>
										<li><a href="#random " data-toggle="tab"><i class="fa fa-list"></i></a></li>
									</ul>
								</div>

							</div>
							<div class="tab-content">
								<div class="tab-pane active" id="viewed">
									<div class="row">
                      <?php if(!empty($var_shop)) {
                       foreach($var_shop as $shp){ ?>

										<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">


											<div class="single-new-product mt-40 category-new-product">
												<div class="product-img">
													<a href="<?php echo base_url(); ?>home/product_details/<?php echo $shp['product_cat']; ?>/<?php echo $shp['product_title']; ?>/<?php echo $shp['product_id']; ?>">
														<img style="height:150px;" src="<?php echo base_url(); ?>assets/img/<?php echo $shp['product_image']; ?>" class="first_img"  alt="" />
													</a>
													<div class="new-product-action">

														<a href="<?php echo base_url(); ?>cart/add/<?php echo $shp['product_id']; ?>"><span class="lnr lnr-cart cart_pad"></span>Add to Cart</a>

													</div>
												</div>
												<div class="product-content text-center">
													<a href="<?php echo base_url(); ?>home/product_details/<?php echo $shp['product_cat']; ?>/<?php echo $shp['product_title']; ?>/<?php echo $shp['product_id']; ?>"><h3 class="text-capitalize" style="font-family:Bell MT;"><?php echo $shp['product_title']; ?></h3></a>

													<div class="price">
														<h4>Price: $<?php echo $shp['product_price']; ?></h4>
                            <h3 class="del-price"><del><?php echo $shp['old_price']; ?></del></h3>
													</div>
												</div>
											</div>

										</div>

                  <?php } }else{
                     ?><br></br>
                     <h3 class="text-success" align="center">Sorry, No item found related to this category</h3>
                   <?php } ?>
									</div>
								</div>
								<div class="tab-pane" id="random">

									<div class="single-category-product mt-40">
                    <?php if(!empty($var_shop)) {
                     foreach($var_shop as $shp){ ?>
										<div class="single-category-product-img">
											<a href="<?php echo base_url(); ?>home/product_details/<?php echo $shp['product_cat']; ?>/<?php echo $shp['product_title']; ?>/<?php echo $shp['product_id']; ?>"><img style="height:200px" src="<?php echo base_url(); ?>assets/img/<?php echo $shp['product_image']; ?>" alt="" /></a>
										</div>
										<div class="single-category-product-info">
											<a href="<?php echo base_url(); ?>home/product_details/<?php echo $shp['product_cat']; ?>/<?php echo $shp['product_title']; ?>/<?php echo $shp['product_id']; ?>"><h2 class="text-capitalize"><?php echo $shp['product_title']; ?></h2></a>
											<div class="price category-price">
												<h4>Price: $<?php echo $shp['product_price']; ?></h4>
												<h3 class="del-price"><del><?php echo $shp['old_price']; ?></del></h3>
											</div>
											<p>
                        <?php echo $shp['product_desc']; ?>
											</p>
											<div class="new-product-action2 category-cart">
												<a href="<?php echo base_url(); ?>cart/add/<?php echo $shp['product_id']; ?>" class="bg-black"><span class="lnr lnr-cart"></span>Add to Cart</a>

											</div>
										</div>

                  <?php }}else{ ?>
                    <br>
                    <h3 class="text-success" align="center">Sorry, No item found related to this category</h3>
                  <?php } ?>
									</div>


							</div>
						</div>
						<!-- category-products-area-end -->
						<!-- pagination-area-start -->
						<div class="pagination-area mt-40 pt-40">
							<div class="pagination-text">
								<!-- <p>Items 1-16 of 17</p> -->
							</div>

							<div class="bedroom-pagination">
								<nav aria-label="Page navigation">
									<!-- <ul class="pagination">
										<li><a href="#">Page</a></li>
										<li><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li>
											<a href="#" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
											</a>
										</li>
									</ul> -->
<?php echo $this->pagination->create_links(); ?>

								</nav>
                <br>
							</div>
						</div>
						<!-- pagination-area-end -->
					</div>
				</div>
			</div>
		</div>
		<!-- bedroom-all-product-area-end -->
<style>
    @media screen and (max-width: 600px) {
      .category-area-start {
        visibility: hidden;
        clear: both;
        float: left;
        margin: 10px auto 5px 20px;
        width: 28%;
        display: none;
      }
    }
</style>


    </body>
</html>

<style>
.product-img{
  padding-top: 10px;
  margin-bottom: 10px;
}



</style>
