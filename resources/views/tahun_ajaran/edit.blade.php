@extends('layouts.app')
@section('page', 'Tambah Tahun Ajaran')
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
                          <p>1. Ubah isi <b>Tahun Ajaran</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Tahun Ajaran Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('tahun_ajaran.update',$data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Tahun Ajaran</label>
                                    <input type="text" name="kode_tahun_ajaran" id="kode_tahun_ajaran" value="{{$data->kode_tahun_ajaran}}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="number" name="tahun_ajaran_awal" id="tahun_ajaran_awal" value="{{$tahun_awal}}" class="form-control" required>
                                        </div>
                                        <div class="col-md-1 text-center">
                                            <h3>/</h3>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" name="tahun_ajaran_akhir" id="tahun_ajaran_akhir" value="{{$tahun_akhir}}" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Semester</label>
                                    <select name="semester_tahun_ajaran" id="semester_status_ajaran" class="form-control">
                                        <option value="">--Pilih Semester --</option>
                                        <option value="1" @if ($data->semester == '1')
                                            {{'selected'}}
                                        @endif>1</option>
                                        <option value="2" @if ($data->semester == '2')
                                            {{'selected'}}
                                        @endif>2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status Kelas</label>
                                    <select name="status_tahun_ajaran" id="status_status_ajaran" class="form-control">
                                        <option value="">--Pilih Semester--</option>
                                        <option value="Aktif" @if ($data->status_tahun_ajaran == 'Aktif')
                                            {{'selected'}}
                                        @endif>Aktif</option>
                                        <option value="Nonaktif" @if ($data->status_tahun_ajaran == 'Nonaktif')
                                            {{'selected'}}
                                        @endif>Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('tahun_ajaran.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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