@extends('layouts.apps')
@section('page', 'Portal')
@section('content-app')

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:rgb(34, 192, 113) ;">
        <div class="container">
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('dist/images/logo.png')}}" height="50"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('about') ?>">Beranda</a>
                    </li>
                         <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('/') ?>">Lowongan Kerja</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('contact') ?>">Pengumuman</a>
                    </li>
                    <a class="nav-link" href="<?php echo url('contact') ?>">Login</a>
                    <li>
                    </li>
                  </ul>
                </div>
              </div>
          </nav>
          @forelse ($alumni_lowongan_kerja as $item)
          <div class="container">
            <div class="row" style="margin-top: 4%">
              <div class="col-md-12">
                <div class="card">
                    <img class="p-5" src="{{ config('app.url') . '/assets/uploads/' . $item->file }}" width="20%">
                <h1 class="card-title mt-5 ml-3">{{$item->judul}}</h1>
                  <div class="card-body">
                    <br />
                    <p><b>Deskripsi : {{$item->isi}}</b> <a href=""></a> </p>
                    <a href="" class="btn btn-primary ">Selengkapnya &rarr;</a>
                  </div>
                  <div class="card-footer text-muted">
                    Posted on {{$item->tanggal}}
                  </div>
                </div>
                <ul class="pagination justify-content-center mb-4">
                </ul>
              </div>
            </div>
          </div>
          @empty
          <div class="container">
            <p>Tidak Ada Lowongan Kerja</p>
          </div>
          @endforelse
@endsection