@extends('layouts.app')
@section('page', 'Outbox')
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
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTable" class="table table-border">
                        <thead>
                          <th>No</th>
                          <th>Sender</th>
                          <th>Nomor Tujuan</th>
                          <th>Pesan</th>
                          <th>Aksi</th>
                        </thead>
                        <tbody>
                          @forelse ($data as $item)
                              <tr>
                              <td>{{$loop->index + 1}}</td>
                              <td>{{$item->wa_number}}( Whatsapp )</td>
                              <td>{{$item->nomor_tujuan}}</td>
                              <td>{{$item->pesan}}</td>
                              <td>{{$item->status}}</td>
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