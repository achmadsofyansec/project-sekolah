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
          <div class="card card-success card-outline">
            <div class="card-header">
              <h1 class="card-title"><i class="nav-icon fas fa-school text-success"></i> Data Sekolah</h1>
            </div>
          <form action="{{route('sekolah.update',$data->id_sekolah)}}" enctype="multipart/form-data" method="POST">
              @csrf
              @method('PUT')
            <div class="card-body">
                <div class="form-group">
                  <label>Kode Sekolah</label>
                  <input type="text" value="{{$data->kode_sekolah}}" name="kode_sekolah" id="kode_sekolah" class="form-control" placeholder="Kode Sekolah" required>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NPSN</label>
                      <input type="text" value="{{$data->npsn}}" name="npsn" id="npsn" class="form-control" placeholder="NPSN" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NSM</label>
                      <input type="text" value="{{$data->nsm}}" name="nsm" id="nsm" class="form-control" placeholder="NSM">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Akreditasi</label>
                  <select name="akreditasi" id="akreditasi" class="form-control">
                    <option @if ($data->akreditasi == "Belum Akreditasi")
                        {{'selected'}}
                    @endif>Belum Akreditasi</option>
                    <option @if ($data->akreditasi == "A")
                      {{'selected'}}
                        @endif>A</option>
                        <option @if ($data->akreditasi == "B")
                          {{'selected'}}
                      @endif>B</option>
                      <option @if ($data->akreditasi == "C")
                        {{'selected'}}
                    @endif>C</option>
                    <option @if ($data->akreditasi == "TT")
                      {{'selected'}}
                  @endif>TT</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" id="status" class="form-control">
                    <option @if ($data->status == null)
                        {{'selected'}}
                    @endif>Belum Diset</option>
                    <option @if ($data->status == "Swasta")
                      {{'selected'}}
                        @endif>Swasta</option>
                        <option @if ($data->status == "Negeri")
                          {{'selected'}}
                      @endif>Negeri</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jenjang</label>
                  <select name="jenjang" id="jenjang" class="form-control">
                    <option value="">Belum Diset</option>
                      @foreach ($jenjang as $item_jenjang)
                  <option value="{{$item_jenjang->kode_jenjang}}" @if ($data->jenjang == $item_jenjang->kode_jenjang)
                      {{'selected'}}
                  @endif>( {{$item_jenjang->nama_jenjang}} ) {{$item_jenjang->ket_jenjang}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama Sekolah</label>
                  <input type="text" value="{{$data->nama_sekolah}}" name="nama_sekolah" id="nama_sekolah" class="form-control" placeholder="Nama Sekolah">
                </div>
                <div class="form-group">
                  <label>Alamat Sekolah</label>
                <textarea name="alamat_sekolah"  id="alamat_sekolah" cols="30" rows="10" class="form-control" placeholder="Alamat Sekolah">{{$data->alamat_sekolah}}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Longtitude</label>
                        <input type="text" name="longtitude" value="{{$data->longtitude}}" id="longtitude" class="form-control" placeholder="Koordinat Longtitude">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="latitude" value="{{$data->latitude}}" id="latitude" class="form-control" placeholder="Koordinat Latitude">
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <select name="kecamatan" id="kecamatan" class="form-control" required>
                        <option value="">Pilih Kecamatan</option>
                        @forelse ($kecamatan as $item)
                      <option value="{{$item->kode_kecamatan}}" @if ($item->kode_kecamatan == $data->kode_kecamatan)
                          {{'selected'}}
                      @endif>{{$item->nama_kecamatan}}</option>
                        @empty
                        
                        @endforelse
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Kelurahan</label>
                      <select name="kelurahan" id="kelurahan" class="form-control" required>
                        <option value="">Pilih Kelurahan</option>
                        @forelse ($kelurahan as $item)
                      <option value="{{$item->kode_kelurahan}}" @if ($item->kode_kelurahan == $data->kode_kelurahan)
                          {{'selected'}}
                      @endif>{{$item->nama_kelurahan}}</option>
                        @empty

                        @endforelse
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Kode Pos</label>
                      <input type="number" name="kode_pos" value="{{$data->kode_pos}}" id="kode_pos" class="form-control" placeholder="Kode Pos">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Nomor HP</label>
                  <input type="number" name="nomor_hp" value="{{$data->nomor_hp}}" id="nomor_hp" class="form-control" placeholder="Nomor Hp">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" value="{{$data->email}}" id="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                  <label>Website Resmi</label>
                  <input type="text" name="website" id="website" value="{{$data->website}}" class="form-control" placeholder="Website">
                </div>
                <div class="row">
                  <div class="col-md-4">
                    @if ($data->logo_sekolah != "-")
                  <img src="{{$img}}" alt="Image" class="img" width="100" height="100">
                  <p>{{$data->logo_sekolah}}</p>
                  @else
                  <img src="{{asset('public/dist/img/AdminLTELogo.png')}}" alt="Logo" class="img" width="100" height="100">
                    @endif
                  </div>
                  <div class="col-md-8">
                    <div class="form-grup">
                      <label>Logo</label>
                      <input type="file" name="logo_sekolah" id="logo_sekolah" class="form-control">
                  </div>
                  </div>
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