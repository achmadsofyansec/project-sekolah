@extends('layouts.app')
@section('page', 'Laporan Point Siswa')
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
              <div class="card card-navy card-outline">
                <div class="card-body">
                  <form action="{{route('lap_point_siswa')}}" method="GET">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                            <select name="filter_poin_kelas" id="filter_poin_kelas" class="form-control" style="width: 100%;">
                              <option value="">-- Semua Kelas -- </option>
                              @forelse ($kelas as $item)
                            <option value="{{$item->kode_kelas}}" @if($req->filter_poin_kelas != null && $req->filter_poin_kelas == $item->kode_kelas){{'selected'}} @endif>{{$item->kode_kelas}} ( {{$item->nama_kelas}} ) </option>
                            @empty
                              @endforelse
                            </select>
                          </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                            <select name="filter_poin_jurusan" id="filter_poin_jurusan" class="form-control" style="width: 100%;">
                            <option value="">-- Semua Jurusan -- </option>
                              @forelse ($jurusan as $item)
                            <option value="{{$item->kode_jurusan}}" @if($req->filter_poin_jurusan != null && $req->filter_poin_jurusan == $item->kode_jurusan){{'selected'}} @endif>{{$item->kode_jurusan}} ( {{$item->nama_jurusan}} ) </option>
                            @empty
                              @endforelse
                            </select>
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
        @if ($req->filter_poin_jurusan !=null && $req->filter_poin_kelas != null )
        <div class="row">
          <div class="col-md-12">
              <div class="card card-outline card-navy">
                <div class="card-header">
                  <div class="card-title">
                    Laporan Point Siswa
                  </div>
                  <div class="card-tools">
                    <form action="#">
                      <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
                    </form>
                  </div>
                  
                </div>
                <div class="card-body">
                  <table class="table" id="dataTable">
                    <thead>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>NISN</th>
                      <th>Nama</th>
                      <th>Kelas / Jurusan</th>
                      <th>Poin</th>
                    </thead>
                    <tbody>
                      @if ($data != null || $data != "")
                      {!!$data!!}
                      @else
                          <tr>
                            <td class="text-muted text-center" colspan="100%">Tidak Ada Data </td>
                          </tr>
                      @endif
                    </tbody>
                  </table>
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