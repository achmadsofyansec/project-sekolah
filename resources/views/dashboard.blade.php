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
              <font  style="text-shadow: 2px 2px 4px #827e7e">0</font>
            </div>
          </div></a>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <a href="<?php echo url('/sanksi') ?>" style="color:black;">
          <div class="info-box shadow-lg">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-exclamation-triangle"></i></span>
            <div class="info-box-content">
              <span class="info-box-text text-primary" ><b>Sanksi</b></span>
              <font style="text-shadow: 2px 2px 4px #827e7e">0</font>
            </div>
          </div></a>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <a href="<?php echo url('/pelanggaran') ?>"style="color:black;">
          <div class="info-box shadow-lg">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-minus"></i></span>
            <div class="info-box-content">
              <span class="info-box-text text-success" ><b>Pelanggaran</b></span>
              <font style="text-shadow: 2px 2px 4px #827e7e">0</font>
            </div>
          </div></a>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <a href="<?php echo url('/barang_sitaan') ?>" style="color:black;">
          <div class="info-box shadow-lg">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-box-open"></i></span>
            <div class="info-box-content">
              <span class="info-box-text text-info" ><b>Barang Sitaan</b></span>
              <font style="text-shadow: 2px 2px 4px #827e7e">0</font>
            </div>
          </div></a>
        </div>
      </div>
      <div class="row">
        <!-- Left col -->
        <div class="col-md-6">
          <!-- MAP & BOX PANE -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title "><i class="nav-icon fas fa-paste text-danger"></i> Pelanggaran</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="d-md-flex">
                <div class="p-1 flex-fill" style="overflow: hidden;height: 325px;">
                  <!-- Map will be created here -->
                </div>
              </div><!-- /.d-md-flex -->
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col-md-6">
          <!-- MAP & BOX PANE -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title "><i class="nav-icon fas fa-users text-danger"></i> Data Kesiswaan</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="d-md-flex">
                <div class="p-1 flex-fill" style="overflow: hidden;height: 325px;">
                  
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