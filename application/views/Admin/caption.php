<div class="container">
  <h3 align="center"><button type="button" class="btn btn-outline-secondary">Update Captions</button></h3>
  <?php if($error = $this->session->flashdata('msg')){ ?>
    <p style="color:green"><b>Success,</b><?php echo $error; ?></p>
  <?php } ?>
<div class="table-responsive table table-bordered col-md-7 text-capitalize">
  <?php foreach($captions as $a){  ?>
<td>
  <b>1st Caption:</b> <?php echo $a['caption1']; ?>
</td>
<br>
<td>
<b>2nd Caption:</b> <?php echo $a['caption2']; ?>
</td>
<?php } ?>

</div>
<?php foreach($captions as $c){ ?>
<form method="post" action="<?php echo base_url(); ?>admin/home/update_caption">
<div class="form-group col-md-7" >
<label>1st Caption</label>
<input type="text" name="caption1" value="<?php echo $c['caption1']; ?>" class="form-control" autocomplete="off"/></textarea>
<span class="text-danger"><?php echo form_error("caption1") ?></span>
</div>
<div class="form-group col-md-7" >
<label>2nd Caption</label>
<input type="text" name="caption2" value="<?php echo $c['caption2']; ?>" class="form-control" autocomplete="off"/></textarea>
<span class="text-danger"><?php echo form_error("caption2") ?></span>
</div>
<div class="form-group">
  <input type="submit" name="update" value="Update" class="btn btn-info" />
</div>
</form>
<?php } ?>

</div>
