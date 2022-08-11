@extends('layouts.app')
@section('page', 'Input Dokumen')
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
                    <a type="button" href="{{ route('input_dokumen.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Jenis Dokumen</th>
                                    <th>Lokasi</th>
                                    <th>Nomor Dok</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Tanggal Dokumen</th>
                                    <th>Tanggal Upload</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                     @forelse ($dokumen as $dokumen)
                                      <tr>
                                      <td>{{$loop->index + 1}}</td>
                                      <td>{{ $dokumen->jenis_dokumen }}</td>
                                      <td>{{ $dokumen->ruangan }}/{{ $dokumen->lemari }}/{{ $dokumen->rak }}/{{ $dokumen->box }}/{{ $dokumen->urut }}</td>
                                      <td>{{ $dokumen->nomor_dokumen }}</td>
                                      <td>{{ $dokumen->tahun_ajaran }}</td>
                                      <td>{{ $dokumen->tanggal_dokumen }}</td>
                                      <td>{{ $dokumen->tanggal_dokumen }}</td>
                                      <td>
                                        <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                        action="" method="POST">
                                        <a href="{{ route('input_dokumen.edit',$dokumen->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                        @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                        </form>
                                      </td>
                                      </tr>
                                  @empty
                                      <tr>
                                        <td colspan="5" class="text-center text-mute">Tidak Ada Data</td>
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
    </section>
    <!-- /.content -->
  </div>
@endsection