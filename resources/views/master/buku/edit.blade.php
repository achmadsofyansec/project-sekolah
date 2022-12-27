@extends('layouts.app')
@section('page', 'Tambah Buku')
@section('content-app')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="nav-icon fas fa-th"></i></i> @yield('page')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item active">@yield('page')</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <!-- /.row -->
        <div class="animated fadeInLeft col-md-8">
            <div class="card card-info">
              <div class="card-header">
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
                <h3 class="card-title"><i class="fas fa-ballot"></i> </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" role="form" action="{{route('buku.update',$buku->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kode Buku</label>
                                        <input type="text" class="form-control" name="kode_buku" value="{{$buku->kode_buku}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Judul Buku</label>
                                        <input type="text" class="form-control" name="judul_buku" value="{{$buku->judul_buku}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Pengarang</label>
                                        <input type="text" class="form-control" name="pengarang" value="{{$buku->pengarang}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Penerbit</label>
                                        <input type="text" class="form-control" name="penerbit" value="{{$buku->penerbit}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tahun Terbit</label>
                                        <input type="number" class="form-control" name="tahun_terbit" value= "{{$buku->tahun_terbit}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tempat Terbit</label>
                                        <input type="text" class="form-control" name="tempat_terbit" value="{{$buku->tempat_terbit}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Total Halaman</label>
                                        <input type="text" class="form-control" name="total_halaman" value="{{$buku->total_halaman}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tinggi Buku</label>
                                        <input type="text" class="form-control" name="tinggi_buku" value="{{$buku->tinggi_buku}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>DDC Buku</label>
                                        <input type="text" class="form-control" name="ddc" value="{{$buku->ddc}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>ISBN Buku</label>
                                        <input type="text" class="form-control" name="isbn" value="{{$buku->isbn}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jumlah Buku</label>
                                        <input type="number" class="form-control" name="jumlah_buku" value="{{$buku->jumlah_buku}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sumber</label>
                                        <select class="form-control" name="id_sumber" required>
                                        <option value="">Pilih Sumber</option>
                                          @forelse ($sumber as $item)
                                        <option value="{{$item->id}}" @if ($buku->id_sumber == $item->nama_sumber)
                                          {{'selected'}}
                                        @endif>{{$item->nama_sumber}}</option>
                                          @empty
                                              
                                          @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control" name="id_kategori" value="id_kategori" required>
                                        <option value="">Pilih Kategori</option>
                                          @forelse ($kategori as $item)
                                        <option value="{{$item->id}}" @if ($buku->id_kategori == $item->nama_kategori)
                                          {{'selected'}}
                                        @endif>{{$item->nama_kategori}}</option>
                                          @empty
                                              
                                          @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input type="date" class="form-control tgl" name="tanggal_masuk" value="{{$buku->tanggal_masuk}}" placeholder="dd-mm-yyyy" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No Inventaris</label>
                                        <input type="text" class="form-control" name="no_inventaris" value="{{$buku->no_inventaris}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Lokasi</label>
                                        <input type="text" class="form-control" name="lokasi" value="{{$buku->lokasi}} " required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea style="height:150px;" class="form-control" name="deskripsi_buku" required> {{$buku->deskripsi_buku}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                  @if ($buku->foto_buku != '-')
                                <img src="{{asset('../assets/uploads/'.$buku->foto_buku)}}" alt="Image" class="img" width="60" height="100">
                                  @else
                                    Tidak Ada Foto
                                  @endif
                                </div>
                                <div class="col-md-8">
                                  <div class="form-grup">
                                    <label>Foto</label>
                                    <input type="file" name="foto" id="foto" class="form-control">
                                </div>
                                </div>
                              </div>
                        </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                    <div class="btn-group btn-group-sm">
                    <a class="btn btn-danger float-right" href="{{route('buku.index')}}"><i class="fa fa-undo"> </i> Kembali</a>
                    <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"> </i> Simpan</button>
                  
                    </div>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
        <div class="animated fadeInRight col-md-4">
           <div class="callout callout-info">
              <h4><span class="fa fa-info-circle text-danger"></span> Petunjuk dan Bantuan</h4>
              <ol>
                <li>
                    Isi <b> </b> selengkap dan sebenar mungkin.
                </li>
                <li>
                    Gunakan <i>button</i>
                    <button class="btn btn-md btn-info"><span class="fa fa-save"></span> Simpan </button>
                    untuk menambahkan <b> </b>.
                </li>
              </ol>
                <p>
                    Untuk <b>Keterangan</b> dan <b>Informasi</b> lebih lanjut silahkan hubungi <b>Bagian IT (Information &amp; Technology)</b>
                </p>
          </div>
        </div>
      </div>

    </div>
    </section>
    <!-- /.content -->
  </div>


@endsection