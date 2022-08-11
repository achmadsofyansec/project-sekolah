@extends('layouts.app')
@section('page', 'Tambah Dokumen')
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
                          <p>1. isi <b>Identitas Dokumen</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Dokumen Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('jenis_dokumen.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Ruangan</label>
                                    <input type="text" name="ruangan" id="ruangan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Lemari</label>
                                    <input type="text" name="lemari" id="lemari" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Rak</label>
                                    <input type="text" name="rak" id="rak" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Box</label>
                                    <input type="text" name="box" id="box" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Map</label>
                                    <input type="text" name="map" id="map" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Urut</label>
                                    <input type="text" name="urut" id="urut" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Dokumen</label>
                                    <input type="date" class="form-control" name="tanggal_dokumen" id="tanggal_dokumen" required>
                                 </div>
                                 <div class="form-group">
                                    <label>Jenis Dokumen</label>
                                    <input type="text" name="jenis_dokumen" id="jenis_dokumen" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Dokumen</label>
                                    <input type="text" name="nomor_dokumen" id="nomor_dokumen" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Dokumen</label>
                                    <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" name="file" id="file" class="form-control" accept="file/*">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('jenis_dokumen.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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