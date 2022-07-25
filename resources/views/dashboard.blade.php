@extends('layouts.app')
@section('page', 'Dashboard')
@section('content-app')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header animated bounceIn">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-12 mt-2">
                      <div class="card card-info card-outline">
                          <center>
                              <h1 class="m-0 text-dark" ><i class="fas fa-school mt-1"></i> <br>DATA KELULUSAN SISWA</h1>
                          </center>
                          <hr>
                          <div class="container-fluid">
                              <div class="row">


                                  <div class="col-md-12">
                                      <div class="card card-info card-outline">
                                          <div class="card-header">
                                              <h3 class="card-title text-info"><i class="fas fa-users-class"></i> DATA PENDAFTARAN</h3>
                                              <div class="card-tools">
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                  </button>
                                              </div>
                                          </div>
                                          <div class="card-body p-0">
                                              <div class="row mt-3 ml-1 mr-1">
                                                  <div class="col-md-4">
                                                      <a style="color:black;">
                                                          <div class="info-box">
                                                              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
                                                              <div class="info-box-content">
                                                                  <span class="info-box-text text-danger"><b>TOTAL KELULUSAN SISWA</b></span>
                                                                  <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e">50</span>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="col-md-4">
                                                      <a style="color:black;">
                                                          <div class="info-box">
                                                              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>
                                                              <div class="info-box-content">
                                                                  <span class="info-box-text text-danger"><b>LULUS</b></span>
                                                                  <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e">50</span>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="col-md-4">
                                                      <a style="color:black;">
                                                          <div class="info-box">
                                                              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-times"></i></span>
                                                              <div class="info-box-content">
                                                                  <span class="info-box-text text-danger"><b>TIDAK LULUS</b></span>
                                                                  <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e">56</span>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                              </div>

                          </div>
                      </div>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  </div>
@endsection