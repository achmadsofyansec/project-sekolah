@extends('layouts.app')
@section('page', 'Edit Ruangan')
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
                          <p>1. Ubah Isi <b>Ruangan</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Ruangan Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('ruangan.update', $data->id)}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                            <label>Gedung</label>
                                            <select class="form-control" id="nama_gedung" name="nama_gedung">
                                            <option value="">{{ $data->nama_gedung }}</option>
                                          @forelse ($gedung as $gedung)
                                        <option value="{{$gedung->nama_gedung}}" @if ($data->nama_gedung == $gedung->nama_gedung)
                                          {{'selected'}}
                                        @endif>{{$gedung->nama_gedung}}</option>
                                          @empty
                                              
                                          @endforelse
                                      </select>
                                        </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jenis Ruangan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="jenis_ruangan" name="jenis_ruangan" value="{{ $data->jenis_ruangan }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Kondisi</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="kondisi" name="kondisi" value="{{ $data->kondisi }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Tahun Dibangun</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="tahun_dibangun" name="tahun_dibangun" value="{{ $data->tahun_dibangun }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Panjang</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="panjang" name="panjang" value="{{ $data->panjang }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Lebar</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="lebar" name="lebar" value="{{ $data->lebar }}" required />
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-4">
                                  @if ($data->foto != null)
                                <img src="{{asset('public/uploads/'.$data->foto)}}" alt="Image" class="img" width="100" height="100">
                                <p>{{$data->foto}}</p>
                                  @endif
                                </div>
                                <div class="col-md-8">
                                  <div class="form-grup">
                                    <label>Foto</label>
                                    <input type="file" name="foto" id="foto" class="form-control">
                                </div>
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