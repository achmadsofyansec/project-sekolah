@extends('layouts.app')
@section('page', 'Edit Kelompok')
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
                          <p>1. Ubah isi <b>Identitas Kelompok MataPelajaran</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Kelompok MataPelajaran Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('kelompok_mapel.update',$data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Kelompok</label>
                                <input type="text" name="kode_kelompok" id="kode_kelompok" class="form-control" value="{{$data->kode_kelompok}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Kelompok</label>
                                    <input type="text" name="nama_kelompok" id="nama_kelompok" class="form-control" value="{{$data->nama_kelompok}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Status Kelompok</label>
                                    <select name="status_kelompok" id="status_kelompok" class="form-control">
                                        <option value="">--Pilih Status Kelompok--</option>
                                        <option value="Aktif" @if ($data->status_kelompok == "Aktif")
                                            {{'selected'}}
                                        @endif>Aktif</option>
                                        <option value="Nonaktif" @if ($data->status_kelompok == "Nonaktif")
                                            {{'selected'}}
                                        @endif>Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('kelompok_mapel.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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