@extends('layouts.app')
@section('page', 'Tabungan')
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
              <div class="col-md-3">
                <div class="card card-orange card-outline">
                  <div class="card-header">
                    <div class="card-title">
                      Data Siswa
                    </div>
                  </div>
                  <form action="{{route('tabungan.update',$data->id_tabungan)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="form-group text-center">
                          @if ($data->foto_siswa != '-')
                              <img src="{{$img}}" alt="Logo" class="img" width="200" height="200">        
                          @else
                              <h1>Tidak Ada Foto</h1>
                          @endif
                      </div>
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
                            <label>Saldo</label>
                        <input type="text" name="saldo_tabungan" id="saldo_tabungan" value="Rp.{{number_format($data->saldo_tabungan)}}-," class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Status Tabungan</label>
                            <select name="status_tabungan" id="status_tabungan" class="form-control" style="width: 100%;" required>
                                <option value="0" @if ($data->status_tabungan == '0')
                                    {{'selected'}}
                                @endif >Tidak Aktif</option>
                                <option value="1" @if ($data->status_tabungan == '1')
                                    {{'selected'}}
                                @endif>Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Tabungan</label>
                        <textarea name="desc_tabungan" id="desc_tabungan" class="form-control" cols="30" rows="10">{{$data->desc_tabungan}}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary" type="submit" id="simpan_tabungan" name="simpan_tabungan">Simpan</button>
                      <a href="{{route('tabungan.index')}}" class="btn btn-danger" id="kembali" name="kembali">Kembali</a>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-9">
                <div class="card card-orange card-outline">
                  <div class="card-header">
                  <div class="card-tools">
                    <a type="button" href="#" class="btn btn-primary" id="btn_setoran" data-toggle="modal" data-target="#modal-tambah-setoran"><i class="fas fa-plus"></i> Setoran</a>
                    <a type="button" href="#" class="btn btn-primary" id="btn_penarikan"data-toggle="modal" data-target="#modal-tambah-penarikan"><i class="fas fa-minus"></i> Penarikan</a>
                  </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTable" class="table table-border">
                        <thead>
                          <th>No</th>
                          <th>Nominal</th>
                          <th>Saldo Awal</th>
                          <th>Saldo Akhir</th>
                          <th>Keterangan</th>
                          <th><span><span class="badge badge-success">IN</span>/<span class="badge badge-danger">OUT</span></span></th>
                        </thead>
                        <tbody>
                          @forelse ($detail as $item)
                              <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>Rp.{{number_format($item->nominal_detail)}}</td>
                                <td>Rp.{{number_format($item->saldo_awal_detail)}}</td>
                                <td>Rp.{{number_format($item->saldo_akhir_detail)}}</td>
                                <td>{{$item->keterangan_detail}}</td>
                                <td>@if ($item->type_detail == '0')
                                  <span class="badge badge-success">IN</span>
                                @else
                                <span class="badge badge-danger">OUT</span>
                                @endif</td>
                              </tr>
                          @empty
                              
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    @include('tabungan.detail.penarikan')
    @include('tabungan.detail.setoran')
</div>
</div>
@endsection