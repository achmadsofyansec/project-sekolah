@extends('layouts.app')
@section('page', 'Singkronisasi')
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
      <div class="row">
        <div class="col-md-8 mt-1">
          <div class="card card-success card-outline">
            <div class="card-header">
              <h1 class="card-title">Singkronisasi</h1>
            </div>
            <div class="card-body">

            </div>
          </div>
        </div>
        <div class="col-md-4 mt-1">
          <div class="card card-success card-outline">
            <div class="card-header">
              <h1 class="card-title">Petunjuk</h1>
            </div>
            <div class="card-body">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection