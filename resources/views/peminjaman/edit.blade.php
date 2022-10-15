@extends('layouts.app')
@section('page', 'Peminjaman')
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
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <div class="card-title">
                      Data Peminjaman
                    </div>
                  </div>
                  <form action="{{route('peminjaman.update',$data->id_peminjaman)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="forrm-grup">
                          <label>Tanggal Peminjaman</label>
                          <input type="datetime-local" name="tgl_peminjaman" id="tgl_peminjaman" class="form-control" value="{{ $data->tgl_peminjaman }}">
                        </div>
                        <p class="my-3" style="color: red;">Ganti Form Dibawah Saat Pengembalian Barang!</p>
                        <div class="forrm-grup">
                          <label>Tanggal Pengembalian</label>
                          <input type="datetime-local" name="tgl_pengembalian" id="tgl_pengembalian" class="form-control" value="{{ $data->tgl_pengembalian }}">
                        </div>
                        <div class="form-group">
                          <label>Status Peminjaman</label>
                          <select name="status_peminjaman" id="status_peminjaman" class="form-control" style="width: 100%;" required>
                              <option value="0" @if ($data->status_peminjaman == '0')
                                  {{'selected'}}
                              @endif >Dipinjam</option>
                              <option value="1" @if ($data->status_peminjaman == '1')
                                  {{'selected'}}
                              @endif>Dikembalikan</option>
                              <option value="2" @if ($data->status_peminjaman == '2')
                                {{'selected'}}
                            @endif>Hilang</option>
                          </select>
                      </div>
                        <div class="forrm-grup">
                          <label>Penerima</label>
                          <input type="text" name="penerima" id="penerima" class="form-control" value="{{ $data->penerima }}">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Peminjaman</label>
                        <textarea name="desc_peminjaman" id="desc_peminjaman" class="form-control" cols="30" rows="10">{{$data->desc_peminjaman}}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary" type="submit" id="simpan_peminjaman" name="simpan_peminjaman">Simpan</button>
                      <a href="{{route('peminjaman.index')}}" class="btn btn-danger" id="kembali" name="kembali">Kembali</a>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-9">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <div class="card-title">
                      Data Siswa
                    </div>
                  </div>
                    <div class="card-body">
                        <div class="forrm-grup">
                          <label>Nama</label>
                          <input type="text"  class="form-control" value="{{ $data->nama }}" readonly>
                        </div>
                        <div class="forrm-grup">
                          <label>Kelas</label>
                          <input type="text" name="tgl_pengembalian" id="tgl_pengembalian" class="form-control" value="{{ $data->kode_kelas }}" readonly>
                        </div>
                        <div class="forrm-grup">
                          <label>Jurusan</label>
                          <input type="text" name="tgl_pengembalian" id="tgl_pengembalian" class="form-control" value="{{ $data->kode_jurusan }}" readonly>
                        </div>
                      </div>
                    </div>
                <div class="card card-primary card-outline">
                  <div class="card-header">
                  <div class="card-tools">
                    <a type="button" class="btn btn-primary" id="btn_setoran" data-toggle="modal" data-target="#modal-tambah-peminjaman-detail"><i class="fas fa-plus"></i> Tambah Barang</a>
                  </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTable" class="table table-border">
                        <thead>
                          <th>No</th>
                          <th>Unit</th>
                          <th>Jumlah</th>
                          <th>Aksi</th>
                        </thead>
                        <tbody>
                          @forelse ($detail as $item)
                              <tr>
                                <td>{{$loop->index +1 }}</td>
                                <td>{{$item->kode_siswa}}</td>
                                <td>{{$item->kode_peminjaman}}</td>
                                <td>{{$item->unit}}</td>
                                <td>{{$item->jumlah}}</td>
                                <td><form onsubmit="return confirm('Apakah Anda yakin ?')"
                                  action="{{ route('peminjaman-detail.destroy',$item->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                  </form></td>
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
    @include('peminjaman.peminjaman_detail')
</div>
</div>
@endsection