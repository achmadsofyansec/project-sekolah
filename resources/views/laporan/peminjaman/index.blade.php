@extends('layouts.app')
@section('page', 'Peminjaman')
@section('content-app')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="fad fa-books-medical"></i></i> @yield('page')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item active">@yield('page')</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content animated fadeInUp ">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class=" col-md-12">
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
            <div class="card card-navy card-outline">
              <div class="card-header col-md-12">
                <a><i class="fa fa-file-search text-navy"> </i> Cari Data Peminjaman</a>
                <form role="form" action="{{route('cari_peminjaman')}}" method="get">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Dari Tanggal</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend" data-date="" data-date-format="yyyy-mm-dd">
                          </div>
                          <input class="form-control" type="date" value="@if($req->tgl_awal != null){{$req->tgl_awal}}@endif" name="tgl_awal" id="tgl_awal" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend" data-date="" data-date-format="yyyy-mm-dd">
                          </div>
                          <input class="form-control" type="date" value="@if($req->tgl_akhir != null){{$req->tgl_akhir}}@endif" name="tgl_akhir" id="tgl_akhir" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Status</label>
                                        <select class="form-control" type="text" name="status" id="status">
                                          @if($req->status != ''){
                                            echo <option value="{{$req->status}}">{{$req->status}}</option>
                                          }@endif
                                            <option value="">[ SEMUA KEPERLUAN ]</option>>
                                            <option value="Dipinjam">Dipinjam</option>
                                            <option value="Dikembalikan">Dikembalikan</option>
                                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group">
                      <div class="btn-group btn-group-sm">
                        <button class="btn bg-info btn-sm"><i class="fa fa-search "> </i> Tampilkan Data</button>
                        <a class="btn btn-danger btn-sm" href="{{route('export_peminjaman')}}" target="_blank"><i class="fa fa-download"> </i> Export</a>
                      </div>
                      </div>
                    </div> 
                  </div>
                </form>
              </div>
              <!-- /.card-header -->
              <!-- TABLE: LATEST ORDERS -->
                <div class="card" id="cetak">
                  <div class="card-header border-transparent">
                    <center>
                        <h4 class="m-0 text-dark mt-3" style="text-shadow: 2px 2px 4px #17a2b8;">
                                  <h2 style="margin:0;">Laporan Peminjaman Buku </h2>
                    </center>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table m-0 table-hover table-sm">
                        <thead>
                          <tr class="text-sm bg-navy">
                            <th>No</th>
                              <th>Nama Siswa</th>
                              <th>Kode Buku</th>
                              <th>Jumlah</th>
                              <th>Tgl Pinjam</th>
                              <th>Tgl Kembali</th>
                              <th>Status</th>
                              <th>Telat</th>
                          </tr>
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
                    <!-- /.table-responsive -->
                  </div>
                  <!-- /.card-body -->
                  <!-- /.card-footer -->
                </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
  </div>
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>

  </script>
@endsection