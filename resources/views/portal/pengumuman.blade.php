@extends('layouts.apps')
@section('page', 'Portal')
@section('content-app')

    <!-- Navbar -->
    <nav class=" navbar navbar-expand navbar-pink navbar-dark" style="background-color: #e83e8c;">
        <div class="container">
                <a class="navbar-brand" href="{{url('/portal')}}"><img src="{{asset('public/dist/img/jamanu_logo.png')}}" height="50"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link" type="button" href="<?php echo url('/portal') ?>">Beranda</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('/portal/pengumuman') ?>">Pengumuman</a>
                    </li>
                    <a class="nav-link" href="<?php echo url('/portal/login') ?>">Login</a>
                    <li>
                    </li>
                  </ul>
                </div>
              </div>
          </nav>

          <body>
            <div class="container">
              <div class="row" style="margin-top: 10px">
                <div class="col-md-12">
                <h2><b class="card-text" style="color: #e83e8c;">PENGUMUMAN</b></h2>
                  <div class="card">
                    <div class="card-body">
                    <h2><b class="card-title ml-3" style="color: #e83e8c;">Terbaru</b></h2>
                      <div class="card-body">
                        @forelse ($data as $item)
                            <table class="table mb-5">
                                        <tr>
                                            <td width="20%"><a href="<?php echo url('/portal/pengumuman',$item->id) ?>"><img src="{{ config('app.url') . '/assets/uploads/' . $item->file }}" width="100px"></a></td>
                                            <td>{{$item->updated_at}}</br><p><a href="<?php echo url('/portal/pengumuman',$item->id) ?>" class="text-dark">{{$item->judul}}</a><br></p><small style="color: #e83e8c;">Deskripsi :</small><div class="p-3 mb-3 bg-light text-dark">{{ Str::limit($item->isi, 200) }}</div></td>
                                        </tr>
                                </tbody>
                            </table>
                            @empty
                        @endforelse
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </body>
          </body>
          <div class="pagination justify-content-center">
            {{$data->links('pagination::bootstrap-4')}}
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