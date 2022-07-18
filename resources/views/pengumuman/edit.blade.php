@extends('layouts.app')
@section('page', 'Sekolah')
@section('content-app')
<div class="content-wrapper">
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> @yield('page')</h1>
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
<div class="content">
  <div class="container-fluid">
    <div class="row-mb-2">
      <div class="row">
        <div class="col-md-8 mt-1">
          <div class="card card-success card-outline">
            <div class="card-header">
              <h1 class="card-title"><i class="nav-icon fas fa-paste text-success"></i> Data Pengumuman</h1>
            </div>
            <form action="{{route('pengumuman.update',$data->id)}}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Pengumuman</label>
                    <input type="text" value="{{$data->nama_pengumuman}}" name="nama_pengumuman" id="nama_pengumuman" class="form-control" placeholder="Masukkan Nama Pengumuman">
                    </div>
                    <div class="form-group">
                        <label> Isi Pengumuman</label>
                        <textarea name="isi_pengumuman" id="isi_pengumuman" cols="30" rows="10" class="form-control" placeholder="Masukkan Isi">{{$data->isi_pengumuman}}</textarea>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        @if ($data->file_pengumuman != null)
                      <img src="{{asset('uploads/'.$data->file_pengumuman)}}" alt="Image" class="img" width="100" height="100">
                      <p>{{$data->file_pengumuman}}</p>
                        @endif
                      </div>
                      <div class="col-md-8">
                        <div class="form-grup">
                          <label>Foto Pengumuman</label>
                          <input type="file" name="file_pengumuman" id="file_pengumuman" class="form-control">
                      </div>
                      </div>
                    </div>
                   
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="{{route('pengumuman.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
                </div>
                </form>
          </div>
        </div>
        <div class="col-md-4 mt-1">
          <div class="card card-success card-outline">
            <div class="card-header">
              <h1 class="card-title"> <span class="badge badge-danger"><i class="fas fa-angle-right right"></i></span> Petunjuk</h1>
            </div>
            <div class="card-body">
              <p>1. Ubah <b>Pengumuman Pada Form Disamping</b> Dengan Baik dan Benar.</p>
              <p>2. Simpan Perubahan Dengan Cara Menekan <b>Tombol Simpan</b>  Yang berada di bawah Form</p>
            </div>
            <div class="card-footer">
              Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection