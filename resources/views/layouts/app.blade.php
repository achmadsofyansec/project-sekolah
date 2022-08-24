<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KEUANGAN | @yield('page')</title>
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
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-orange navbar-light">
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
  <aside class="main-sidebar sidebar-light-orange elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo url('/') ?>" class="brand-link">
      <img src="{{asset('public/dist/img/AdminLTELogo.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">KEUANGAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('public/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
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
          <li class="nav-header">Data Master</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-buromobelexperte text-orange"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url('/metode_bayar') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-success"></i>
                  <p>Metode Pembayaran</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-balance-scale text-primary"></i>
              <p>
                POS Pembayaran
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url('/pos_terima') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-success"></i>
                  <p>POS Penerimaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/pos_keluar') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-danger"></i>
                  <p>Pos Pengeluaran</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Data Pembayaran</li>
          <li class="nav-item">
            <a href="<?php echo url('/pembayaran_siswa') ?>" class="nav-link">
              <i class="nav-icon fas fa-donate text-success"></i>
              <p>
                Pembayaran Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo url('/biaya_siswa') ?>" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar text-danger"></i>
              <p>
                Biaya Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo url('/tabungan') ?>" class="nav-link">
              <i class="nav-icon fas fa-book text-warning"></i>
              <p>
                Tabungan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-funnel-dollar text-primary"></i>
              <p>
                Lain Lain
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url('/terima_lain') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-success"></i>
                  <p>Penerimaan Lain </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/keluar_lain') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-danger"></i>
                  <p>Pengeluaran Lain</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Laporan / Rekap</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy text-primary"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url('/laporan_harian') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-success"></i>
                  <p>Harian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/laporan_bulanan') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-danger"></i>
                  <p>Bulanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/laporan_tahunan') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-danger"></i>
                  <p>Tahunan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt text-warning"></i>
              <p>
                Rekaptulasi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url('/rekap') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-success"></i>
                  <p>Rekap</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/rekap_pertrx') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-success"></i>
                  <p>Per Transaksi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo url('/tunggakan') ?>" class="nav-link">
              <i class="nav-icon fas fa-paste text-danger"></i>
              <p>
                Tunggakan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo url('/riwayat_pembayaran') ?>" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list text-navy"></i>
              <p>
                Riwayat Pembayaran
              </p>
            </a>
          </li>
          <li class="nav-header">Lain Lain</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-weixin text-success"></i>
              <p>
                Gateway
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url('/wa_gateway') ?>" class="nav-link">
                  <i class="fab fa-whatsapp nav-icon text-success"></i>
                  <p>WhatsApp Gateway</p>
                </a>
              </li>
            </ul>
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
<script type="text/javascript">
$(document).ready( function () {
    $('#dataTable').DataTable({
      scrollY: '200px',
        scrollCollapse: true,
        paging: false,
    });
} );
    </script>
    @yield('content-script')
</body>
</html>