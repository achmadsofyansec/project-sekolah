@extends('layouts.app')
@section('page', 'Prestasi')
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
                    <div class="card-tools">
                      <a type="button" href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-input-prestasi"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                                <thead>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Lomba</th>
                                    <th>Tahun</th>
                                    <th>Penyelenggara</th>
                                    <th>Tingkat</th>
                                    <th>Peringkat Yang Diraih</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    @include('nilai.input_nilai.prestasi.create')
    </section>
    <!-- /.content -->
  </div>
@endsection