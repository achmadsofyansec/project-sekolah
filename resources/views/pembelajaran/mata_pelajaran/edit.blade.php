@extends('layouts.app')
@section('page', 'Edit Mata Pelajaran')
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
                          <p>1. isi <b>Identitas  MataPelajaran</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data MataPelajaran Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('mapel.update',$data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kelompok</label>
                                    <select name="kelompok" id="kelompok" class="form-control" required>
                                        <option value="">--Pilih Kelompok Pelajaran--</option>
                                        @forelse ($kelompok as $item)
                                    <option value="{{$item->kode_kelompok}}" @if ($data->kode_kelompok == $item->kode_kelompok)
                                        {{'selected'}}
                                    @endif>{{$item->nama_kelompok}}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kode Mata Pelajaran</label>
                                <input type="text" name="kode_mapel" value="{{$data->kode_mapel}}" id="kode_mapel" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Mata Pelajaran</label>
                                    <input type="text" name="nama_mapel" value="{{$data->nama_mapel}}" id="nama_mapel" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Status Mata Pelajaran</label>
                                    <select name="status_mapel" id="status_mapel" class="form-control" required>
                                        <option value="">--Pilih Status Mapel--</option>
                                        <option value="Aktif" @if ($data->status_mapel == "Aktif")
                                            {{'selected'}}
                                        @endif>Aktif</option>
                                        <option value="Nonaktif" @if ($data->status_mapel == "Nonaktif")
                                            {{'selected'}}
                                        @endif>Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('mapel.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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