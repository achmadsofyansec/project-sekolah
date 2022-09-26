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
                                        <input type="text" class="form-control" id="nama_lahan" name="nama_lahan" value="{{ $data->nama_lahan }}" required />
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
                                        <select class="form-control" id="status_lahan" name="status_lahan" placeholder="{{ $data->status_lahan }}">
                                        <option @if ($data->status_lahan == "LAHAN UTAMA")
                                            {{'selected'}}
                                        @endif>LAHAN UTAMA</option>
                                        <option @if ($data->status_lahan == "LAHAN TAMBAHAN")
                                          {{'selected'}}
                                            @endif>LAHAN TAMBAHAN</option>
                                            <option @if ($data->status_lahan == "LAHAN TIDAK DIGUNAKAN")
                                              {{'selected'}}
                                          @endif>LAHAN TIDAK DIGUNAKAN</option>
                                          <option @if ($data->status_lahan == "LAINNYA")
                                            {{'selected'}}
                                        @endif>LAINNYA</option>
                                      </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Kelurahan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="{{ $data->kelurahan }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Kecamatan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $data->kecamatan }}" required />
                                    </div>
                                </div>
                                 <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Kabupaten</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="{{ $data->kabupaten }}" required />
                                    </div>
                                </div>
                                 <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Provinsi</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $data->provinsi }}" required />
                                    </div>
                                </div>
                                 <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Kode Pos</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="kode_pos" name="kode_pos" value="{{ $data->kode_pos }}" required />
                                    </div>
                                </div>
                                 <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Kategori Geografis</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="kategori_geografis" name="kategori_geografis" value="{{ $data->luas_digunakan }}" required />
                                    </div>
                                </div>
                                 <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Wilayah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="wilayah" name="wilayah" value="{{ $data->wilayah }}" required />
                                    </div>
                                </div>
                                 <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak Provinsi</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_provinsi" name="jarak_provinsi" value="{{ $data->jarak_provinsi }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak Kabupaten</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_kabupaten" name="jarak_kabupaten" value="{{ $data->jarak_kabupaten }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak Kecamatan</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_kecamatan" name="jarak_kecamatan" value="{{ $data->jarak_kecamatan }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak Kemenag</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_kemenag" name="jarak_kemenag" value="{{ $data->jarak_kemenag }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak RA</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_ra" name="jarak_ra" value="{{ $data->jarak_ra }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak MI</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_mi" name="jarak_mi" value="{{ $data->jarak_mi }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak MTS</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_mts" name="jarak_mts" value="{{ $data->jarak_mts }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak SMP</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_smp" name="jarak_smp" value="{{ $data->jarak_smp }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak SD</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_sd" name="jarak_sd" value="{{ $data->jarak_sd }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak SMP</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_smp" name="jarak_smp" value="{{ $data->jarak_smp }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak SMA</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_sma" name="jarak_sma" value="{{ $data->jarak_sma }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak Pontren</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_pontren" name="jarak_pontren" value="{{ $data->jarak_pontren }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak PTKI</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_ptki" name="jarak_ptki" value="{{ $data->jarak_ptki }}" required />
                                    </div>
                                </div>
                                <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('lahan.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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