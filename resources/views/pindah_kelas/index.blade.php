@extends('layouts.app')
@section('page', 'Pindah / Naik Kelas')
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
                     <a type="button" href="{{route('pindah_kelas.create')}}" class="btn btn-info"><i class="fas fa-plus"></i> Tambah Pengajuan</a>
                     </div>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                                <thead>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                  @forelse ($data as $item)
                                      <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$item->nisn}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->nama_kelas}}</td>
                                        <td>{{$item->tahun_ajaran}}</td>
                                        <td><?php
                                          switch($item->status_pindah){
                                              case '0':
                                                  echo "Belum Disetujui";
                                                  break;
                                              case '1':
                                                  echo "Disetujui";
                                                  break;
                                              case '2':
                                                  echo "Ditolak";
                                                  break;
                                          }
                                        ?></td>
                                        <td>{{$item->ket_pindah}}</td>
                                        <td>
                                          <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                          action="{{ route('pindah_kelas.destroy',$item->id_pindah) }}" method="POST">
                                          <a href="{{ route('pindah_kelas.edit',$item->id_pindah) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
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
    </section>
    <!-- /.content -->
  </div>
@endsection