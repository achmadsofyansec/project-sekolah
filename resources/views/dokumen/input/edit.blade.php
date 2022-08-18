@extends('layouts.app')
@section('page', 'Edit Dokumen')
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
                          <p>1. Ubah Isi <b>Data Dokumen</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Dokumen Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('input_dokumen.update', $dokumen->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="card-body">
                                        <div class="form-group">
                                            <label>Ruangan</label>
                                            <select class="form-control" id="nama_ruangan" name="nama_ruangan">
                                            <option value="">{{ $dokumen->ruangan }}</option>
                                          @forelse ($ruangan as $ruangan)
                                        <option value="{{$ruangan->nama_ruangan}}" @if ($dokumen->ruangan == $ruangan->nama_ruangan)
                                          {{'selected'}}
                                        @endif>{{$ruangan->nama_ruangan}}</option>
                                          @empty
                                              
                                          @endforelse
                                      </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Lemari</label>
                                            <select class="form-control" id="nama_lemari" name="nama_lemari">
                                           <option value="">{{ $dokumen->lemari }}</option>
                                          @forelse ($lemari as $lemari)
                                        <option value="{{$lemari->nama_lemari}}" @if ($dokumen->lemari == $lemari->nama_lemari)
                                          {{'selected'}}
                                        @endif>{{$lemari->nama_lemari}}</option>
                                          @empty
                                              
                                          @endforelse
                                      </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Rak</label>
                                            <select class="form-control" id="nama_rak" name="nama_rak">
                                            <option value="">{{ $dokumen->rak }}</option>
                                          @forelse ($rak as $rak)
                                        <option value="{{$rak->nama_rak}}" @if ($dokumen->rak == $rak->nama_rak)
                                          {{'selected'}}
                                        @endif>{{$rak->nama_rak}}</option>
                                          @empty
                                              
                                          @endforelse
                                      </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Box</label>
                                            <select class="form-control" id="nama_box" name="nama_box">
                                            <option value="">{{ $dokumen->box }}</option>
                                          @forelse ($box as $box)
                                        <option value="{{$box->nama_box}}" @if ($dokumen->box == $box->nama_box)
                                          {{'selected'}}
                                        @endif>{{$box->nama_box}}</option>
                                          @empty
                                              
                                          @endforelse
                                      </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Map</label>
                                            <select class="form-control" id="nama_map" name="nama_map">
                                            <option value="">{{ $dokumen->map }}</option>
                                          @forelse ($map as $map)
                                        <option value="{{$map->nama_map}}" @if ($dokumen->map == $map->nama_map)
                                          {{'selected'}}
                                        @endif>{{$map->nama_map}}</option>
                                          @empty
                                              
                                          @endforelse
                                          </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Urut</label>
                                            <select class="form-control" id="nama_urut" name="nama_urut">
                                            <option value="">{{ $dokumen->urut }}</option>
                                          @forelse ($urut as $urut)
                                        <option value="{{$urut->nama_urut}}" @if ($dokumen->urut == $urut->nama_urut)
                                          {{'selected'}}
                                        @endif>{{$urut->nama_urut}}</option>
                                          @empty
                                              
                                          @endforelse
                                      </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Tanggal Dokumen</label>
                                            <input type="date" name="tanggal_dokumen" id="tanggal_dokumen" class="form-control" value="{{$tgl}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Dokumen</label>
                                            <select class="form-control" id="nama_jenis_dokumen" name="nama_jenis_dokumen">
                                            <option value="">{{ $dokumen->jenis_dokumen }}</option>
                                          @forelse ($jenis_dokumen as $jenis_dokumen)
                                        <option value="{{$jenis_dokumen->nama_jenis_dokumen}}" @if ($dokumen->jenis_dokumen == $jenis_dokumen->nama_jenis_dokumen)
                                          {{'selected'}}
                                        @endif>{{$jenis_dokumen->nama_jenis_dokumen}}</option>
                                          @empty
                                              
                                          @endforelse
                                      </select>
                                        </div>
                                         
                                        <div class="form-group">
                                            <label>Nomor Dokumen</label>
                                            <input type="text" name="nomor_dokumen" id="nomor_dokumen" class="form-control" value="{{ $dokumen->nomor_dokumen }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Dokumen</label>
                                            <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control" value="{{ $dokumen->nama_dokumen }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="{{ $dokumen->deskripsi }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>File</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>{{$dokumen->file}}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="file" name="file" id="file" class="form-control" value="{{ $dokumen->file }}" accept="file/*">        
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Ajaran</label>
                                            <input type="date" name="tahun_ajaran" id="tahun_ajaran" class="form-control" value="{{ $dokumen->tahun_ajaran }}" required>
                                        </div>
                                    
                                </div>
                                <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('input_dokumen.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
                            </div>
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