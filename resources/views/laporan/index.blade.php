@extends('layouts.app')
@section('page', 'Laporan Arsip')
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
                <div class="col-md-3">
                  <div class="card card-outline card-primary">
                    <div class="card-header">
                      <div class="card-title">
                        Filter
                      </div>
                    </div>
                  <form action="{{route('laporan')}}" method="GET">
                      <div class="card-body">
                          <div class="form-group">
                            <label>Dari Tanggal</label>
                            <input type="date" name="filter_dari_tanggal" id="filter_dari_tanggal" value="@if ($req->filter_dari_tanggal != null)
                                {{$req->filter_dari_tanggal}}
                            @endif" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Sampai Tanggal</label>
                            <input type="date" name="filter_sampai_tanggal" id="filter_sampai_tanggal" value="@if ($req->filter_sampai_tanggal != null)
                                {{$req->filter_sampai_tanggal}}
                            @endif" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Ruangan</label>
                            <select class="form-control" id="nama_ruangan" name="nama_ruangan">
                                    <option value="">Pilih Ruangan</option>
                                @forelse ($ruangan as $ruangan)
                                <option value="{{$ruangan->nama_ruangan}}">{{$ruangan->nama_ruangan}}</option>
                                  @empty
                                      
                                  @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                          <label>Lemari</label>
                          <select class="form-control" id="nama_lemari" name="nama_lemari">
                              <option value="">Pilih Lemari</option>
                              @forelse ($lemari as $lemari)
                                  <option value="{{ $lemari->nama_lemari }}">{{ $lemari->nama_lemari }}</option>
                                  @empty
                                  
                              @endforelse
                          </select>
                      </div>
                      <div class="form-group">
                        <label>Rak</label>
                        <select class="form-control" id="nama_rak" name="nama_rak">
                            <option value="">Pilih Rak</option>
                            @forelse ($rak as $rak)
                            <option value="{{$rak->nama_rak}}">{{$rak->nama_rak}}</option>
                              @empty
                                  
                              @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Box</label>
                      <select class="form-control" id="nama_box" name="nama_box">
                          <option value="">Pilih Box</option>
                          @forelse ($box as $box)
                              <option value="{{ $box->nama_box }}">{{ $box->nama_box }}</option>
                              @empty

                          @endforelse
                      </select>
                  </div>
                  <div class="form-group">
                    <label>Urut</label>
                    <select class="form-control" id="nama_urut" name="nama_urut">
                        <option value="">Pilih Urutan</option>
                        @forelse ($urut as $urut)
                            <option value="{{ $urut->nama_urut }}">{{ $urut->nama_urut }}</option>
                            @empty

                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                  <label>Jenis Dokumen</label>
                  <select class="form-control" id="nama_jenis_dokumen" name="nama_jenis_dokumen">
                    <option value="">-- Pilih Jenis Dokumen -- </option>
                      @forelse ($jenis_dokumen as $jenis_dokumen)
                          <option value="{{ $jenis_dokumen->nama_jenis_dokumen }}">{{ $jenis_dokumen->nama_jenis_dokumen }}</option>
                          @empty

                      @endforelse
                  </select>
              </div>
              <div class="form-group">
                <label>Map</label>
                <select class="form-control" id="nama_map" name="nama_map">
                    <option value="">-- Pilih Map --</option>
                    @forelse ($map as $map)
                        <option value="{{ $map->nama_map }}">{{ $map->nama_map }}</option>
                        @empty

                    @endforelse
                </select>
            </div>
                      </div>
                        
                      <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value="Cari">
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="card card-outline card-primary">
                    <div class="card-header">
                      <div class="card-title">
                       Laporan Arsip
                      </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                             <table class="table">
                                 <thead>
                                     <th>No</th>
                                     <th>Tanggal</th>
                                     <th>Upload</th>
                                     <th>Jenis Dokumen</th>
                                     <th>Lokasi</th>
                                     <th>Nomor Dok</th>
                                     <th>Nama Dok</th>
                                     <th></th>
                                 </thead>
                                 <tbody id="content-poin">
                                  
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