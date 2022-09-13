@extends('layouts.app')
@section('page', 'Metode Pembayaran')
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
            <div class="card card-orange card-outline">
              <div class="card-header">
              <a type="button" href="{{route('metode_bayar.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="dataTable" class="table table-border">
                    <thead>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Desc</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      @forelse ($data as $item)
                          <tr>
                          <td>{{$loop->index + 1}}</td>
                          <td>{{$item->nama_methode}}</td>
                          <td>{{$item->desc_methode}}</td>
                          <td>
                            <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                            action="{{ route('metode_bayar.destroy',$item->id) }}" method="POST">
                                            <a href="{{ route('metode_bayar.edit',$item->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                            </form>
                          </td>
                          </tr>
                      @empty
                          <tr>
                            <td colspan="5" class="text-center text-muted">Tidak Ada Data</td>
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
</div>
</div>
@endsection