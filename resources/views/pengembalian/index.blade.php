@extends('layouts.app')
@section('page', 'Data Pengembalian')
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
                   <a type="button" href="{{ route('pengembalian.create')}}" class="btn btn-succes"><i class="fas fa-plus"></i> Pengembalian</a>
                   </div>
                   <div class="card-body">      
                            <table id="dataTable" class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Peminjam</th>                     
                                    <th>Unit</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                     @forelse ($data as $data)
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{ $data->nama }}</td>    
                                    <td>{{ $data->unit }}</td>
                                    <td>{{ $data->jumlah }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                        action="{{ route('pengembalian.destroy',$data->id) }}" method="POST">
                                        <a href="{{ route('pengembalian.edit',$data->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
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