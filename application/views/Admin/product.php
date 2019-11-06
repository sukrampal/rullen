<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <?php if(isset($out_of_stock)){ ?>

        <!-- <h1 align="center"><button type="button" class="btn btn-outline-secondary">Out Of Stock Items</button></h1><br></br> -->
        <div class="abc" align="center"><p align="center" style="width:350px;background-color:#DDDDDD;color:BLACK;font-size: 20px;border-radius: 12px;">OUT OF STOCK ITEMS LIST</p></div>
        <?php if($error  = $this->session->flashdata('out')){ ?>
        <p style="color:green"> <?php echo $error; ?></p>
        <?php } ?>
        <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
            <th></th>
            <!-- <th>Category</th> -->
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>

            <!-- <th>Mark Out Of Stock</th> -->
            <th>Availability</th>


          </tr>
          <?php $i =1; foreach($out_of_stock as $prdct){ ?>
          <tr>
            <td><?php echo $i; ?></td>
            <!-- <td><?php echo $prdct['cat_title']; ?></td> -->
              <td><img style="height:70px; width:90px" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image']; ?>" ></td>
            <td class="text-capitalize"><?php echo $prdct['product_title']; ?></td>
            <td><?php echo $prdct['product_price']; ?></td>


            <td>
              <select id="selectbox" name="" onchange="javascript:location.href = this.value;">
            <option  value="" selected><?php echo $prdct['set_stk']; ?></option>
            <option value="<?php echo base_url(); ?>admin/home/in_stock/<?php echo $prdct['product_id']; ?>">Yes</option>
            <option value="<?php echo base_url(); ?>admin/home/out_of_stock/<?php echo $prdct['product_id']; ?>">No</option>
            </select>
          </td>

          </tr>
        <?php $i++; } ?>
        </table>
        </div>


      <?php }else{  ?>

        <!-- sukram -->
        <div class="abc" align="center"><p align="center" style="width:250px;background-color:#DDDDDD;color:BLACK;font-size: 20px;border-radius: 12px;">PRODUCT PAGE</p></div>
        <!-- <h1 align="center"><button type="button" class="btn btn-outline-secondary">Product Page</button></h1><br></br> -->

        <a href="<?php echo base_url(); ?>admin/home/add_product"><input style="float:left" type="submit" name="insert" value="Add Product" class="btn btn-info"></a><br>
        <a href="<?php echo base_url(); ?>admin/home/out_of_stock_item_list"><input style="float:right;" type="submit" name="out_stk" value="OUT OF STOCKS" class="btn btn-danger"></a><br>
  <form method="post" action="<?php echo base_url(); ?>admin/home/delete_multiple_record">

           <?php if($error = $this->session->flashdata('selected')) { ?>
              <p style="color:red;"><?php echo $error; ?></p>
         <?php } ?>
         <?php if($error = $this->session->flashdata('deselected')) { ?>
            <p style="color:red;"><?php echo $error; ?></p>
       <?php } ?>
        <?php
        if($this->uri->segment(3)=="delete"){
          echo '<p class="text-success">Your product has been deleted successfully</p>';
        } ?>
        <?php
        if($this->uri->segment(3)=="product_inserted"){
          echo '<p class="text-success">Your product has been added successfully</p>';
        } ?>
        <?php
        if($this->uri->segment(3)=="product_update"){
          echo '<p class="text-success">Your product has been updated successfully</p>';
        } ?>
        <?php if($error  = $this->session->flashdata('out')){ ?>
        <p style="color:red"> <?php echo $error; ?></p>
        <?php } ?>
        <?php if($error  = $this->session->flashdata('in')){ ?>
        <p style="color:green"> <?php echo $error; ?></p>
        <?php } ?>
        <input type="submit" name="insert" value="Delete" class="btn btn-danger">
          <div class="table-responsive">
          <table class="table table-bordered table-striped">
              <tr>
              <th></th>
              <th></th>
              <th>Product</th>
              <th>Category</th>
              <th>Price</th>
              <th>Old Price</th>
              <th>Shipping Cost</th>
              <th>Description</th>
              <th>Availability</th>
              <th></th>
              <th></th>

            </tr>
            <li><input type="checkbox" id="select_all" /> Select all</li>
            <?php $i=1; foreach($products as $prdct){ ?>
            <tr>
              <td>
                <input type="checkbox" name="id[]" class="checkbox" value="<?php echo $prdct['product_id']; ?>"  />
              </td>
              <td><?php echo $i; ?></td>

              <td class="text-capitalize"><img style="height:70px; width:90px" src="<?php echo base_url(); ?>assets/img/<?php echo $prdct['product_image']; ?>" ><br><?php echo $prdct['product_title']; ?></td>
                <td class="text-capitalize"><?php echo $prdct['cat_title']; ?></td>
              <td><?php echo $prdct['product_price']; ?></td>
              <td><?php echo $prdct['old_price']; ?></td>
              <td><?php echo $prdct['shipping']; ?></td>
              <!-- <td><?php echo $prdct['product_desc']; ?></td> -->
              <!-- Trigger/Open The Modal -->
              <td><button type="button" class="btn btn-info btn-sm view_detail" data-toggle="modal" id="<?php echo $prdct['product_id']; ?>" data-target="#myModal">View</button>  </td>
                <td>
                  <select id="selectbox" name="" onchange="javascript:location.href = this.value;">
                <option  value="" selected><?php echo $prdct['set_stk']; ?></option>
                <option value="<?php echo base_url(); ?>admin/home/in_stock/<?php echo $prdct['product_id']; ?>">Yes</option>
                <option value="<?php echo base_url(); ?>admin/home/out_of_stock/<?php echo $prdct['product_id']; ?>">No</option>
                </select>
                </td>
              <td><a href="<?php echo base_url(); ?>admin/home/update_product/<?php echo $prdct['product_id']; ?>" class="update _data" id="<?php echo $prdct['product_id']; ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></td>
              <td><a href="<?php echo base_url(); ?>admin/home/delete_product/<?php echo $prdct['product_id']; ?>" class="delete_data"  onclick="return myConfirm();" id="<?php echo $prdct['product_id']; ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
            </tr>
            <div class="container">
              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                      <!-- <p><?php echo $prdct['product_desc']; ?></p> -->
                      <!-- <table class="table table-bordered table-striped"> -->
                              <p id="name"></p>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php $i++; } ?>
            <p style="display:inline;" ><?php echo $this->pagination->create_links(); ?></p>
          </table>
          </div>

      <!-- </div> -->
    </form>

  <?php } ?>


<script>
function myConfirm(){
  var result = confirm("Do you want to delete the particular product?");
  if(result == true){
  return true;
}else{
  return false;
}
}
</script>


<!-- for checkbox -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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

<script type="text/javascript">
    $(document).ready(function() {

      $('.view_detail').click(function(){

          var id = $(this).attr('id'); //get the attribute value

          $.ajax({
              url : "<?php echo base_url(); ?>admin/home/get_desc",
              data:{id : id},
              method:'GET',
              dataType:'json',
              success:function(response) {
                $('#name').html(response.product_desc);
                $('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
            }
          });
      });
    });
</script>
