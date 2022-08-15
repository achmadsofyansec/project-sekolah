@extends('layouts.app')
@section('page', 'Tambah Tamu')
@section('content-app')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-boxes nav-icon text-success"></i> @yield('page')</h1>
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
              <div class="row">
                <div class="col-md-4 mt-1">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                          <h1 class="card-title"> <span class="badge badge-danger"><i class="fas fa-angle-right right"></i></span> Petunjuk</h1>
                        </div>
                        <div class="card-body">
                          <p>1. isi <b>Data Tamu</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Tamu Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('tamu.store')}}" method="POST">
                            @csrf
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
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('tamu.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>  
              </div>
                
            </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
@endsection