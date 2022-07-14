@extends('layouts.app')
@section('page', 'Dashboard')
@section('content-app')
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
@endsection