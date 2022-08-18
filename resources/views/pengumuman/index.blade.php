@extends('layouts.app')
@section('page', 'Pengumuman')
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
                            <li class="breadcrumb-item"><a href="<?= url('/') ?>">Home</a></li>
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
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-primary">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card card-outline card-navy">
                            <div class="card-header">
                                <a type="button" href="{{ route('pengumuman.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i> Tambah</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table">
                                        <thead>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Foto Pengumuman</th>
                                            <th>Tanggal Publish</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($alumni_pengumuman as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $item->judul }}</td>
                                                    <td>
                                                        @if ($item->file != '-')
                                                            <img src="{{ config('app.url') . '/assets/uploads/' . $item->file }}"
                                                                width="100">
                                                        @else
                                                            <p>Tidak Ada Foto</p>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>
                                                      <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                                          action="{{ route('pengumuman.destroy', $item->id) }}" method="POST">
                                                          <a href="{{ route('pengumuman.edit', $item->id) }}"
                                                              class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                          @csrf
                                                          @method('DELETE')
                                                          <button type="submit" class="btn btn-danger"><i
                                                                  class="fas fa-trash"></i> Hapus</button>
                                                      </form>
                                                    </td>
                                                </tr>
                                            @endforeach
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
