@extends('layouts.app')
@section('page', 'Ruangan')
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
                <div class="card card-outline card-secondary">
                   <div class="card-header">
                   <a type="button" href="{{ route('ruangan.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                                <thead>
                                    <th>No</th>                     
                                    <th>Gedung</th>
                                    <th>Jenis Ruangan</th>
                                    <th>Nama</th>
                                    <th>Kondisi</th>
                                    <th>Tahun Dibangun</th>
                                    <th>Panjang</th>
                                    <th>Lebar</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                  @forelse ($ruangan as $ruangan)
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{ $ruangan->nama_gedung }}</td>
                                    <td>{{ $ruangan->jenis_ruangan }}</td>    
                                    <td>{{ $ruangan->nama }}</td>
                                    <td>{{ $ruangan->kondisi }}</td>
                                    <td>{{ $ruangan->tahun_dibangun }}</td>
                                    <td>{{ $ruangan->panjang }}</td>
                                    <td>{{ $ruangan->lebar }}</td>
                                    <td>
                                      @if ($ruangan->foto != null)
                                      <img src="{{asset('public/uploads/'.$ruangan->foto)}}" alt="Image" class="img" width="100" height="100">
                                      @else
                                          <p>Tidak Ada Foto</p>
                                      @endif
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                        action="{{ route('ruangan.destroy',$ruangan->id) }}" method="POST">
                                        <a href="{{ route('ruangan.edit',$ruangan->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
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
                                  <td>
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