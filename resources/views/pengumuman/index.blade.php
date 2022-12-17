@extends('layouts.portal')
@section('page', 'Tambah Data Siswa')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row-mb-2">
            <div class="col-md-12 mt-1">
              @if(session('error'))
              <div class="alert alert-danger">
                  {{ session('error') }}
              </div>
              @endif
              @if(session('success'))
              <div class="alert alert-primary">
                  {{ session('success') }}
              </div>
              @endif
              
            </div>
        </div>
        <div class="row-mb-2">
            <div class="row-mb-2">
            <nav class="navbar navbar-expand-lg mb-3 ">
  <a class="navbar-brand font-weight-bold text-success" href="#">JAMANU</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <!-- <li class="nav-item active">
        <a class="nav-link font-weight-normal" href="#">Home</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link font-weight-normal" href="{{route('portal')}}">Portal Pendaftaran </a>
      </li>
      <li class="nav-item">
        <a class="nav-link font-weight-normal text-success" href="{{route('pengumuman')}}">Portal Pengumuman <span class="sr-only">(current)</a>
      </li>
    </ul>
  </div>
</nav>
            <div class="container-fluid">
                    <form action="{{route('cari')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-md-12">
                            <div class="card card-info">
                                <div class="card-header">
                                   <h1 class="text-center h1">
                                    <div class="text-center">
                                       <b>CEK PENERIMAAN SISWA BARU SMK SIPINTER</b> 
                                    </div>           
                                    </h1> 
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                       <p>Untuk Mencari Data Pendaftaran silahkan masukkan NIK Pada form dibawah </p> 
                                    </div>    
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                  <span class="fas fa-user"></span>
                                                </div>
                                              <input type="text" name="pendaftar" id="pendaftar" class="form-control" placeholder="Contoh : 123456789">
                                              <div class="input-group-append">
                                              </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-block">Cari</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    </form>           
            </div>
        </div>
    </section>
    <!-- /.content -->
