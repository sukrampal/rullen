<div class="container">
  <h3 align="center"><button type="button" class="btn btn-outline-secondary">Update About Us Page</button></h3>
  <?php if($error = $this->session->flashdata('msg')){ ?>
    <p style="color:green"><b>Success,</b><?php echo $error; ?></p>
  <?php } ?>
<div class="table-responsive table table-bordered col-md-7">
  <?php foreach($about_text as $a){  ?>
<td>
  <?php echo $a['about']; ?>
</td>
<?php } ?>

</div>
<form method="post" action="<?php echo base_url(); ?>admin/home/update_about">
<div class="form-group col-md-7" >
<label>About Us</label>
<textarea name="about" class="form-control" autocomplete="off"/></textarea>
<span class="text-danger"><?php echo form_error("about") ?></span>
</div>
<div class="form-group">
  <!-- <input type = "hidden" name ="hidden_id" value="" /> -->
  <input type="submit" name="update" value="Update" class="btn btn-info" />
</div>
</form>


</div>
