
  <?php if($error = $this->session->flashdata('msg')){ ?>
       <p style="color: green;"><strong>Success!</strong> <?php echo  $error; ?><p>
  <?php } ?>

<form action="<?php echo base_url(); ?>home/send" method="post">
   <input type="email" name="email" class="form-control" placeholder="Enter Email" required><br>
   <textarea name="message" class="form-control" placeholder="Enter message here" required></textarea><br>
   <button type="submit" class="btn btn-primary">Send Message</button>
</form>
