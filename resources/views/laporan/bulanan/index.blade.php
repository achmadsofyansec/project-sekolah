@extends('layouts.app')
@section('page', 'Laporan Bulanan')
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
              <div class="card-body">
                <form action="" method="GET">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <input type="month" name="filter_awal" id="filter_awal" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <input type="month" name="filter_akhir" id="filter_akhir" class="form-control" required>
                      </div>
                    </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <input type="submit" value="Search" class="btn btn-primary" style="width: 100%">
                        </div>
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
</div>
@endsection