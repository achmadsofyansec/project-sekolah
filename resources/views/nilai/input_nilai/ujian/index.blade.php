@extends('layouts.app')
@section('page', 'Ujian')
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
                      <a type="button" href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-input-ujian"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                              <thead>
                                <th>No</th>
                                <th>Tanggal Input</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Tahun Ajaran</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                              @forelse ($data as $item)
                                  <tr>
                                  <td>{{$loop->index + 1}}</td>
                                  <td>{{$item->tgl_input}}</td>
                                  <td>{{$item->nama_kelas}}  ({{$item->kode_kelas}})</td>
                                  <td>{{$item->nama_jurusan}} ({{$item->kode_jurusan}})</td>
                                  <td>{{$item->tahun_ajaran}}</td>
                                  <td>
                                    <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                    action="{{ route('input_nilai.destroy',$item->id_nilai) }}" method="POST">
                                    <a href="{{ route('input_nilai.edit',$item->id_nilai) }}" class="btn btn-warning"><i class="fas fa-box-open"></i>Action</a>
                                    @csrf
                                    </form>
                                  </td>
                                  </tr>
                              @empty
                                  <tr>
                                    <td class="text-muted text-center" colspan="6">Tidak Ada Data</td>
                                  </tr>
                              @endforelse
                            </tbody>
                            </table>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    @include('nilai.input_nilai.ujian.create')
    </section>
    <!-- /.content -->
  </div>
@endsection