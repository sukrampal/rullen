
<form method ="post" action="<?php echo base_url(); ?>admin/home/generate_report">
  <h3 align="center"><button type="button" class="btn btn-outline-secondary">Get Your Report</button></h3>
    <div class="col-8">
    <div class="form-group">
    <label>From:</label>
    <input type="text" name="from" value="<?php echo set_value('from'); ?>" placeholder="YYYY-DD-MM" id="from" class="form-control" autocomplete="off"/>
    <span class="text-danger"><?php echo form_error("from"); ?></span>
    </div>
  </div>
  <div class="col-8">
    <div class="form-group">
    <label>To:</label>
    <input type="text" name="to" id="to" value="<?php echo set_value('to'); ?>" placeholder="YYYY-DD-MM" class="form-control" autocomplete="off"/>
    <span class="text-danger"><?php echo form_error("to"); ?></span>
    </div>
  </div>
    <div class="form-group">
      <input type="submit" name="insert" value="Get Report" class="btn btn-info">
    </div>
  </form>

<div class="print">
<?php if($error = $this->session->flashdata('report')){  ?>
     <?php echo $error; ?>
  <?php } ?><br>

<?php if($error = $this->session->flashdata('report1')){  ?>
      <?php echo $error; ?>
        <?php } ?><br>

<?php if($error = $this->session->flashdata('report2')){  ?>
        <p style="color:green">  <?php echo $error; ?></p>
    <?php } ?><br>

    <?php if($error = $this->session->flashdata('report3')){  ?>
          <p style="color:red">    <?php echo $error; ?></p>
        <?php } ?>

</div>
