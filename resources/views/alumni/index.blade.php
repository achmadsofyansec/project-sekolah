@extends('layouts.app')
@section('page', 'Alumni')
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
                <div class="card card-outline card-navy">
                   <div class="card-header">
                   <a type="button" href="{{route('export_alumni')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Export</a>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                                <thead>
                                    <th>No</th>                                   
                                    <th>NIK</th>                                   
                                    <th>Nama</th>                                   
                                    <th>NISN</th>                                   
                                    <th>Jenis Kelamin</th>  
                                    <th>Kelas/Jurusan</th>                                 
                                    <th>Tempat Lahir</th>                                   
                                    <th>Tanggal Lahir</th>                                   
                                    <th>Kode ujian</th>                                   
                                </thead>
                              <tbody>
                                @forelse($data as $item)
                                <td>{{$loop->index +1}}</td>
                                <td>{{$item->nik}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->jns_kelamin}}</td>
                                <td>{{$item->kode_kelas}} / {{$item->kode_jurusan}}</td>
                                <td>{{$item->nik}}</td>
                                <td>{{$item->tmp_lahir}}</td>
                                <td>{{$item->tgl_lhr}}</td>
                                <td>{{$item->kode_ujian}}</td>
                                <td></td>
                                @empty
                                <td colspan="9">Tidak Ada Lulusan</td>
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