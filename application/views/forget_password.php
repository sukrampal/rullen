<h3 style="text-align:center; padding-top:20px" >Forget Your password</h3>
<h4 style="text-align:center; padding-top:10px"> Please enter your email address to retreive your password</h4>
<br>
<div class="container">
  <div class="col-md-4 col-md-offset-4">

          <form method="post" action="<?php echo base_url(); ?>home/retrieve_password">
               <div class="form-group">
                    <label>Email: </label>
                    <input type="text" name="email" class="form-control"  />
                    <span class="text-danger"><p style="color: red" <?php echo form_error('email'); ?> </span>
               </div>
               <div class="form-group">
                    <input type="submit" name="insert" value="Submit" class="btn btn-info" />
               </div>
               <?php if($error = $this->session->flashdata('msg')){ ?>
                 <p style="color: green;"><strong>Success!</strong> <?php echo  $error; ?><p>
             <?php  }  ?>
             <?php if($error = $this->session->flashdata('error1')){ ?>
               <p style="color: #a94442;"><strong>Sorry!</strong> <?php echo  $error; ?><p>
           <?php  }  ?>
          </form>
     </div>
   </div>

<!-- <style>
.container1{
  padding-top: 20px;
}
</style> -->
