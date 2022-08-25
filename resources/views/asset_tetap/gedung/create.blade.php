@extends('layouts.app')
@section('page', 'Tambah Gedung')
@section('content-app')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-chalkboard nav-icon text-info"></i> @yield('page')</h1>
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
                          <p>1. isi <b>Identitas Gedung</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Dokumen Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('gedung.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Gedung</label>
                                    <input type="text" name="nama_gedung" id="nama_gedung" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lahan</label>
                                    <input type="text" name="nama_lahan" id="nama_lahan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Lantai</label>
                                    <input type="text" name="jml_lantai" id="jml_lantai" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Kepemilikan</label>
                                    <input type="text" name="kepemilikan" id="kepemilikan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Kondisi Kerusakan</label>
                                    <input type="text" name="kondisi_kerusakan" id="kondisi_kerusakan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Kategori Kerusakan</label>
                                    <input type="text" name="kategori_kondisi" id="kategori_kondisi" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Dibangun</label>
                                    <input type="text" name="tahun_dibangun" id="tahun_dibangun" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Luas Gedung</label>
                                    <input type="text" name="luas_gedung" id="luas_gedung" class="form-control" required>
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