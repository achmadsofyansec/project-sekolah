@extends('layouts.app')
@section('page', 'Edit Data Siswa')
@section('content-app')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('page')</h1>
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
              
            </div>
        </div>
        <div class="row-mb-2">
            <div class="container-fluid">
                    <form action="{{ route('siswa.update',$data->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                        <div class="col-md-4">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                   <h1 class="card-title">
                                    <i class="fas fa-image"></i>
                                    Foto Siswa
                                    </h1> 
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status_siswa" id="status_siswa" class="form-control">
                                            <option value="">--Pilih Status--</option>
                                            <option value="Aktif" @if ($data->status_siswa == "Aktif")
                                                {{'selected'}}
                                            @endif>Aktif</option>
                                            <option value="Nonaktif" @if ($data->status_siswa == "Nonaktif")
                                                {{'selected'}}
                                            @endif>Nonaktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group text-center">
                                        @if ($data->foto_siswa != '-')
                                            <img src="{{$img}}" alt="Logo" class="img" width="200" height="200">        
                                        @else
                                            <h1>Tidak Ada Foto</h1>
                                        @endif
                                    
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="foto_siswa" id="foto_siswa" class="form-control">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" value="Simpan" class="btn btn-info">
                                    <a href="{{route('siswa.index')}}" class="btn btn-danger">Kembali</a>
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
                                                <a href="#data_belajar" class="nav-link" data-toggle="tab">Aktivitas Belajar</a>
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
                                            <input type="text" class="form-control" value="{{$data->nik}}" name="nik" id="nik" required>
                                            </div>
                                            <div class="form-group">
                                                <label>NISN</label>
                                                <input type="text" class="form-control" value="{{$data->nisn}}" name="nisn" id="nisn" required>
                                            </div>
                                            <div class="form-group">
                                                <label>KIP</label>
                                                <input type="text" class="form-control" value="{{$data->kip}}" name="kip" id="kip" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Siswa</label>
                                                <input type="text" class="form-control" value="{{$data->nama}}" name="nama_siswa" id="nama_siswa" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tempat Lahir</label>
                                                        <input type="text" class="form-control" value="{{$data->tmp_lahir}}" name="tmp_lahir" id="tmp_lahir" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir</label>
                                                        <input type="date" class="form-control" value="{{$data->tgl_lhr}}" name="tgl_lhr" id="tgl_lhr" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select name="jns_kelamin" id="jns_kelamin" class="form-control">
                                                    <option value="">--Pilih Jenis Kelamin--</option>
                                                    <option value="Laki Laki" @if ($data->jns_kelamin == "Laki Laki")
                                                        {{'selected'}}
                                                    @endif>Laki Laki</option>
                                                    <option value="Perempuan" @if ($data->jns_kelamin == "Perempuan")
                                                        {{'selected'}}
                                                    @endif>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Agama</label>
                                                <select name="agama" id="agama" class="form-control">
                                                    <option value="">--Pilih Agama--</option>
                                                    <option value="Islam" @if ($data->agama == "Islam")
                                                        {{'selected'}}
                                                      @endif>Islam</option>
                                                      <option value="Islam" @if ($data->agama == "Islam")
                                                        {{'selected'}}
                                                      @endif>Katholik</option>
                                                      <option value="Katholik" @if ($data->agama == "Katholik")
                                                        {{'selected'}}
                                                      @endif>Kristen</option>
                                                      <option value="Kristen" @if ($data->agama == "Kristen")
                                                        {{'selected'}}
                                                      @endif>Hindu</option>
                                                      <option value="Hindu" @if ($data->agama == "Hindu")
                                                        {{'selected'}}
                                                      @endif>Budha</option>
                                                      <option value="Islam" @if ($data->agama == "Budha")
                                                        {{'selected'}}
                                                    @endif>Budha</option>
                                                      <option value="Konghucu" @if ($data->agama == "Konghucu")
                                                        {{'selected'}}
                                                    @endif>Konghucu</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Alamat" class="form-control">{{$data->alamat}}</textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Anak Ke</label>
                                                        <input type="number" name="anak_ke" value="{{$data->anak}}" id="anak_ke" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Jumlah Saudara</label>
                                                        <input type="number" name="jml_saudara" id="jml_saudara"value="{{$data->jml_saudara}}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="form-group">
                                                    <label>Hobi</label>
                                                    <input type="text" class="form-control"value="{{$data->hobi}}" name="hobi" id="hobi">
                                                </div>
                                                <div class="form-group">
                                                    <label>Cita Cita</label>
                                                    <input type="text" class="form-control"value="{{$data->cita_cita}}" name="cita_cita" id="cita_cita">
                                                </div>
                                                <div class="form-group">
                                                    <label>No Hp</label>
                                                    <input type="text" class="form-control"value="{{$data->no_hp}}" name="no_hp" id="no_hp">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control"value="{{$data->email}}" name="email" id="email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Yang Membiayai Sekolah</label>
                                                    <select name="biaya_sekolah" id="biaya_sekolah" class="form-control">
                                                        <option value="">--Pilih Pembiaya--</option>
                                                        <option value="Orang Tua" @if ($data->biaya_sekolah == "Orang Tua")
                                                            {{'selected'}}
                                                        @endif>Orang Tua</option>
                                                        <option value="Sendiri" @if ($data->biaya_sekolah == "Sendiri")
                                                            {{'selected'}}
                                                        @endif>Sendiri</option>
                                                        <option value="Saudara" @if ($data->biaya_sekolah == "Saudara")
                                                            {{'selected'}}
                                                        @endif>Saudara</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Kebutuhan Disabilitas</label>
                                                    <input type="text" class="form-control"value="{{$data->kebutuhan_disabilitas}}" name="kebutuhan_disabilitas" id="kebutuhan_disabilitas">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kebutuhan Khusus</label>
                                                    <input type="text" class="form-control"value="{{$data->kebutuhan_khusus}}" name="kebutuhan_khusus" id="kebutuhan_khusus">
                                                </div>
                                                <div class="form-group">
                                                    <label>Status Tempat Tinggal</label>
                                                    <select name="status_tempat_tinggal" id="status_tempat_tiggal" class="form-control">
                                                        <option value="">--Status Tempat Tinggal--</option>
                                                        <option value="Tinggal Dengan Orangtua/Wali" @if ($data->tmp_tinggal == "Tinggal Dengan Orangtua/Wali")
                                                            {{'selected'}}
                                                        @endif>Tinggal Dengan Orangtua/Wali</option>
                                                        <option value="Tinggal Sendiri" @if ($data->tmp_tinggal == "Tinggal Sendiri")
                                                            {{'selected'}}
                                                        @endif>Tinggal Sendiri</option>
                                                        <option value="Tinggal Dengan Saudara" @if ($data->tmp_tinggal == "Tinggal Dengan Saudara")
                                                            {{'selected'}}
                                                        @endif>Tinggal Dengan Saudara</option>
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Jarak Tempat Tinggal</label>
                                                            <input type="number" class="form-control" value="{{$data->jarak_tinggal}}" name="jarak_tinggal" id="jarak_tinggal">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Waktu Tempuh</label>
                                                            <input type="number" class="form-control" value="{{$data->waktu_tempuh}}" name="waktu_tempuh" id="waktu_tempuh">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Transportasi Ke Sekolah</label>
                                                            <select name="transportasi" id="transportasi"  class="form-control">
                                                                <option value="">--Pilih Transportasi--</option>
                                                                <option value="Diantar" @if ($data->antar_jemput == "Diantar")
                                                                    {{'selected'}}
                                                                @endif>Diantar</option>
                                                                <option value="Bawa Kendaraan" @if ($data->antar_jemput == "Bawa Kendaraan")
                                                                    {{'selected'}}
                                                                @endif>Bawa Kendaraan</option>
                                                                <option value="Jalan Kaki" @if ($data->antar_jemput == "Jalan Kaki")
                                                                    {{'selected'}}
                                                                @endif>Jalan Kaki</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                        <div class="tab-pane" id="data_belajar" style="position: relative;">
                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <select name="kelas" id="kelas" style="width:100%;" class="form-control" required>
                                                    <option value="">-- Pilih Kelas --</option>
                                                    @forelse ($kelas as $item)
                                                        <option value="{{$item->kode_kelas}}" @if ($item->kode_kelas == $aktivitas->kode_kelas)
                                                            {{'selected'}}
                                                        @endif>{{$item->nama_kelas}}</option>
                                                    @empty
                                                        
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Tahun Ajaran</label>
                                                <select name="tahun_ajaran" id="tahun_ajaran" style="width:100%;" class="form-control" required>
                                                    <option value="">-- Pilih Tahun Ajaran --</option>
                                                    @forelse ($tahun_ajaran as $item)
                                                        <option value="{{$item->kode_tahun_ajaran}}"@if ($item->kode_tahun_ajaran == $aktivitas->kode_tahun_ajaran)
                                                            {{'selected'}}  @endif>{{$item->tahun_ajaran}} ( Semester {{$item->semester}}) </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Jurusan</label>
                                                <select name="jurusan" id="jurusan" style="width:100%;" class="form-control" required>
                                                    <option value="">-- Pilih Jurusan --</option>
                                                    @forelse ($jurusan as $item)
                                                        <option value="{{$item->kode_jurusan}}" @if ($item->kode_jurusan == $aktivitas->kode_jurusan)
                                                            {{'selected'}}  @endif>{{$item->nama_jurusan}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="data_keluarga" style="position: relative;">
                                            <div class="form-group">
                                                <label> Data Ayah</label>
                                                <div class="form-group">
                                                    <label>NIK</label>
                                                    <input type="text" name="nik_ayah" @if ($data_ayah != null)
                                                value="{{$data_ayah->nik}}"
                                                    @endif id="nik_ayah" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Ayah</label>
                                                    <input type="text" @if ($data_ayah != null)
                                                    value="{{$data_ayah->nama_ortu}}"
                                                        @endif name="nama_ayah" id="nama_ayah" class="form-control">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tempat Lahir</label>
                                                            <input type="text" @if ($data_ayah != null)
                                                            value="{{$data_ayah->tmp_lahir_ortu}}"
                                                                @endif name="tempat_lahir_ayah" id="tempat_lahir_ayah" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" @if ($data_ayah != null)
                                                            value="{{$data_ayah->tgl_lhr_ortu}}"
                                                                @endif name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <input type="text" @if ($data_ayah != null)
                                                    value="{{$data_ayah->status_ortu}}"
                                                        @endif name="status_ayah" id="status_ayah" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Pendidikan Terakhir</label>
                                                    <select name="status_pendidikan_ayah" style="width:100%;" id="status_pendidikan_ayah" class="form-control">
                                                        <option value="">--Pilih Pendidikan--</option>
                                                        
                                                        <option value="SD" @if ($data_ayah != null && $data_ayah->pendidikan_terakhir_ortu == 'SD')
                                                        {{'selected'}}
                                                        @endif>SD Sederajat</option>
                                                        <option value="SMP"@if ($data_ayah != null && $data_ayah->pendidikan_terakhir_ortu == 'SMP')
                                                            {{'selected'}}
                                                            @endif>SMP Sederajat</option>
                                                        <option value="SMA"@if ($data_ayah != null && $data_ayah->pendidikan_terakhir_ortu == 'SMA')
                                                            {{'selected'}}
                                                            @endif>SMA Sederajat</option>
                                                        <option value="Kuliah"@if ($data_ayah != null && $data_ayah->pendidikan_terakhir_ortu == 'Kuliah')
                                                            {{'selected'}}
                                                            @endif>Kuliah</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input type="text" @if ($data_ayah != null)
                                                    value="{{$data_ayah->pekerjaan_terakhir_ortu}}"
                                                        @endif name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>No Telp</label>
                                                    <input type="text" @if ($data_ayah != null)
                                                    value="{{$data_ayah->no_tlp_ortu}}"
                                                        @endif name="no_telp_ayah" id="no_telp_ayah" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Domisili</label>
                                                    <select name="domisili_ayah" style="width:100%;" id="domisili_ayah" class="form-control">
                                                        <option value="">--Pilih Domisili--</option>
                                                        
                                                        <option value="Dalam Negeri" @if ($data_ayah != null && $data_ayah->domisili_ortu == 'Dalam Negeri')
                                                            {{'selected'}}
                                                            @endif>Luar Negeri</option>
                                                        <option value="Luar Negeri" @if ($data_ayah != null && $data_ayah->domisili_ortu == 'Luar Negeri')
                                                            {{'selected'}}
                                                            @endif>Dalam Negeri</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Penghasilan Ayah</label>
                                                    <input type="text" @if ($data_ayah != null)
                                                    value="{{$data_ayah->penghasilan_ortu}}"
                                                        @endif name="penghasilan_ayah" id="penghasilan_ayah" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Penghasilan Ayah</label>
                                                   <textarea name="alamat_ayah" id="alamat_ayah" cols="30" rows="10" placeholder="Alamat" class="form-control">@if ($data_ayah != null){{$data_ayah->alamat_ortu}}@endif</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status Tempat Tinggal</label>
                                                    <select name="status_tmp_ayah" style="width:100%;" id="status_tmp_ayah" class="form-control">
                                                        <option value="">--Pilih Status--</option>
                                                        <option value="Milik Sendiri" @if ($data_ayah != null && $data_ayah->tmp_tinggal_ortu == 'Milik Sendiri')
                                                            {{'selected'}}
                                                            @endif>Milik Sendiri</option>
                                                        <option value="Kontrak" @if ($data_ayah != null && $data_ayah->tmp_tinggal_ortu == 'Kontrak')
                                                            {{'selected'}}
                                                            @endif>Kontrak</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> Data Ibu</label>
                                                <div class="form-group">
                                                    <label>NIK</label>
                                                    <input type="text" name="nik_ibu" @if ($data_ibu != null)
                                                value="{{$data_ibu->nik}}"
                                                    @endif id="nik_ibu" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama ibu</label>
                                                    <input type="text" @if ($data_ibu != null)
                                                    value="{{$data_ibu->nama_ortu}}"
                                                        @endif name="nama_ibu" id="nama_ibu" class="form-control">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tempat Lahir</label>
                                                            <input type="text" @if ($data_ibu != null)
                                                            value="{{$data_ibu->tmp_lahir_ortu}}"
                                                                @endif name="tempat_lahir_ibu" id="tempat_lahir_ibu" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" @if ($data_ibu != null)
                                                            value="{{$data_ibu->tgl_lhr_ortu}}"
                                                                @endif name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <input type="text" @if ($data_ibu != null)
                                                    value="{{$data_ibu->status_ortu}}"
                                                        @endif name="status_ibu" id="status_ibu" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Pendidikan Terakhir</label>
                                                    <select name="status_pendidikan_ibu" style="width:100%;" id="status_pendidikan_ibu" class="form-control">
                                                        <option value="">--Pilih Pendidikan--</option>
                                                        
                                                        <option value="SD" @if ($data_ibu != null && $data_ibu->pendidikan_terakhir_ortu == 'SD')
                                                        {{'selected'}}
                                                        @endif>SD Sederajat</option>
                                                        <option value="SMP"@if ($data_ibu != null && $data_ibu->pendidikan_terakhir_ortu == 'SMP')
                                                            {{'selected'}}
                                                            @endif>SMP Sederajat</option>
                                                        <option value="SMA"@if ($data_ibu != null && $data_ibu->pendidikan_terakhir_ortu == 'SMA')
                                                            {{'selected'}}
                                                            @endif>SMA Sederajat</option>
                                                        <option value="Kuliah"@if ($data_ibu != null && $data_ibu->pendidikan_terakhir_ortu == 'Kuliah')
                                                            {{'selected'}}
                                                            @endif>Kuliah</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input type="text" @if ($data_ibu != null)
                                                    value="{{$data_ibu->pekerjaan_terakhir_ortu}}"
                                                        @endif name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>No Telp</label>
                                                    <input type="text" @if ($data_ibu != null)
                                                    value="{{$data_ibu->no_tlp_ortu}}"
                                                        @endif name="no_telp_ibu" id="no_telp_ibu" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Domisili</label>
                                                    <select name="domisili_ibu" style="width:100%;" id="domisili_ibu" class="form-control">
                                                        <option value="">--Pilih Domisili--</option>
                                                        
                                                        <option value="Dalam Negeri" @if ($data_ibu != null && $data_ibu->domisili_ortu == 'Dalam Negeri')
                                                            {{'selected'}}
                                                            @endif>Luar Negeri</option>
                                                        <option value="Luar Negeri" @if ($data_ibu != null && $data_ibu->domisili_ortu == 'Luar Negeri')
                                                            {{'selected'}}
                                                            @endif>Dalam Negeri</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Penghasilan ibu</label>
                                                    <input type="text" @if ($data_ibu != null)
                                                    value="{{$data_ibu->penghasilan_ortu}}"
                                                        @endif name="penghasilan_ibu" id="penghasilan_ibu" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Penghasilan ibu</label>
                                                   <textarea name="alamat_ibu" id="alamat_ibu" cols="30" rows="10" placeholder="Alamat" class="form-control">@if ($data_ibu != null){{$data_ibu->alamat_ortu}}@endif</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status Tempat Tinggal</label>
                                                    <select name="status_tmp_ibu" style="width:100%;" id="status_tmp_ibu" class="form-control">
                                                        <option value="">--Pilih Status--</option>
                                                        <option value="Milik Sendiri" @if ($data_ibu != null && $data_ibu->tmp_tinggal_ortu == 'Milik Sendiri')
                                                            {{'selected'}}
                                                            @endif>Milik Sendiri</option>
                                                        <option value="Kontrak" @if ($data_ibu != null && $data_ibu->tmp_tinggal_ortu == 'Kontrak')
                                                            {{'selected'}}
                                                            @endif>Kontrak</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> Data Wali</label>
                                                <div class="form-group">
                                                    <label>NIK</label>
                                                    <input type="text" name="nik_wali" @if ($data_wali != null)
                                                value="{{$data_wali->nik}}"
                                                    @endif id="nik_wali" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Wali</label>
                                                    <input type="text" @if ($data_wali != null)
                                                    value="{{$data_wali->nama_ortu}}"
                                                        @endif name="nama_wali" id="nama_wali" class="form-control">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tempat Lahir</label>
                                                            <input type="text" @if ($data_wali != null)
                                                            value="{{$data_wali->tmp_lahir_ortu}}"
                                                                @endif name="tempat_lahir_wali" id="tempat_lahir_wali" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" @if ($data_wali != null)
                                                            value="{{$data_wali->tgl_lhr_ortu}}"
                                                                @endif name="tanggal_lahir_wali" id="tanggal_lahir_wali" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <input type="text" @if ($data_wali != null)
                                                    value="{{$data_wali->status_ortu}}"
                                                        @endif name="status_wali" id="status_wali" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Pendidikan Terakhir</label>
                                                    <select name="status_pendidikan_wali" style="width:100%;" id="status_pendidikan_wali" class="form-control">
                                                        <option value="">--Pilih Pendidikan--</option>
                                                        
                                                        <option value="SD" @if ($data_wali != null && $data_wali->pendidikan_terakhir_ortu == 'SD')
                                                        {{'selected'}}
                                                        @endif>SD Sederajat</option>
                                                        <option value="SMP"@if ($data_wali != null && $data_wali->pendidikan_terakhir_ortu == 'SMP')
                                                            {{'selected'}}
                                                            @endif>SMP Sederajat</option>
                                                        <option value="SMA"@if ($data_wali != null && $data_wali->pendidikan_terakhir_ortu == 'SMA')
                                                            {{'selected'}}
                                                            @endif>SMA Sederajat</option>
                                                        <option value="Kuliah"@if ($data_wali != null && $data_wali->pendidikan_terakhir_ortu == 'Kuliah')
                                                            {{'selected'}}
                                                            @endif>Kuliah</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input type="text" @if ($data_wali != null)
                                                    value="{{$data_wali->pekerjaan_terakhir_ortu}}"
                                                        @endif name="pekerjaan_wali" id="pekerjaan_wali" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>No Telp</label>
                                                    <input type="text" @if ($data_wali != null)
                                                    value="{{$data_wali->no_tlp_ortu}}"
                                                        @endif name="no_telp_wali" id="no_telp_wali" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Domisili</label>
                                                    <select name="domisili_wali" style="width:100%;" id="domisili_wali" class="form-control">
                                                        <option value="">--Pilih Domisili--</option>
                                                        
                                                        <option value="Dalam Negeri" @if ($data_wali != null && $data_wali->domisili_ortu == 'Dalam Negeri')
                                                            {{'selected'}}
                                                            @endif>Luar Negeri</option>
                                                        <option value="Luar Negeri" @if ($data_wali != null && $data_wali->domisili_ortu == 'Luar Negeri')
                                                            {{'selected'}}
                                                            @endif>Dalam Negeri</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Penghasilan Wali</label>
                                                    <input type="text" @if ($data_wali != null)
                                                    value="{{$data_wali->penghasilan_ortu}}"
                                                        @endif name="penghasilan_wali" id="penghasilan_wali" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Penghasilan Wali</label>
                                                   <textarea name="alamat_wali" id="alamat_wali" cols="30" rows="10" placeholder="Alamat" class="form-control">@if ($data_wali != null){{$data_wali->alamat_ortu}}@endif</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status Tempat Tinggal</label>
                                                    <select name="status_tmp_wali" style="width:100%;" id="status_tmp_wali" class="form-control">
                                                        <option value="">--Pilih Status--</option>
                                                        <option value="Milik Sendiri" @if ($data_wali != null && $data_wali->tmp_tinggal_ortu == 'Milik Sendiri')
                                                            {{'selected'}}
                                                            @endif>Milik Sendiri</option>
                                                        <option value="Kontrak" @if ($data_wali != null && $data_wali->tmp_tinggal_ortu == 'Kontrak')
                                                            {{'selected'}}
                                                            @endif>Kontrak</option>
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
    </div>
    </section>
    <!-- /.content -->
  </div>
@endsection