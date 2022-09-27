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
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <a href="<?php echo url('/pos_terima') ?>"style="color:black;">
        <div class="info-box shadow-lg">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-donate"></i></span>
          <div class="info-box-content">
            <span class="info-box-text text-danger" ><b>Pos Penerimaan</b></span>
          <font  style="text-shadow: 2px 2px 4px #827e7e">{{$pos_terima->count()}}</font>
          </div>
        </div></a>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <a href="<?php echo url('/pos_keluar') ?>" style="color:black;">
        <div class="info-box shadow-lg">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-funnel-dollar"></i></span>
          <div class="info-box-content">
            <span class="info-box-text text-primary" ><b>Pos Pengeluaran</b></span>
            <font style="text-shadow: 2px 2px 4px #827e7e">{{$pos_keluar->count()}}</font>
          </div>
        </div></a>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <a href="#"style="color:black;">
        <div class="info-box shadow-lg">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cash-register"></i></span>
          <div class="info-box-content">
            <span class="info-box-text text-success" ><b>Biaya Siswa</b></span>
            <font style="text-shadow: 2px 2px 4px #827e7e">{{$biaya_siswa->count()}}</font>
          </div>
        </div></a>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <a href="#" style="color:black;">
        <div class="info-box shadow-lg">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-luggage-cart"></i></span>
          <div class="info-box-content">
            <span class="info-box-text text-info" ><b>Methode Bayar</b></span>
            <font style="text-shadow: 2px 2px 4px #827e7e">{{$methode->count()}}</font>
          </div>
        </div></a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-orange">
          <div class="card-header">
            <h3 class="card-title">Data Transaksi <?= date('d-M-Y') ?> </h3>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('content-script')
<script>
  $(document).ready(function(){
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = {
  labels: [
      'Penerimaan Lain',
      'Tabungan',
      'Pembayaran Siswa',
      'Pengeluaran'
  ],
  datasets: [
    {
      label: "Data Transaksi",
      data: [{{ $penerimaan_lain->sum('detail_jumlah')}},0,0,{{$pengeluaran->sum('detail_jumlah')}}],
      backgroundColor : ['#28a745', '#ffc107', '#dc3545', '#17a2b8'],
      }
    ]
  }

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  });
</script>

@endsection