

<div class="container">
  <?php
  if(isset($single_product)){
  foreach($single_product as $prd){ ?>
    <form method="post" action="<?php echo base_url(); ?>admin/home/product_updated" enctype="multipart/form-data">
       <h3 align="center"><button type="button" class="btn btn-outline-secondary">Update Product Details</button></h3>
        <div class="col-8">
          <div class="form-group">
            <label>Product Name</label>
            <input type="text" value ="<?php echo $prd['product_title']; ?>" name="product_title" class="form-control" placeholder="Enter Product Name" required>
            <span class="text-danger"><?php echo form_error("product_title"); ?></span>
          </div>
        </div>
        <div class="col-8">
          <div class="form-group">
            <label>Category Number/Name</label>
            <select class="form-control category_list" name="product_cat" id="product_cat" >
              <?php foreach($product_cat as $prc){ ?>
              <option value = '<?php echo $prc['product_cat']; ?>'><?php echo $prc['product_cat']; ?></option>
            <?php } ?>
              <?php if(isset($category))
               foreach($category as $cat){ ?>
              <option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_title']; ?></option>
              <?php } ?>
            </select>
          </div>

        </div>
        <div class="col-8">
          <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" name="product_desc"  placeholder="Enter product desc" required><?php echo $prd['product_desc']; ?></textarea>
          </div>
        </div>

        <div class="col-8">
          <div class="form-group">
            <label>old Price</label>
            <input type="number" name="old_price" value="<?php echo $prd['old_price']; ?>"class="form-control" placeholder="Enter Product Old Price" required/>
            <span class="text-danger"><?php echo form_error("product_price"); ?></span>
          </div>
        </div>
        <div class="col-8">
          <div class="form-group">
            <label>Product Price</label>
            <input type="number" name="product_price" value="<?php echo $prd['product_price']; ?>"  class="form-control" placeholder="Enter Product Price" required>
            <span class="text-danger"><?php echo form_error("product_price"); ?></span>
          </div>
        </div>
        <div class="col-8">
          <div class="form-group">
            <label>Shipping Cost</label>
            <input type="number" name="shipping" value="<?php echo $prd['shipping']; ?>"  class="form-control" placeholder="Enter Shipping Cost" required>
            <span class="text-danger"><?php echo form_error("shipping"); ?></span>
          </div>
        </div>
        <div class="col-8">
          <div class="form-group">
            <label>Quantity</label>
            <input type="number" name="quantity" value="<?php echo $prd['qty']; ?>"  class="form-control" placeholder="Enter Quantity" required>
            <span class="text-danger"><?php echo form_error("qty"); ?></span>
          </div>
        </div>
        <div class="col-8">
          <div class="form-group">
            <label>Product Keywords <small></small></label>
            <input type="text" name="product_keywords" class="form-control" value="<?php echo $prd['product_keywords']; ?>" placeholder="Searchable words" required>
            <span class="text-danger"><?php echo form_error("product_keywords"); ?></span>
          </div>
        </div>


        <div class="col-8">
          <div class="form-group">
            <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
            <img style="height:60px; width:65px" src="<?php echo base_url(); ?>assets/img/<?php echo $prd['product_image']; ?>" />
            <input type="file" name="product_image0" value="<?php echo $prd['product_image']; ?>" class="form-control" >
            <input type="hidden" value="<?php echo $prd['product_image']; ?>" />
            <span class="text-danger"><?php echo form_error("userfile"); ?></span>
          </div>
        </div>
        <div class="col-8">
          <div class="form-group">
            <label>Product Image 1 <small>(format: jpg, jpeg, png)</small></label>
              <img style="height:60px; width:65px" src="<?php echo base_url(); ?>assets/img/<?php echo $prd['product_image1']; ?>" />
            <input type="file" name="product_image1" class="form-control" >
            <span class="text-danger"><?php echo form_error("userfile"); ?></span>
          </div>
        </div>
        <div class="col-8">
          <div class="form-group">
            <label>Product Image 2 <small>(format: jpg, jpeg, png)</small></label>
              <img style="height:60px; width:65px" src="<?php echo base_url(); ?>assets/img/<?php echo $prd['product_image2']; ?>" />
            <input type="file" name="product_image2" class="form-control">
            <span class="text-danger"><?php echo form_error("userfile"); ?></span>
          </div>
        </div>
        <div class="col-8">
          <div class="form-group">
            <label>Product Image 3 <small>(format: jpg, jpeg, png)</small></label>
              <img style="height:60px; width:65px" src="<?php echo base_url(); ?>assets/img/<?php echo $prd['product_image3']; ?>" />
            <input type="file" name="product_image3" class="form-control">
            <span class="text-danger"><?php echo form_error("userfile"); ?></span>
          </div>
        </div>
        <div class="col-8">
          <div class="form-group">
            <input type="checkbox" name="new_product"  placeholder="" autocomplete="off" >
            <label class="text-success"><b>List as New Product</b> </label>
          </div>
        </div>

        <div class="form-group">
          <input type = "hidden" name ="hidden_id" value="<?php echo $prd['product_id']; ?>" />
          <input type="submit" name="update" value="Update" class="btn btn-info" />
        </div>

    </form>
<?php } ?>
  <?php }else{ ?>


  <form method="post" action="<?php echo base_url(); ?>admin/home/do_upload" enctype="multipart/form-data">
     <h3 align="center" class="text-success">Please Enter Your Product Details Here</h3>
      <div class="col-8">
        <div class="form-group">
          <label>Product Name</label>
          <input type="text" name="product_title" class="form-control" placeholder="Enter Product Name" autocomplete="off" required >
          <span class="text-danger"><?php echo form_error("product_title"); ?></span>
        </div>
      </div>
      <div class="col-8">
        <div class="form-group">
          <label>Category Name</label>
          <select class="form-control category_list" name="product_cat" id="product_cat" required>
            <option value = 'null'>-Select Category-</option>
            <?php if(isset($category))
             foreach($category as $cat){ ?>
            <option value="<?php echo $cat['cat_id']; ?>" ><?php echo $cat['cat_title']; ?></option>
            <?php } ?>
          </select>
        </div>

      </div>
      <div class="col-8">
        <div class="form-group">
          <label>Product Description</label>
          <textarea class="form-control" name="product_desc" placeholder="Enter Product Description" autocomplete="off" required></textarea>
          <span class="text-danger"><?php echo form_error("product_desc"); ?></span>
        </div>
      </div>

      <div class="col-8">
        <div class="form-group">
          <label>Old Price</label>
          <input type="number" name="old_price" class="form-control" placeholder="Enter Product Price" >
          <span class="text-danger"><?php echo form_error("product_price"); ?></span>
        </div>
      </div>

      <div class="col-8">
        <div class="form-group">
          <label>Product Price</label>
          <input type="number" name="product_price" class="form-control" placeholder="Enter Product Price" required>
          <span class="text-danger"><?php echo form_error("product_price"); ?></span>
        </div>
      </div>
      <div class="col-8">
        <div class="form-group">
          <label>Shipping Cost</label>
          <input type="number" name="shipping"   class="form-control" placeholder="Enter Shipping Cost" required>
          <span class="text-danger"><?php echo form_error("shipping"); ?></span>
        </div>
      </div>
      <div class="col-8">
        <div class="form-group">
          <label>Quantity</label>
          <input type="number" name="quantity"   class="form-control" placeholder="Enter Quantity" required>
          <span class="text-danger"><?php echo form_error("quantity"); ?></span>
        </div>
      </div>
      <div class="col-8">
        <div class="form-group">
          <label>Product Keywords </label>
          <input type="text" name="product_keywords" class="form-control" placeholder="Searchable words" autocomplete="off" required>
          <span class="text-danger"><?php echo form_error("product_keywords"); ?></span>
        </div>
      </div>


      <div class="col-8">
        <div class="form-group">
          <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
          <input type="file" name="product_image0" id="product_image0" onchange="validateImage('product_image0')" class="form-control" required>
          <span class="text-danger"><?php echo form_error("product_image0"); ?></span>
        </div>
      </div>
      <div class="col-8">
        <div class="form-group">
          <label>Product Image 1 <small>(format: jpg, jpeg, png)</small></label>
          <input type="file" name="product_image1" id="product_image1" class="form-control" onchange="validateImage('product_image1')" required>
          <span class="text-danger"><?php echo form_error("product_image1"); ?></span>
        </div>
      </div>
      <div class="col-8">
        <div class="form-group">
          <label>Product Image 2 <small>(format: jpg, jpeg, png)</small></label>
          <input type="file" name="product_image2" id="product_image2" class="form-control" onchange="validateImage('product_image2')" required>
          <span class="text-danger"><?php echo form_error("product_image2"); ?></span>
        </div>
      </div>
      <div class="col-8">
        <div class="form-group">
          <label>Product Image 3 <small>(format: jpg, jpeg, png)</small></label>
          <input type="file" name="product_image3" id="product_image3" class="form-control" onchange="validateImage('product_image3')" required>
          <span class="text-danger"><?php echo form_error("product_image3"); ?></span>
        </div>
      </div>
      <br>
      <div class="col-8">
        <div class="form-group">
          <input type="checkbox" name="new_product"  placeholder="" autocomplete="off" >
          <label class="text-success"><b>List as New Product</b> </label>
        </div>
      </div>

      <div class="form-group">
        <input type="submit" name="insert" value="Add Product" class="btn btn-info">
      </div>

  </form>
<?php } ?>
</div>

<script type="text/javascript">

function validateImage(id) {
    var formData = new FormData();

    var file = document.getElementById(id).files[0];

    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png") {
        alert('Please select a valid image either of JPEG,JPG,PNG format');
        document.getElementById(id).value = '';
        return false;
    }
    // if (file.size < 1024000) {
    //     alert('Image size should be more than 1MB');
    //     document.getElementById(id).value = '';
    //     return false;
    // }
    return true;
}
</script>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'product_desc' );
</script>
