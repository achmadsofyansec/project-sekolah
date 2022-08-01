@extends('layouts.app')
@section('page', 'Edit Sanksi Pelanggaran')
@section('content-app')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-chalkboard nav-icon text-info"></i> @yield('page')</h1>
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
                          <h1 class="card-title"> <span class="badge badge-danger"><i class="fas fa-angle-right right"></i></span> Petunjuk</h1>
                        </div>
                        <div class="card-body">
                          <p>1. Ubah isi <b>Sanksi Pelanggaran</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Sanksi Pelanggaran Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('sanksi.update',$data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Sanksi Pelanggaran</label>
                                    <input type="text" value="{{$data->kode_sanksi}}" name="kode_sanksi" id="kode_sanksi" class="form-control" required>
                                </div>
                                <div class="form-group">
                                  <label>Poin Pelanggaran</label>
                                  <div class="row">
                                    <div class="col-md-5">
                                        <input type="number" value="{{$data->dari_poin}}" name="dari_poin" id="dari_poin" class="form-control" required>
                                    </div>
                                    <div class="col-md-2 text-center">
                                      <p>sampai</p>
                                    </div>
                                    <div class="col-md-5">
                                      <input type="Number" value="{{$data->sampai_poin}}" name="sampai_poin" id="sampai_poin" class="form-control" required>
                                    </div>
                                  </div>
                                  
                              </div>
                              <div class="form-group">
                                  <label>Sanksi</label>
                                  <input type="text" name="sanksi" value="{{$data->sanksi}}" id="sanksi" class="form-control" required>
                              </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('sanksi.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
                            </div>
                        </form>
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