@extends('layouts.app')
@section('page', 'Data Nilai')
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
<div class="content">
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
              <div class="col-md-12">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <div class="card-tools">
                      <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-nilai"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTable" class="table table-border">
                        <thead>
                          <th>No</th>
                          <th>Nama Siswa</th>
                          <th>Kelas / Jurusan</th>
                          <th>Nomor Ujian</th>
                          <th>Bahasa Indonesia</th>
                          <th>Matematika</th>
                          <th>Kejurusan</th>
                          <th>Bahasa Inggris</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </thead>
                        <tbody>
                          @forelse ($data as $item)
                              <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->kode_kelas}} / {{$item->kode_jurusan}}</td>
                                <td>{{$item->kode_ujian}}</td>
                                <td>@if ($item->bind < 75)
                                  <span class="btn btn-warning">{{ $item->bind }}</span>
                               @elseif($item->bind > 75)
                               <span class="btn btn-success">{{ $item->bind }}</span>
                               @else
                               <span class="btn btn-danger">{{ $item->bind }}</span>
                               @endif</td>
                               <td>@if ($item->mat < 75)
                                <span class="btn btn-warning">{{ $item->mat }}</span>
                             @elseif($item->mat > 75)
                             <span class="btn btn-success">{{ $item->mat }}</span>
                             @else
                             <span class="btn btn-danger">{{ $item->mat }}</span>
                             @endif</td>
                             <td>@if ($item->kejurusan < 75)
                                  <span class="btn btn-warning">{{ $item->kejurusan }}</span>
                               @elseif($item->kejurusan > 75)
                               <span class="btn btn-success">{{ $item->kejurusan }}</span>
                               @else
                               <span class="btn btn-danger">{{ $item->kejurusan }}</span>
                               @endif</td>
                               <td>@if ($item->bing < 75)
                                <span class="btn btn-warning">{{ $item->bing }}</span>
                             @elseif($item->bing > 75)
                             <span class="btn btn-success">{{ $item->bing }}</span>
                             @else
                             <span class="btn btn-danger">{{ $item->bing }}</span>
                             @endif</td>
                                <td>@if ($item->status == 'Tidak Lulus')
                                  <span class="btn btn-danger">Tidak Lulus</span>
                               @elseif($item->status == 'Lulus')
                               <span class="btn btn-success">Lulus</span>
                               @else 
                               <span class="btn btn-primary">Belum Ujian / Drop Out</span>
                               @endif</td>
                              
                          
                          <td><form onsubmit="return confirm('Apakah Anda yakin ?')"
                            action="{{ route('nilai.destroy',$item->id) }}" method="POST">
                            <a href="{{ route('nilai.edit',$item->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form></td>
                          </tr>
                          @empty   
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
    @extends('nilai.create')
</div>
</div>
@endsection