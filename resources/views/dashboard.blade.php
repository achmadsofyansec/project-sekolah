<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>App Sekolah | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}} ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-success navbar-light">
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
          <a href="#" class="dropdown-item dropdown-footer">SignOut</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SISM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
          <span class="badge badge-info right ">Administrator</span>
          <a href="#"><span class="badge badge-danger right ">Logout <i class="nav-icon fas fa-sign-out-alt"></i></span></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Data Master</li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-school text-success"></i>
              <p>
               Sekolah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user text-success"></i>
              <p>
                Management Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-success"></i>
                  <p>Administrator</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-id-card-alt text-success"></i>
              <p>
                Jabatan
              </p>
            </a>
          </li>
          <li class="nav-header">Pengaturan</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-clipboard text-danger"></i>
              <p>Pengumuman</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database text-success"></i>
              <p>Pemeliharaan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cube text-info"></i>
              <p>Singkronisasi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p>Log Out</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-12 mt-1">
            <div class="card card-success card-outline">
              <center><h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px #2dba2d;"><br>DAFTAR APLIKASI SISTEM SEKOLAH MAARIF</h1> </center>
              <hr>
        <div class="row ml-2 mr-2">
          <div class="col-12 col-sm-6 col-md-3">
            <a href="../akademik" target="_blank" style="color:black;">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-graduation-cap"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-success" ><b>AKADEMIK</b></span>
                <font size="1" style="text-shadow: 2px 2px 4px #827e7e">App Versi.0.0</font>
              </div>
            </div></a>
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <a href="../kesiswaan" target="_blank" style="color:black;">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-address-card"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-warning" ><b>KESISWAAN</b></span>
                <font size="1" style="text-shadow: 2px 2px 4px #827e7e">App Versi.0.0</font>
              </div>
            </div></a>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <a href="../keuangan" target="_blank" style="color:black;">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-danger" ><b>KEUANGAN</b></span>
                <font size="1" style="text-shadow: 2px 2px 4px #827e7e">App Versi.0.0<Versi class="2 1"></Versi></font>
              </div>
            </div></a>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <a href="../perpustakaan" target="_blank" style="color:black;">
            <div class="info-box">
              <span class="info-box-icon bg-orange elevation-1"><i class="fas fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-orange" ><b>PERPUSTAKAAN</b></span>
                <font size="1" style="text-shadow: 2px 2px 4px #827e7e">App Versi.0.0</font>
              </div>
            </div></a>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="../arsip" target="_blank" style="color:black;">
            <div class="info-box">
              <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-navy" ><b>ARSIP</b></span>
                <font size="1" style="text-shadow: 2px 2px 4px #827e7e">App Versi.0.0</font>
              </div>
            </div></a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

           <div class="col-12 col-sm-6 col-md-3">
            <a href="../ppdb" target="_blank" style="color:black;">
            <div class="info-box">
              <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-id-badge"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-teal" ><b>PPDB</b></span>
                <font size="1" style="text-shadow: 2px 2px 4px #827e7e">App Versi.0.0</font>
              </div>
            </div></a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <a href="../kelulusan" target="_blank" style="color:black;">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-check"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-success" ><b>KELULUSAN</b></span>
                <font size="1" style="text-shadow: 2px 2px 4px #827e7e">App Versi.0.0</font>
              </div>
            </div></a>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <a href="../asiscbt" target="_blank" style="color:black;">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-laptop"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-danger" ><b>UJIAN CBT</b></span>
                <font size="1" style="text-shadow: 2px 2px 4px #827e7e">App Versi.0.0</font>
              </div>
            </div></a>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <a href="../asiscbt" target="_blank" style="color:black;">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-laptop"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-info" ><b>PAYMENT GATEWAY</b></span>
                <font size="1" style="text-shadow: 2px 2px 4px #827e7e">App Versi.0.0</font>
              </div>
            </div></a>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="../bukutamu" target="_blank" style="color:black;">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-success" ><b>BUKU TAMU</b></span>
                <font size="1" style="text-shadow: 2px 2px 4px #827e7e">App Versi.0.0</font>
              </div>
            </div></a>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="../sarpras" target="_blank" style="color:black;">
            <div class="info-box">
              <span class="info-box-icon bg-gray elevation-1"><i class="fas fa-cube"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-gray" ><b>SARPRAS</b></span>
                <font size="1" style="text-shadow: 2px 2px 4px #827e7e">App Versi.0.0</font>
              </div>
            </div></a>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="../asiscbt" target="_blank" style="color:black;">
            <div class="info-box">
              <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-laptop"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-dark" ><b>INTEGRASI</b></span>
                <font size="1" style="text-shadow: 2px 2px 4px #827e7e">App Versi.0.0</font>
              </div>
            </div></a>
            <!-- /.info-box -->
          </div>
        </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="#">Jamanu Maarif NU</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<script type="text/javascript">
    <!--
    function showTime() {
        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        var curr_second = today.getSeconds();
        if (curr_hour < 12) {
            a_p = "AM";
        } else {
            a_p = "PM";
        }
        if (curr_hour == 0) {
            curr_hour = 12;
        }
        if (curr_hour > 12) {
            curr_hour = curr_hour - 12;
        }
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        curr_second = checkTime(curr_second);
     document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
        }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);
    //-->
    </script>
</body>
</html>
