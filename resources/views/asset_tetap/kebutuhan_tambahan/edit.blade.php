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
                        <form action="{{route('kebutuhan_tambahan.update', $data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Tahun Pengajuan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="tahun_pengajuan" name="tahun_pengajuan" value="{{ $data->tahun_pengajuan }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jenis</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $data->jenis }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jumlah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $data->jumlah }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Sifat</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="sifat" name="sifat" value="{{ $data->sifat }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Rangking</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="rangking" name="rangking" value="{{ $data->rangking }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Kategori Kondisi</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="kategori_kondisi" name="kategori_kondisi" value="{{ $data->kategori_kondisi }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Foto</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="foto" name="foto" value="{{ $data->foto }}" required />
                                    </div>
                                </div>
                              </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('kebutuhan_tambahan.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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