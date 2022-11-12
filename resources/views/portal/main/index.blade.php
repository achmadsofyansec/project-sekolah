@extends('layouts.auth_layout')
@section('page', 'Portal Kelulusan')
@section('class-body', 'login-page')
@section('content-auth')
<div class="mb-5">
  <h2 class="">Selamat Datang di portal kelulusan 
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
                      <p class="login-box-msg"></p>
            <form class="form_area" id=""  action="{{ route('cari') }}" method="post">
               {!!csrf_field() !!}
                <div class="input-group mb-3">
                  <input type="text" name="no_peserta" id="nisn" class="form-control" placeholder="123456789">
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