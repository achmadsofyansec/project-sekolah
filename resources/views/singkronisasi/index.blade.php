@extends('layouts.app')
@section('page', 'Singkronisasi')
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
    <div class="row-mb-2">
      <div class="row">
        <div class="col-md-8 mt-1">
          <div class="card card-success card-outline">
            <div class="card-header">
              <h1 class="card-title">Singkronisasi</h1>
            </div>
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">  
                    <div class="card card-outline card-success p-md-3"> 
                      <div class="row">
                        <div class="col-md-2">
                          <img src="{{asset('public/dist/img/jamanu_logos.png')}}" width="50">
                        </div>
                        <div class="col-md-7 ">
                          <p>Jamanu Data Center</p>
                        </div>
                        <div class="col-md-3">
                          <a href="#" class="btn btn-success" name="sync_jamanu" >Sync Now</a>
                        </div>
                      </div>
                    </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-12">  
                    <div class="card card-outline card-info p-md-3"> 
                      <div class="row">
                        <div class="col-md-2">
                          <img src="{{asset('public/dist/img/emis_logo.png')}}" width="50">
                        </div>
                        <div class="col-md-7 ">
                          <p>EMIS</p>
                        </div>
                        <div class="col-md-3">
                          <a href="#" class="btn btn-info" name="sync_emis" >Sync Now</a>
                        </div>
                      </div>
                    </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-12">  
                    <div class="card card-outline card-primary p-md-3"> 
                      <div class="row">
                        <div class="col-md-2">
                          <img src="{{asset('public/dist/img/logo-dikdasmen.png')}}" width="50">
                        </div>
                        <div class="col-md-7 ">
                          <p>Data Pokok Pendidikan (Dapodik)</p>
                        </div>
                        <div class="col-md-3">
                          <a href="#" class="btn btn-primary" name="sync_dapodik" >Sync Now</a>
                        </div>
                      </div>
                    </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-1">
          <div class="card card-success card-outline">
            <div class="card-header">
              <h1 class="card-title"> <span class="badge badge-danger"><i class="fas fa-angle-right right"></i></span> Petunjuk</h1>
            </div>
            <div class="card-body">
              <p>1. Pastikan Data yang akan di singkronisasi Sudah Baik dan benar. 
              <p>2. Singkronisasi <b>Data Sekolah</b> Dengan Cara klik Sync Pada Tombol berikut.</p>
            </div>
            <div class="card-footer">
              Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection