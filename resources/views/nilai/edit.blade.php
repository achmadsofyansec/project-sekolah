@extends('layouts.app')
@section('page', 'Edit Data Nilai')
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
                          <p>1. Ubah Isi <b>Asset</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Asset Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('nilai.update', $data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nomor Ujian</label>
                                    <input type="text" name="kode_ujian" id="kode_ujian" class="form-control" value="{{ $data->kode_ujian }}">
                                </div>
                                <div class="form-group">
                                    <label>Nilai Bahasa Indonesia</label>
                                    <input type="number" name="bind" id="bind" class="form-control" value="{{ $data->bind }}">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai Bahasa Inggris</label>
                                    <input type="number" name="bing" id="bing" class="form-control" value="{{ $data->bing }}">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai Matematika</label>
                                    <input type="number" name="mat" id="mat" class="form-control" value="{{ $data->mat }}">
                                  </div>
                                  <div class="form-group">
                                    <label>Nilai Kejurusan</label>
                                    <input type="number" name="kejurusan" id="kejurusan" class="form-control" value="{{ $data->kejurusan }}">
                                  </div>
                                  <div class="form-group">
                                    <label>Status Kelulusan</label>
                                    <select name="status" id="status" class="form-control">
                                      <option value="">{{ $data->status }}</option>
                                      <option value="Lulus">Lulus</option>
                                      <option value="Tidak Lulus">Tidak Lulus</option>
                                      <option value="Drop Out">Drop Out</option>
                                    </select>
                                  </div>
                                <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('nilai.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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