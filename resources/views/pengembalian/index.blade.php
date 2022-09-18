@extends('layouts.app')
@section('page', 'Data Pengembalian')
@section('content-app')
  <div class="content-wrapper">
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
                          <p>1. isi <b>Peminjaman</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Peminjaman Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('pengembalian.store')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Peminjam</label>
                                    <select class="form-control" name="id_siswa" id="id_siswa" required>
                                          <option>Nama Peminjam</option>

                                          @forelse ($peminjaman as $item)
                                          <option name="{{$item->id_siswa}}" id="{{$item->id_siswa}}">{{$item->id_siswa}}</option>
                                          @empty

                                          @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" name="kategori" id="kateori" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="text" name="jumlah" id="jumlah" class="form-control" required>
                                </div>
                                 <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" name="status" id="status" class="form-control" required>
                                </div>
                            </div>  
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>  
                            </div>
                        </form>
                    </div>
                </div>  
              </div>
                <div class="card card-outline card-secondary">
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Peminjam</th>                     
                                    <th>Kategori</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Aksi</th>
                                </thead>
                                
                            </table>
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
