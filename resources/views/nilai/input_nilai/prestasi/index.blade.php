@extends('layouts.app')
@section('page', 'Prestasi')
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
                <div class="card card-outline card-info">
                   <div class="card-header">
                    <div class="card-tools">
                      <a type="button" href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-input-prestasi"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                                <thead>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Lomba</th>
                                    <th>Tahun</th>
                                    <th>Penyelenggara</th>
                                    <th>Tingkat</th>
                                    <th>Peringkat Yang Diraih</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                  @forelse ($data as $item)
                                      <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$item->nisn}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->nama_lomba}}</td>
                                        <td>{{$item->tahun_lomba}}</td>
                                        <td>{{$item->nama_penyelenggara}}</td>
                                        <td>{{$item->tingkat_lomba}}</td>
                                        <td>{{$item->peringkat_lomba}}</td>
                                        <td>
                                          <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                          action="{{ route('input_prestasi.destroy',$item->id_prestasi) }}" method="POST">
                                          <a href="{{ route('input_prestasi.edit',$item->id_prestasi) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                          @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                          </form>
                                        </td>
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
    @include('nilai.input_nilai.prestasi.create')
    </section>
    <!-- /.content -->
  </div>
@endsection