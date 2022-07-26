@extends('layouts.app')
@section('page', 'Tambah Data Guru')
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
                <form action="{{route('guru.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
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
                                    <select name="status_guru" id="status_guru" class="form-control " required>
                                        <option value="">--Pilih Status--</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group text-center">
                                    <img src="{{asset('public/dist/img/AdminLTELogo.png')}}" alt="Logo" class="img" width="200" height="200">
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
                                    <input type="text" class="form-control" name="nik" id="nik" required>
                                </div>
                                <div class="form-group">
                                    <label>NIPTK</label>
                                    <input type="text" class="form-control" name="niptk" id="niptk" required>
                                </div>
                                <div class="form-group">
                                    <label>NUPTK</label>
                                    <input type="text" class="form-control" name="nuptk" id="nuptk" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Guru</label>
                                    <input type="text" class="form-control" name="nama_guru" id="nama_guru" required>
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
                                  <label>kewarganegaraan</label>
                                  <select name="kewarganegaraan" id="kewarganegaraan" class="form-control" required>
                                      <option value="">--Pilih Kewarganegaraan--</option>
                                      <option value="WNI">WNI</option>
                                      <option value="WNA">WNA</option>
                                  </select>
                              </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Alamat" class="form-control" required></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>Kecamatan</label>
                                        <select name="kecamatan" id="kecamatan" class="form-control" required>
                                          <option value="">Pilih Kecamatan</option>
                                          @forelse ($kecamatan as $item)
                                        <option value="{{$item->kode_kecamatan}}">{{$item->nama_kecamatan}}</option>
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
                                        <option value="{{$item->kode_kelurahan}}">{{$item->nama_kelurahan}}</option>
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
                                        <option value="Guru Mapel">Guru Mapel</option>
                                        <option value="Guru Bk">Guru Bk</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                  <label>No Hp</label>
                                  <input type="text" class="form-control" name="no_hp" id="no_hp" required>
                                </div>
                                <div class="form-group">
                                  <label>No Telepon</label>
                                  <input type="text" class="form-control" name="no_telp" id="no_telp">
                                </div>
                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" class="form-control" name="email" id="email" required>
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