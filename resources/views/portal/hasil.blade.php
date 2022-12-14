@extends('layouts.portal')
@section('page', 'Tambah Data Siswa')

    <!-- Main content -->
    <section class="content pt-5">
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
            <div class="container-fluid">
                    <form action="{{route('pendaftar.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-md-12">
                            <div class="card card-info">
                                <div class="card-header">
                                   <h1 class="text-center h1">
                                    <div class="text-center">
                                       <b>SELAMAT DATANG DI PORTAL PENDAFTARAN PESERTA DIDIK BARU TAHUN 2023/2024 SMK SIPINTER</b> 
                                    </div>
                                   
                                    </h1> 
                                </div>
                                
                            </div>
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                   <h1 class="card-title">
                                    <!-- <i class="fas fa-image"></i> -->
                                    <b>Harap Untuk Dibaca Terlebih Dahulu</b>  
                                    </h1> 
                                   <!--  <div class="card-tools">
                                      <button type="button" class="btn btn-danger" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                      </button>
                                    </div> -->
                                </div>
                                <div class="card-body">
                                    <div class="text-center alert alert-danger">
                                       <p>Mohon maaf portal Pendaftaran Siswa Baru belum dibuka silahkan menunggu info lebih lanjut !</p> 
                                    </div>    
                                    <!-- <div class="row">
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
                                    </div> -->
                                    
                                </div>
                                
                            </div>
                            <!-- <div class="card  card-info">
                                <div class="card-header">
                                   <h1 class="text-center h1">
                                    <div class="text-center mt-1">
                                
                                    <a href="{{route('portal-pendaftaran.create')}}" class="btn btn-success">PORTAL PENDAFTARAN</a>
                                    </div>
                                   
                                    </h1> 
                                </div> -->
                            
                        </div>
                        
                    </div>
                    </form>
                    
               
            </div>
        </div>
    </section>
    <!-- /.content -->

