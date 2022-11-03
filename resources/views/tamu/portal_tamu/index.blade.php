@extends('layouts.apps')
@section('page', 'Data Tamu')
@section('content-app')
    <!-- Main content -->
        <div class="container-fluid"  style="background-color: #1f8dd6">
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
                  <form action="{{url('/portal/tambah')}}" method="POST" >
                    @csrf
                  <div class="row">
                        <div class="col-md-8 mt-1">
                            <div class="card card-outline card-navy">
                                <div class="card-header">
                                    <center><h1 class="m-0" style="color:#df4231;"><br>BUKU TAMU</h1> </center>
                                    <center style="color: grey">---------------------------------------------------------------------------------</center>
                                    <div class="card-body">
                                        <div class="form-group">
                                          <label>Nama</label>
                                          <input type="text" name="nama_tamu" id="nama_tamu" placeholder="&#xf007;  Masukkan Nama" class="form-control fas" required>
                                        </div>
                                        <div class="form-group">
                                          <label>Asal / Instansi</label>
                                          <input type="text" name="asal_tamu" id="asal_tamu" placeholder="&#xf099; Masukkan Asal"  class="form-control fa" required>
                                        </div>
                                        <div class="form-group">
                                          
                                          <label>Alamat</label>
                                          <textarea name="alamat_tamu" id="alamat_tamu" cols="30" rows="8" placeholder="&#xe1b0; Masukkan Alamat" class="form-control fas"></textarea>
                                        </div>
                                        <div class="form-group">
                                          <label>Keperluan</label>
                                          <input type="text" name="keperluan" id="keperluan" placeholder="Masukkan Keperluan" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                          <label>No Telepon</label>
                                          <input type="text" name="no_telp" id="no_telp" placeholder="Masukkan No Telepon" class="form-control" required>
                                        </div>
                                      </div>
                                        <button class="btn col-12" id="submit" name="submit" style="background-color: #df4231; color:white;"><i class="fas fa-plus"></i> Tambah</button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-1">
                      <div class="card card-outline card-navy">
                          <div class="card-header">
                              <center><h1 class="m-0" style="color:#df4231;"><br>AGENDA ACARA</h1> </center>
                              <center style="color: grey">------------------------------</center>
                              <div class="card-body">
                                <div class="row">
                                  @forelse ($agenda as $item)
                                  <div class="col-md-6">
                                    <label>Tanggal Mulai</label>
                                    <input type="date" name="tgl_mulai" id="tgl_mulai" style="text-align: center;" value="{{$item->tgl_mulai_agenda}}"  class="form-control " readonly>
                                  </div>
                                  <div class="col-md-6">
                                    <label>Tanggal Selesai</label>
                                    <input type="date" name="tgl_akhir" id="tgl_akhir" style="text-align: center;"  value="{{$item->tgl_selesai_agenda}}"  class="form-control " readonly>
                                  </div>
                                  <div class="col-md-12">
                                    <label>Nama Acara</label>
                                    <input type="textarea" name="acara" id="acara" value="{{$item->nama_agenda}}"  class="form-control " readonly>
                                  </div>
                                  <div class="col-md-12">
                                    <label>Deskripsi</label>
                                    <input type="textarea" name="desc" id="desc" value="{{$item->desc_agenda}}"  class="form-control " readonly>
                                    <hr size="10px" />
                                  </div>
                                  @empty
                                  @endforelse
                                </div>
                                
                          </div>
                  </div>
                </div>
            </div>
    <!-- /.content -->
  </div>
@endsection