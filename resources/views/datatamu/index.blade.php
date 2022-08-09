@extends('layouts.app')
@section('page', 'Data Tamu')
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
                    <a type="button" href="{{ route('datatamu.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Asal / Instansi</th>
                                    <th>Alamat</th>
                                    <th>Keperluan</th>
                                    <th>No.Telp</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                  @foreach ($tamu as $tamu)
                                    <td>1</td>
                                    <td>{{ $tamu->nama }}</td>
                                    <td>{{ $tamu->asal }}</td>
                                    <td>{{ $tamu->alamat }}</td>
                                    <td>{{ $tamu->keperluan }}</td>
                                    <td>{{ $tamu->telepon }}</td>
                                  <td>
                                    <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                        action="{{ route('datatamu.destroy', $tamu->id) }}" method="POST">
                                        <a href="{{ route('datatamu.edit',$tamu->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                        @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                        </form>

                                    <!-- <a href="{{ route('datatamu.edit' , $tamu->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                  @method('DELETE')
                                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button></td> -->
                                  @endforeach
                                </tbody>
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