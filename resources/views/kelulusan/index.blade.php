@extends('layouts.auth_layout')
@section('page', 'Kelulusan')
@section('class-body', 'login-page')
@section('content-auth')
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>CEK KELULUSAN</b></a>
    </div>
    <div class="card-body">           
              <p class="login-box-msg">MASUKKAN NO UJIAN</p>
      <form action="" method="post">
        @csrf
        <div class="input-group mb-3">
        	<div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <input type="text" name="no_ujian" id="no_ujian" class="form-control" placeholder="1-23-45-67-8910-111-2">
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">CEK</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
@endsection