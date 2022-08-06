@extends('layouts.app')
@section('page', 'Kehadiran')
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
                       <a type="button" href="{{route('kehadiran.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                       </div>
                       <div class="card-body">
                           <div class="table-responsive">
                                <table id="dataTable" class="table">
                                    <thead>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama Siswa</th>
                                        <th>Absensi</th>
                                        <th>Alasan</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                      @forelse ($absensi as $item)
                                      <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$item->tgl_absensi}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->keterangan}}</td>
                                        <td>{{$item->alasan}}</td>
                                        <td>
                                          <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                          action="{{ route('kehadiran.destroy',$item->id_absen) }}" method="POST">
                                          <a href="{{ route('kehadiran.edit',$item->id_absen) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                          @csrf
                                          </form>
                                        </td>
                                      </tr>
                                  @empty
                                      
                                  @endforelse
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