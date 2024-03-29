<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Rullen-Furniture (Admin)</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
 <link href="<?php echo base_url(); ?>assets/admin/css/sb-admin.css" rel="stylesheet">
  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url(); ?>assets/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<link rel="icon" href="<?php echo base_url(); ?>assets/img/banner/favicon.png" />
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo base_url(); ?>admin/home/dashboard">Admin Panel</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action="<?php echo base_url(); ?>admin/home/search" method ="post">
      <div class="input-group">

        <input type="text" name="search" class="form-control" placeholder="Search for Product..." aria-label="Search" aria-describedby="basic-addon2" required />
        <div class="input-group-append">
          <button class="btn btn-primary" >
            <i class="fas fa-search" type=""></i>
          </button>
        </div>

      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">


      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>admin/home/password_change">Change Password</a>
          <!-- <a class="dropdown-item" href="#">Activity Log</a> -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url(); ?>admin/home/logout" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">
<?php
$uri = $this->uri->segment(3);
?>
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item <?php if($uri == "dashboard"){?>active<?php } ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>admin/home/dashboard">
          <i class="fas fa-shopping-cart"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item <?php if($uri == "category"){?>active<?php } ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>admin/home/category">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Category</span></a>
      </li>
      <li class="nav-item <?php if($uri == "product"){?>active<?php } ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>admin/home/product">
          <i class="fa fa-camera-retror"></i><i class="fas fa-camera-retro"></i>
          <span>Products</span></a>
      </li>
      <li class="nav-item <?php if($uri == "new_product"){?>active<?php } ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>admin/home/new_product">
          <i class="fa fa-image"></i>
          <span>New Products</span></a>
      </li>
      <li class="nav-item <?php if($uri == "banner"){?>active<?php } ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>admin/home/banner">
          <i class="fa fa-photo-video"></i>
          <span>Banner</span></a>
      </li>
      <li class="nav-item <?php if($uri == "about"){?>active<?php } ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>admin/home/about">
          <i class="far fa-address-card"></i>
         <span>About Page</span></a>
      </li>
      <li class="nav-item <?php if($uri == "captions"){?>active<?php } ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>admin/home/captions">
          <i class="far fa-edit"></i>
          <span>Captions</span></a>
      </li>
      <li class="nav-item <?php if($uri == "subscribe"){?>active<?php } ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>admin/home/subscribe">
          <i class="fas fa-fw fa-table"></i>
          <span>Subscriber List</span></a>
      </li>
      <li class="nav-item <?php if($uri == "report"){?>active<?php } ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>admin/home/report">
          <i class="far fa-chart-bar"></i>
          <span>Report</span></a>
      </li>
      <li class="nav-item <?php if($uri == "opening_hours"){?>active<?php } ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>admin/home/opening_hours">
          <i class="fa fa-clock"></i>
          <span>Opening Hours</span></a>
      </li>
      <li class="nav-item <?php if($uri == "footer_context"){?>active<?php } ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>admin/home/footer_context">
          <i class="fa fa-keyboard"></i>
          <span>Footer Context</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

    <div class="container-fluid">
