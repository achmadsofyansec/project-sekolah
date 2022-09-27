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
            <a href="<?php echo url('/pos_terima') ?>"style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-donate"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-danger" ><b>Pendaftar</b></span>
              <font  style="text-shadow: 2px 2px 4px #827e7e">0</font>
              </div>
            </div></a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?php echo url('/pos_keluar') ?>" style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-funnel-dollar"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-primary" ><b>Jumlah Laki Laki</b></span>
                <font style="text-shadow: 2px 2px 4px #827e7e">0</font>
              </div>
            </div></a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="#"style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cash-register"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-success" ><b>Jumlah Perempuan</b></span>
                <font style="text-shadow: 2px 2px 4px #827e7e">0</font>
              </div>
            </div></a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="#" style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-luggage-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-info" ><b>Pengumuman</b></span>
                <font style="text-shadow: 2px 2px 4px #827e7e">0</font>
              </div>
            </div></a>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection