<br>
<h3 align="center"><button type="button" class="btn btn-lg btn-secondary">Your Ordered Details</button></h3>

<?php if(!empty($my_order)){ ?>
<div class="cart-main-area ptb-40">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<div class="table-content table-responsive">
    <div class="desktop">
  <table>
    <thead>
      <tr>

        <th class="product-name">Order No.</th>
        <th class="product-price">Product Name</th>
        <th class="product-quantity">Quantity</th>
        <!-- <th class="product-quantity">Shipping<small>(per quantity)</small></th> -->
        <th class="product-subtotal">Item Price</th>
        <th class="product-remove">Price<br> <small>(including shipping)</small></th>
        <th class="product-remove">Payment Method</th>
        <th class="product-remove">Delivery Status</th>
        <th class="product-remove">Ordered on</th>

      </tr>
    </thead>
    <tbody>

      <?php foreach ($my_order as $order) { ?>
      <tr>
        <!-- <td class="product-thumbnail"><a href="#"><img src="<?php echo base_url(); ?>assets/img/<?php echo $items['image']; ?>" alt="" /></a></td> -->
        <td class="product-name"><?php echo $order['order_id']; ?></td>
        <!-- <td class="product-name text-capitalize"><?php echo $order['product_title']; ?></td> -->
        <td><img style="height:70px;" src="<?php echo base_url(); ?>assets/img/<?php echo $order['image']; ?>" width="70" height="333" alt=""><br><?php echo $order['product_title']; ?></td>
        <td class="product-name"><?php echo $order['qty']; ?></td>
        <td class="product-name"><?php echo $order['item_price']; ?></td>
        <td class="product-name"><?php echo $order['price']; ?></td>
        <td class="product-name text-capitalize"><?php echo $order['payment_method']; ?></td>
        <td class="product-name"><?php echo $order['delivery_status']; ?></td>
        <td class="product-name"><?php echo $order['created_at']; ?></td>
       <td class="product-name"><a href ="<?php echo base_url(); ?>home/cancel_order/<?php echo $order['order_id']; ?>"> <p style="color:#17a2b8;"><?php echo $order['cancel_button']; ?></p></a></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<div class="mobile">
<table>
<thead>
  <tr>

    <th style="padding:0px;width:0px;" class="product-name"><small><small>Product Id</small></small></th>
    <th style="padding:0px;width:0px;" class="product-price"><small><small>Product Name</small></small></th>
    <th style="padding:0px;width:0px;" class="product-quantity"><small><small>Quantity</small></small></th>
    <!-- <th class="product-quantity">Shipping<small>(per quantity)</small></th> -->
    <th style="padding:0px;width:0px;" class="product-subtotal"><small><small>Item Price</small></small></th>
    <th style="padding:0px;width:0px;" class="product-remove"><small><small>Price</small></small><br> <small><small>(including shipping)</small></small></th>
    <th style="padding:0px;width:0px;" class="product-remove"><small><small>Payment Method</small></small></th>
    <th style="padding:0px;width:0px;" class="product-remove"><small><small>Delivery Status</small></small></th>
    <th style="padding:0px;width:0px;" class="product-remove"><small><small>Ordered on</small></small></th>

  </tr>
</thead>
<tbody>

  <?php foreach ($my_order as $order) { ?>
  <tr>
    <!-- <td class="product-thumbnail"><a href="#"><img src="<?php echo base_url(); ?>assets/img/<?php echo $items['image']; ?>" alt="" /></a></td> -->
    <td style="padding:0px;width:0px;" class="product-name"><small><small><?php echo $order['product_id']; ?></small></small></td>
    <td style="padding:0px;width:0px;" class="product-name text-capitalize"><small><small><?php echo $order['product_title']; ?></small></small></td>
    <td style="padding:0px;width:0px;" class="product-name"><small><small><?php echo $order['qty']; ?></small></small></td>
    <td style="padding:0px;width:0px;" class="product-name"><small><small><?php echo $order['item_price']; ?></small></small></td>
    <td style="padding:0px;width:0px;" class="product-name"><small><small><?php echo $order['price']; ?></small></small></td>
    <td style="padding:0px;width:0px;" class="product-name text-capitalize"><small><small><?php echo $order['payment_method']; ?></small></small></td>
    <td style="padding:0px;width:0px;" class="product-name"><small><small><?php echo $order['delivery_status']; ?></small></small></td>
    <td style="padding:0px;width:0px;" class="product-name"><small><small><?php echo $order['created_at']; ?></small></small></td>
   <td style="padding:0px;width:0px;" class="product-name"><a href ="<?php echo base_url(); ?>home/cancel_order/<?php echo $order['order_id']; ?>"> <p style="color:#17a2b8;"><small><small><?php echo $order['cancel_button']; ?></small></small></p></a></td>
  </tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<?php }else{ ?>
  <h4 class="text-capitalize" style="color:green;padding-top:35px;padding-bottom:30px;text-align:center">Sorry, You haven't placed any order yet!</h4>
<?php } ?>


<style>
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
</style>
