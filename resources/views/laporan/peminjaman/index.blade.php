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
                  <form action="{{ route('laporan_view') }}" method="GET">
                      <div class="card-body">
                                  <div class="form-group">
                                    <label>Dari Tanggal</label>
                                    <input type="date" name="filter_dari_tanggal" id="filter_dari_tanggal" value="@if ($req->filter_dari_tanggal != null)
                                        {{$req->filter_dari_tanggal}}
                                    @endif" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Sampai Tanggal</label>
                                    <input type="date" name="filter_sampai_tanggal" id="filter_sampai_tanggal" value="@if ($req->filter_sampai_tanggal != null)
                                        {{$req->filter_sampai_tanggal}}
                                    @endif" class="form-control">
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
                         <form action="" method="GET" target="_blank">
                          <input type="hidden" name="filter_dari_tanggal" id="filter_dari_tanggal" value="{{$req->filter_dari_tanggal}}">
                          <input type="hidden" name="filter_sampai_tanggal" id="filter_sampai_tanggal" value="{{$req->filter_sampai_tanggal}}">
                          <input type="hidden" name="status_peminjaman" id="status_peminjaman" value="{{$req->status_peminjaman}}">
                          
                          <a href="{{ route('export_peminjaman_all') }}" class="btn btn-primary my-3" target="_blank"><i class="fas fa-print"></i> Export XLSX</a>
                          <a href="" class="btn btn-danger my-3" target="_blank"><i class="fas fa-print"></i> Export PDF</a>
                      </form>
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
                                      {{-- <th>Status</th> --}}
                                 </thead>
                                @if ($data != null || $data != "")
                                  {!!$data!!}
                                  @else
                                      <tr>
                                        <td class="text-muted text-center" colspan="100%">Tidak Ada Data </td>
                                      </tr>
                                  @endif
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