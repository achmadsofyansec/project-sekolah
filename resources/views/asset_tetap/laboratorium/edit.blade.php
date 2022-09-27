@extends('layouts.app')
@section('page', 'Edit Laboratorium')
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
                          <p>1. Ubah Isi <b>Laboratorium</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Laboratorium Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('laboratorium.update', $data->id)}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Unit</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="unit" name="unit" value="{{ $data->unit }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jumlah Baik</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="jml_baik" name="jml_baik" value="{{ $data->jml_baik }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jumlah Rusak Ringan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="jml_rusak_ringan" name="jml_rusak_ringan" value="{{ $data->jml_rusak_ringan }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jumlah Rusak Berat</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="jml_rusak_berat" name="jml_rusak_berat" value="{{ $data->jml_rusak_berat }}" required />
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