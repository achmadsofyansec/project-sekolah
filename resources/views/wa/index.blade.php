@extends('layouts.app')
@section('page', 'Gateway WhatsApp')
@section('content-app')
  <div class="content-wrapper">
    <!-- Main content -->
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
                <div class="card card-black card-outline">
                  <div class="card-header">
                  <a type="button" href="{{route('wa.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                  <div class="card-tools">
                    <p>
                    @if ($con == true)
                      <span class="btn btn-success"> Connect Local Module</span>
                      @else
                      <span class="btn btn-danger"> Disconnect Local Module</span>
                    </p>
                    @endif
                  </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTable" class="table table-border">
                        <thead>
                          <th>No</th>
                          <th>Nomor</th>
                          <th>Nama</th>
                          <th>Deskripsi</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$item->wa_number}}</td>
                                <td>{{$item->wa_name}}</td>
                                <td>{{$item->wa_desc}}</td>
                                <td>@if ($item->wa_multidevices == 1)
                                    <span class="badge badge-success">Multidevices</span>
                                    @else
                                    <span class="badge badge-warning">Singledevices</span>
                                @endif / @if ($item->wa_status == 1)
                                    <span class="badge badge-primary">Connected</span>
                                    @else
                                    <span class="badge badge-danger">Disconnected</span>
                                @endif</td>
                                <td>
                                  <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                  action="{{ route('wa.destroy',$item->id) }}" method="POST">
                                  @if ($item->wa_status != 1)
                                  <a href="{{ route('wa_scan',$item->id) }}" class="btn btn-success"><i class="fas fa-eye"></i> Scan</a>
                                  @endif
                                  <a href="{{ route('wa.edit',$item->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
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
    </div>
    <!-- /.content -->
  </div>
@endsection