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
            <a href="<?php echo url('/gedung') ?>"style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-graduate"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-danger" ><b>Data Aset</b></span>
                <font  style="text-shadow: 2px 2px 4px #827e7e"><?= $aset->count(); ?></font>
              </div>
            </div></a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?php echo url('/peminjaman') ?>" style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-people-carry"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-primary" ><b>Peminjaman</b></span>
                <font style="text-shadow: 2px 2px 4px #827e7e"><?= $peminjaman->count(); ?></font>
              </div>
            </div></a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?php echo url('/pengembalian') ?>"style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-copy"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-success" ><b>Pengembalian</b></span>
                <font style="text-shadow: 2px 2px 4px #827e7e"><?= $pengembalian->count(); ?></font>
              </div>
            </div></a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?php echo url('/kategori') ?>" style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-paste"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-info" ><b>Kategori</b></span>
                <font style="text-shadow: 2px 2px 4px #827e7e"><?= $kategori->count(); ?></font>
              </div>
            </div></a>
          </div>
          
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title "><i class="nav-icon fas fa-calendar-alt text-danger"></i> PEMINJAMAN HARI INI</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="d-md-flex">
                  <div class="p-1 flex-fill" style="min-height: 250px; height: 310px; max-width: 100%; display: block; width: 370px;">
                    <!-- Map will be created here -->
                    <div class="table-responsive">
                      <table class="table table-bordered">
                          <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Unit</th>
                            <th>Waktu</th>
                          </thead>
                          <tbody>
                            @forelse ($data as $item)
                              <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->unit }}</td>
                                <td>{{ $item->tgl_peminjaman }}</td>
                              </tr>
                            @empty
                              
                            @endforelse
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div><!-- /.d-md-flex -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-md-7">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title "><i class="nav-icon fas fa-calendar-alt text-danger"></i>Grafik Aset</h3>

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
                    <canvas id="sarpras-chart" style="min-height: 250px; height: 310px; max-width: 100%; display: block; width: 370px;">
                    </canvas>
                  </div>
                </div><!-- /.d-md-flex -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('content-script')

<script>
$(document).ready(function(){
  var donutChartCanvas = $('#sarpras-chart').get(0).getContext('2d')
var donutData  = {
labels: [
    'Asset',
    'Kategori',
    'pengembalian',
    'Peminjaman',
],
datasets: [
  {
    data: [{{$aset->count()}},{{$kategori->count()}},{{$pengembalian->count()}},{{$peminjaman->count()}},
    backgroundColor : ['#28a745', '#ffc107', '#dc3545', '#17a2b8'],
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