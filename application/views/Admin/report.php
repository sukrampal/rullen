

<form method ="post" action="<?php echo base_url(); ?>admin/home/generate_report">
  <h3 align="center"><button type="button" class="btn btn-outline-secondary">Generate Report</button></h3>
    <div class="col-8">
    <div class="form-group">
    <label>From:</label>
    <input type="text" name="from" id="from" class="form-control" autocomplete="off"/>
    <span class="text-danger"><?php echo form_error("from"); ?></span>
    </div>
  </div>
  <div class="col-8">
    <div class="form-group">
    <label>To:</label>
    <input type="text" name="to" id="to" class="form-control" autocomplete="off"/>
    <span class="text-danger"><?php echo form_error("to"); ?></span>
    </div>
  </div>
    <div class="form-group">
      <input type="submit" name="insert" value="Get Report Card" class="btn btn-info">
    </div>
  </form>
