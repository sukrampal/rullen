<!-- sukram -->
<h3 align="center"><button type="button" class="btn btn-info">Ordered List</button></h3>
<div class="table-responsive">
<table class="table table-bordered">
<tr>
  <th>Order Id</th>
  <th>Product Id</th>
  <th>Product Name</th>
  <th>Quantity</th>
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
  <th>Delivery Status</th>
  <th>Set Delivery Status</th>
  <th>Delete</th>
</tr>
<?php foreach($orders as $order){  ?>
  <tr>
  <td><?php echo $order['order_id']; ?></td>
  <td><?php echo $order['product_id']; ?></td>
  <td class="text-capitalize"><?php echo $order['product_title']; ?></td>
  <td><?php echo $order['qty']; ?></td>
  <td><?php echo $order['item_price']; ?></td>
  <td><?php echo $order['price']; ?></td>
  <td class="text-capitalize"><?php echo $order['payment_method']; ?></td>
  <td class="text-capitalize"><?php echo $order['username']; ?></td>
  <!-- <td><?php echo $order['last_name']; ?></td> -->
  <td><?php echo $order['email']; ?></td>
  <td class="text-capitalize"><?php echo $order['address']; ?></td>
  <td class="text-capitalize"><?php echo $order['city']; ?></td>
  <td class="text-capitalize"><?php echo $order['suburb']; ?></td>
  <td><?php echo $order['postcode']; ?></td>
  <td><?php echo $order['phone']; ?></td>
  <td style="color:blue"><?php echo $order['delivery_status']; ?></td>
  <td><a href="<?php echo base_url(); ?>admin/home/deliver/<?php echo $order['order_id'] ?>" onclick="return myConfirm1();"><button type="button" class="btn btn-success btn-sm">Delivered</button></a></td>
  <td><a href="<?php echo base_url(); ?>admin/home/delete_order/<?php echo $order['order_id'] ?>" onclick="return myConfirm();"><button type="button" class="btn btn-danger btn-sm">Delete</button></a></td>

  </tr>
<?php } ?>

</table>
</div>
<script>
function myConfirm() {
  var result = confirm("Do you want to delete the particular order?");
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
</script>
