

        <!-- sukram  -->

    <div class="container">
      <?php
      if(isset($update)){
        foreach($update as $edit){ ?>

            <form method ="post" action="<?php echo base_url(); ?>admin/home/add_category">
              <h3 align="center"><button type="button" class="btn btn-outline-secondary">Update Product Category</button></h3>
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
                  <table class="table table-bordered">
                  <tr>
                    <th>Category id</th>
                    <th>Category Name</th>
                    <th>Delete</th>
                    <th>Update</th>
                  </tr>
                  <?php foreach($category as $cat){  ?>
                    <tr>
                    <td><?php echo $cat['cat_id']; ?></td>
                    <td><?php echo $cat['cat_title']; ?></td>
                    <td><a href="<?php echo base_url(); ?>admin/home/delete_category/<?php echo $cat['cat_id']; ?>" class="delete_data"  onclick="return myConfirm();" id="<?php echo $cat['cat_id']; ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                    <td><a href="<?php echo base_url(); ?>admin/home/update_category/<?php echo $cat['cat_id']; ?>" class="update _data" id="<?php echo $cat['cat_id']; ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></td>
                    </tr><?php } ?>

      <?php  }
    }else{ ?>

      <form method ="post" action="<?php echo base_url(); ?>admin/home/add_category">
        <h3 align="center"><button type="button" class="btn btn-outline-secondary">Add Product Category</button></h3>
        <?php
          if($this->uri->segment(3)=="inserted"){
            echo '<p class="text-success">Category added successfully</p>';
          } ?>
          <?php
            if($this->uri->segment(3)=="deleted"){
              echo '<p class="text-success">Category deleted successfully</p>';
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
        <table class="table table-bordered">
        <tr>
          <th>Category id</th>
          <th>Category Name</th>
          <th>Delete</th>
          <th>Update</th>
        </tr>
        <?php foreach($category as $cat){  ?>
          <tr>
          <td><?php echo $cat['cat_id']; ?></td>
          <td><?php echo $cat['cat_title']; ?></td>
          <td><a href="<?php echo base_url(); ?>admin/home/delete_category/<?php echo $cat['cat_id']; ?>" class="delete_data"  onclick="return myConfirm();" id="<?php echo $cat['cat_id']; ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
          <td><a href="<?php echo base_url(); ?>admin/home/update_category/<?php echo $cat['cat_id']; ?>" class="update _data" id="<?php echo $cat['cat_id']; ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></td>
          </tr>
        <?php } ?>
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
