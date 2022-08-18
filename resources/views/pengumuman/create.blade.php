@extends('layouts.app')
@section('page', 'Tambah Pengumuman')
@section('content-app')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="nav-icon fas fa-th"></i></i> @yield('page')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<a href="<?= url('/') ?>"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('pengumuman.create')}}">@yield('page')</a></li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.row -->
          <div class="animated fadeInLeft col-md-8">
            <div class="card card-purple">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-ballot"></i> @yield('page')</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" role="form" action="{{route('pengumuman.store')}}" enctype="multipart/form-data" method="post">
@csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Judul Informasi Pengumuman</label>
                    <div class="col-sm-12">
                      <div class="input-group input-group">
                        <input type="text" class="form-control" name="judul" id="judul" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Isi Informasi Pengumuman</label>
                    <div class="col-sm-12">
                      <textarea style="height:300px;" class="form-control" name="isi" id="isi" required></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">File Gambar</label>
                      <div class="col-sm-12">
                          <input type="file" class="form-control" name="file" id="file"
                              required>
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn bg-purple float-right ml-3"><i class="fa fa-save"> </i> Simpan</button>
                  <a class="btn btn-danger float-right" href="{{route('pengumuman.index')}}"><i class="fa fa-undo"> </i> Kembali</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
          <div class="animated fadeInRight col-md-4">
            <div class="callout callout-info">
              <h4><span class="fa fa-info-circle text-danger"></span> Petunjuk dan Bantuan</h4>
              <ol>
                <li>
                  Isi <b>@yield('page')</b> selengkap dan sebenar mungkin.
                </li>
                <li>
                  Gunakan <i>button</i>
                  <button class="btn btn-xs bg-purple"><span class="fa fa-save"></span> Simpan </button>
                  untuk menambahkan <b>@yield('page')</b>.
                </li>
              </ol>
              <p>
                Untuk <b>Keterangan</b> dan <b>Informasi</b> lebih lanjut silahkan hubungi <b>Bagian IT (Information &amp; Technology)</b>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection