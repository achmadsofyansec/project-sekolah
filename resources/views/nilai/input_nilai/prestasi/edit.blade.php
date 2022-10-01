@extends('layouts.app')
@section('page', 'Edit Prestasi')
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
                          <p>1. Ubah isi <b>Identitas Prestasi</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Prestasi Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('input_prestasi.update',$data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                  <label>Siswa</label>
                                  <select name="kode_siswa" id="kode_siswa" class="form-control" style="width:100%;" disabled>
                                    <option value=""> -- Pilih Siswa -- </option>
                                    @forelse ($siswa as $item)
                                    <option value="{{$item->id_siswa}}" @if ($data->kode_siswa == $item->id_siswa)
                                        {{'selected'}}
                                    @endif >{{$item->nama }} { {{$item->kode_kelas}} {{$item->kode_jurusan}} Tahun Ajaran {{$item->tahun_ajaran}} }</option>
                                    @empty
                                    @endforelse
                                </select>
                                </div>
                                <div class="form-group">
                                  <label>Nama Lomba</label>
                                  <input type="text" name="nama_lomba" id="nama_lomba" value="{{$data->nama_lomba}}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                  <label>Nama Penyelenggara</label>
                                  <input type="text" name="nama_penyelenggara" id="nama_penyelenggara" value="{{$data->nama_penyelenggara}}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                  <label>Tahun</label>
                                  <input type="Text" name="tahun_lomba" id="tahun_lomba" value="{{$data->tahun_lomba}}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                  <label>Tingkat</label>
                                  <input type="text" name="tingkat_lomba" id="tingkat_lomba" value="{{$data->tingkat_lomba}}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Peringkat Yang Diraih</label>
                                    <input type="number" name="peringkat" id="peringkat" value="{{$data->peringkat_lomba}}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                  <label>Keterangan</label>
                                    <textarea name="ket_lomba" id="ket_lomba" class="form-control" cols="30" rows="10">{{$data->keterangan_lomba}}</textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('input_prestasi.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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