@extends('layouts.app')
@section('page', 'Laporan Buku')
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
    <section class="content animated fadeInRight ">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class=" col-md-12">
            <div class="card card-info card-outline">
              <div class="card-header col-md-12">
              </div>
              <!-- /.card-header -->
              <!-- TABLE: LATEST ORDERS -->

                <div class="card" id="cetak">
                  <div class="card-header border-transparent text-right">
                        <a class="btn bg-navy btn-sm" href="<?php echo url('/'); ?>/laporan/buku_excel" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table m-0 table-hover table-sm">
                        <thead>
                          <tr class="bg-navy text-sm">
                            <th>No</th>
                                    <th>Kode Buku</th>
                                    <th>Judul Buku</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Lokasi Penyimpanan</th>
                                    <th>Jumlah Buku</th>
                          </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <!-- <td>1</td>
                                    <td>991729</td>
                                    <td>uwau</td>
                                    <td>Khoirul</td>
                                    <td>cv hawari</td>
                                    <td>lawang</td>
                                    <td>20</td>
                                    -->
                                </tr>
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
  @endsection