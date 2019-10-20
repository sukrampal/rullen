
      <?php if(isset($out_of_stock)){ ?>

        <!-- <h1 align="center"><button type="button" class="btn btn-outline-secondary">Out Of Stock Items</button></h1><br></br> -->
        <div class="abc" align="center"><p align="center" style="width:350px;background-color:#DDDDDD;color:BLACK;font-size: 20px;border-radius: 12px;">OUT OF STOCK ITEMS LIST</p></div>
        <?php if($error  = $this->session->flashdata('out')){ ?>
        <p style="color:green"> <?php echo $error; ?></p>
        <?php } ?>
        <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
            <th></th>
            <!-- <th>Category</th> -->
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <!-- <th>Mark Out Of Stock</th> -->
            <th>Click To Change Availability</th>

          </tr>
          <?php $i =1; foreach($out_of_stock as $prdct){ ?>
          <tr>
            <td><?php echo $i; ?></td>
            <!-- <td><?php echo $prdct['cat_title']; ?></td> -->
            <td class="text-capitalize"><?php echo $prdct['product_title']; ?></td>
            <td><?php echo $prdct['product_price']; ?></td>
            <td><img style="height:70px; width:90px" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image']; ?>" ></td>

            <td><a href="<?php echo base_url(); ?>admin/home/out_of_stock/<?php echo $prdct['product_id']; ?>"><b  style="color:red;"><?php echo $prdct['out_stk']; ?></b></td>
            <!-- <td><a href="<?php echo base_url(); ?>admin/home/in_stock/<?php echo $prdct['product_id']; ?>"><b  style="color:green;"><?php echo $prdct['in_stk']; ?></b></td> -->

          </tr>
        <?php $i++; } ?>
        </table>
        </div>


      <?php }else{  ?>

        <!-- sukram -->
        <div class="abc" align="center"><p align="center" style="width:250px;background-color:#DDDDDD;color:BLACK;font-size: 20px;border-radius: 12px;">PRODUCT PAGE</p></div>
        <!-- <h1 align="center"><button type="button" class="btn btn-outline-secondary">Product Page</button></h1><br></br> -->

        <a href="<?php echo base_url(); ?>admin/home/add_product"><input style="float:left" type="submit" name="insert" value="Add Product" class="btn btn-info"></a><br>
        <a href="<?php echo base_url(); ?>admin/home/out_of_stock_item_list"><input style="float:right;" type="submit" name="out_stk" value="OUT OF STOCKS" class="btn btn-danger"></a><br>

        <?php
        if($this->uri->segment(3)=="delete"){
          echo '<p class="text-success">Your product has been deleted successfully</p>';
        } ?>
        <?php
        if($this->uri->segment(3)=="product_inserted"){
          echo '<p class="text-success">Your product has been added successfully</p>';
        } ?>
        <?php
        if($this->uri->segment(3)=="product_update"){
          echo '<p class="text-success">Your product has been updated successfully</p>';
        } ?>
        <?php if($error  = $this->session->flashdata('out')){ ?>
        <p style="color:green"> <?php echo $error; ?></p>
        <?php } ?>
        <?php if($error  = $this->session->flashdata('in')){ ?>
        <p style="color:red"> <?php echo $error; ?></p>
        <?php } ?>
          <div class="table-responsive">
          <table class="table table-bordered">
              <tr>
              <th></th>

              <th>Name</th>
                <th>Category</th>
              <th>Price</th>
              <th>Old Price</th>
              <th>Shipping Cost</th>
              <th>Description</th>
              <th>Image</th>

              <th>Click to change availability</th>
              <!-- <th>Mark In Stock</th> -->
              <th>Update</th>
              <th>Delete</th>

            </tr>

            <?php $i=1; foreach($products as $prdct){ ?>
            <tr>
              <td><?php echo $i; ?></td>

              <td class="text-capitalize"><?php echo $prdct['product_title']; ?></td>
                <td class="text-capitalize"><?php echo $prdct['cat_title']; ?></td>
              <td><?php echo $prdct['product_price']; ?></td>
              <td><?php echo $prdct['old_price']; ?></td>
              <td><?php echo $prdct['shipping']; ?></td>
              <td><?php echo $prdct['product_desc']; ?></td>
              <td><img style="height:70px; width:90px" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image']; ?>" ></td>
              <!-- <td><?php echo $prdct['product_keywords']; ?></td> -->
              <td><a href="<?php echo base_url(); ?>admin/home/out_of_stock/<?php echo $prdct['product_id']; ?>"><b  style="color:red;"><?php echo $prdct['out_stk']; ?></b><a href="<?php echo base_url(); ?>admin/home/in_stock/<?php echo $prdct['product_id']; ?>" ><b  style="color:green;"><?php echo $prdct['in_stk']; ?></b></td>
              <!-- <td><a href="<?php echo base_url(); ?>admin/home/in_stock/<?php echo $prdct['product_id']; ?>"><b  style="color:green;"><?php echo $prdct['in_stk']; ?></b></td> -->
              <td><a href="<?php echo base_url(); ?>admin/home/update_product/<?php echo $prdct['product_id']; ?>" class="update _data" id="<?php echo $prdct['product_id']; ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></td>
              <td><a href="<?php echo base_url(); ?>admin/home/delete_product/<?php echo $prdct['product_id']; ?>" class="delete_data"  onclick="return myConfirm();" id="<?php echo $prdct['product_id']; ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
            </tr>
          <?php $i++; } ?>
            <p style="display:inline;" ><?php echo $this->pagination->create_links(); ?></p>
          </table>
          </div>
      <!-- </div> -->

  <?php } ?>
      <!-- <ul class="pagination">
        <li><a href=""><</a></li>
      </ul> -->
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->

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
