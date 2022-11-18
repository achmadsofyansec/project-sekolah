@extends('layouts.app')
@section('page', 'Scan WhatsApp')
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
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title"> <span class="badge badge-danger"><i class="fas fa-angle-right right"></i></span> Data WhatsApp</h1>
                            </div>
                            <div class="card-body">
                              <p>1. Scan QR</p>
                              <p>2. Setelah Selesai Masuk dan Aktif Silahkan Klik Tombol Selesai</p>
                            </div>
                            <div class="card-footer">
                            <a href="{{route('wa.index')}}" class="btn btn-success">Selesai</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title"> <span class="badge badge-danger"><i class="fas fa-angle-right right"></i></span>Qr Code</h1>
                            </div>
                            <div class="card-body">
                              @if ($qr != null)
                              <img src="{{ $qr }}" alt="" style="height:300px">
                              @endif
                            </div>
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
@section('content-script')
    
@endsection