@extends('layouts.app')
@section('page', 'Dashboard')
@section('content-app')
  <div class="content-wrapper">
    <!-- Main content -->
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
    <section class="content">
     <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <a href="<?php echo url('/point_pelanggaran') ?>"style="color:black;">
          <div class="info-box shadow-lg">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-paste"></i></span>
            <div class="info-box-content">
              <span class="info-box-text text-danger" ><b>Point Pelanggaran</b></span>
              <font  style="text-shadow: 2px 2px 4px #827e7e">{{$poin->count()}}</font>
            </div>
          </div></a>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <a href="<?php echo url('/sanksi') ?>" style="color:black;">
          <div class="info-box shadow-lg">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-exclamation-triangle"></i></span>
            <div class="info-box-content">
              <span class="info-box-text text-primary" ><b>Sanksi</b></span>
              <font style="text-shadow: 2px 2px 4px #827e7e">{{$sanksi->count()}}</font>
            </div>
          </div></a>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <a href="<?php echo url('/pelanggaran') ?>"style="color:black;">
          <div class="info-box shadow-lg">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-minus"></i></span>
            <div class="info-box-content">
              <span class="info-box-text text-success" ><b>Pelanggaran</b></span>
              <font style="text-shadow: 2px 2px 4px #827e7e">{{$pelanggaran->count()}}</font>
            </div>
          </div></a>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <a href="<?php echo url('/barang_sitaan') ?>" style="color:black;">
          <div class="info-box shadow-lg">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-box-open"></i></span>
            <div class="info-box-content">
              <span class="info-box-text text-info" ><b>Barang Sitaan</b></span>
              <font style="text-shadow: 2px 2px 4px #827e7e">{{$barang_sita->count()}}</font>
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
              <h3 class="card-title "><i class="nav-icon fas fa-paste text-danger"></i> Pelanggaran Hari Ini</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="d-md-flex">
                <div class="p-1 flex-fill" style="overflow: hidden;height: 325px;">
                  <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Pelanggaran</th>
                            <th>Poin</th>
                        </thead>
                        <tbody>
                          @forelse ($pelanggaran as $item)
                          <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$item->nama }}</td>
                            <td>{{$item->kode_kelas }} {{$item->kode_jurusan }}</td>
                            <td>{{$item->nama_poin_pelanggaran}}</td>
                            <td>{{$item->poin}}</td>
                          </tr>
                          @empty
                          <tr>
                            <td colspan="5" class="text-center text-mute">Tidak Ada Data</td>
                          </tr>
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
        <div class="col-md-4">
          <!-- MAP & BOX PANE -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title "><i class="nav-icon fas fa-users text-danger"></i> Data Absensi Hari Ini</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="d-md-flex">
                <div class="p-1 flex-fill">
                  <canvas id="absen-chart" style="height: 310px; max-width: 100%; display: block; width: 370px;">
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