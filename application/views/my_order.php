<br>
<h3 align="center"><button type="button" class="btn btn-lg btn-secondary">Your Ordered Details</button></h3>

<?php if(!empty($my_order)){ ?>
<div class="cart-main-area ptb-40">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="table-content table-responsive">
  <table>
    <thead>
      <tr>

        <th class="product-name">Product Id</th>
        <th class="product-price">Product Name</th>
        <th class="product-quantity">Quantity</th>
        <!-- <th class="product-quantity">Shipping<small>(per quantity)</small></th> -->
        <th class="product-subtotal">Item Price</th>
        <th class="product-remove">Price <small>(including shipping)</small></th>
        <th class="product-remove">Payment Status</th>
        <th class="product-remove">Delivery Status</th>
        <th class="product-remove">Ordered on</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($my_order as $order) { ?>
      <tr>
        <!-- <td class="product-thumbnail"><a href="#"><img src="<?php echo base_url(); ?>assets/img/<?php echo $items['image']; ?>" alt="" /></a></td> -->
        <td class="product-name"><?php echo $order['product_id']; ?></td>
        <td class="product-name text-capitalize"><?php echo $order['product_title']; ?></td>
        <td class="product-name"><?php echo $order['qty']; ?></td>
        <td class="product-name"><?php echo $order['item_price']; ?></td>
        <td class="product-name"><?php echo $order['price']; ?></td>
        <td class="product-name text-capitalize"><?php echo $order['payment_method']; ?></td>
        <td class="product-name"><?php echo $order['delivery_status']; ?></td>
        <td class="product-name"><?php echo $order['created_at']; ?></td>


      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>
<?php }else{ ?>
  <h4 style="color:green;padding-top:35px;padding-bottom:30px;text-align:center">Sorry, You haven't placed any order yet!</h4>
<?php } ?>
