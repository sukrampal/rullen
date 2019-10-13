<?php
if(isset($update)){
  foreach($update as $edit){ ?>

      <form method ="post" action="<?php echo base_url(); ?>home/update_details">
        <h3 align="center" style="padding-top:20px;padding-bottom:20px"><button type="button" class="btn btn-outline-secondary">Update Your Profile</button></h3>
    <div class="form-group1 col-md-6 col-md-offset-3">
    <label>Username</label>
    <input type="text" name="username" value="<?php echo $edit['username']; ?>" class="form-control" autocomplete="off"/>
    <span class="text-danger"><p style="color:red"<?php echo form_error("username"); ?></span>
    </div>
    <div class="form-group col-md-6 col-md-offset-3">
    <label>Phone</label>
    <input type="number" name="phone" value="<?php echo $edit['phone']; ?>" class="form-control" autocomplete="off"/>
    <span class="text-danger"><p style="color:red"<?php echo form_error("phone"); ?></span>
    </div>
    <div class="form-group col-md-6 col-md-offset-3">
    <label>Street Address</label>
    <input type="text" name="address" value="<?php echo $edit['address']; ?>" class="form-control" autocomplete="off"/>
    <span class="text-danger"><p style="color:red"<?php echo form_error("address"); ?></span>
    </div>
    <div class="form-group col-md-6 col-md-offset-3">
    <label>Suburb</label>
    <input type="text" name="suburb" value="<?php echo $edit['suburb']; ?>" class="form-control" autocomplete="off"/>
    <span class="text-danger"><p style="color:red"<?php echo form_error("suburb"); ?></span>
    </div>
    <div class="form-group col-md-6 col-md-offset-3">
    <label>City</label>
    <input type="text" name="city" value="<?php echo $edit['city']; ?>" class="form-control" autocomplete="off"/>
    <span class="text-danger"><p style="color:red"<?php echo form_error("city"); ?></span>
    </div>
    <div class="form-group col-md-6 col-md-offset-3">
    <label>Postcode</label>
    <input type="text" name="postcode" value="<?php echo $edit['postcode']; ?>" class="form-control" autocomplete="off"/>
    <span class="text-danger"><p style="color:red"<?php echo form_error("postcode"); ?></span>
    </div>
    <div class="form-group col-md-6 col-md-offset-3">
    <label>Country</label>
    <input type="text" name="country" value="<?php echo $edit['country']; ?>" class="form-control" autocomplete="off"/>
    <span class="text-danger"><p style="color:red"<?php echo form_error("country"); ?></span>
    </div>
    <div class="form-group col-md-6 col-md-offset-3" style="padding-bottom:50px;">
      <!-- <input type = "hidden" name ="hidden_id" value="<?php echo $user_id = $this->session->userdata('id'); ?>" /> -->
      <input  type="submit" name="update" value="Update" class="btn btn-info" />
    </div>
    </form>

  <?php } ?>
  <?php }else{ ?>

<div class="container row text-caapitalization">
<div class="styleforh4">

<h4 style="color:#666666; font-family:Arial;padding-top:10px; padding-left:20px;"> The following addresses will be used on the checkout page by default.</h4>
<a href="<?php echo base_url(); ?>home/update_profile" ><p style="padding-left:20px;font-size:30px;color:#d9af64;padding-top:15px;padding-bottom:15px;"> Your Details  <button style="font-size:15px;font-style:italic" type="button" class="btn btn-link">Edit</button></p></a>
<?php if($error = $this->session->flashdata('success_msg')) { ?>
  <p style="color: green;padding-left:20px;"><strong>Success!</strong> <?php echo  $error; ?><p>
<?php } ?>
<?php if($error = $this->session->flashdata('unsubscribe')) { ?>
  <p style="color:green;padding-left:20px;"> <?php echo  $error; ?><p>
<?php } ?>
<?php foreach ($userdetail as $ud){  ?>
  <h4 class="text-capitalize"> Name: <?php base_url(); echo $ud['username']; ?></h4>
<h4> Email Id: <?php echo $ud['email']; ?></h4>
<h4 class="text-capitalize"> Phone No.: <?php echo $ud['phone']; ?></h4>
<h4 class="text-capitalize"> Street Address: <?php echo $ud['address']; ?></h4>
<h4 class="text-capitalize"> Suburb: <?php echo $ud['suburb']; ?></h4>
<h4 class="text-capitalize"> City: <?php echo $ud['city']; ?></h4>
<h4 class="text-capitalize"> Postcode: <?php echo $ud['postcode']; ?></h4>
<h4 class="text-capitalize"> Country: <?php echo $ud['country']; ?></h4>
<h4 class="text-capitalize" style="padding-bottom:10px;color:#666666;"><a href="<?php echo base_url(); ?>home/unsubscribe/<?php echo $unsub_btn['serial_no']; ?>"><b style="color:#337ab7"><?php echo $unsub_btn['unsub_btn']; ?></a></b></h4>
<?php } ?>
</div>

</div>

<?php } ?>
<style>
.styleforh4 h4{
color:#666666;padding-left:30px;padding-top:10px;font-style:italic;font-family:Raleway;
}
</style>
