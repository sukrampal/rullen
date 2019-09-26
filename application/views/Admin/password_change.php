<h3 style="text-align:center; padding-top:20px" >Want to change Your password!</h3>
<h4 style="text-align:center; padding-top:10px"> Please fill up following details to change your password</h4>
<br>
<div class="container">
  <div class="col-md-6 col-md-offset-3">
    <?php if($error = $this->session->flashdata('msg')){ ?>
      <p style="color: red;"><strong><b>Error!</b></strong> <?php echo  $error; ?><p>
  <?php  }  ?>
  <?php if($error = $this->session->flashdata('msg1')){ ?>
    <p style="color: green;"><strong><b>Congratulatio</b></strong> <?php echo  $error; ?><p>
<?php  }  ?>

          <form method="post" action="<?php echo base_url(); ?>admin/home/change_password">
            <input type="hidden" name="user_id" value="<?php echo $user = $this->session->userdata('id');  ?>" />

            <div class="form-group">
                 <label>Username</label>
                 <input type="text" name="uname" class="form-control"  />
                 <span class="text-danger"><p style="color: red" <?php echo form_error('uname'); ?> </span>
            </div>
               <div class="form-group">
                    <label>Old Password </label>
                    <input type="password" name="old_pass" class="form-control"  />
                    <span class="text-danger"><p style="color: red" <?php echo form_error('old_pass'); ?> </span>
               </div>
               <div class="form-group">
                    <label>New Password </label>
                    <input type="password" name="new_pass" class="form-control"  />
                    <span class="text-danger"><p style="color: red" <?php echo form_error('new_pass'); ?> </span>
               </div>
               <div class="form-group">
                    <label>Confirm Password </label>
                    <input type="password" name="c_pass" class="form-control"  />
                    <span class="text-danger"><p style="color: red" <?php echo form_error('c_pass'); ?> </span>
               </div>

               <div class="form-group">
                    <input type="submit" name="insert" value="Submit" class="btn btn-info" />
               </div>

          </form>
     </div>
   </div>
