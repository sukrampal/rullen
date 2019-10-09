<div class="page-title-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="page-title" >
          <h3></h3>
          <img style="width:1920px;padding-top:20px;" src="<?php echo base_url(); ?>assets/img/banner/<?php echo $banner['image']; ?>" alt="" >
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<div>
  <div class="container1">

  <h3 align="center">ABOUT US</h3>
    <hr>
    <p align="center"><b>
<?php foreach($about_text as $a){ ?>
  <?php echo $a['about']; ?>
<?php } ?>
</b>  </p>
</div>



<style>
.container1 p{
  /* padding:350px; */
  padding-bottom:10px;
  padding-top: 5px;
}
@media only screen and (min-width: 700px) {
  .container1 {
    padding:350px;
    padding-bottom:10px;
    padding-top: 5px;
  }
}

@media only screen and (max-width: 500px) {
  .container1 {
    padding:35px;
    padding-bottom:10px;
    padding-top: 5px;
  }
}

</style>
