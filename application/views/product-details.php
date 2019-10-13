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
                  <div class="desktop">
								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
									<div class="tab-content">

										<div class="tab-pane active" id="view1">
											<a class="image-link" href="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image']; ?>"><img style="height:400px;" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image']; ?>" width="500" height="333" alt=""></a>
										</div>
                    <div class="tab-pane" id="view2">
                      <a class="image-link" href="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image1']; ?>"><img style="height:400px" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image1']; ?>" width="500" height="333" alt=""></a>
                    </div>
                    <div class="tab-pane" id="view3">
                      <a class="image-link" href="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image2']; ?>"><img style="height:400px" src=	"<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image2']; ?>" width="500" height="333" alt=""></a>
                    </div>
                    <div class="tab-pane" id="view4">
                      <a class="image-link" href="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image3']; ?>"><img style="height:400px" src=	"<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image3']; ?>" width="500" height="333" alt=""></a>
                    </div>

									</div>
									  <!-- Nav tabs -->
									<ul class="sinple-tab-menu" role="tablist">

										<li class=" active"><a href="#view1" data-toggle="tab"><img style="height:50px;width:100%" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image']; ?>" alt="" /></a></li>
										<li><a href="#view2" data-toggle="tab"><img style="height:50px;width:100%" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image1']; ?>" alt="" /></a></li>
                    <li><a href="#view3" data-toggle="tab"><img style="height:50px;width:100%" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image2']; ?>" alt="" /></a></li>
                    <li><a href="#view4" data-toggle="tab"><img style="height:50px;width:100%"  src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image3']; ?>" alt="" /></a></li>
									</ul>
							   </div>
               </div>
               <div class="mobile">
               <div class="container">
                 <div class="mySlides">

                   <a class="image-link" href="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image']; ?>"><img style="height:230px;width:350px;" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image']; ?>" style="width:100%"></a>
                 </div>

                 <div class="mySlides">

                   <a class="image-link" href="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image1']; ?>"><img style="height:230px;width:350px;" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image1']; ?>" style="width:100%"></a>
                 </div>

                 <div class="mySlides">

                   <a class="image-link" href="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image2']; ?>"><img style="height:230px;width:350px;" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image2']; ?>" style="width:100%"></a>
                 </div>

                 <div class="mySlides">

                   <a class="image-link" href="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image3']; ?>"><img style="height:230px;width:350px;" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image3']; ?>" style="width:100%"></a>
                 </div>

                 <a class="prev" onclick="plusSlides(-1)">❮</a>
                 <a class="next" onclick="plusSlides(1)">❯</a>

                 <div class="row">
                   <div class="column">
                     <img style="padding-top:10px;padding-left:15px;height:50px;width:80px;" class="demo cursor" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image']; ?>" style="width:100%" onclick="currentSlide(1)" >
                   </div>
                   <div class="column">
                     <img style="padding-top:10px;padding-left:15px;height:50px;width:80px;" class="demo cursor" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image1']; ?>" style="width:100%" onclick="currentSlide(2)">
                   </div>
                   <div class="column">
                     <img style="padding-top:10px;padding-left:15px;height:50px;width:80px;" class="demo cursor" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image2']; ?>" style="width:100%" onclick="currentSlide(3)">
                   </div>
                   <div class="column">
                     <img style="padding-top:10px;padding-left:15px;height:50px;width:80px;" class="demo cursor" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image3']; ?>" style="width:100%" onclick="currentSlide(4)" >
                   </div>
                 </div>
                 </div>
               </div>
								<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
									<div class="product-simple-content">
										<div class="sinple-c-title">
											<h3 class="text-capitalize" style="font-family:Bell MT;"><?php echo $prdct['product_title']; ?></h3>
										</div>

                    <button type="button" class="btn btn-outline-secondary"><b style="color:green"><?php echo $prdct['in_stk']; ?></b><b style="color:red"><?php echo $prdct['out_stk']; ?></b></button>

											<h4 style="font-family:Bell MT;">$<?php echo $prdct['product_price']; ?></h4>

										<div class="quick-add-to-cart">
											<form method="post" action="<?php echo base_url(); ?>cart/add/<?php echo $prdct['product_id']; ?>" class="cart">
												<div class="numbers-row">
													<label  for="french-hens">Qty:</label>
													<input type="number" name="qty" id="french-hens" value="1">
												</div>

												<button class="single_add_to_cart_button hyper-page" type="submit"><span class="lnr lnr-cart"></span>Add to cart</button><br>

											</form>
										</div>
                    <?php if($error = $this->session->flashdata('qty')){ ?>
                    <p style="color:#a94442"> <b> <?php echo $error; ?></b></p>

                  <?php } ?>
										<br><br>
										<p class="text-capitalize"><?php echo $prdct['product_desc']; ?></p>
									</div>
								</div>
							</div>
              <?php } ?>
						</div>

</body>
</html>

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
<div class="feature-home-active">
							<div class="row dotted-style3">
                <div class="desktop">
								<div class="upsell-product-active">
                  <?php foreach($var_shop as $shp){ ?>
									<div class="col-lg-12">
										<div class="single-new-product">
											<div class="product-img">
												<a href="<?php echo base_url(); ?>home/product_details/<?php echo $shp['product_cat']; ?>/<?php echo $shp['product_title']; ?>/<?php echo $shp['product_id']; ?>">
													<img style="height:200px;" src="<?php echo base_url(); ?>assets/img/<?php echo $shp['product_image']; ?>" class="first_img" alt="" />
												</a>
												<div class="new-product-action feature-action">

													<!-- <a href="<?php echo base_url(); ?>cart/add/<?php echo $shp['product_id']; ?>"><span class="lnr lnr-cart cart_pad"></span>Add to Cart</a> -->
                          <a href="<?php echo base_url(); ?>home/add_to_wishlist/<?php echo $shp['product_id']; ?>"><span class="lnr lnr-heart"></span>Add to Wishlist</a>
												</div>
											</div>
											<div class="product-content text-center">
												<a href="<?php echo base_url(); ?>home/product_details/<?php echo $shp['product_cat']; ?>/<?php echo $shp['product_title']; ?>/<?php echo $shp['product_id']; ?>"><h3><?php echo $shp['product_title']; ?></h3></a>

												<h4>Price: $<?php echo $shp['product_price']; ?></h4>
											</div>
										</div>
									</div>

                <?php } ?>
								</div>
              </div>
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
    <div class="feature-preduct-area dotted-style4 home-page-2 feature-area-2 pb-50">
      <div class="mobile">
    <div class="container">
        <div class="row">
          <div class="col-lg-2">
            <div class="section-title">

            </div>
<?php foreach($var_shop as $s) { ?>
            <div class="feature-home-active">
              <div class="single-product-items">
                <div class="single-new-product">
                  <div class="product-img">
                    <a href="<?php echo base_url(); ?>home/product_details/<?php echo $s['product_cat']; ?>/<?php echo $s['product_title']; ?>/<?php echo $s['product_id']; ?>">
                      <img src="<?php echo base_url(); ?>assets/img/<?php echo $s['product_image']; ?>" class="first_img" alt="" />
                    </a>
                  </div>
                  <div class="product-content text-center">
                    <a href="<?php echo base_url(); ?>home/product_details/<?php echo $s['product_cat']; ?>/<?php echo $s['product_title']; ?>/<?php echo $s['product_id']; ?>"><h3 style="color:#c2a773; font-family:raleway; "><?php echo $s['product_title']; ?></h3></a>

                    <h4><b>Price: $<?php echo $s['product_price']; ?></b></h4>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>

        </div>
      </div>
    </div>

    </body>
</html>
<style>
@media screen and (min-width: 600px) {
.mobile {
 visibility: hidden;

 display: none;
}
}
@media screen and (max-width: 600px) {
.desktop {
visibility: hidden;

display: none;
}
}
</style>
<style>
body

* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
