@extends('layouts.app')
@section('page', 'Pengembalian Buku')
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
                      <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTable" class="table table-border">
                        <thead>
                          <th>No</th>
                          <th>NISN</th>
                          <th>Nama Siswa</th>
                          <th>Kelas / Jurusan</th>
                          <th>Status</th>
                          <th style="text-align: center">Aksi</th>
                        </thead>
                        <tbody>
                          
                          @forelse ($data as $item)
                              <tr>
                              <td>{{$loop->index + 1}}</td>
                              <td>{{$item->id_siswa}}</td>
                              <td>{{$item->nama}}</td>
                              <td>{{$item->kode_kelas}} / {{$item->kode_jurusan}}</td>
                              <td>@if ($item->tanggungan == 0)
                                 <span class="btn btn-success">Dikembalikan</span>
                              @else
                              <span class="btn btn-danger">Dipinjam</span>
                              @endif</td>
                              <td style="text-align: center">
                              <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                action="{{ route('pengembalian.destroy',$item->id_siswa)}}" method="POST">
                                <a href="{{ route('pengembalian.edit',$item->id_siswa)}}" class="btn btn-warning text-white"><i class="fas fa-edit"></i> Edit</a>
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