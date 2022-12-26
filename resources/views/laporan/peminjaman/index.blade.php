@extends('layouts.app')
@section('page', 'Laporan Peminjaman')
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
              <div class="row">
                <div class="col-md-3">
                  <div class="card card-outline card-primary">
                    <div class="card-header">
                      <div class="card-title">
                        Filter
                      </div>
                    </div>
                  <form action="" method="GET">
                      <div class="card-body">
                                  <div class="form-group">
                                    <label>Dari Tanggal</label>
                                    <input type="date" name="filter_dari_tanggal" id="filter_dari_tanggal" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Sampai Tanggal</label>
                                    <input type="date" name="filter_sampai_tanggal" id="filter_sampai_tanggal" value="" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Status Peminjaman</label>
                                    <select class="form-control" id="nama_ruangan" name="nama_ruangan">
                                            <option value="">Pilih Peminjaman</option>
                                            <option value="">Dipinjam</option>
                                            <option value="">Dikembalikan</option>
                                            <option value="">Hilang</option>
                                    </select>
                                </div>
                      </div>
                        
                      <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value="Cari">
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="card card-outline card-primary">
                    <div class="card-header">
                      <div class="card-title">
                       Laporan Peminjaman
                      </div>
                      <div class="card-tools">
                     
                      </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                             <table class="table" id="dataTable">
                                 <thead>
                                      <th>No</th>
                                      <th>Nama Siswa</th>
                                      <th>Kelas / Jurusan</th>
                                      <th>Waktu Peminjaman</th>
                                      <th>Waktu Pengembalian</th>
                                      <th>Tanggal Input</th>
                                      <th>Status</th>
                                 </thead>
                                 @forelse ($data as $item)
                              <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->kode_kelas}} / {{$item->kode_jurusan}}</td>
                                <td>{{$item->tgl_peminjaman}}</td>
                                <td>{{$item->tgl_pengembalian}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>@if ($item->status_peminjaman == '0')
                                  <span class="btn btn-warning">Dipinjam</span>
                               @elseif($item->status_peminjaman == '1')
                               <span class="btn btn-success">Dikembalikan</span>
                               @else 
                               <span class="btn btn-danger">Hilang</span>
                               @endif</td>
                          </tr>
                          @empty   
                          @endforelse
                             </table>
                        </div>
                    </div>
                 </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
@endsection