<!-- sukram -->
<p align="center" style="width:150px;background-color:#DDDDDD;border-bottom: 2px solid #007bff;color:BLACK;font-size: 20px;">Order List</p>
<div class="table-responsive">

<table class="table table-bordered table-striped">
<thead style="color:#ab4129d6">
  <tr>
  <td>Order No.</td>
  <!-- <th>User Id</th> -->
  <!-- <th>Product Id</th> -->
  <td>Product</td>
  <td>Qty.</td>
  <td>Per item Price</td>
  <td>Total Price</td>
  <td>Payment Method</td>
  <td>Name</td>
  <td></td>
  <!-- <th>Last Name</th> -->
  <!-- <td>Email</td> -->
  <!-- <td>Address</td> -->
  <!-- <td>City</td> -->
  <!-- <td>Suburb</td> -->
  <!-- <td>Postcode</td> -->
  <!-- <td>Phone</td> -->
  <td>Order Statds</th>
  <td></td>
  <!-- <th>Shipping</th>
  <th>Set Delivery Status</th>
  <th>Cancel Order</th> -->
</tr>
</thead>
<?php foreach($orders as $order){  ?>
  <tr>
  <td><?php echo $order['order_id']; ?></td>
  <!-- <td><?php echo $order['user_id']; ?></td> -->
  <!-- <td><?php echo $order['product_id']; ?></td> -->
  <td><img style="height:70px;" src="<?php echo base_url(); ?>assets/img/<?php echo $order['image']; ?>" width="70" height="333" alt=""><br><p class="text-capitalize"><?php echo $order['product_title']; ?></p></td>
  <!-- <td class="text-capitalize"><?php echo $order['product_title']; ?>(<?php echo $order['product_id']; ?>)</td> -->
  <td><?php echo $order['qty']; ?></td>
  <td><?php echo $order['item_price']; ?></td>
  <td><?php echo $order['price']; ?></td>
  <td class="text-capitalize"><?php echo $order['payment_method']; ?></td>
  <td class="text-capitalize"><?php echo $order['username']; ?></td>
  <td><button type="button" class="btn btn-info btn-sm view_detail" data-toggle="modal" id="<?php echo $order['order_id']; ?>" data-target="#myModal">View</button>  </td>
  <!-- <td><?php echo $order['last_name']; ?></td> -->
  <!-- <td><?php echo $order['email']; ?></td> -->
  <!-- <td class="text-capitalize"><?php echo $order['address']; ?></td> -->
  <!-- <td class="text-capitalize"><?php echo $order['city']; ?></td> -->
  <!-- <td class="text-capitalize"><?php echo $order['suburb']; ?></td> -->
  <!-- <td><?php echo $order['postcode']; ?></td> -->
  <!-- <td><?php echo $order['phone']; ?></td> -->
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
  <div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <!-- <p><?php echo $prdct['product_desc']; ?></p> -->

                  <!-- <p style="display:inline">  Name: <p class="text-capitalize" id="name"></p></p> -->
                  <p style="display:inline">  Email: <p id="email"></p></p>
                  <p style="display:inline">  Phone: <p id="phone"></p></p>
                  <p style="display:inline">  Address: <p style="display:inline" class="text-capitalize" id="address">
                  <p  class="text-capitalize" id="suburb"></p></p></p>
                  <p style="display:inline">  City: <p class="text-capitalize" id="city"></p>
                  <p style="display:inline">  Postcode: <p id="postcode"></p></p>
                  <p style="display:inline">  Reference No. : <p id="reference"></p></p>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<?= $this->pagination->create_links(); ?>
</table>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

<script type="text/javascript">
    $(document).ready(function() {

      $('.view_detail').click(function(){

          var id = $(this).attr('id'); //get the attribute value

          $.ajax({
              url : "<?php echo base_url(); ?>admin/home/get_profile",
              data:{id : id},
              method:'GET',
              dataType:'json',
              success:function(response) {
                // $('#name').html(response.username);
                $('#email').html(response.email);
                $('#phone').html(response.phone);
                $('#address').html(response.address);
                $('#suburb').html(response.suburb);
                $('#city').html(response.city);
                $('#reference').html(response.user_id);
                $('#postcode').html(response.postcode);
                $('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
            }
          });
      });
    });
</script>
