@extends('layouts.app')
@section('page', 'Informasi Lahan')
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
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-6 mt-1">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                          <h1 class="card-title"> <span class="badge badge-danger"><i class="fas fa-angle-right right"></i></span> Detail Lahan</h1>
                        </div>
                        <div class="card-body">
                        @foreach ($lahan as $data)
                          <p>Nama Lahan : {{ $data->nama_lahan }}</p>
                          <p>Alamat : {{ $data->alamat }}</p>
                          <p>Luas : {{ $data->luas }}</p>
                          <p>Luas yang digunakan : {{ $data->luas_digunakan }}</p>
                          <p>Status Lahan : {{ $data->status_lahan }}</p>
                          <p>Kelurahan : {{ $data->kelurahan }}</p>
                          <p>Kecamatan : {{ $data->kecamatan }}</p>
                          <p>Kabupaten : {{ $data->kabupaten }}</p>
                          <p>Provinsi : {{ $data->provinsi }}</p>
                          <p>Kode POS : {{ $data->kode_pos }}</p>
                          <p>Kondisi Geografis : {{ $data->kategori_geografis }}</p>
                          <p>Wilayah : {{ $data->wilayah }}</p>
                          <p>Jarak Ke Provinsi : {{ $data->jarak_provinsi }}</p>
                          <p>Jarak Ke Kabupaten : {{ $data->jarak_kabupaten }}</p>
                          <p>Jarak Ke Kecamatan : {{ $data->jarak_kecamatan }}</p>
                          <p>Jarak Ke Kemenag : {{ $data->jarak_kemenag }}</p>
                          <p>Jarak Ke RA : {{ $data->jarak_ra }}</p>
                          <p>Jarak Ke MI : {{ $data->jarak_mi }}</p>
                          <p>Jarak Ke MTS : {{ $data->jarak_mts }}</p>
                          <p>Jarak Ke SD : {{ $data->jarak_sd }}</p>
                          <p>Jarak Ke SMP : {{ $data->jarak_smp }}</p>
                          <p>Jarak Ke SMA : {{ $data->jarak_sma }}</p>
                          <p>Jarak Ke Pontren : {{ $data->jarak_pontren }}</p>
                          <p>Jarak Ke PTKI : {{ $data->jarak_ptki }}</p>
                         @endforeach
                      </div>
                </div>  
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
@endsection