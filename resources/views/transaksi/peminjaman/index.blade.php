@extends('layouts.app')
@section('page', 'Peminjaman Buku')
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
                  <div class="card-header">
                    <div class="card-tools">
                      <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-peminjaman"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTable" class="table table-border">
                        <thead>
                          <th>No</th>
                          <th>NISN</th>
                          <th>Nama Siswa</th>
                          <th>Kelas / Jurusan</th>
                          <th>tanggungan</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </thead>
                        <tbody>
                          
                          @forelse ($data as $item)
                              <tr>
                              <td>{{$loop->index + 1}}</td>
                              <td>{{$item->id_siswa}}</td>
                              <td>{{$item->nama}}</td>
                              <td>{{$item->kode_kelas}} / {{$item->kode_jurusan}}</td>
                              <td></td>
                              <td>@if ($item->status == '0')
                                 <span class="btn btn-success">Dikembalikan</span>
                              @else
                              <span class="btn btn-success">Dipinjam</span>
                              @endif</td>
                              <td>
                              <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                action="{{ route('peminjaman_buku.destroy',$item->id_peminjaman) }}" method="POST">
                                <a href="{{ route('peminjaman_buku.edit',$item->id_peminjaman)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
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
    @include('transaksi.peminjaman.create')
</div>
</div>
@endsection