@extends('layouts.app')
@section('page', 'Edit Denda')
@section('content-app')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-building nav-icon text-primary"></i> @yield('page')</h1>
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
                          <p>1. Ubah Isi <b>Denda</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Denda Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('denda.update', $data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Unit</label>
                                    <select name="unit" id="unit" class="form-control" style="width: 100%;">
                                      <option value="">{{ $data->unit }}</option>
                                      @forelse ($kategori as $item)
                                  <option value="{{$item->unit}}">{{$item->unit}}</option>
                                      @empty
                                      @endforelse
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Pelanggaran</label>
                                    <textarea name="pelanggaran" id="pelanggaran" class="form-control" cols="30" rows="10">{{ $data->pelanggaran }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Total Denda</label>
                                    <input type="number" name="total_denda" id="total_denda" class="form-control" value="{{ $data->total_denda }}">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" id="stautus" class="form-control">
                                      <option value="">{{ $data->status }}</option>
                                      <option value="Lunas">Lunas</option>
                                      <option value="Belum Lunas">Belum Lunas</option>
                                    </select>
                                </div>
                                <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('kategori_aset_tt.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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