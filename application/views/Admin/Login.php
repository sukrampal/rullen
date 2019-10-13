<!DOCTYPE html>
<html>
<head>
<title>Admin</title>


     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
<div class="container">
  <div class="col-md-4 col-md-offset-3">
    <h1><b> Rullen Furniture </h1>
    <h3>Admin Panel</b></h3>
 <!-- Tabs Titles -->
          <br /><br /><br />
          <form method="post" action="<?php echo base_url(); ?>admin/home/login_validation">
               <div class="form-group">
                    <label>Enter Username</label>
                    <input type="text" name="username" class="form-control" autocomplete="off" />
                    <span class="text-danger"><?php echo form_error('username'); ?></span>
               </div>
               <div class="form-group">
                    <label>Enter Password</label>
                    <input type="password" name="password" class="form-control" />
                    <span class="text-danger"><?php echo form_error('password'); ?></span>
               </div>
               <div class="form-group">
                    <input type="submit" name="insert" value="Login" class="btn btn-info" />
                    <?php
                         echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';
                    ?>
               </div>
               <a href="<?php echo base_url(); ?>admin/home/forget_password">Lost your password?</a><br>
          
          </form>
          <?php if($error = $this->session->flashdata('msg')) { ?>
          <p style="color: green;"><strong>Success!</strong> <?php echo  $error; ?><p>
          <?php } ?>
     </div>
   </div>
</body>
</html>

<style>
.container {
  text-align: center;
  /* float: right; */
}
h1{
  color: green;
}
</style>
