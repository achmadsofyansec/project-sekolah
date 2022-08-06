@extends('layouts.app')
<<<<<<< HEAD
@section('page', 'Tambah Barang Sitaan')
=======
@section('page', 'Edit Barang Sitaan')
>>>>>>> 762e93380017794b3546960d4be76553cec35e14
@section('content-app')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
<<<<<<< HEAD
            <h1 class="m-0"><i class="fas fa-chalkboard nav-icon text-info"></i> @yield('page')</h1>
=======
            <h1 class="m-0"><i class="fas fa-boxes nav-icon text-success"></i> @yield('page')</h1>
>>>>>>> 762e93380017794b3546960d4be76553cec35e14
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
                          <p>1. isi <b>Data Barang Sitaan</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Barang Sitaan Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
<<<<<<< HEAD
                        <form action="{{route('barang_sitaan.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Siswa</label>
                                    <input name="siswa" id="siswa" class="form-control" list="siswa">
                                    <datalist id="siswa">
                                        <option value="test">Test</option>
                                        <option value="test">
                                        <option value="test">
                                        <option value="test">
                                        <option value="test">
                                    </datalist>
                                </div>
                                <div class="form-group">
                                  <label>Barang Sitaan</label>
                                  <textarea name="barang_sitaan" id="barang_sitaan" cols="30" rows="5" class="form-control"></textarea>
                              </div>
                              <div class="form-group">
                                  <label>Tanggal Penyitaan</label>
                                  <input type="date" name="tanggal_sita" id="tanggal_sita" class="form-control" required>
                              </div>
=======
                        <form action="{{route('barang_sitaan.update',$data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tanggal Sita</label>
                                    <input type="date" value="" name="tgl_sita"  id="tgl_sita" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Siswa</label>
                                    <select name="kode_siswa" id="kode_siswa" class="form-control" required>
                                        <option value="">-- Pilih Siswa --</option>
                                        @forelse ($siswa as $item)
                                        <option value="{{$item->id_siswa}}"> {{$item->kode_kelas}} - ( {{$item->nisn}} ) {{$item->nama}} - {{$item->kode_jurusan}}  </option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Barang Sitaan </label>
                                    <textarea name="barang_sitaan" id="barang_sitaan" cols="30" rows="8" placeholder="Keterangan" class="form-control" required></textarea>
                                </div>
>>>>>>> 762e93380017794b3546960d4be76553cec35e14
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('barang_sitaan.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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