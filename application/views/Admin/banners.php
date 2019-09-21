<div class="container">
  <?php
if(isset($update_bnr)){
   foreach ($update_bnr as $bnr); { ?>
       <h3 align="center"><button type="button" class="btn btn-outline-secondary">Update Banner</button></h3>
    <form method ="post" action="<?php echo base_url(); ?>admin/home/update_banner" enctype="multipart/form-data">
      <div class="table-responsive">
      <table class="table table-bordered">
        <tr>
        <th>Banner Location</th>
      </tr>
      <tr>
        <td><?php echo $bnr['title']; ?></td>
      </tr>
    </table>
    </div>
      <div class="form-group">
      <label></label>
      <input type="file" name="image" id="image" value="" class="form-control" onchange="validateImage('image')" required/>
      </div>
      <div class="form-group">
        <input type = "hidden" name ="hidden_id" value="<?php echo $bnr['id']; ?>" />
        <input type="submit" name="update" value="Update" class="btn btn-info" />
      </div>
    </form>
    <div class="table-responsive">
    <table class="table table-bordered">
        <tr>
        <th>Banner Id</th>
        <th>Banner Location</th>
        <th>Banner Image</th>
        <th>Update</th>
      </tr>

      <?php foreach ($banner as $bnr) { ?>
      <tr>
        <td><?php echo $bnr['id']; ?></td>
        <td><?php echo $bnr['title']; ?></td>
        <td><img style="width:150px; height:80px" src="<?php echo base_url(); ?>assets/img/banner/<?php echo $bnr['image']; ?>"></td>
        <td><a href="<?php echo base_url(); ?>admin/home/show_update_banner/<?php echo $bnr['id']; ?>" class="update _data" ><button type="button" class="btn btn-warning btn-sm">Update</button></td>
      </tr>
        <?php } ?>


      </tabel>
    </div>
  <?php }
}else{ ?>
    <h3 align="center"><button type="button" class="btn btn-outline-secondary">Banner Image</button></h3>
    <?php
    if($this->uri->segment(3) == "banner_updated"){
    echo '<p class="text-success">Your banner has been updated successfully</p>';
    } ?>
<div class="table-responsive">
<table class="table table-bordered">
    <tr>
    <th>Banner Id</th>
    <th>Banner Name</th>
    <th>Banner Image</th>
    <th>Update</th>
  </tr>

  <?php foreach ($banner as $bnr) { ?>
  <tr>
    <td><?php echo $bnr['id']; ?></td>
    <td><?php echo $bnr['title']; ?></td>
    <td><img style="width:150px; height:80px" src="<?php echo base_url(); ?>assets/img/banner/<?php echo $bnr['image']; ?>"></td>
    <td><a href="<?php echo base_url(); ?>admin/home/show_update_banner/<?php echo $bnr['id']; ?>" class="update _data" ><button type="button" class="btn btn-warning btn-sm">Update</button></td>
  </tr>
    <?php } ?>


  </tabel>
</div>
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
    if (file.size < 1024) {
        alert('Image size should be more than 1MB');
        document.getElementById(id).value = '';
        return false;
    }
    return true;
}
</script>
