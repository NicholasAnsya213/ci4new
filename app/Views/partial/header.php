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
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #ffffff">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-dark" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo site_url('../Dashboard')?>" class="nav-link text-dark">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link text-dark">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link text-dark" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-light elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('../Dashboard')?>" class="brand-link" style="background-color: #ffffff">
      <img src="dist/img/BukakaCircle.png" alt="Bukaka Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-Bold text-dark">Order Application</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Nicholas Ansya</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-closed <?php if (in_array($activeMenu, ['form'])) {echo "menu-open";} ?>">
            <a href="#" class="nav-link <?php if (in_array($activeMenu, ['form'])) {echo "active";} ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p style="margin: 5px;">
                Purchase Order
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item <?php if (in_array($activeMenu, ['submission'])) {echo "menu-open";} ?>">
                <a href="<?php echo site_url('submission')?>" class="nav-link <?php if($activeMenu == 'submission')  ?>">
                  <i><ion-icon name="add-circle-outline"></ion-icon></i>
                  <p style="margin: 5px;">New</p>
                </a>
              </li>
              
              <li class="nav-item <?php if (in_array($activeMenu, ['Add'])) {echo "menu-open";} ?>">
                <a href="<?php echo site_url('Add')?>" class="nav-link <?php if($activeMenu == 'Add')  ?>">
                  <i><ion-icon name="add-circle-outline"></ion-icon></i>
                  <p style="margin: 5px;">Add</p>
                </a>
              </li>

              <li class="nav-item menu-closed <?php if (in_array($activeMenu, ['form'])) {echo "menu-closed";} ?>">
              <a href="<?php echo site_url('checking')?>" class="nav-link <?php if($activeMenu == 'checking')  ?>">
                  <i><ion-icon name="document-text-sharp"></ion-icon></i>
                  <p style="margin: 5px;">Checking
                   <i class="fas fa-angle-left right"></i>
                  </p>

                </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item <?php if (in_array($activeMenu, ['PreOrder'])) {echo "menu-open";} ?>">
                      <a href="<?php echo site_url('PreOrder')?>" class="nav-link <?php if($activeMenu == 'PreOrder')  ?>">
                        <i><ion-icon name="file-tray-full-outline"></ion-icon></i>
                        <p style="margin: 5px;">Pre Order Status</p>
                      </a>
                    </li>
                    <li class="nav-item <?php if (in_array($activeMenu, ['Goods'])) {echo "menu-open";} ?>">
                      <a href="<?php echo site_url('Goods')?>" class="nav-link <?php if($activeMenu == 'Goods')  ?>">
                        <i><ion-icon name="server-outline"></ion-icon></i>
                        <p style="margin: 5px;">Goods Available</p>
                      </a>
                    </li>
                  </ul>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-closed <?php if (in_array($activeMenu, ['form'])) {echo "menu-open";} ?>">
            <a href="<?php echo site_url('form')?>" class="nav-link <?php if (in_array($activeMenu, ['form'])) {echo "active";} ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p style="margin: 5px;">
                Work Order
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item <?php if (in_array($activeMenu, ['submission'])) {echo "menu-open";} ?>">
                <a href="<?php echo site_url('submission')?>" class="nav-link <?php if($activeMenu == 'submission')  ?>">
                  <i><ion-icon name="add-circle-outline"></ion-icon></i>
                  <p style="margin: 5px;">New</p>
                </a>
              </li>
              
              <li class="nav-item <?php if (in_array($activeMenu, ['Add'])) {echo "menu-open";} ?>">
                <a href="<?php echo site_url('Add_Spk')?>" class="nav-link <?php if($activeMenu == 'Add')  ?>">
                  <i><ion-icon name="add-circle-outline"></ion-icon></i>
                  <p style="margin: 5px;">Add</p>
                </a>
              </li>

              <li class="nav-item menu-closed <?php if (in_array($activeMenu, ['form'])) {echo "menu-open";} ?>">
              <a href="<?php echo site_url('checking')?>" class="nav-link <?php if($activeMenu == 'checking')  ?>">
                  <i><ion-icon name="document-text-sharp"></ion-icon></i>
                  <p style="margin: 5px;">Checking
                   <i class="fas fa-angle-left right"></i>
                  </p>

                </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item <?php if (in_array($activeMenu, ['PreOrder'])) {echo "menu-open";} ?>">
                      <a href="<?php echo site_url('PreOrder')?>" class="nav-link <?php if($activeMenu == 'PreOrder')  ?>">
                        <i><ion-icon name="file-tray-full-outline"></ion-icon></i>
                        <p style="margin: 5px;">Work Order Status</p>
                      </a>
                    </li>
                    <li class="nav-item <?php if (in_array($activeMenu, ['Goods_Spk'])) {echo "menu-open";} ?>">
                      <a href="<?php echo site_url('Goods_Spk')?>" class="nav-link <?php if($activeMenu == 'Goods_Spk')  ?>">
                        <i><ion-icon name="server-outline"></ion-icon></i>
                        <p style="margin: 5px;">Service Available</p>
                      </a>
                    </li>
                  </ul>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    </section>
