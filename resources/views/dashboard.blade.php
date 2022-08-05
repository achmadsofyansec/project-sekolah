@extends('layouts.app')
@section('page', 'Dashboard')
@section('content-app')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('page')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= url('/')?>">Home</a></li>
              <li class="breadcrumb-item active">@yield('page')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?php echo url('/siswa') ?>"style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-graduation-cap"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-danger" ><b>Siswa</b></span>
                <font  style="text-shadow: 2px 2px 4px #827e7e">{{$siswa->count()}}</font>
              </div>
            </div></a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?php echo url('/guru') ?>" style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-primary" ><b>Guru</b></span>
                <font style="text-shadow: 2px 2px 4px #827e7e">{{$guru->count()}}</font>
              </div>
            </div></a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?php echo url('/kelas') ?>"style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chalkboard"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-success" ><b>Kelas</b></span>
                <font style="text-shadow: 2px 2px 4px #827e7e">{{$kelas->count()}}</font>
              </div>
            </div></a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?php echo url('/mapel') ?>" style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book-open"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-info" ><b>Mata Pelajaran</b></span>
                <font style="text-shadow: 2px 2px 4px #827e7e">{{$mapel->count()}}</font>
              </div>
            </div></a>
          </div>
        </div>
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title "><i class="nav-icon fas fa-calendar-alt text-danger"></i> ABSENSI SISWA HARI INI</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="d-md-flex">
                  <div class="p-1 flex-fill" style="overflow: hidden">
                    <!-- Map will be created here -->
                    <canvas id="absen-chart" style="min-height: 250px; height: 310px; max-width: 100%; display: block; width: 370px;">
                    </canvas>
                  </div>
                </div><!-- /.d-md-flex -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="fas fa-graduation-cap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">MASUK</span>
              <span class="info-box-number">{{$masuk->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fab fa-diaspora"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">IZIN</span>
                <span class="info-box-number">{{$izin->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-child"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">TANPA KETERANGAN</span>
                <span class="info-box-number">{{$tanpa_keterangan->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fas fa-clinic-medical"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">SAKIT</span>
                <span class="info-box-number">{{$sakit->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('content-script')
<script>
  $(document).ready(function(){
    var donutChartCanvas = $('#absen-chart').get(0).getContext('2d')
var donutData        = {
  labels: [
      'Masuk',
      'Izin',
      'Tanpa Keterangan',
      'Sakit',
      'Belum Absen'
  ],
  datasets: [
    {
      data: [{{$masuk->count()}},{{$izin->count()}},{{$tanpa_keterangan->count()}},{{$sakit->count()}},{{$belum_absen}}],
      backgroundColor : ['#28a745', '#ffc107', '#dc3545', '#17a2b8','#007bff'],
    }
  ]
}
var donutOptions     = {
  maintainAspectRatio : false,
  responsive : true,
}
//Create pie or douhnut chart
// You can switch between pie and douhnut using the method below.
new Chart(donutChartCanvas, {
  type: 'doughnut',
  data: donutData,
  options: donutOptions
});
  });
</script>
@endsection