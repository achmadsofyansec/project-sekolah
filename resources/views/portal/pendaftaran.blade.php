@extends('layouts.portal')
@section('page', 'Tambah Data Siswa')

    <!-- Main content -->
    <section class="content pt-5">
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
              
            </div>
        </div>
        <div class="row-mb-2">
            <div class="container-fluid">
                    <form action="{{route('pendaftar.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-md-4">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                   <h1 class="card-title">
                                    <i class="fas fa-document"></i>
                                    Tatacara Pendaftaran
                                    </h1> 
                                </div>
                                <div class="card-body">
                                    <p>1. Ubah Isi <b>TES</b> Dengan Baik dan Benar.</p>
                                <p>2. Simpan Data TES Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                                </div>
                            </div>
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                   <h1 class="card-title">
                                    <i class="fas fa-image"></i>
                                    Foto Siswa
                                    </h1> 
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        
                                        <input name="status_siswa" id="status_siswa" class="form-control" value="Diverivikasi" hidden>
                                    </div>

                                    <div class="form-group text-center">
                                        <img src="{{asset('public/dist/img/AdminLTELogo.png')}}" alt="Logo" id="view-img" class="img" width="200" height="200">
                                    </div>
                                    <div class="form-group">
                                        <input onchange="setImg(this.value)" type="file" accept="image/png, image/jpeg" name="foto_siswa" id="foto_siswa" class="form-control" accept="image/*">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" value="Simpan" class="btn btn-info">
                                    <a href="{{route('pendaftar.index')}}" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h1 class="card-title">
                                        <i class="fas fa-user"></i>
                                        Data Siswa
                                    </h1>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a href="#data_siswa" class="nav-link active" data-toggle="tab">Data Siswa</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#data_keluarga" class="nav-link" data-toggle="tab">Data Keluarga</a>
                                            </li>
                                        </ul>
                                    </div>  
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="data_siswa" style="position: relative;">
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input type="text" class="form-control" name="nik" id="nik" required>
                                            </div>
                                            <div class="form-group">
                                                <label>NISN</label>
                                                <input type="text" class="form-control" name="nisn" id="nisn" required>
                                            </div>
                                            <div class="form-group">
                                                <label>KIP</label>
                                                <input type="text" class="form-control" name="kip" id="kip">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Siswa</label>
                                                <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tempat Lahir</label>
                                                        <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir</label>
                                                        <input type="date" class="form-control" name="tgl_lhr" id="tgl_lhr" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select name="jns_kelamin" id="jns_kelamin" class="form-control" required>
                                                    <option value="">--Pilih Jenis Kelamin--</option>
                                                    <option value="Laki Laki">Laki Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Agama</label>
                                                <select name="agama" id="agama" class="form-control" required>
                                                    <option value="">--Pilih Agama--</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Katholik">Katholik</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                </select>
                                            </div>                                            
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Alamat" class="form-control" required></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Anak Ke</label>
                                                        <input type="number" name="anak_ke" id="anak_ke" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Jumlah Saudara</label>
                                                        <input type="number" name="jml_saudara" id="jml_saudara" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="form-group">
                                                    <label>Hobi</label>
                                                    <input type="text" class="form-control" name="hobi" id="hobi">
                                                </div>
                                                <div class="form-group">
                                                    <label>Cita Cita</label>
                                                    <input type="text" class="form-control" name="cita_cita" id="cita_cita">
                                                </div>
                                                <div class="form-group">
                                                    <label>No Hp</label>
                                                    <input type="text" class="form-control" name="no_hp" id="no_hp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email" id="email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Yang Membiayai Sekolah</label>
                                                    <select name="biaya_sekolah" id="biaya_sekolah" class="form-control" required>
                                                        <option value="">--Pilih Pembiaya--</option>
                                                        <option value="Orang Tua">Orang Tua</option>
                                                        <option value="Sendiri">Sendiri</option>
                                                        <option value="Saudara">Saudara</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Kebutuhan Disabilitas</label>
                                                    <input type="text" class="form-control" name="kebutuhan_disabilitas" id="kebutuhan_disabilitas">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kebutuhan Khusus</label>
                                                    <input type="text" class="form-control" name="kebutuhan_khusus" id="kebutuhan_khusus">
                                                </div>
                                                <div class="form-group">
                                                    <label>Status Tempat Tinggal</label>
                                                    <select name="status_tempat_tinggal" id="status_tempat_tiggal" class="form-control" required>
                                                        <option value="">--Status Tempat Tinggal--</option>
                                                        <option value="Tinggal Dengan Orangtua/Wali">Tinggal Dengan Orangtua/Wali</option>
                                                        <option value="Tinggal Sendiri">Tinggal Sendiri / Kos</option>
                                                        <option value="Tinggal Dengan Saudara">Tinggal Dengan Saudara</option>
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Jarak Tempat Tinggal</label>
                                                            <input type="number" class="form-control" name="jarak_tinggal" id="jarak_tinggal">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Waktu Tempuh</label>
                                                            <input type="number" class="form-control" name="waktu_tempuh" id="waktu_tempuh">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Transportasi Ke Sekolah</label>
                                                            <select name="transportasi" id="transportasi" class="form-control" required>
                                                                <option value="">--Pilih Transportasi--</option>
                                                                <option value="Diantar">Diantar</option>
                                                                <option value="Bawa Kendaraan">Bawa Kendaraan</option>
                                                                <option value="Jalan Kaki">Jalan Kaki</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                        <div class="tab-pane" id="data_keluarga" style="position: relative;">
                                            <div class="form-group">
                                                <label> Data Ayah</label>
                                                <div class="form-group">
                                                    <label>NIK</label>
                                                    <input type="text" name="nik_ayah" id="nik_ayah" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Ayah</label>
                                                    <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" required>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tempat Lahir</label>
                                                            <input type="text" name="tempat_lahir_ayah" id="tempat_lahir_ayah" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <input type="text" name="status_ayah" id="status_ayah" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pendidikan Terakhir</label>
                                                    <select name="status_pendidikan_ayah" id="status_pendidikan_ayah" style="width:100%;" class="form-control" required>
                                                        <option value="">--Pilih Pendidikan--</option>
                                                        <option value="SD">SD Sederajat</option>
                                                        <option value="SMP">SMP Sederajat</option>
                                                        <option value="SMA">SMA Sederajat</option>
                                                        <option value="Kuliah">Kuliah</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>No Telp</label>
                                                    <input type="text" name="no_telp_ayah" id="no_telp_ayah" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Domisili</label>
                                                    <select name="domisili_ayah" id="domisili_ayah" style="width:100%;" class="form-control" required>
                                                        <option value="">--Pilih Domisili--</option>
                                                        <option value="Dalam Negeri">Luar Negeri</option>
                                                        <option value="Luar Negeri">Dalam Negeri</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Penghasilan Ayah</label>
                                                    <input type="text" name="penghasilan_ayah" id="penghasilan_ayah" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat Ayah</label>
                                                   <textarea name="alamat_ayah" id="alamat_ayah" cols="30" rows="10" placeholder="Alamat" class="form-control" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status Tempat Tinggal</label>
                                                    <select name="status_tmp_ayah" id="status_tmp_ayah" style="width:100%;" class="form-control" required>
                                                        <option value="">--Pilih Status--</option>
                                                        <option value="Milik Sendiri">Milik Sendiri</option>
                                                        <option value="Kontrak">Kontrak</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> Data ibu</label>
                                                <div class="form-group">
                                                    <label>NIK</label>
                                                    <input type="text" name="nik_ibu" id="nik_ibu" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama ibu</label>
                                                    <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" required>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tempat Lahir</label>
                                                            <input type="text" name="tempat_lahir_ibu" id="tempat_lahir_ibu" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <input type="text" name="status_ibu" id="status_ibu" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pendidikan Terakhir</label>
                                                    <select name="status_pendidikan_ibu" style="width:100%;" id="status_pendidikan_ibu" class="form-control" required>
                                                        <option value="">--Pilih Pendidikan--</option>
                                                        <option value="SD">SD Sederajat</option>
                                                        <option value="SMP">SMP Sederajat</option>
                                                        <option value="SMA">SMA Sederajat</option>
                                                        <option value="Kuliah">Kuliah</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>No Telp</label>
                                                    <input type="text" name="no_telp_ibu" id="no_telp_ibu" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Domisili</label>
                                                    <select name="domisili_ibu" id="domisili_ibu" style="width:100%;" class="form-control" required>
                                                        <option value="">--Pilih Domisili--</option>
                                                        <option value="Dalam Negeri">Luar Negeri</option>
                                                        <option value="Luar Negeri">Dalam Negeri</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Penghasilan ibu</label>
                                                    <input type="text" name="penghasilan_ibu" id="penghasilan_ibu" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat ibu</label>
                                                   <textarea name="alamat_ibu" id="alamat_ibu" cols="30" rows="10" placeholder="Alamat" class="form-control" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status Tempat Tinggal</label>
                                                    <select name="status_tmp_ibu" id="status_tmp_ibu" style="width:100%;" class="form-control" required>
                                                        <option value="">--Pilih Status--</option>
                                                        <option value="Milik Sendiri">Milik Sendiri</option>
                                                        <option value="Kontrak">Kontrak</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> Data wali</label>
                                                <div class="form-group">
                                                    <label>NIK</label>
                                                    <input type="text" name="nik_wali" id="nik_wali" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama wali</label>
                                                    <input type="text" name="nama_wali" id="nama_wali" class="form-control" required>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tempat Lahir</label>
                                                            <input type="text" name="tempat_lahir_wali" id="tempat_lahir_wali" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" name="tanggal_lahir_wali" id="tanggal_lahir_wali" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <input type="text" name="status_wali" id="status_ibu" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pendidikan Terakhir</label>
                                                    <select name="status_pendidikan_wali" style="width:100%;" id="status_pendidikan_wali" class="form-control" required>
                                                        <option value="">--Pilih Pendidikan--</option>
                                                        <option value="SD">SD Sederajat</option>
                                                        <option value="SMP">SMP Sederajat</option>
                                                        <option value="SMA">SMA Sederajat</option>
                                                        <option value="Kuliah">Kuliah</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input type="text" name="pekerjaan_wali" id="pekerjaan_wali" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>No Telp</label>
                                                    <input type="text" name="no_telp_wali" id="no_telp_wali" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Domisili</label>
                                                    <select name="domisili_wali" id="domisili_wali" style="width:100%;" class="form-control" required>
                                                        <option value="">--Pilih Domisili--</option>
                                                        <option value="Dalam Negeri">Luar Negeri</option>
                                                        <option value="Luar Negeri">Dalam Negeri</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Penghasilan wali</label>
                                                    <input type="text" name="penghasilan_wali" id="penghasilan_wali" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat wali</label>
                                                   <textarea name="alamat_wali" id="alamat_wali" cols="30" rows="10" placeholder="Alamat" class="form-control" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status Tempat Tinggal</label>
                                                    <select name="status_tmp_wali" id="status_tmp_wali" style="width:100%;" class="form-control" required>
                                                        <option value="">--Pilih Status--</option>
                                                        <option value="Milik Sendiri">Milik Sendiri</option>
                                                        <option value="Kontrak">Kontrak</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    </form>
                    
               
            </div>
        </div>
    </section>
    <!-- /.content -->
