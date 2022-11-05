@extends('layouts.auth_layout')
@section('page', 'Sign In')
@section('class-body', 'login-page')
@section('content-auth')
<div class="mb-5">
  <h2 class="">Selamat Datang di portal kelulusan @foreach ($lulus as $lulus)
    
  {{ $lulus->nama_sekolah }} Tahun ajaran {{ $lulus->tahun_ajaran }}</h2>
</div>
<div class="login-box">
  <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
              <a href="#" class="h1"><b>KELULUSAN</b></a>
            </div>
            <div class="card-body">
              @if(session('error'))
                  <div class="alert alert-danger text-center">
                      {{ session('error') }}
                  </div>
              @endif   
                      <p class="login-box-msg">{{ $lulus->deskripsi }}</p>@endforeach
              <form action="<?php echo url('/portal') ?>" method="post">
                @csrf
                <div class="input-group mb-3">
                  <input type="text" name="nisn" id="nisn" class="form-control" placeholder="111-11-1-11-111-1">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- /.col -->
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Cek</button>
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