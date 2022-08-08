@extends('layouts.app')
@section('page', 'Kategori')
@section('content-app')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="nav-icon fas fa-th"></i> @yield('page')</h1>
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
            <div class="card card-info card-outline">
              <div class="card-header">
               <a class="btn btn-info btn-sm" href="{{route('kategori.create')}}"><i class="fa fa-plus"> </i> Tambah Data</a>
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
                    @foreach ($kategori as $kategori)
                                    <tr>
                                        <td>{{$kategori->id}}</td>
                                        <td>{{$kategori->nama_kategori}}</td>
                                        <td style="text-align:center;width:150px;">
                                            <div class="btn-group btn-group-sm">
                                            <a class="btn bg-navy btn-xs" href="{{route('kategori.edit',$kategori->id)}}"><i class="fa fa-edit"> </i> Edit</a>
                                            <a class="btn btn-danger btn-xs" href="{{route('kategori.destroy',$kategori->id)}}" onclick="return confirm('Yakin ingin hapus data ? ');"><i class="fa fa-trash"> </i> Hapus </a>
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