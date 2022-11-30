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
          <div class="col-12 col-sm-6 col-md-4">
            <a href="<?php echo url('/siswa') ?>"style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-graduation-cap"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-danger" ><b>Siswa</b></span>
                <font  style="text-shadow: 2px 2px 4px #827e7e">{{ $siswa->count() }}</font>
              </div>
            </div></a>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <a href="<?php echo url('/siswa') ?>"style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-calendar"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-danger" ><b>Tahun Ajaran</b></span>
                @foreach ($tahun_ajaran as $item)
                <font  style="text-shadow: 2px 2px 4px #827e7e">{{ $item->tahun_ajaran }}</font>
                @endforeach
              </div>
            </div></a>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <a href="<?php echo url('/siswa') ?>"style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-home"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-danger" ><b>Nama Sekolah</b></span>
                @foreach ($sekolah as $item)
                <font  style="text-shadow: 2px 2px 4px #827e7e">{{ $item->nama_sekolah }}</font>  
                @endforeach
                
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
                <h3 class="card-title "><i class="nav-icon fas fa-calendar-alt text-danger"></i> DATA KELULUSAN </h3>

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
                    <canvas id="kelulusan-chart" style="min-height: 250px; height: 310px; max-width: 100%; display: block; width: 370px;">
                    </canvas>
                  </div>
                </div><!-- /.d-md-flex -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <div class="info-box mb-5 bg-success">
              <span class="info-box-icon"><i class="fas fa-graduation-cap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">LULUS</span>
              <span class="info-box-number">{{ $lulus->count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <!-- Info Boxes Style 2 -->
            
            <div class="info-box mb-5 bg-danger">
              <span class="info-box-icon"><i class="fas fa-child"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">TIDAK LULUS</span>
                <span class="info-box-number">{{  $tidaklulus->count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-5 bg-info">
              <span class="info-box-icon"><i class="fas fa-clinic-medical"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">DROP OUT</span>
                <span class="info-box-number">{{  $dropout->count() }}</span>
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
    var donutChartCanvas = $('#kelulusan-chart').get(0).getContext('2d')
  var donutData        = {
  labels: [
      'Lulus',
      'Tidak Lulus',
      'Drop Out'
  ],
  datasets: [
    {
      data: [{{$lulus->count()}}, {{$tidaklulus->count()}}, {{$dropout->count()}}],
      backgroundColor : ['#28a745','#dc3545', '#ffc107'],
      }
    ]
  }
  var donutOptions     = {
  maintainAspectRatio : false,
  responsive : true,
  }

  new Chart(donutChartCanvas, {
    type: 'doughnut',
    data: donutData,
    options: donutOptions
    });
  });
</script>
@endsection