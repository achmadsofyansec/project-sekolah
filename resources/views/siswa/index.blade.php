@extends('layouts.app')
@section('page', 'Data Siswa')
@section('content-app')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="nav-icon fas fa-th"></i></i>  @yield('page')</h1>
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
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="animated fadeInUp col-12">
            <div class="card card-navy card-outline">
              <div class="card-header">
               <form role="form" action="<?php echo url('/'); ?>/siswa/proses_tampil_siswa" method="post">
                            <div class="row">
                                <div class="form-group col-3">
                                    <select class="form-control select2 text-navy" name="id_kelas" required>
                                        
                                    </select>
                                </div>
                                <div class="col-xs-6 ml-3">
                                    <button class="btn bg-navy" name="tampil"><i class="fa fa-search"> </i> Tampilkan Data</button>
                                </div>
                            </div>
                        </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped table-sm">
                  <thead>
                    <tr class="text-info bg-navy" style="text-align:center;">
                      <th>No</th>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Kelas</th>
                        <th>Angkatan</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($siswa as $siswas)
                     <tr class="text-sm">
                      <td>{{$loop->index+1}}</td>
                      <td>{{$siswas->nisn}}</td>
                      <td>{{$siswas->nama}}</td>
                      <td>{{$siswas->jns_kelamin}}</td>
                      <td>{{$siswas->tgl_lhr}}</td>
                      <td>XII RPL C</td>
                      <td>2021</td>
                      <td>{{}}</td>
                     </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
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