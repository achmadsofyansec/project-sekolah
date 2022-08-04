<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AKADEMIK | @yield('page')</title>
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
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-info navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
      </li>
      <li class="nav-item">
        <!--Tanggal Atau Lain Lain-->
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
  <aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo url('/') ?>" class="brand-link">
      <img src="{{asset('public/dist/img/AdminLTELogo.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AKADEMIK</span>
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
          <li class="nav-header">Umum</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-buromobelexperte text-info"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url('/guru') ?>" class="nav-link">
                  <i class="fas fas fa-chalkboard-teacher nav-icon text-primary"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/siswa') ?>" class="nav-link">
                  <i class="fas fa-users nav-icon text-danger"></i>
                  <p>Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/tahun_ajaran') ?>" class="nav-link">
                  <i class="fas fa-calendar nav-icon text-success"></i>
                  <p>Tahun Ajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/kelas') ?>" class="nav-link">
                  <i class="fas fa-chalkboard nav-icon text-info"></i>
                  <p>Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/jurusan') ?>" class="nav-link">
                  <i class="fas fa-building nav-icon text-primary"></i>
                  <p>Jurusan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book text-primary"></i>
              <p>
               Pembelajaran
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url('/kelompok_mapel') ?>" class="nav-link">
                  <i class="fas fa-boxes nav-icon text-success"></i>
                  <p>Kelompok Pelajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/mapel') ?>" class="nav-link">
                  <i class="fas fa-book-open nav-icon text-danger"></i>
                  <p>Mata Pelajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/jadwal') ?>" class="nav-link">
                  <i class="fas fa-calendar-alt nav-icon text-info"></i>
                  <p>Jadwal Pelajaran</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon 	fas fa-clipboard text-warning"></i>
              <p>
               Nilai
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url('/predikat') ?>" class="nav-link">
                  <i class="fas fas fa-clipboard nav-icon text-danger"></i>
                  <p>Nilai / Predikat</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo url('/ekstrakulikuler') ?>" class="nav-link">
              <i class="nav-icon fas fa-child text-primary"></i>
              <p>
                Ekstrakulikuler
              </p>
            </a>
          </li>
          <li class="nav-header">Kegiatan</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt text-danger"></i>
              <p>
                Absensi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url('/absensi') ?>" class="nav-link">
                  <i class="fas fa-calendar-check nav-icon text-primary"></i>
                  <p>Absensi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/perizinan') ?>" class="nav-link">
                  <i class="fas fa-calendar-times nav-icon text-danger"></i>
                  <p>Perizinan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list text-success"></i>
              <p>
                Input Nilai
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url('/input_harian') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-success"></i>
                  <p>Harian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/input_ujian') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-success"></i>
                  <p>Ujian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/input_prestasi') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-success"></i>
                  <p>Prestasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/input_ekstra') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-success"></i>
                  <p>Ekstrakulikuler</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/input_capaian') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-success"></i>
                  <p>Capaian Hasil Belajar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/input_rapor') ?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-success"></i>
                  <p>Rapor</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo url('/pindah_kelas') ?>" class="nav-link">
              <i class="nav-icon 	fas fa-balance-scale text-warning"></i>
              <p>
                Pindah / Kenaikan Kelas
              </p>
            </a>
          </li>
          <li class="nav-header">Lain Lain</li>
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
                <a href="<?php echo url('/lap_nilai') ?>" class="nav-link">
                  <i class="fas fa-clipboard nav-icon text-success"></i>
                  <p>Nilai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url('/lap_absensi') ?>" class="nav-link">
                  <i class="fas fa-calendar-alt nav-icon text-success"></i>
                  <p>Absensi</p>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#dataTable').DataTable({
      scrollY: '200px',
        scrollCollapse: true,
        paging: false,
    });
    var select = $('select').select2({
      theme:'classic'
    });    
} );
function filter_absensi(){
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    var x = document.getElementById("filter_absensi_kelas").value;
    var y = document.getElementById("filter_absensi_jurusan").value;
    $.ajax({
             type:'POST',
             url:"{{ route('ajaxRequest.filter_absensi') }}",
             data:{kelas:x, jurusan:y},
             success:function(data){
               if(data != ""){
                document.getElementById("content-absensi").innerHTML = data;
               }else{
                document.getElementById("content-absensi").innerHTML = '<tr><td colspan="6" class="text-center text-mute">Tidak Ada Data</td></tr>';
               }
              
             }
          });
  }
  filter_absensi()
    </script>
</body>
</html>