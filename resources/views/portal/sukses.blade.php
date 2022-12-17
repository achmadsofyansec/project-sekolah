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
                        <div class="row">
                        <div class="col-md-12">
                            <div class="card card-info">
                                <div class="card-header">
                                   <h1 class="text-center h1">
                                    <div class="text-center">
                                       <b>PORTAL PENDAFTARAN SISWA BARU SMK SIPINTER</b> 
                                    </div>           
                                    </h1> 
                                </div>
                                <div class="card-body">
                                    <div class="text-center alert alert-danger">
                                       <p>Terimakasih Telah Melakukan Pendaftaran silahkan menunggu pengumuman selanjutnya</p> 
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
                                          
                        </div>
                        
                    </div>
                    </form>    

            </div>
        </div>
    </section>
    <!-- /.content -->
