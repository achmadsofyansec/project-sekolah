@extends('layouts.app')
@section('page', 'Tambah Lahan')
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
                          <p>1. isi <b>Identitas Lahan</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Lahan Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('lahan.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Nama Lahan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama_lahan" name="nama_lahan"required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-12">
                                        <textarea type="text" class="form-control" id="alamat" name="alamat" required /></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Luas (m)</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="luas" name="luas" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Digunakan</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="luas_digunakan" name="luas_digunakan" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="status_lahan" name="status_lahan" placeholder=" ">
                                            <option>LAHAN UTAMA</option>
                                            <option>LAHAN TAMBAHAN</option>
                                            <option>LAHAN TIDAK DIGUNAKAN</option>
                                            <option>LAHAN LAINNYA</option>
                                      </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Kelurahan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="kelurahan" name="kelurahan"  required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Kecamatan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="kecamatan" name="kecamatan"  required />
                                    </div>
                                </div>
                                 <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Kabupaten</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="kabupaten" name="kabupaten"  required />
                                    </div>
                                </div>
                                 <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Provinsi</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="provinsi" name="provinsi"  required />
                                    </div>
                                </div>
                                 <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Kode Pos</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="kode_pos" name="kode_pos"  required />
                                    </div>
                                </div>
                                 <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Kategori Geografis</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="kategori_geografis" name="kategori_geografis" required />
                                    </div>
                                </div>
                                 <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Wilayah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="wilayah" name="wilayah"  required />
                                    </div>
                                </div>
                                 <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak Provinsi</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_provinsi" name="jarak_provinsi"  required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak Kabupaten</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_kabupaten" name="jarak_kabupaten"  required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak Kecamatan</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_kecamatan" name="jarak_kecamatan"  required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak Kemenag</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_kemenag" name="jarak_kemenag"  required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak RA</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_ra" name="jarak_ra"  required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak MI</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_mi" name="jarak_mi"  required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak MTS</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_mts" name="jarak_mts"  required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak SMP</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_smp" name="jarak_smp"  required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak SD</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_sd" name="jarak_sd" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak SMP</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_smp" name="jarak_smp"  required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak SMA</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_sma" name="jarak_sma"  required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak Pontren</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_pontren" name="jarak_pontren"  required />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 col-form-label">Jarak PTKI</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="jarak_ptki" name="jarak_ptki"  required />
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