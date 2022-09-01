@extends('layouts.app')
@section('page', 'Kebutuahan Tambahan')
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
                          <p>1. isi <b>Identitas Kebutuhan Tambahan</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Dokumen Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('kebutuhan_tambahan.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tahun Pengajuan</label>
                                    <input type="text" name="tahun_pengajuan" id="tahun_pengajuan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <input type="text" name="jenis" id="jenis" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="text" name="jumlah" id="jumlah" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Sifat</label>
                                    <input type="text" name="sifat" id="sifat" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Rangking</label>
                                    <input type="text" name="rangking" id="rangking" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Kategori Kondisi</label>
                                    <input type="text" name="kategori_kondisi" id="kategori_kondisi" class="form-control" required>
                                </div>
                               <div class="form-group">
                                    <label>File</label>
                                    <input type="file" name="foto" id="foto" class="form-control" required>
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