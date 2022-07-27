@extends('layouts.app')
@section('page', 'Tambah EkstraKulikuler')
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
                          <h1 class="card-title"> <span class="badge badge-danger"><i class="fas fa-angle-right right"></i></span> Petunjuk</h1>
                        </div>
                        <div class="card-body">
                          <p>1. isi <b>Identitas EkstraKulikuler</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data EkstraKulikuler Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('ekstrakulikuler.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Ekstrakulikuler</label>
                                    <input type="text" name="kode_ekstra" id="kode_ekstra" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama EkstraKulikuler</label>
                                    <input type="text" name="nama_ekstra" id="nama_ekstra" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi EkstraKulikuler</label>
                                    <textarea name="desc_ekstra" id="desc_ekstra" cols="30" rows="10" placeholder="Deskripsi Ekstra" class="form-control"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status Ekstra</label>
                                            <select name="status_ekstra" id="status_ekstra" class="form-control">
                                                <option value="">--Pilih Status Ekstra--</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Nonaktif">Nonaktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ekstra Wajib</label>
                                            <select name="wajib_ekstra" id="wajib_ekstra" class="form-control">
                                                <option value="">--Pilih Kewajiban Ekstra--</option>
                                                <option value="Wajib">Wajib</option>
                                                <option value="Tidak Wajib">Tidak Wajib</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('ekstrakulikuler.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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