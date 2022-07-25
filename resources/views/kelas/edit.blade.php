@extends('layouts.app')
@section('page', 'Edit Kelas')
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
                          <p>1. Ubah isi <b>Identitas Kelas</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Kelas Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('kelas.update',$data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                            <input type="hidden" name="id" id="id" value="{{$data->id}}">
                                <div class="form-group">
                                    <label>Kode Kelas</label>
                                    <input type="text" name="kode_kelas" id="kode_kelas" class="form-control" value="{{$data->kode_kelas}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Kelas</label>
                                    <input type="text" name="nama_kelas" id="nama_kelas" class="form-control"value="{{$data->nama_kelas}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Status Kelas</label>
                                    <select name="status_kelas" id="status_kelas" class="form-control">
                                        <option value="">--Pilih Status Kelas</option>
                                        <option value="Aktif" @if ($data->status_kelas == "Aktif")
                                            {{'selected'}}
                                        @endif>Aktif</option>
                                        <option value="Nonaktif" @if ($data->status_kelas == "Nonaktif")
                                            {{'selected'}}
                                        @endif>Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('kelas.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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