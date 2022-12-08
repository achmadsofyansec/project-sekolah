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
            <a href="<?php echo url('/pos_terima') ?>"style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-donate"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-danger" ><b>Pendaftar</b></span>
              <font  style="text-shadow: 2px 2px 4px #827e7e">{{ $pendaftar->count() }}</font>
              </div>
            </div></a>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <a href="<?php echo url('/pos_keluar') ?>" style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-funnel-dollar"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-primary" ><b>Jumlah Laki Laki</b></span>
                <font style="text-shadow: 2px 2px 4px #827e7e">{{ $laki->count() }}</font>
              </div>
            </div></a>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <a href="#"style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cash-register"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-success" ><b>Jumlah Perempuan</b></span>
                <font style="text-shadow: 2px 2px 4px #827e7e">{{ $perempuan->count() }}</font>
              </div>
            </div></a>
          </div>
        </div>
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- MAP & BOX PANE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title "><i class="nav-icon fas fa-calendar-alt text-danger"></i> DATA PENDAFTAR </h3>

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
                    <canvas id="ppdb-chart" style="min-height: 250px; height: 310px; max-width: 100%; display: block; width: 370px;">
                    </canvas>
                  </div>
                </div><!-- /.d-md-flex -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->

          <!--  -->
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
    var donutChartCanvas = $('#ppdb-chart').get(0).getContext('2d')
  var donutData        = {
  labels: [
      'Diterima',
      'Ditolak',
      'Sedang Diverivikasi'
  ],
  datasets: [
    {
      data: [{{$diterima->count()}}, {{$ditolak->count()}}, {{$proses->count()}}],
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