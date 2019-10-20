<!-- sukram -->
<p align="center" style="width:150px;background-color:#DDDDDD;border-bottom: 2px solid #007bff;color:BLACK;font-size: 20px;">Order List</p>
<div class="table-responsive">

<table class="table table-bordered">

<tr>

  <th>Order No.</th>
  <!-- <th>User Id</th> -->
  <!-- <th>Product Id</th> -->
  <th>Product</th>
  <th>Qty.</th>
  <th>Per item Price</th>
  <th>Total Price</th>
  <th>Payment Method</th>
  <th>Name</th>
  <!-- <th>Last Name</th> -->
  <th>Email</th>
  <th>Address</th>
  <th>City</th>
  <th>Suburb</th>
  <th>Postcode</th>
  <th>Phone</th>
  <th>Order Status</th>
  <th></th>
  <!-- <th>Shipping</th>
  <th>Set Delivery Status</th>
  <th>Cancel Order</th> -->
</tr>
<?php foreach($orders as $order){  ?>
  <tr>
  <td><?php echo $order['order_id']; ?></td>
  <!-- <td><?php echo $order['user_id']; ?></td> -->
  <!-- <td><?php echo $order['product_id']; ?></td> -->
  <td><img style="height:70px;" src="<?php echo base_url(); ?>assets/img/<?php echo $order['image']; ?>" width="70" height="333" alt=""><br><?php echo $order['product_title']; ?></td>
  <!-- <td class="text-capitalize"><?php echo $order['product_title']; ?>(<?php echo $order['product_id']; ?>)</td> -->
  <td><?php echo $order['qty']; ?></td>
  <td><?php echo $order['item_price']; ?></td>
  <td><?php echo $order['price']; ?></td>
  <td class="text-capitalize"><?php echo $order['payment_method']; ?></td>
  <td class="text-capitalize"><?php echo $order['username']; ?>/<?php echo $order['user_id']; ?></td>
  <!-- <td><?php echo $order['last_name']; ?></td> -->
  <td><?php echo $order['email']; ?></td>
  <td class="text-capitalize"><?php echo $order['address']; ?></td>
  <td class="text-capitalize"><?php echo $order['city']; ?></td>
  <td class="text-capitalize"><?php echo $order['suburb']; ?></td>
  <td><?php echo $order['postcode']; ?></td>
  <td><?php echo $order['phone']; ?></td>
  <td style="color:blue"><?php echo $order['delivery_status']; ?></td>
  <td>

    <select id="selectbox" name="" onchange="javascript:location.href = this.value;">
  <option  value="" selected>Change status</option>
  <option value="<?php echo base_url(); ?>admin/home/shipping/<?php echo $order['order_id'] ?>" onclick="return myConfirm2();">Ready to Ship</option>
  <option value="<?php echo base_url(); ?>admin/home/deliver/<?php echo $order['order_id'] ?>">Delivered</option>
  <option value="<?php echo base_url(); ?>admin/home/cancel_order/<?php echo $order['order_id'] ?>">Cancel</option>
</select>
</td>
  <!-- <td><a href="<?php echo base_url(); ?>admin/home/shipping/<?php echo $order['order_id'] ?>" onclick="return myConfirm2();"><p style="color:orange;"><b><?php echo $order['shipping_btn']; ?></b></p></a></td>
  <td><a href="<?php echo base_url(); ?>admin/home/deliver/<?php echo $order['order_id'] ?>" onclick="return myConfirm1();"><p style="color:green;"><b><?php echo $order['delivery_button']; ?></b></p></a></td>
  <td><a href="<?php echo base_url(); ?>admin/home/cancel_order/<?php echo $order['order_id'] ?>" onclick="return myConfirm();"><p style="color:red;"><b><?php echo $order['cancel_button']; ?></b></p></a></td> -->

  </tr>
<?php } ?>
<?= $this->pagination->create_links(); ?>
</table>


</div>
<script>
function myConfirm() {
  var result = confirm("Do you want to cancel the particular order?");
  if (result==true) {
   return true;
  } else {
   return false;
  }
}
function myConfirm1() {
  var result = confirm("Have you Delivered this product?");
  if (result==true) {
   return true;
  } else {
   return false;
  }
}
function myConfirm2() {
  var result = confirm("Is this product Ready to Ship ?");
  if (result==true) {
   return true;
  } else {
   return false;
  }
}
</script>
