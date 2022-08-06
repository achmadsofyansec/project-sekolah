@extends('layouts.app')
@section('page', 'Pelanggaran')
@section('content-app')
  <div class="content-wrapper">
    <!-- Main content -->
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
                    <div class="card card-outline card-navy">
                       <div class="card-header">
                       <a type="button" href="{{route('pelanggaran.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                       </div>
                       <div class="card-body">
                           <div class="table-responsive">
                                <table id="dataTable" class="table">
                                    <thead>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama Siswa</th>
                                        <th>Pelanggaran</th>
                                        <th>Poin</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                      @foreach ($pelanggaran as $item)
                                      <td>{{$loop->index + 1}}</td>
                                      <td>{{$item->tanggal_pelanggaran}}</td>
                                      <td>{{$item->nama }}</td>
                                      <td>{{$item->nama_poin_pelanggaran}}</td>
                                      <td>{{$item->poin}}</td>
                                      <td>
                                        <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                        action="{{ route('pelanggaran.destroy',$item->id_pelanggaran  ) }}" method="POST">
                                        <a href="{{ route('pelanggaran.edit',$item->id_pelanggaran) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                        @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                        </form>
                                      </td>
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