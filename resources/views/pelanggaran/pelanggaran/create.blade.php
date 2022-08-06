@extends('layouts.app')
@section('page', 'Tambah Pelanggaran')
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
                          <p>1. isi <b>Pelanggaran</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Pelanggaran Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('pelanggaran.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tanggal Pelanggaran</label>
                                    <input type="date" name="tgl_pelanggaran" id="tgl_pelanggaran" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Siswa</label>
                                    <select name="siswa" id="siswa" class="form-control">
                                        <option value="">-- Pilih Siswa --</option>
                                        @forelse ($siswa as $item)
                                            <option value="{{$item->id_siswa}}">{{$item->kode_kelas}} - ( {{$item->nisn}} ) {{$item->nama}} - {{$item->kode_jurusan}}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                  <label>Pelanggaran</label>
                                  <select name="pelanggaran" id="pelanggaran" class="form-control">
                                    <option value="">-- Pilih Pelanggaran --</option>
                                    @forelse ($poin as $item)
                                        <option value="{{$item->id}}">{{$item->nama_poin_pelanggaran}} - ( Poin {{$item->poin}} )</option>
                                    @empty          
                                    @endforelse
                                </select>
                              </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('pelanggaran.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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