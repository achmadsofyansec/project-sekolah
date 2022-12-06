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
                                       <b>CEK PENERIMAAN SISWA BARU SMK SIPINTER</b> 
                                    </div>           
                                    </h1> 
                                </div>
                                <div class="card-body text-center">
                                    <div class="card text-center">
                                       tes tes
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
