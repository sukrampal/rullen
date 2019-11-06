

        <!-- sukram  -->

    <div style="padding-top:50px" class="container">
      <?php
      if(isset($update)){
        foreach($update as $edit){ ?>

            <form method ="post" action="<?php echo base_url(); ?>admin/home/add_category">
              <!-- <p align="center" style="width:250px;background-color:#DDDDDD;border-bottom: 2px solid #007bff;color:BLACK;font-size: 20px;">UPDATE CATEGORY PAGE</p> -->
              <!-- <h3 align="center"><button type="button" class="btn btn-outline-secondary">Update Product Category</button></h3> -->
          <div class="form-group">
          <label>Category name</label>
          <input type="text" name="cat_title" value="<?php echo $edit['cat_title']; ?>" class="form-control" autocomplete="off"/>
          <span class="text-danger"><?php echo form_error("cat_title"); ?></span>
          </div>
          <div class="form-group">
            <input type = "hidden" name ="hidden_id" value="<?php echo $edit['cat_id']; ?>" />
            <input type="submit" name="update" value="Update" class="btn btn-info" />
          </div>
          </form>
          <br></br>
                  <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                  <tr>
                    <td style="width:1px">Category No.</td>
                    <td>Category Name</td>
                    <td>Delete</td>
                    <td>Update</td>
                  </tr>
                </thead>
                  <?php $i = 1; foreach($category as $cat){  ?>
                    <tr>

                    <td ><?php echo $i; ?></td>
                    <td><?php echo $cat['cat_title']; ?></td>
                    <td><a href="<?php echo base_url(); ?>admin/home/delete_category/<?php echo $cat['cat_id']; ?>" class="delete_data"  onclick="return myConfirm();" id="<?php echo $cat['cat_id']; ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                    <td><a href="<?php echo base_url(); ?>admin/home/update_category/<?php echo $cat['cat_id']; ?>" class="update _data" id="<?php echo $cat['cat_id']; ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></td>
                    </tr><?php $i++; } ?>

      <?php  }
    }else{ ?>

      <form method ="post" action="<?php echo base_url(); ?>admin/home/add_category">
        <!-- <p align="center" style="width:150px;background-color:#DDDDDD;border-bottom: 2px solid #007bff;color:BLACK;font-size: 20px;">ADD CATEGORY</p> -->
        <!-- <p align="center" style="width:150px;border: 1px solid gray;border-radius: 12px;color:white;font-size: 20px;background-color:#007bff">ADD CATEGORY</p> -->
        <!-- <h3 align="center"><button type="button" class="btn btn-outline-secondary">Add Product Category</button></h3> -->
        <?php
          if($this->uri->segment(3)=="inserted"){
            echo '<p class="text-success">Category added successfully</p>';
          } ?>
          <?php
            if($this->uri->segment(3)=="deleted"){
              echo '<p class="text-danger">Category deleted successfully</p>';
            } ?>
            <?php
              if($this->uri->segment(3)=="updated"){
                echo '<p class="text-success">Category updated successfully</p>';
              } ?>
          <div class="form-group">
          <label>Category name</label>
          <input type="text" name="cat_title" class="form-control" autocomplete="off"/>
          <span class="text-danger"><?php echo form_error("cat_title"); ?></span>
          </div>
          <div class="form-group">
            <input type="submit" name="insert" value="Add" class="btn btn-info">
          </div>
        </form>
<br></br>
        <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
        <tr>
          <td style="width:1px;">Category No.</td>
          <td>Category Name</td>
          <td>Delete</td>
          <td>Update</td>
        </tr>
      </thead>
        <?php $i = 1; foreach($category as $cat){  ?>
          <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $cat['cat_title']; ?></td>
          <td><a href="<?php echo base_url(); ?>admin/home/delete_category/<?php echo $cat['cat_id']; ?>" class="delete_data"  onclick="return myConfirm();" id="<?php echo $cat['cat_id']; ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
          <td><a href="<?php echo base_url(); ?>admin/home/update_category/<?php echo $cat['cat_id']; ?>" class="update _data" id="<?php echo $cat['cat_id']; ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></td>
          </tr>
        <?php $i++; } ?>
      <?php } ?>
        </table>
        </div>





      </div>



      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->

<script>
function myConfirm() {
  var result = confirm("Do you want to delete the particular category?");
  if (result==true) {
   return true;
  } else {
   return false;
  }
}
</script>
