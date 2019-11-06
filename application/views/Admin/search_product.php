
        <!-- sukram -->
<div class="abc" align="center"><p align="center" style="width:350px;background-color:#DDDDDD;color:BLACK;font-size: 20px;border-radius: 12px;">SEARCHED ITEM(s)</p></div><br></br>
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
              <th></th>
             <th>Product</th>
              <th>Category</th>
              <th>Price</th>
              <th>Old Price</th>
              <th>Description</th>
              <th>Availability</th>
              <th>Delete</th>
              <th>Update</th>
            </tr>

            <?php $i = 1; foreach($products as $prdct){ ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><img style="height:70px; width:90px" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image']; ?>" ><br><?php echo $prdct['product_title']; ?></td>
              <td><?php echo $prdct['cat_title']; ?></td>
              <td><?php echo $prdct['product_price']; ?></td>
              <td><?php echo $prdct['old_price']; ?></td>
              <td><?php echo $prdct['product_desc']; ?></td>
              <td>
                <select id="selectbox" name="" onchange="javascript:location.href = this.value;">
              <option  value="" selected><?php echo $prdct['set_stk']; ?></option>
              <option value="<?php echo base_url(); ?>admin/home/in_stock/<?php echo $prdct['product_id']; ?>">Yes</option>
              <option value="<?php echo base_url(); ?>admin/home/out_of_stock/<?php echo $prdct['product_id']; ?>">No</option>
              </select>
              </td>
              <td><a href="<?php echo base_url(); ?>admin/home/delete_product/<?php echo $prdct['product_id']; ?>" class="delete_data"  onclick="return myConfirm();" id="<?php echo $prdct['product_id']; ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
              <td><a href="<?php echo base_url(); ?>admin/home/update_product/<?php echo $prdct['product_id']; ?>" class="update _data" id="<?php echo $prdct['product_id']; ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></td>
            </tr>
          <?php $i++; } ?>

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
