
        <!-- sukram -->
        <!-- <h1 align="center"><button type="button" class="btn btn-outline-secondary">Latest Products</button></h1><br></br> -->
        <div class="abc" align="center"><p align="center" style="width:350px;background-color:#DDDDDD;color:BLACK;font-size: 20px;border-radius: 12px;">LATEST PRODUCT LIST</p></div>
        <?php
        if($this->uri->segment(3)=="new_product_deleted"){
          echo '<p class="text-success">Your product has been removed from the list of latest products</p>';
        }
        ?><br>
        <a href="<?php echo base_url(); ?>admin/home/add_product"><input type="submit" name="insert" value="Add New Product" class="btn btn-info"></a><br>


          <div class="table-responsive">
          <table class="table table-bordered table-striped">
              <tr>
              <th></th>

              <th>Product</th>
              <th>Price</th>
              <!-- <th>Description</th> -->
              <th>Delete</th>
              <th>Update</th>
            </tr>

            <?php $i =1; foreach($products as $prdct){ ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><img style="height:70px; width:90px" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image']; ?>" ><br><?php echo $prdct['product_title']; ?></td>
              <td><?php echo $prdct['product_price']; ?></td>
              <!-- <td><?php echo $prdct['shipping']; ?></td> -->
              <td><a href="<?php echo base_url(); ?>admin/home/delete_new_product/<?php echo $prdct['product_id']; ?>" class="delete_data"  onclick="return myConfirm();" id="<?php echo $prdct['product_id']; ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
              <td><a href="<?php echo base_url(); ?>admin/home/update_product/<?php echo $prdct['product_id']; ?>" class="update _data" id="<?php echo $prdct['product_id']; ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></td>
            </tr>
          <?php $i ++; } ?>

            </tabel>
          </div>
      </div>


<script>
function myConfirm(){
  var result = confirm("Do you want to delete the particular product?");
  if(result == true){
  return true;
}else{
  return false;
}
}
</script>
