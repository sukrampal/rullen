
        <!-- sukram -->
        <h1 align="center"><button type="button" class="btn btn-outline-secondary">Product Page</button></h1><br></br>
        <a href="<?php echo base_url(); ?>admin/home/add_product"><input type="submit" name="insert" value="Add Product" class="btn btn-info"></a><br>

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
          <div class="table-responsive">
          <table class="table table-bordered">
              <tr>
              <th>Product id</th>
              <th>Category</th>
              <th>Name</th>
              <th>Price</th>
              <th>Old Price</th>
              <th>Description</th>
              <th>Image</th>
              <th>keywords</th>
              <th>Delete</th>
              <th>Update</th>
            </tr>

            <?php foreach($products as $prdct){ ?>
            <tr>
              <td><?php echo $prdct['product_id']; ?></td>
              <td><?php echo $prdct['product_cat']; ?></td>
              <td><?php echo $prdct['product_title']; ?></td>
              <td><?php echo $prdct['product_price']; ?></td>
              <td><?php echo $prdct['old_price']; ?></td>
              <td><?php echo $prdct['product_desc']; ?></td>
              <td><img style="height:70px; width:90px" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image']; ?>" ></td>
              <td><?php echo $prdct['product_keywords']; ?></td>
              <td><a href="<?php echo base_url(); ?>admin/home/delete_product/<?php echo $prdct['product_id']; ?>" class="delete_data"  onclick="return myConfirm();" id="<?php echo $prdct['product_id']; ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
              <td><a href="<?php echo base_url(); ?>admin/home/update_product/<?php echo $prdct['product_id']; ?>" class="update _data" id="<?php echo $prdct['product_id']; ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></td>
            </tr>
          <?php } ?>

            </tabel>
          </div>
      </div>

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
