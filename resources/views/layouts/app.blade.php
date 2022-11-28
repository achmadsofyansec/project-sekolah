<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SARPRAS | @yield('page')</title>
  <link rel="shortcut icon" href="{{asset('public/dist/img/AdminLTELogo.png')}}" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}} ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-secondary navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
      </li>
      <li class="nav-item">

      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell text-white"></i>
          <span class="badge badge-warning navbar-badge">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Coming Soon</span>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt text-white"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user text-white"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <form action="<?php echo url('/signout') ?>" method="post">
          @csrf
          <input type="submit" class="dropdown-item dropdown-footer" value="Log out"></input>
          </form>
         
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-secondary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo url('/') ?>" class="brand-link">
      <img src="{{asset('public/dist/img/AdminLTELogo.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SARPRAS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('public/dist/img/user2-160x160.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo strtoupper(auth()->user()->name);?></a>
          <span class="badge badge-info right ">Administrator</span>
          <form action="<?php echo url('/signout') ?>" method="post">
          @csrf
          <button type="submit" class="badge badge-danger right ">Logout <i class="nav-icon fas fa-sign-out-alt"></i></button>
          </form>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?php echo url('/') ?>" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Data Asset</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-school text-primary"></i>
              <p>
               Asset Tetap
               <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url('/gedung') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-primary"></i>
                  <p>Gedung</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/kebutuhan_tambahan') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-primary"></i>
                  <p>Kebutuhan Tambahan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/laboratorium') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-primary"></i>
                  <p>Laboratorium</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/lahan') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-primary"></i>
                  <p>Lahan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/mebel') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-primary"></i>
                  <p>Mebel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/olahraga_seni') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-primary"></i>
                  <p>Olahraga & Seni</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/penerangan_internet') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-primary"></i>
                  <p>Penerangan & Internet</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/sanitasi') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-primary"></i>
                  <p>Sanitasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/sarana_administrasi') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-primary"></i>
                  <p>Sarana Administrasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/ruangan') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-primary"></i>
                  <p>Ruangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/lapangan') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-primary"></i>
                  <p>Lapangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/sarana_belajar') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-primary"></i>
                  <p>Sarana Belajar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/aset_lain') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-primary"></i>
                  <p>Asset Lain</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box-open text-secondary"></i>
              <p>
               Asset Tidak Tetap
               <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url('/aset_tt') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-secondary"></i>
                  <p>Data Asset</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/kategori_aset_tt') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-secondary"></i>
                  <p>Kategori</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Data Peminjaman</li>
          <li class="nav-item">
            <a href="<?php echo url('/peminjaman') ?>" class="nav-link">
              <i class="nav-icon fas fa-people-carry text-warning"></i>
              <p>
               Data Peminjaman
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo url('/denda') ?>" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar text-success"></i>
              <p>
               Data Denda
              </p>
            </a>
          </li>
          <li class="nav-header">Lain Lain</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy text-navy"></i>
              <p>
               Laporan
               <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url('/laporan_aset') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-navy"></i>
                  <p>Asset</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/laporan_peminjaman') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-navy"></i>
                  <p>Peminjaman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/laporan_pengembalian') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-navy"></i>
                  <p>Pengembalian</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo url('/manual_book') ?>" class="nav-link">
              <i class="nav-icon fas fa-book text-info"></i>
              <p>
               Manual Book
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

@yield('content-app')

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="#">Jamanu Maarif NU</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- jQuery -->
<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('public/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('public/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('public/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="{{asset('public/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/dist/js/pages/dashboard.js')}}"></script>
<!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#dataTable').DataTable({
      scrollY: '200px',
        scrollCollapse: true,
        paging: false,
    });
} );
// $(document).ready(function() {
//     $('select').select2();
//     $
// });
    </script>

    @yield('content-script')
</body>
</html>