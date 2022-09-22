@extends('layouts.app')
@section('page', 'Edit Lahan')
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
                          <p>1. Ubah Isi <b>Lahan</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Lahan Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('lahan.update', $data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Nama Lahan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="lahan" name="lahan" value="{{ $data->nama_lahan }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-12">
                                        <textarea type="text" class="form-control" id="alamat" name="alamat" required />{{ $data->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Luas (m)</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="luas" name="luas" value="{{ $data->luas }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Digunakan</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="luas_digunakan" name="luas_digunakan" value="{{ $data->luas_digunakan }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="status" name="Status">
                                          <option>{{ $data->status }}</option>
                                          <option>opt 1</option>
                                          <option>opt 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('laboratorium.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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