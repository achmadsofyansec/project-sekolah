@extends('layouts.apps')
@section('page', 'Portal')
@section('content-app')

    <!-- Navbar -->
    <nav class=" navbar navbar-expand navbar-pink navbar-dark" style="background-color: #e83e8c;">
        <div class="container">
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('dist/img/jamanu_logo.png')}}" height="50"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link" type="button" href="<?php echo url('/portal') ?>">Beranda</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('/pengumuman') ?>">Pengumuman</a>
                    </li>
                    <a class="nav-link" href="<?php echo url('/login') ?>">Login</a>
                    <li>
                    </li>
                  </ul>
                </div>
              </div>
          </nav>
<body>
    @forelse ($data as $item)
    <div class="container">
      <div class="row" style="margin-top: 4%">
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-body">
              <h2><b class="card-text">{{$item->judul}}</b></h2>
              <center><img class="img-fluid rounded" src="{{ config('app.url') . '/assets/uploads/' . $item->file }}" width="300px"></center>
            </div>
            <div class="card-footer ">
            <h3 class="m-3"><b>Deskripsi</b></h3>
                <p class="m-3">{{$item->isi}}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top: -8%">
        <div class="col-md-12">
          <div class="card my-5">
            <div class="card-body">
              <form name="Comment" action="" method="post">
                @csrf
                @php
                    $tglnow = date('Y-m-d H:i:s')
                @endphp
                <button type="submit" class="btn float-right bg-pink" name="submit">Lamaran</button>
              </form>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    @empty
  @endforelse
  </body>
  

            <footer class="page-footer" style="background-color: #e83e8c;">
            
            <div class="footer-copyright text-center py-3">
            <strong>Copyright &copy; 2014-2021 <a href="#">Jamanu Maarif NU</a>.</strong>
            All rights reserved.
            </div>
            
            <div class="footer-copyright text-center pt-3">
                <b>Version</b> 3.2.0
            </div>

            </footer>

@endsection