@extends('layouts.apps')
@section('page', 'Portal')
@section('content-app')

    <!-- Navbar -->
    <nav class=" navbar navbar-expand navbar-pink navbar-dark" style="background-color: #e83e8c;">
        <div class="container">
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('public/dist/img/jamanu_logo.png')}}" height="50"></a>
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
          @forelse ($alumni_lowongan_kerja as $item)
          <body>
            <div class="container">
              <div class="row" style="margin-top: 10px">
                <div class="col-md-12">
                  <div class="card">
                    <img class="card-img-top" src="" alt="">
                    <div class="card-body">
                      <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th style="width: 40%">Perusahaan</th>
                                    <th style="width: 20%">Tanggal Publish</th>
                                    <th style="width: 40%">Deskripsi</th>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td><img src="{{ config('app.url') . '/assets/uploads/' . $item->file }}"
                                              width="100">  {{ $item->judul }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->isi }}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="<?php echo url('/detail',$item->id)?>"><button type="button" class="btn bg-pink float-right">Selengkapnya</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </body>
          @empty
          <body>
            <div class="container">
              <div class="row" style="margin-top: 10px">
                <div class="col-md-12">
                  <div class="card">
                    <p>Tidak Ada Data</p>
              </div>
            </div>
          </body>
          @endforelse
          <div class="pagination justify-content-center">
            {{$alumni_lowongan_kerja->links('pagination::bootstrap-4')}}
          </div>
    </div>
</div>
</div>
</div>

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