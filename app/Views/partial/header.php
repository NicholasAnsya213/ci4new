<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pre Order Application</title>

  <base href="<?php echo base_url('Assets')?>/">
  <!-- Font: Mona Sans Sans -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Bootstrap 5 Datatables CSS -->
  <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">

  <!-- /.navbar -->
<nav class="navbar navbar-expand-lg navbar-dark text-light" style="background-color:#027fb3;">
  <img src="dist/img/BukakaCircle.png" width="40" height="40" class="d-inline-block align-top img-circle" alt="" style="margin-right: 10px">
  <a class="navbar-brand" href="<?php echo site_url('Dashboard')?>" class="nav-link <?php if($activeMenu == 'Dashboard')  ?>">Order Application</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('Dashboard')?>" class="nav-link <?php if($activeMenu == 'Dashboard')  ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Purchase Requisition
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo site_url('Add')?>" class="nav-link <?php if($activeMenu == 'Add_Spk/NewPurchaseRequisitions')  ?>">New Purchase Requisition<i class="bi bi-plus-lg"></i></a>
          <a class="dropdown-item" href="<?php echo site_url('PreOrder')?>" class="nav-link <?php if($activeMenu == 'PreOrder')  ?>">Purchase Requisitions Status</a>          
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Purchase Order
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo site_url('Add_Spk/NewPurchaseOrder')?>" class="nav-link <?php if($activeMenu == 'Add')  ?>">New Purchase Order<i class="bi bi-plus-lg"></i></a>
          <a class="dropdown-item" href="<?php echo site_url('PreOrder')?>" class="nav-link <?php if($activeMenu == 'PreOrder')  ?>">Pre Order Status</a>          
          <a class="dropdown-item" href="<?php echo site_url('Goods')?>" class="nav-link <?php if($activeMenu == 'Goods')  ?>">Goods Available</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Work Order
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="<?php echo site_url('Add_Spk/NewWorkOrder')?>" class="nav-link <?php if($activeMenu == 'Add')  ?>">New Work Order</a>
          <a class="dropdown-item" href="<?php echo site_url('Add_Spk')?>" class="nav-link <?php if($activeMenu == 'PreOrder')  ?>">Work Order Status</a>          
          <a class="dropdown-item" href="<?php echo site_url('Goods')?>" class="nav-link <?php if($activeMenu == 'Goods')  ?>">Service Available</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Goods & Services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo site_url('Goods_SPK')?>" class="nav-link <?php if($activeMenu == 'Goods_SPK')  ?>">List Of Goods and Services<i class="bi bi-plus-lg"></i></a>
          <a class="dropdown-item" href="<?php echo site_url('Add_Spk')?>" class="nav-link <?php if($activeMenu == 'PreOrder')  ?>">Add Goods or Services</a>
        </div>
      </li>
    </ul>

    <li class="nav-item active">
    <div class="dropdown">
    <a class="dropdown-toggle btn-dark" style="background-color: #027fb3;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="dist/img/user1-128x128.jpg" width="30" height="30" class="d-inline-block align-top img-circle" alt="" style="margin-right: 10px"> 
    Profile
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <div class="text-center">
      <img src="dist/img/user1-128x128.jpg" class="img-circle">
    </div>
    <div class="text-center">
    <span>Budi<span>
    </div>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Edit Profile</a>
        <a class="dropdown-item" href="#">Settings</a>
        <a class="dropdown-item" href="#">Help?</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Logout</a>
        <a class="dropdown-item" href="#">Forgot password?</a>
      </div>
      </li>

  </div>
</nav>

</div>
    </section>
