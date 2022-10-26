@extends('layouts.app')
@section('page', 'Laporan Nilai')
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
              <div class="card card-info card-outline">
                <div class="card-body">
                  <form action="{{route('laporan_nilai')}}" method="GET">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <input type="date" name="filter_awal" value="@if($req->filter_awal != null){{$req->filter_awal}}@endif" id="filter_awal" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                         
                          <input type="date" name="filter_akhir" value="@if($req->filter_akhir != null){{$req->filter_akhir}}@endif" id="filter_akhir" class="form-control" required>
                        </div>
                      </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input type="submit" value="Search" class="btn btn-primary" style="width: 100%">
                          </div>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
        @if ($req->filter_awal != null && $req->filter_akhir != null)
           <div class="row">
              <div class="col-md-12">
                <div class="card card-outline card-info">
                  <div class="card-body">
                    <h4>Laporan Nilai</h4>
                    <div class="row">
                      <div class="col-5 col-sm-3">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">                                            
                          <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="true">Harian</a>
                          <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="true">Ujian</a>
                          <a class="nav-link" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false">Prestasi</a>
                          <a class="nav-link" id="vert-tabs-4-tab" data-toggle="pill" href="#vert-tabs-4" role="tab" aria-controls="vert-tabs-4" aria-selected="false">Rapor</a>
                        </div>
                      </div>
                      <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                          <div class="tab-pane text-left fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                            <div class="card-header">
                             Harian
                              <div class="card-tools">
                                <form action="{{route('print_pdf')}}" method="GET" target="_blank">
                                  <input type="hidden" name="filter_awal" id="filter_awal" value="{{$req->filter_awal}}" >
                                  <input type="hidden" name="filter_akhir" id="filter_akhir" value="{{$req->filter_akhir}}" >
                                  <input type="hidden" name="type" id="type" value="nilai">
                                  <input type="hidden" name="nama" id="nama" value="harian">
                                  <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
                                </form>
                              </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table" id="TABLE_1">
                                    <thead>
                                      <th>No</th>
                                      <th>Tanggal</th>
                                      <th>Tahun Ajaran</th>
                                      <th>Kelas/Jurusan</th>
                                      <th>Mapel</th>
                                      <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                      @forelse ($harian as $item)
                                      <tr>
                                      <td>{{$loop->index + 1}}</td>
                                      <td>{{$item->tgl_input}}</td>
                                      <td>{{$item->tahun_ajaran}}</td>
                                      <td>{{$item->kode_kelas}} / {{$item->kode_jurusan}} </td>
                                      <td>{{$item->nama_mapel}} ({{$item->kategori_nilai}}) </td>
                                      <td>
                                        <a href="#" class="btn-sm btn-primary"><i class="fas fa-print"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#modal-view-harian" class="btn-sm btn-light"><i class="fas fa-eye"></i></a>
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
                          <div class="tab-pane text-left fade show " id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">
                            <div class="card-header">
                              Ujian
                               <div class="card-tools">
                                <form action="{{route('print_pdf')}}" method="GET" target="_blank">
                                  <input type="hidden" name="filter_awal" id="filter_awal" value="{{$req->filter_awal}}" >
                                  <input type="hidden" name="filter_akhir" id="filter_akhir" value="{{$req->filter_akhir}}" >
                                  <input type="hidden" name="type" id="type" value="nilai">
                                  <input type="hidden" name="nama" id="nama" value="ujian">
                                  <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
                                </form>
                               </div>
                             </div>
                             <div class="card-body">
                              <div class="table-responsive">
                                <table class="table" id="TABLE_2">
                                  <thead>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Kelas/Jurusan</th>
                                    <th>Mapel</th>
                                    <th>Aksi</th>
                                  </thead>
                                  <tbody>
                                    @forelse ($ujian as $item)
                                    <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$item->tgl_input}}</td>
                                    <td>{{$item->tahun_ajaran}}</td>
                                    <td>{{$item->kode_kelas}} / {{$item->kode_jurusan}} </td>
                                    <td>{{$item->nama_mapel}} ({{$item->kategori_nilai}}) </td>
                                    <td>
                                      <a href="#" class="btn-sm btn-primary"><i class="fas fa-print"></i></a>
                                      <a href="#" data-toggle="modal" data-target="#modal-view-harian" class="btn-sm btn-light"><i class="fas fa-eye"></i></a>
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
                          <div class="tab-pane text-left fade show " id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">
                            <div class="card-header">
                              Prestasi
                               <div class="card-tools">
                                <form action="{{route('print_pdf')}}" method="GET" target="_blank">
                                  <input type="hidden" name="filter_awal" id="filter_awal" value="{{$req->filter_awal}}" >
                                  <input type="hidden" name="filter_akhir" id="filter_akhir" value="{{$req->filter_akhir}}" >
                                  <input type="hidden" name="type" id="type" value="nilai">
                                  <input type="hidden" name="nama" id="nama" value="prestasi">
                                  <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
                                </form>
                               </div>
                             </div>
                             <div class="card-body">
                              <div class="table-responsive">
                                <table id="TABLE_4" class="table">
                                    <thead>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Lomba</th>
                                        <th>Tahun</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                      @forelse ($prestasi as $item)
                                          <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$item->nisn}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->nama_lomba}}</td>
                                            <td>{{$item->tahun_lomba}}</td>
                                            <td>
                                              <a href="#" class="btn-sm btn-primary"><i class="fas fa-print"></i></a>
                                              <a href="#" data-toggle="modal" data-target="#modal-view-harian" class="btn-sm btn-light"><i class="fas fa-eye"></i></a>
                                          </td>
                                          </tr>
                                      @empty
                                          
                                      @endforelse
                                    </tbody>
                                </table>
                           </div>
                             </div>
                          </div>
                          <div class="tab-pane text-left fade show " id="vert-tabs-4" role="tabpanel" aria-labelledby="vert-tabs-4-tab">
                            <div class="card-header">
                              Rapor
                               <div class="card-tools">
                                <form action="{{route('print_pdf')}}" method="GET" target="_blank">
                                  <input type="hidden" name="filter_awal" id="filter_awal" value="{{$req->filter_awal}}" >
                                  <input type="hidden" name="filter_akhir" id="filter_akhir" value="{{$req->filter_akhir}}" >
                                  <input type="hidden" name="type" id="type" value="nilai">
                                  <input type="hidden" name="nama" id="nama" value="rapor">
                                  <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
                                </form>
                               </div>
                             </div>
                             <div class="card-body">
                              <div class="table-responsive">
                                <table class="table" id="TABLE_5">
                                  <thead>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Kelas/Jurusan</th>
                                    <th>Mapel</th>
                                    <th>Aksi</th>
                                  </thead>
                                  <tbody>
                                    @forelse ($rapor as $item)
                                    <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$item->tgl_input}}</td>
                                    <td>{{$item->tahun_ajaran}}</td>
                                    <td>{{$item->kode_kelas}} / {{$item->kode_jurusan}} </td>
                                    <td>{{$item->nama_mapel}} ({{$item->kategori_nilai}}) </td>
                                    <td>
                                      <a href="#" class="btn-sm btn-primary"><i class="fas fa-print"></i></a>
                                      <a href="#" data-toggle="modal" data-target="#modal-view-harian" class="btn-sm btn-light"><i class="fas fa-eye"></i></a>
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
                  </div>
                </div>
              </div>
            </div> 
        @endif
    </div>
    </section>
    <!-- /.content -->
  </div>
@endsection