<!-- <h3 align="center"><button type="button" class="btn btn-outline-secondary">Subscribed Users</button></h3> -->
<div class="abc" align="center"><p align="center" style="width:250px;background-color:#DDDDDD;color:BLACK;font-size: 20px;border-radius: 12px;">SUBSCRIBERS</p></div>
<div class="table-responsive">
  <form method="post" action="<?php echo base_url(); ?>admin/home/mail_to_subscriber" enctype="multipart/form-data">

  <?php if($error = $this->session->flashdata('msg')){  ?>
    <p class="text-success" style="color:green"><?php echo $error; ?></p>
<?php  } ?>
<?php if($error = $this->session->flashdata('email')){  ?>
  <p class="text-danger" style="color:red"><?php echo $error; ?></p>
<?php  } ?>
<div class="col-8">
  <div class="form-group">
    <label>Upload your file: </label><br>
    <input type="file" name="file" value="<?php echo set_value('file'); ?>" ></input>
    <span class="text-danger"><?php echo form_error("file"); ?></span>
  </div>
</div>
<div class="col-8">
  <div class="form-group">
    <label>Enter Additional Information </label>
    <textarea class="form-control" name="subscribe" value="<?php echo set_value('file'); ?>"  placeholder="Enter product desc" ></textarea>
    <span class="text-danger"><?php echo form_error("subscribe"); ?></span>
  </div>
</div>
<p style="text-align:right">  <input type="submit" name="insert" value="Send Email" class="btn btn-info"></p>
<p> Total Number Of Subscribers On Our Website Are:  <strong><?php echo $total_sbscribe; ?></strong>.</p>
<table class="table table-bordered">
<tr>
  <th></th>
  <th>Select Email </th>
  <th>Email Id</th>
</tr>
<li><input type="checkbox" id="select_all" /> Select all</li>
  <?php $i =1; foreach ($subscribe as $s ){  ?>

<tr>
  <td><?php echo $i; ?></td>
  <td>
    <input type="checkbox" name="email[]" class="checkbox" value="<?php echo $s['email']; ?>"  />
  </td>
  <!-- <td><<?php echo $i; ?> </td> -->
  <td><?php echo $s['email']; ?></td>
</tr>
<?php $i++; } ?>
</table>
<?= $this->pagination->create_links(); ?>
</form>
</div>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('subscribe');
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });

    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>
