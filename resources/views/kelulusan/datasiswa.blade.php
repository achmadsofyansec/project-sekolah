@extends('layouts.app')
@section('page', 'Nilai / Kelulusan')
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
                                    <th>No Ujian</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Matematika</th>
                                    <th>B.indo</th>
                                    <th>B.ingg</th>
                                    <th>Kejuruan</th>
                                    <th>Status</th>
                                </thead>
                                 @foreach($siswa as $siswa)
                                <tbody>
                                  <tr>
                                    <td>{{ $siswa->id }}</td>
                                    <td>{{ $siswa->nisn }}</td>
                                    <td>{{ $siswa->nama }}</td>
                                    <td>{{ $siswa->jurusan }}</td>
                                    <td>{{ $siswa->mat }}</td>
                                    <td>{{ $siswa->bind }}</td>
                                    <td>{{ $siswa->ipa }}</td>
                                    <td>{{ $siswa->kejurusan }}</td>
                                    <td>{{ $siswa->status }}</td>
                                  </tr>
                              </tbody>
                                @endforeach
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