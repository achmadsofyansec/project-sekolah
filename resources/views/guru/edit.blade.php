@extends('layouts.app')
@section('page', 'Edut Data Guru')
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
                <form action="{{route('guru.update',$data->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                               <h1 class="card-title">
                                <i class="fas fa-image"></i>
                                Foto Guru
                                </h1> 
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status_guru" id="status_guru" class="form-control" required>
                                        <option value="">--Pilih Status--</option>
                                        <option value="Aktif" @if ($data->status == "Aktif")
                                          {{'selected'}}
                                      @endif>Aktif</option>
                                      <option value="Nonaktif" @if ($data->status == "Nonaktif")
                                          {{'selected'}}
                                      @endif>Nonaktif</option>
                                    </select>
                                </div>
                                <div class="form-group text-center">
                                  @if ($data->foto_guru != '-')
                                  <img src="{{$img}}" alt="Logo" class="img" width="200" height="200">
                                  @else
                                      <h1>Tidak Ada Foto</h1>
                                  @endif
                                    
                                </div>
                                <div class="form-group">
                                    <input type="file" name="foto_guru" id="foto_guru" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="Simpan" class="btn btn-info">
                                <a href="{{route('guru.index')}}" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                               <h1 class="card-title">
                                <i class="fas fa-users"></i>
                                Data Guru
                                </h1> 
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" value="{{$data->nik}}" class="form-control" name="nik" id="nik" required>
                                </div>
                                <div class="form-group">
                                    <label>NIPTK</label>
                                    <input type="text"value="{{$data->niptk}}" class="form-control" name="niptk" id="niptk" required>
                                </div>
                                <div class="form-group">
                                    <label>NUPTK</label>
                                    <input type="text"value="{{$data->nuptk}}" class="form-control" name="nuptk" id="nuptk" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Guru</label>
                                    <input type="text"value="{{$data->nama}}" class="form-control" name="nama_guru" id="nama_guru" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text"value="{{$data->tmp_lahir}}" class="form-control" name="tmp_lahir" id="tmp_lahir" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date"value="{{$data->tgl_lhr}}" class="form-control" name="tgl_lhr" id="tgl_lhr" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jns_kelamin" id="jns_kelamin" class="form-control" required>
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
                                    <select name="agama" id="agama" class="form-control" required>
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
                                  <label>kewarganegaraan</label>
                                  <select name="kewarganegaraan" id="kewarganegaraan" class="form-control" required>
                                      <option value="">--Pilih Kewarganegaraan--</option>
                                      <option value="WNI" @if ($data->kewarganegaraan == "WNI")
                                        {{'selected'}}
                                      @endif>WNI</option>
                                      <option value="WNA" @if ($data->kewarganegaraan == "WNA")
                                        {{'selected'}}
                                      @endif>WNA</option>
                                  </select>
                              </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Alamat" class="form-control" required>{{$data->alamat}}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>Kecamatan</label>
                                        <select name="kecamatan" id="kecamatan" class="form-control" required>
                                          <option value="">Pilih Kecamatan</option>
                                          @forelse ($kecamatan as $item)
                                        <option value="{{$item->kode_kecamatan}}" @if ($data->kecamatan == $item->kode_kecamatan)
                                          {{'selected'}}
                                        @endif>{{$item->nama_kecamatan}}</option>
                                          @empty
                                              
                                          @endforelse
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>Kelurahan</label>
                                        <select name="kelurahan" id="kelurahan" class="form-control" required>
                                          <option value="">Pilih Kelurahan</option>
                                          @forelse ($kelurahan as $item)
                                        <option value="{{$item->kode_kelurahan}}" @if ($data->kelurahan == $item->kode_kelurahan)
                                          {{'selected'}}
                                        @endif>{{$item->nama_kelurahan}}</option>
                                          @empty
                                              
                                          @endforelse
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Jabatan</label>
                                    <select name="jabatan_guru" id="jabatan_guru" class="form-control" required>
                                        <option value="">--Pilih Jabatan--</option>
                                        <option value="Guru Mapel" @if ($data->jabatan == "Guru Mapel")
                                          {{'selected'}}
                                      @endif>Guru Mapel</option>
                                      <option value="Guru Bk" @if ($data->jabatan == "Guru Bk")
                                          {{'selected'}}
                                      @endif>Guru Bk</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                  <label>No Hp</label>
                                  <input type="text" value="{{$data->no_hp}}" class="form-control" name="no_hp" id="no_hp" required>
                                </div>
                                <div class="form-group">
                                  <label>No Telepon</label>
                                  <input type="text" value="{{$data->no_telp}}" class="form-control" name="no_telp" id="no_telp">
                                </div>
                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" value="{{$data->email}}" class="form-control" name="email" id="email" required>
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