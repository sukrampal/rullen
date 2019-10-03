<!-- <h3 style="text-align:center; padding-top:20px" >Forget Your password</h3> -->
<p style="text-align:center; padding-top:10px;color:green;"> An OTP has been sent to you at your registered email address,<br> please enter below</p>
<br>
<div class="container">
  <div class="col-md-4 col-md-offset-4">

          <form method="post" action="<?php echo base_url(); ?>cart/otp_verification">

               <div class="form-group">
                    <label>Enter Your OTP: </label>
                    <input type="number" name="otp" class="form-control"  />
                    <span class="text-danger"><p style="color: red" <?php echo form_error('otp'); ?> </span>
               </div>
               <div class="form-group">
                    <input type="submit" name="insert" value="Submit" class="btn btn-info" />
               </div>
               <?php if($error = $this->session->flashdata('verify_otp')){ ?>
                 <p style="color: red;"> <?php echo  $error; ?><p>
             <?php  }  ?>
          </form>
     </div>
   </div>
