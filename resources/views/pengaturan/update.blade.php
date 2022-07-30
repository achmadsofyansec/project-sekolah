@extends('layouts.app')
@section('page', 'Pengaturan')
@section('content-app')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6 mt-2">
                      <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;">
                          <i class="fas fa-books nav-icon text-info"></i> Judul</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
                          <li class="breadcrumb-item">Pengaturan</li>
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
                      <div class="card card-info">
                          <div class="card-header">
                              <h3 class="card-title"><i class="fas fa-ballot"></i> Input Judul</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" action="{{ url('update-pengaturan/.$pengaturan->id) }}">
                            @csrf
                            @method('PUT')

                              <div class="card-body">

                                  <div class="form-group row">
                                      @foreach($pengaturan as $pengaturan)
                                      <div class="col-sm-12"><center>
                                          <label class="col-sm-5 col-form-label text-uppercase">File Header Banner</label>
                                            </center><br>
                                          <input type="file" class="form-control" name="file_banner">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Tanggal Pengumuman</label>
                                      <div class="col-sm-12">
                                          <input type="text" class="form-control" name="tanggal_pengumuman" value="{{ $pengaturan->pengumuman }}" required />
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Tahun Kelulusan</label>
                                      <div class="col-sm-12">
                                          <input type="text" class="form-control" name="tahun" value="{{ $pengaturan->tahun }}" required />
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Informasi Kelulusan</label>
                                      <div class="col-sm-12">
                                          <textarea type="text" class="form-control" name="informasi_kelulusan"  required />{{ $pengaturan->info_kelulusan }}</textarea>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">{{ $pengaturan->info_lainya }}</label>
                                      <div class="col-sm-12">
                                          <textarea type="text" class="form-control" name="informasi_lain" required /></textarea>
                                      </div>
                                  </div>


                                  @endforeach
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                  <button type="submit" class="btn btn-info float-right ml-3"><i class="fa fa-save"> </i> Simpan</button>

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
                                  Isi <b></b> selengkap dan sebenar mungkin.
                              </li>
                              <li>
                                  Gunakan <i>button</i>
                                  <button class="btn btn-xs btn-info"><span class="fa fa-save"></span> Simpan </button>
                                  untuk menambahkan <b></b>.
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