@extends('layouts.app')
@section('page', 'Tambah Biaya Siswa')
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
                          <p>1. isi <b>Data Biaya</b> Dengan Baik dan Benar.</p>
                          <p>2. Simpan Data Biaya Dengan Cara Menekan <b>Tombol <button class="btn btn-success"><i class="fas fa-save"> Simpan</i></button></b>  Yang berada di bawah Form</p>
                        </div>
                        <div class="card-footer">
                          Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
                        </div>
                      </div>
                </div>  
                <div class="col-md-8 mt-1">
                    <div class="card card-outline card-info">
                        <form action="{{route('biaya_siswa.update',$data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                              <div class="form-group">
                                  <label>Nama </label>
                              <input type="text" value="{{$data->nama_biaya}}" class="form-control" name="nama_biaya" id="nama_biaya" required>
                              </div>
                              <div class="form-group">
                                  <label>Pos Penerimaan</label>
                                  <select name="pos_biaya" id="pos_biaya" class="form-control">
                                      <option value=""> -- Pilih Pos --</option>
                                      @forelse ($pos as $item)
                                  <option value="{{$item->kode_pos}}" @if ($data->pos_biaya == $item->kode_pos)
                                    {{'selected'}}
                                  @endif>{{$item->nama_pos}}</option>
                                      @empty
                                          
                                      @endforelse
                                  </select>
                              </div>
                              <div class="form-group">
                                <label>Tipe Biaya</label>
                                <select name="tipe_biaya" id="tipe_biaya" class="form-control">
                                    <option value=""> -- Pilih Tipe --</option>
                                    <option value="BULANAN" @if ($data->tipe_biaya == "BULANAN")
                                      {{'selected'}}
                                    @endif>BULANAN</option>
                                    <option value="NONBULANAN" @if ($data->tipe_biaya == "NONBULANAN")
                                      {{'selected'}}
                                    @endif>NON BULANAN</option>
                                </select>
                            </div>
                              <div class="form-check">
                                  <input type="checkbox" name="kartu_spp" id="kartu_spp" class="form-check-input" @if ($data->kartu_spp == '1')
                                  {{'checked'}}
                                @endif>
                                  <label for="kartu_spp">Pembayaran Adalah Bagian Dari Kartu SPP</label>
                              </div>
                              <div class="form-check">
                                <input type="checkbox" name="penunggakan" id="penunggakan" class="form-check-input" @if ($data->penunggakan == '1')
                                {{'checked'}}
                              @endif>
                                <label for="penunggakan">Biaya Dianggap Menunggak Jika Belum Dibayar</label>
                              </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" ><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{route('biaya_siswa.index')}}" class="btn btn-danger"><i class="fas fa-undo"></i> Kembali</a>
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