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
                                            @if($dataCari != null)
                <div class="section-top-border">
                  <table class="table table-bordered table-sm">
                    <tbody>
                      <tr>
                        <td><span style="float: left;">No. Pendaftaran</span></td>
                        <td><span style="float: left;">: {{ $dataCari->id }} </span></td>
                      </tr>
                      <tr>
                        <td><span style="float: left;">NIK</span></td>
                        <td><span style="float: left;">: {{ $dataCari->nik }} </span></td>
                      </tr>
                      <tr>
                        <td><span style="float: left;">Nama Calon Siswa</span></td>
                        <td><span style="float: left;">: {{ $dataCari->nama }} </span></td>
                      </tr>
                    </tbody>
                  </table>
                  @if($dataCari->status_siswa == "Diterima")
                  <div class="alert alert-success">
                    Selamat Anda <strong>Diterima</strong> Silahkan Melakukan Daftar Ulang</a>.
                  </div>
                  <div style="float: left;">
                    <a href="{{URL('/pengumuman')}}" class="btn btn-danger">
                      <i class="fa fa-sign-out"></i>
                      Kembali
                    </a>
                  </div>
                  
                  @endif
                  @if($dataCari->status_siswa == "Pendaftar")
                  <div class="alert alert-primary">
                    Mohon sabar data anda sedang kami Verivikasi
                  </div>
                  <div style="float: left;">
                    <a href="{{URL('/pengumuman')}}" class="btn btn-danger">
                      <i class="fa fa-sign-out"></i>
                      Kembali
                    </a>
                  </div>
                  
                  @endif
                  @if($dataCari->status_siswa == "Ditolak")
                  <div class="alert alert-danger">
                    Mohon Maaf anda dinyatakan <strong> Tidak Diterima</strong></a>.
                  </div> 
                  <div style="float: left;">
                    <a href="{{URL('/pengumuman')}}" class="btn btn-danger">
                      <i class="fa fa-sign-out"></i>
                      Kembali
                    </a>
                  </div>
                  @endif
                </div>
                @endif
              </div>
            </div>
          
          @if($dataCari == null)
            <div class="alert alert-danger mb-3">
                Data <strong>Tidak Ditemukan <a href="{{URL('/pengumuman')}}">Kembali Cari</a></strong></a>.
            </div>
          @endif
                        </div>
                        
                    </div>
                    </form>    

            </div>
        </div>
    </section>
    <!-- /.content -->
