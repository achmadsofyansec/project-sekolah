@extends('layouts.app')
@section('page', 'Lahan')
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
                   <a href="{{route('lahan.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                                <thead>
                                    <th>No</th>                                   
                                    <th>Nama Lahan</th>
                                    <th>Alamat</th>
                                    <th>Luas (m)</th>
                                    <th>Luas Digunakan (m)</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                  @forelse ($lahan as $lahan)
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{ $lahan->nama_lahan }}</td>
                                    <td>{{ $lahan->alamat }}</td>    
                                    <td>{{ $lahan->luas }}</td>
                                    <td>{{ $lahan->luas_digunakan }}</td>
                                    <td>{{ $lahan->status }}</td>
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
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                                <thead>
                                    <th>No</th>                                   
                                    <th>Kepemilikan</th>
                                    <th>Bersertifikat (m)</th>
                                    <th>Belum Bersertifikat (m)</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>
                                  @forelse ($data_kepemilikan as $data)
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{ $data->kepemilikan }}</td>    
                                    <td>{{ $data->bersertifikat }}</td>
                                    <td>{{ $data->belum_bersertifikat }}</td>
                                    <td>{{ $data->total }}</td>
                                </tbody>
                                  @empty
                                      <tr>
                                        <td colspan="5" class="text-center text-mute">Tidak Ada Data</td>
                                      </tr>
                                    @endforelse
                                </tbody>  
                            </table>
                       </div>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                                  <thead>
                                    <th>No</th>                                   
                                    <th>Status</th>
                                    <th>Penggunaan</th>
                                    <th>Bersertifikat (m)</th>
                                    <th>Belum Bersertifikat (m)</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>
                                  @forelse ($data_pengguna as $data)
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>{{ $data->penggunaan }}</td>    
                                    <td>{{ $data->penggunaan_bersertifikat }}</td>
                                    <td>{{ $data->penggunaan_belum_bersertifikat }}</td>
                                    <td>{{ $data->penggunaan_total }}</td>
                                </tbody>
                                  @empty
                                      <tr>
                                        <td colspan="5" class="text-center text-mute">Tidak Ada Data</td>
                                      </tr>
                                    @endforelse
                                </tbody> 
                            </table>
                       </div>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                                  <thead>
                                    <th>No</th>                                   
                                    <th>Status</th>
                                    <th>Penggunaan</th>
                                    <th>Bersertifikat (m)</th>
                                    <th>Belum Bersertifikat (m)</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>
                                  @forelse ($data_pengguna as $data)
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>{{ $data->penggunaan }}</td>    
                                    <td>{{ $data->penggunaan_bersertifikat }}</td>
                                    <td>{{ $data->penggunaan_belum_bersertifikat }}</td>
                                    <td>{{ $data->penggunaan_total }}</td>
                                </tbody>
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