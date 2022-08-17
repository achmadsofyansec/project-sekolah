@extends('layouts.app')
@section('page', 'Anggota Ekstrakulikuler')
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
              <div class="row">
                <div class="col-md-4">
                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <div class="card-title">
                        Filter Ekstrakulikuler
                      </div>
                    </div>
                      <div class="card-body">
                          <div class="form-group">
                            <label >Kelas</label>
                            <select name="filter_ekstra_anggota_kelas" id="filter_ekstra_anggota_kelas" class="form-control">
                              <option value="">-- Semua Kelas -- </option>
                              @forelse ($kelas as $item)
                            <option value="{{$item->kode_kelas}}">{{$item->kode_kelas}} ( {{$item->nama_kelas}} ) </option>
                            @empty
                              @endforelse
                            </select>
                          </div>
                          <div class="form-group">
                            <label >Jurusan</label>
                            <select name="filter_absensi_jurusan" id="filter_absensi_jurusan" class="form-control">
                            <option value="">-- Semua Jurusan -- </option>
                              @forelse ($jurusan as $item)
                            <option value="{{$item->kode_jurusan}}">{{$item->kode_jurusan}} ( {{$item->nama_jurusan}} ) </option>
                            @empty
                              @endforelse
                            </select>
                          </div>
                          <div class="form-group">
                            <label >Ekstrakulikuler</label>
                            <select name="filter_ekstra_anggota_ekstra" id="filter_ekstra_anggota_ekstra" class="form-control">
                              <option value="">-- Semua Kelas -- </option>
                              @forelse ($ekstra as $item)
                            <option value="{{$item->kode_ekstra}}">{{$item->kode_ekstra}} ( {{$item->nama_ekstra}} ) </option>
                            @empty
                              @endforelse
                            </select>
                          </div>
                      </div>
                    
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <div class="card-title">
                        Data Anggota Ekstra
                      </div>
                      <div class="card-tools">
                        <a type="button" href="{{route('anggota_ekstra.create')}}" class="btn btn-info"><i class="fas fa-plus"></i> Tambah</a>
                      </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                             <table class="table" >
                                 <thead>
                                     <th>No</th>
                                     <th>Tanggal Daftar</th>
                                     <th>Nama Siswa</th>
                                     <th>Kelas</th>
                                     <th>Jurusan</th>
                                 </thead>
                                 <tbody id="content-ekstra">
                                   
                                 </tbody>
                             </table>
                        </div>
                    </div>
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