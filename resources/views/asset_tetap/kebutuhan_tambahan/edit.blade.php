@extends('layouts.app')
@section('page', 'Edit Data Gedung')
@section('content-app')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-building nav-icon text-primary"></i> @yield('page')</h1>
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
                          <p>1. Ubah Isi <b>Gedung</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Gedung Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('gedung.update', $data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Nama Gedung</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama_gedung" name="nama_gedung" value="{{ $data->nama_gedung }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Nama Lahan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama_lahan" name="nama_lahan" value="{{ $data->nama_lahan }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jumlah Lantai</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="jml_lantai" name="jml_lantai" value="{{ $data->jml_lantai }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Kepemilikan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="kepemilikan" name="kepemilikan" value="{{ $data->kepemilikan }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Kondisi Kerusakan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="kondisi_kerusakan" name="kondisi_kerusakan" value="{{ $data->kondisi_kerusakan }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Kategori Kondisi</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="kategori_kondisi" name="kategori_kondisi" value="{{ $data->kategori_kondisi }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Tahun Dibangun</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="tahun_dibangun" name="tahun_dibangun" value="{{ $data->tahun_dibangun }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Luas Gedung</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="luas_gedung" name="luas_gedung" value="{{ $data->luas_gedung }}" required />
                                    </div>
                                </div>
                              </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('gedung.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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