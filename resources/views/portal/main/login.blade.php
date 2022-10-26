@extends('layouts.auth_layout')
@section('page', 'Sign In')
@section('class-body', 'login-page')
@section('content-auth')
<div class="login-box">
  <!-- /.login-logo -->
  <div class="row">
    <div class="col-6">Selamat Datang</div>
    <div class="col-6">
        <div class="card-outline card-primary">
            <div class="card-header text-center">
              <a href="#" class="h1"><b>KELULUSAN</b></a>
            </div>
            <div class="card-body">
              @if(session('error'))
                  <div class="alert alert-danger text-center">
                      {{ session('error') }}
                  </div>
              @endif   
                      <p class="login-box-msg">Login Kelulusan</p>
              <form action="<?php echo url('/portal') ?>" method="post">
                @csrf
                <div class="input-group mb-3">
                  <input type="text" name="nisn" id="nisn" class="form-control" placeholder="NISN">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- /.col -->
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
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
    </div>
  </div>
@endsection