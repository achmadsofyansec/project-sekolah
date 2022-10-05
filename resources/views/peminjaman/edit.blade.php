@extends('layouts.app')
@section('page', 'Edit Peminjaman')
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
            <div class="row">
              <div class="col-md-12">
                <div class="card card-primary card-outline">
                  <form action="{{route('peminjaman.update',$data->id_peminjaman)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="card-body col-6">
                            <div class="form-group">
                                <label>NISN</label>
                            <input type="text" name="nisn_siswa" id="nisn_siswa" value="{{$data->nisn}}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" value="{{$data->nama}}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kelas / Jurusan</label>
                            <input type="text" name="kelas_siswa" id="kelas_siswa" value="{{$data->kode_kelas}} / {{$data->kode_jurusan}}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Peminjaman</label>
                            <textarea name="desc_peminjaman" id="desc_peminjaman" class="form-control" cols="10" rows="10">{{ $data->desc_peminjaman }}</textarea>
                            </div>
                        </div>
                        <div class="card-body col-6">
                            <div class="form-group">
                                <label>Tanggal Peminjaman</label>
                            <input type="date" name="tgl_peminjaman" id="tgl_peminjaman" value="{{$data->tgl_peminjaman}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Unit</label>
                                <select name="unit" id="unit" class="form-control">
                                    <option value="">{{  $data->unit }}</option>
                                    @forelse ($kategori as $item)
                                <option value="{{$item->unit}}" @if ($data->unit == $item->unit)
                                  {{'selected'}}
                                @endif>{{$item->unit}}</option>
                                    @empty
                                        
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status Peminjaman</label>
                                <select name="status_peminjaman" id="status_peminjaman" class="form-control" style="width: 100%;" required>
                                    <option value="0" @if ($data->status_peminjaman == '0')
                                        {{'selected'}}
                                    @endif >Dipinjam</option>
                                    <option value="1" @if ($data->status_peminjaman == '1')
                                        {{'selected'}}
                                    @endif >Dikembalikan</option>
                                    <option value="2" @if ($data->status_peminjaman == '2')
                                        {{'selected'}}
                                    @endif>Hilang</option>
                                </select>
                            </div>
                        </div>  
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary" type="submit" id="simpan_tabungan" name="simpan_tabungan">Simpan</button>
                      <a href="{{route('peminjaman.index')}}" class="btn btn-danger" id="kembali" name="kembali">Kembali</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    
</div>
</div>
@endsection