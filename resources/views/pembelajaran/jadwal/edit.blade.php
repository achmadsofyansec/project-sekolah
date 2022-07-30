@extends('layouts.app')
@section('page', 'Tambah Tahun Ajaran')
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
                          <p>1. isi <b>Jadwal Pelajaran</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Jadwal Pelajaran Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('jadwal.update',$data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                              <div class="form-group">
                                <label> Kode Jadwal</label>
                                <input type="text" name="kode_jadwal" id="kode_jadwal" value="{{$data->kode_jadwal}}" class="form-control" required>
                              </div>
                                <div class="form-group">
                                    <label>Mapel</label>
                                    <select name="kode_mapel" id="kode_mapel" class="form-control" required>
                                        <option value="">-- Pilih Mata Pelajaran --</option>
                                        @forelse ($mapel as $item)
                                            <option value="{{$item->kode_mapel}}" @if ($item->kode_mapel == $data->kode_mapel)
                                                {{'selected'}}
                                            @endif>{{$item->nama_mapel}}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Guru</label>
                                    <select name="kode_guru" id="kode_guru" class="form-control" required>
                                        <option value="">-- Pilih Guru --</option>
                                        @forelse ($guru as $item)
                                            <option value="{{$item->id}}"  @if ($item->id == $data->kode_guru)
                                                {{'selected'}}
                                            @endif>{{$item->nama}}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="kode_kelas" id="kode_kelas" class="form-control" required>
                                        <option value="">-- Pilih Kelas --</option>
                                        @forelse ($kelas as $item)
                                            <option value="{{$item->kode_kelas}}" @if ($item->kode_kelas == $data->kode_kelas)
                                                {{'selected'}}
                                            @endif>{{$item->nama_kelas}}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <select name="kode_tahun_ajaran" id="kode_tahun_ajaran" class="form-control" required>
                                        <option value="">-- Pilih Tahun Ajaran --</option>
                                        @forelse ($tahun_ajaran as $item)
                                            <option value="{{$item->kode_tahun_ajaran}}" @if ($item->kode_tahun_ajaran == $data->kode_tahun_ajaran)
                                                {{'selected'}}
                                            @endif>{{$item->tahun_ajaran}} ( Semester {{$item->semester}} )</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('jadwal.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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