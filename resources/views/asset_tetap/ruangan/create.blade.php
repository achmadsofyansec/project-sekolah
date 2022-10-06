@extends('layouts.app')
@section('page', 'Tambah Ruangan')
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
                          <p>1. isi <b>Identitas Ruangan</b> Dengan Baik dan Benar.</p>
                          <p>2. Pastikan Sudah Menambah Nama Gedung Dahulu di <b>Data Gedung agar data dapat disimpan</b></p>
                          <p>3. Simpan Data Ruangan Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('ruangan.store')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Gedung</label>
                                    <select class="form-control" id="nama_gedung" name="nama_gedung">
                                        <option value="">- Nama Gedung -</option>
                                        @forelse ($gedung as $gedung)
                                        <option value="{{$gedung->nama_gedung}}">{{$gedung->nama_gedung}}</option>
                                          @empty
                                              
                                          @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Ruangan</label>
                                    <input type="text" name="jenis_ruangan" id="jenis_ruangan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Ruangan</label>
                                    <input type="text" name="nama" id="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <select name="kondisi" id="kondisi" class="form-control" style="width: 100%;" required>
                                      <option value="">- Kondisi -</option>
                                      <option value="Baik">Baik</option>
                                      <option value="Rusak Ringan">Rusak Ringan</option>
                                      <option value="Rusak Parah">Rusak Parah</option>
                                  </select>
                                </div>
                                 <div class="form-group">
                                    <label>Tahun Dibangun</label>
                                    <input type="number" name="tahun_dibangun" id="tahun_dibangun" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Panjang (m)</label>
                                    <input type="number" name="panjang" id="panjang" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Lebar (m)</label>
                                    <input type="number" name="lebar" id="lebar" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="foto" id="foto" class="form-control" required>
                                </div>
                            </div>  
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('ruangan.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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