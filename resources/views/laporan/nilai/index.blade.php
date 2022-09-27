@extends('layouts.app')
@section('page', 'Laporan Nilai')
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
                <div class="card card-outline card-info">
                   <div class="card-header">
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                              <table id="dataTable" class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Jenis Laporan</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Nilai Harian</td>
                                    <td>
                                      <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                      <a href="#" class="btn btn-info"><i class="fas fa-print"></i></a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Nilai Ujian</td>
                                    <td>
                                      <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                      <a href="#" class="btn btn-info"><i class="fas fa-print"></i></a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Nilai Prestasi</td>
                                    <td>
                                      <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                      <a href="#" class="btn btn-info"><i class="fas fa-print"></i></a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>Nilai Ekstrakulikuler</td>
                                    <td>
                                      <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                      <a href="#" class="btn btn-info"><i class="fas fa-print"></i></a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Nilai Capaian Hasil Belajar</td>
                                    <td>
                                      <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                      <a href="#" class="btn btn-info"><i class="fas fa-print"></i></a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Nilai Rapor</td>
                                    <td>
                                      <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                      <a href="#" class="btn btn-info"><i class="fas fa-print"></i></a>
                                    </td>
                                  </tr>
                                </tbody>
                            </table>
                            </table>
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