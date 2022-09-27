@extends('layouts.app')
@section('page', 'Penerangan & Internet')
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
                   <a type="button" href="{{ route('penerangan_internet.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                                <thead>
                                    <th>No</th>                     
                                    <th>Unit</th>
                                    <th>Sumber</th>
                                    <th>Jumlah Baik</th>
                                    <th>Jumlah Rusak Ringan</th>
                                    <th>Jumlah Rusak Berat</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                  @forelse ($internet as $internet)
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{ $internet->unit }}</td>
                                    <td>{{ $internet->sumber }}</td>    
                                    <td>{{ $internet->jml_baik }}</td>
                                    <td>{{ $internet->jml_rusak_ringan }}</td>
                                    <td>{{ $internet->jml_rusak_berat }}</td>
                                    <td>
                                      @if ($internet->foto != null)
                                      <img src="{{asset('public/uploads/'.$internet->foto)}}" alt="Image" class="img" width="100" height="100">
                                      @else
                                          <p>Tidak Ada Foto</p>
                                      @endif
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                        action="{{ route('penerangan_internet.destroy',$internet->id) }}" method="POST">
                                        <a href="{{ route('penerangan_internet.edit',$internet->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
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