@extends('layouts.apps')
@section('page', 'Data Tamu')
@section('content-app')
    <!-- Main content -->
        <div class="container-fluid"  style="background-color: #1f8dd6">
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
                       <div class="card-header" >
                       </div>
                        <div class="col-md-8 mt-1">
                            <div class="card card-outline card-navy">
                                <div class="card-header">
                                    <center><h1 class="m-0" style="color:#df4231;"><br>BUKU TAMU</h1> </center>
                                    <center style="color: grey">---------------------------------------------------------------------------------</center>
                                    <div class="card-body">
                                        <div class="form-group">
                                          <label>Nama</label>
                                          <input type="text" name="nama_tamu" id="nama_tamu" placeholder="Masukkan Nama" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                          <label>Asal / Instansi</label>
                                          <input type="text" name="asal_tamu" id="asal_tamu" placeholder="Masukkan Asal" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                          <label>Alamat</label>
                                          <textarea name="alamat_tamu" id="alamat_tamu" cols="30" rows="8" placeholder="Masukkan Alamat" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                          <label>Keperluan</label>
                                          <input type="text" name="keperluan" id="keperluan" placeholder="Masukkan Keperluan" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                          <label>No Telepon</label>
                                          <input type="text" name="no_telp" id="no_telp" placeholder="Masukkan No Telepon" class="form-control" required>
                                        </div>
                                      </div>
                                        <a type="button" href="{{route('tamu.create')}}" class="btn col-12" style="background-color: #df4231; color:white;"><i class="fas fa-plus"></i> Tambah</a>
                                
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- /.content -->
  </div>
@endsection