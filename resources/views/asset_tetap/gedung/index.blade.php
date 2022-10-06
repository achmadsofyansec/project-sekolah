@extends('layouts.app')
@section('page', 'Gedung')
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
                   <a type="button" href="{{ route('gedung.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Gedung</th>                     
                                    <th>Nama Lahan</th>
                                    <th>Jumlah Lantai</th>
                                    <th>Kepemilikan</th>
                                    <th>Kondisi Kerusakan</th>
                                    <th>Kategori Kondisi</th>
                                    <th>Tahun Dibangun</th>
                                    <th>Luas Gedung</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                  @forelse ($gedung as $gedung)
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{ $gedung->nama_gedung }}</td>
                                    <td>{{ $gedung->nama_lahan }}</td>    
                                    <td>{{ $gedung->jml_lantai }}</td>
                                    <td>{{ $gedung->kepemilikan }}</td>
                                    <td>@if ($gedung->kondisi_kerusakan == 'Bisa Digunakan')
                                      <span class="btn btn-success">Bisa Digunakan</span>
                                   @elseif($gedung->kondisi_kerusakan == 'Tidak Bisa Digunakan')
                                   <span class="btn btn-warning">Tidak Bisa Digunakan</span>
                                   @else 
                                   <span class="btn btn-danger">Rusak Parah</span>
                                   @endif</td>
                                   <td>@if ($gedung->kategori_kondisi == 'Baik')
                                    <span class="btn btn-success">Baik</span>
                                 @elseif($gedung->kategori_kondisi == 'Rusak Sedang')
                                 <span class="btn btn-warning">Rusak Sedang</span>
                                 @else 
                                 <span class="btn btn-danger">Rusak Parah</span>
                                 @endif</td>
                                    <td>{{ $gedung->tahun_dibangun }}</td>
                                    <td>{{ $gedung->luas_gedung }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                        action="{{ route('gedung.destroy',$gedung->id) }}" method="POST">
                                        <a href="{{ route('gedung.edit',$gedung->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                        @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                        </form>
                                      </td>
                                      </tr>
                                  @empty
                                      <tr>
                                        <td colspan="5" class="text-center text-mute">Tidak Ada Data</td>
                                      </tr>
                                  <td>
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