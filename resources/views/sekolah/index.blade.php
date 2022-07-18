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
              <h1 class="card-title"><i class="nav-icon fas fa-school text-success"></i> Data Sekolah</h1>
            </div>
            <form action="#" enctype="multipart/form-data" method="post">
            <div class="card-body">
                <div class="form-group">
                  <label>Kode Sekolah</label>
                  <input type="text" name="kode_sekolah" id="kode_sekolah" class="form-control" placeholder="Kode Sekolah">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NPSN</label>
                      <input type="text" name="npsn" id="npsn" class="form-control" placeholder="NPSN">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NSM</label>
                      <input type="text" name="nsm" id="nsm" class="form-control" placeholder="NSM">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Akreditasi</label>
                  <input type="text" name="akreditasi" id="akreditasi" class="form-control" placeholder="Akreditasi">
                </div>
                
                <div class="form-group">
                  <label>Nama Sekolah</label>
                  <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control" placeholder="Nama Sekolah">
                </div>
                <div class="form-group">
                  <label>Alamat Sekolah</label>
                  <textarea name="alamat_sekolah" id="alamat_sekolah" cols="30" rows="10" class="form-control" placeholder="Alamat Sekolah"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Longtitude</label>
                        <input type="text" name="longtitude" id="longtitude" class="form-control" placeholder="Koordinat Longtitude">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="latitude" id="latitude" class="form-control" placeholder="Koordinat Latitude">
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <select name="kecamatan" id="kecamatan" class="form-control">
                        <option value="">Pilih Kecamatan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Kelurahan</label>
                      <select name="kelurahan" id="kelurahan" class="form-control">
                        <option value="">Pilih Kelurahan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Kode Pos</label>
                      <input type="number" name="kode_pos" id="kode_pos" class="form-control" placeholder="Kode Pos">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Nomor HP</label>
                  <input type="number" name="nomor_hp" id="email" class="form-control" placeholder="Nomor Hp">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                  <label>Website Resmi</label>
                  <input type="text" name="website" id="website" class="form-control" placeholder="Website">
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
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
              <p>1. isi <b>Identitas Sekolah</b> Dengan Baik dan Benar.</p>
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