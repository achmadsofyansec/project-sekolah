@extends('layouts.app')
@section('page', 'Pengunjung')
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
            <div class="card card-info card-outline">
              <div class="card-header col-md-12">

                <a><i class="fa fa-file-search text-info"> </i> Cari Data Pengunjung Berdasarkan</a>
                <form role="form" action="{{url('laporan/pengunjung')}}" method="get">
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
                        <label>Keperluan</label>
                                        <select class="form-control" type="text" name="keperluan" id="keperluan">
                                          @if($req->keperluan != ''){
                                            echo <option value="">{{$req->keperluan}}</option>
                                          }@endif
                                            <option value="all">[ SEMUA KEPERLUAN ]</option>>
                                            <option value="Pinjam Buku">Pinjam Buku</option>
                                            <option value="Kembali Buku">Kembali Buku</option>
                                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group">
                      <div class="btn-group btn-group-sm">
                        <button class="btn bg-info btn-sm"><i class="fa fa-search "> </i> Tampilkan Data</button>
                        <a class="btn btn-danger btn-sm" href="{{route('export_pengunjung')}}" target="_blank"><i class="fa fa-download"> </i> Export</a>
                      </div>
                      </div>
                    </div> 
                  </div>
                </form>
              </div>
                <div class="card" id="cetak">
                  <div class="card-header border-transparent">
                    <center>
                        <h4 class="m-0 text-dark mt-3" style="text-shadow: 2px 2px 4px #17a2b8;">
              <img src="{{$img}}" alt="Logo" class="brand-image img-rounded " style="width:80px;height:60px;">
               <br></h4>
                      <h4 style="margin:0;">Laporan Pengunjung Perpus </h4>
                      <p style="margin:0;">Periode : </p>
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
                                    <th>Kelas</th>
                                    <th>Keperluan</th>
                                    <th>Tanggal Kunjungan</th>
                          </tr>
                        </thead>
                        <tbody>
                                    @forelse ($pengunjung as $item)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->kode_kelas}} / {{$item->kode_jurusan}}</td>
                                    <td>{{$item->keperluan}}</td>
                                    <td>{{$item->create_pengunjung}}</td>
                                    @empty
                                    <tr>
                                      <td colspan="5">tidak ada data</td>
                                    </tr>
                                </tr>
                                @endforelse
                        </tbody>
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