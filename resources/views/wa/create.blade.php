@extends('layouts.app')
@section('page', 'Tambah WhatsApp')
@section('content-app')
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">@yield('page')</h1>
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
      <div class="content">
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
                      <div class="card ">
                          <div class="card-header">
                            <h1 class="card-title"> <span class="badge badge-danger"><i class="fas fa-angle-right right"></i></span> Petunjuk</h1>
                          </div>
                          <div class="card-body">
                            <p>1. isi <b>Identitas WhatsApp</b> Dengan Baik dan Benar.</p>
                            <p>2. Simpan Data WhatsApp Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                          </div>
                          <div class="card-footer">
                            Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                          </div>
                        </div>
                  </div>  
                  <div class="col-md-8 mt-1">
                      <div class="card">
                          <form action="{{route('wa.store')}}" method="POST">
                              @csrf
                              <div class="card-body">
                                <div class="form-group">
                                  <label>Nama <span class="text-muted">(Disarankan hanya 1 kata)</span></label>
                                  <input type="text" name="wa_name" id="wa_name" class="form-control form-input" required>
                                </div>
                                <div class="form-group">
                                  <label>Nomor</label>
                                  <input type="number" name="wa_number" id="wa_number" class="form-control form-input" required>
                                </div>
                                <div class="form-group">
                                  <label>Deskripsi</label>
                                  <textarea name="wa_desc" id="wa_desc" class="form-control" cols="30" rows="10" required></textarea>
                                </div>
                                <div class="form-group">
                                  <label>Multi Devices</label>
                                  <select name="wa_multidevices" id="wa_multidevices" class="form-control form-select">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Server EndPoint <span class="text-muted">  http:://127.0.0.1:8000 (Default Local Modul)</span></label>
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="wa_endpoint" id="custom">
                                    <label for="custom" class="form-check-label">Custom</label>
                                    <input type="text" class="form-control form-input" name="custom_endpoint" id="custom_endpoint">
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer">
                                  <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                  <a href="{{route('wa.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
                              </div>
                          </form>
                      </div>
                  </div>  
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
  </div>
@endsection