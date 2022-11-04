@extends('layouts.app')
@section('page', 'Point Siswa')
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
                        Filter Point
                      </div>
                    </div>
                  <form action="{{route('point_siswa.index')}}" method="GET">
                      <div class="card-body">
                          <div class="form-group">
                            <label >Kelas</label>
                            <select name="filter_poin_kelas" id="filter_poin_kelas" class="form-control" style="width: 100%;">
                              <option value="">-- Semua Kelas -- </option>
                              @forelse ($kelas as $item)
                            <option value="{{$item->kode_kelas}}" @if($req->filter_poin_kelas != null && $req->filter_poin_kelas == $item->kode_kelas){{'selected'}} @endif>{{$item->kode_kelas}} ( {{$item->nama_kelas}} ) </option>
                            @empty
                              @endforelse
                            </select>
                          </div>
                          <div class="form-group">
                            <label >Jurusan</label>
                            <select name="filter_poin_jurusan" id="filter_poin_jurusan" class="form-control" style="width: 100%;">
                            <option value="">-- Semua Jurusan -- </option>
                              @forelse ($jurusan as $item)
                            <option value="{{$item->kode_jurusan}}" @if($req->filter_poin_jurusan != null && $req->filter_poin_jurusan == $item->kode_jurusan){{'selected'}} @endif>{{$item->kode_jurusan}} ( {{$item->nama_jurusan}} ) </option>
                            @empty
                              @endforelse
                            </select>
                          </div>
                      </div>
                      <div class="card-footer">
                        <input type="submit" class="btn btn-info" value="Cari">
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <div class="card-title">
                        Data Point
                      </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                             <table class="table" >
                                 <thead>
                                     <th>No</th>
                                     <th>Nama</th>
                                     <th>Kelas</th>
                                     <th>Jurusan</th>
                                     <th>Point</th>
                                 </thead>
                                 <tbody id="content-poin">
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
              </div>
                
            </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('content-script')

    
@endsection