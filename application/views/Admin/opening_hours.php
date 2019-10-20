<div class="container">
  <?php if(isset($change_time)){ ?>
    <?php foreach($change_time as $edit){ ?>
    <!-- <h3 align="center"><button type="button" class="btn btn-outline-secondary">UPDATE HOURS</button></h3> -->
    <div class="abc" align="center"><p align="center" style="width:250px;background-color:#DDDDDD;color:BLACK;font-size: 20px;border-radius: 12px;">UPDATE HOURS</p></div>
    <form method ="post" action="<?php echo base_url(); ?>admin/home/time_changed">
  <div class="form-group">
  <label><?php echo $edit['days']; ?></label>
  <input type="text" name="time" value="<?php echo $edit['timing']; ?>" class="form-control" autocomplete="off" required/>
  <span class="text-danger"><?php echo form_error("time"); ?></span>
  </div>
  <div class="form-group">
    <input type = "hidden" name ="hidden_id" value="<?php echo $edit['id']; ?>" />
    <input type="submit" name="update" value="Update" class="btn btn-info" />
  </div>
  </form>
<?php } ?>
    <div class="table-responsive">
    <table class="table table-bordered" style="margin:0px;">
        <tr>
        <th>Days</th>
        <th>Timimg</th>
        <th>Update</th>
      </tr>
          <?php foreach($opening_hours as $oh){  ?>
      <tr>
      <td><?php echo $oh['days']; ?></td>
        <td><?php echo $oh['timing']; ?></td>
        <td><a href="<?php echo base_url(); ?>admin/home/change_time/<?php echo $oh['id']; ?>" class="update _data" ><button type="button" class="btn btn-success btn-sm">Change</button></td>

      </tr>
        <?php } ?>
      </tabel>
    </div>


<?php }else{ ?>
<!-- <h3 align="center"><button type="button" class="btn btn-outline-secondary">OPENING HOURS</button></h3> -->
<div class="abc" align="center"><p align="center" style="width:250px;background-color:#DDDDDD;color:BLACK;font-size: 20px;border-radius: 12px;">OPENING HOURS</p></div>
<?php if($error = $this->session->flashdata('time')) { ?>
  <p style="color:green;"><?php echo $error; ?></p>
<?php } ?>
<div class="table-responsive">
<table class="table table-bordered" style="margin:0px;">
    <tr>
    <th>Days</th>
    <th>Timimg</th>
    <th>Update</th>
  </tr>
      <?php foreach($opening_hours as $oh){  ?>
  <tr>
  <td><?php echo $oh['days']; ?></td>
    <td><?php echo $oh['timing']; ?></td>
    <td><a href="<?php echo base_url(); ?>admin/home/change_time/<?php echo $oh['id']; ?>" class="update _data" ><button type="button" class="btn btn-success btn-sm">Change</button></td>

  </tr>
    <?php } ?>
  </tabel>
</div>
<?php } ?>
</div>
