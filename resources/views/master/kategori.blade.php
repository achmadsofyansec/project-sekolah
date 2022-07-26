@extends('layouts.app')
@section('page', 'Dashboard')
@section('content-app')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="nav-icon fas fa-th"></i>Judul</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item active">Judul</li>
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
            <div class="card card-info card-outline">
              <div class="card-header">
               <a class="btn btn-info btn-sm" href="<?php echo url('/'); ?>/master/kategori_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped table-sm">
                  <thead>
                    <tr class="text-info bg-navy">
                      <th>No</th>
                      <th>Kategori Buku</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody> 
                      @foreach ($kategori_buku as $item)
                      <?php $i = 1 ?>                    
                                    <tr>
                                        <td style="text-align:center;width:20px;"><?php echo $i++ ?></td>
                                        <td>{{$item['nama_kategori']}}</td>
                                        <td style="text-align:center;width:150px;">
                                            <div class="btn-group btn-group-sm">
                                            <a class="btn bg-navy btn-xs" href=""><i class="fa fa-edit"> </i> Edit</a>
                                            <a class="btn btn-danger btn-xs" href="" onclick="return confirm('Yakin ingin hapus data ? ');"><i class="fa fa-trash"> </i> Hapus </a>
                                        </div>
                                        </td>
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

      <!-- /.modal -->
@endsection