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
                                    <div class="card-body">
                                    <p>1. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                    <p>2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                    <p>3. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                    <p>4. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                </div>
                                
                            </div>
                            <div class="card  card-info">
                                <div class="card-header">
                                   <h1 class="text-center h1">
                                    <div class="text-center mt-1">
                                
                                    <a href="{{route('portal-pendaftaran.create')}}" class="btn btn-success">PORTAL PENDAFTARAN</a>
                                    </div>
                                   
                                    </h1> 
                                </div>
                            
                        </div>
                        
                    </div>
                    </form>
                    
               
            </div>
        </div>
    </section>
    <!-- /.content -->

@section('content-script')
    <script>
        $('#foto_siswa').change( function(event) {
            $("#view-img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
        });
    </script>
@endsection