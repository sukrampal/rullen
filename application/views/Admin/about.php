<div class="container">
  <?php if(isset($about_text)){ ?>
  <h3 align="center"><button type="button" class="btn btn-outline-secondary">Update About Us Page</button></h3>
  <?php if($error = $this->session->flashdata('msg')){ ?>
    <p style="color:green"><b>Success,</b><?php echo $error; ?></p>
  <?php } ?>
<!-- <div class="table-responsive table table-bordered col-md-7">
  <?php foreach($about_text as $a){  ?>
<td>
  <?php echo $a['about']; ?>
</td>
<?php } ?>

</div> -->
<form method="post" action="<?php echo base_url(); ?>admin/home/update_about">
<div class="form-group col-md-7" >
<label>About Us</label>
<?php foreach($about_text as $a) { ?>
<textarea name="about"  class="form-control" autocomplete="off"/><?php echo $a['about']; ?></textarea>
<?php } ?>
<span class="text-danger"><?php echo form_error("about") ?></span>
</div>
<div class="form-group">
  <!-- <input type = "hidden" name ="hidden_id" value="" /> -->
  <input type="submit" name="update" value="Update" class="btn btn-info" />
</div>
</form>
<?php }else{ ?>
  <h3 align="center"><button type="button" class="btn btn-outline-secondary">Update Footer Context</button></h3>
  <?php if($error = $this->session->flashdata('context')){ ?>
    <p style="color:green"><b>Success,</b><?php echo $error; ?></p>
  <?php } ?>
<!-- <div class="table-responsive table table-bordered col-md-7">

<td>
  <?php echo $footer_context['text']; ?>
</td>


</div> -->
<form method="post" action="<?php echo base_url(); ?>admin/home/update_footer_context">
<div class="form-group col-md-7" >
<label>Footer Context</label>

<textarea name="text"  class="form-control" autocomplete="off"/><?php echo $footer_context['text']; ?></textarea>

<span class="text-danger"><?php echo form_error("text") ?></span>
</div>
<div class="form-group">
  <!-- <input type = "hidden" name ="hidden_id" value="" /> -->
  <input type="submit" name="update" value="Update" class="btn btn-info" />
</div>
</form>
<?php } ?>
</div>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'about' );
</script>
<script>
    CKEDITOR.replace( 'text' );
</script>
