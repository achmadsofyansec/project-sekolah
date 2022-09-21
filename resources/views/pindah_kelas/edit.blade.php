@extends('layouts.app')
@section('page', 'Edit Pengajuan Pindah / Naik Kelas')
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
                          <p>1. isi <b>Pengajuan Pindah Kelas</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Pengajuan Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('pindah_kelas.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tanggal Pengajuan</label>
                                        <input type="date" name="tgl_pengajuan" id="tgl_pengajuan" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Siswa</label>
                                        <select name="kode_siswa" id="kode_siswa" class="form-control" required>
                                            <option value=""> -- Pilih Siswa -- </option>
                                            @forelse ($siswa as $item)
                                        <option value="{{$item->id_siswa}}">{{$item->nama }} { {{$item->kode_kelas}} {{$item->kode_jurusan}} Tahun Ajaran {{$item->tahun_ajaran}} }</option>
                                            @empty
                                                
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelas Tujuan</label>
                                        <select name="kelas_tujuan" id="kelas_tujuan" class="form-control" required>
                                            <option value="">-- Pilih Kelas Tujuan -- </option>
                                            @forelse ($kelas as $item)
                                        <option value="{{$item->id}}">{{$item->nama_kelas}} ({{$item->kode_kelas}}) </option>
                                            @empty
                                                
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keterangan</label>
                                        <textarea name="ket_pindah" id="ket_pindah" cols="30" rows="10" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('pindah_kelas.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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