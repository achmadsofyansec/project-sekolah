@extends('layouts.app')
@section('page', 'Nilai / Predikat')
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
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Dari</th>
                                    <th>Sampai</th>
                                    <th>Grade</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                  @forelse ($predikat as $item)
                                  <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$item->dari}}</td>
                                    <td>{{$item->sampai}}</td>
                                    <td>{{$item->grade}}</td>
                                    <td>{{$item->keterangan}}</td>
                                    <td>
                                      <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                      action="{{ route('predikat.destroy',$item->id) }}" method="POST">
                                      <a href="{{ route('predikat.edit',$item->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                      @csrf
                                      </form>
                                    </td>
                                    </tr>
                                  @empty
                                      <tr>
                                        <td colspan="6" class="text-center text-mute">Tidak Ada Data</td>
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
    </section>
    <!-- /.content -->
  </div>
@endsection