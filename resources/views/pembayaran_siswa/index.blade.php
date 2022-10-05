@extends('layouts.app')
@section('page', 'Pembayaran Siswa')
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
<div class="content">
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
        <div class="card card-orange card-outline">
          <div class="card-body">
          <form action="{{route('pembayaran_siswa')}}" method="get">
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label>Tahun Ajaran</label>
                  <select name="tahun_ajaran" id="tahun_ajaran" class="form-control" required>
                      <option value=""> -- Pilih Tahun Ajaran --</option>
                      @forelse ($tahun_ajaran as $item)
                  <option value="{{$item->id}}" @if ($req->tahun_ajaran != null && $req->tahun_ajaran == $item->id)
                      {{'selected'}}
                  @endif>{{$item->tahun_ajaran}}</option>
                      @empty
                      @endforelse
                  </select>
              </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Data Siswa</label>
                  <select name="kode_siswa" id="kode_siswa" class="form-control" style="width: 100%;" required>
                      <option value="">--- Pilih Siswa ---</option>
                      @forelse ($siswa as $item)
                  <option value="{{$item->id_siswa}}" @if ($req->kode_siswa != null && $req->kode_siswa == $item->id_siswa)
                    {{'selected'}}
                @endif>{{$item->nama}} - {{$item->kode_kelas}} {{$item->kode_jurusan}}</option>
                      @empty
                      @endforelse
                  </select>
              </div>
              </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Tombol Cari</label>
                    <input type="submit" value="Cari" class="btn btn-primary" style="width: 100%">
                  </div>
                </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    @if($data != null)
    <div class="row">
      <div class="col-md-4">
        <div class="card card-orange card-outline">
          <div class="card-header">
            Data Siswa
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>NISN</label>
              <input type="text" name="nisn" id="nisn" class="form-control" value="{{$data->nisn}}" readonly>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="{{$data->nama}}" readonly>
            </div>
            <div class="form-group">
              <label>Kelas</label>
              <input type="text" name="kelas_siswa" id="kelas_siswa" class="form-control" value="{{$data->nama_kelas}}" readonly>
            </div>
            <div class="form-group">
              <label>Jurusan</label>
              <input type="text" name="jurusan_siswa" id="jurusan_siswa" class="form-control" value="{{$data->nama_jurusan}}" readonly>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-orange card-outline">
              <div class="card-header">
                Data Pembayaran Bulanan
                <div class="card-tools">
                  <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-bulanan"><i class="fas fa-plus"></i> Tambah</a>
                </div>
              </div>
              <div class="card-body">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-orange card-outline">
              <div class="card-header">
                Data Pembayaran Non Bulanan
                <div class="card-tools">
                  <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-nonbulanan"><i class="fas fa-plus"></i> Tambah</a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <th>No</th>
                      <th>Kelas / Tahun Ajaran </th>
                      <th>Pembayaran</th>
                      <th>Tagihan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
</div>
@include('pembayaran_siswa.modal.bulanan')
@include('pembayaran_siswa.modal.nonbulanan')
</div>
</div>
@endsection