@extends('layouts.app')
@section('page', 'Input Nilai Harian')
@section('content-app')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-boxes nav-icon text-success"></i> @yield('page')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= url('/')?>">Home</a></li>
              <li class="breadcrumb-item active">@yield('page')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row-mb-2">
              
              <div class="col-md-12 mt-1">
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-primary">
                    {{ session('success') }}
                </div>
                @endif
                <div class="row">
                  <div class="col-md-4 mt-1">
                      <div class="card card-info card-outline">
                          <div class="card-header">
                              <div class="card-title">
                                  Data Input Nilai
                              </div>
                          </div>
                      <form action="{{route('input_nilai.update',$data->id_nilai)}}" method="POST">
                        @csrf
                        @method('PUT')
                          <div class="card-body">
                              <div class="form-group">
                                  <label>Tanggal Input</label>
                                  <input type="date" name="tgl_input" id="tgl_input" class="form-control" value="{{$data->tgl_input}}" readonly>
                              </div>
                              <div class="form-group">
                                  <label>Kelas</label>
                                  <input type="text" name="kode_kelas" id="kode_kelas" class="form-control" value="{{$data->nama_kelas}}" readonly>
                              </div>
                              <div class="form-group">
                                  <label>Jurusan</label>
                                  <input type="text" name="kode_jurusan" id="kode_jurusan" class="form-control" value="{{$data->nama_jurusan}}" readonly>
                              </div>
                              <div class="form-group">
                                  <label>Tahun Ajaran</label>
                                  <input type="text" name="kode_tahun_ajaran" id="kode_tahun_ajaran" class="form-control" value="{{$data->tahun_ajaran}}" readonly>
                              </div>
                              <div class="form-group">
                                  <label>Keterangan Input</label>
                                  <textarea name="desc_input" id="desc_input" cols="30" rows="10" class="form-control">{{$data->desc_input}}</textarea>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                              <a type="button" href="<?php echo url('/input_harian') ?>" class="btn btn-danger">Close</a>
                          </div>
                      </form>
                      </div>
                  </div>  
                  <div class="col-md-8 mt-1">
                    <div class="card card-info card-outline card-outline-tabs">
                      <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Profile</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Messages</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Settings</a>
                          </li>
                        </ul>
                      </div>
                      <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                          <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                             
                          </div>
                          <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                             
                          </div>
                          <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                             
                          </div>
                          <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                             
                          </div>
                        </div>
                      </div>
                  </div>  
                </div>
                  
              </div>
          </div>
      </div>
      </section>
    <!-- /.content -->
  </div>
@endsection