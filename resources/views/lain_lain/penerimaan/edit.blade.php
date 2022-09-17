@extends('layouts.app')
@section('page', 'Penerimaan Lain')
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
            </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-header">
                Data Pelimpah Dana
              </div>
              <form action="{{route('terima_lain.update',$data->id_terima)}}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label>Tanggal Pelimpahan</label>
                  <input type="date" id="tgl_penerimaan" name="tgl_penerimaan" class="form-control" value="{{$data->tgl_penerimaan}}" required>
                </div>
                <div class="form-group">
                  <label>Methode Pembayaran</label>
                  <select name="methode_bayar" id="methode_bayar" class="form-control" required>
                    @forelse ($metode_bayar as $item)
                  <option value="{{$item->kode_methode}}" @if ($data->kode_methode == $item->kode_methode)
                      {{'selected'}}
                  @endif>{{$item->nama_methode}}</option>
                    @empty 
                    @endforelse
                  </select>
                </div>
                <div class="form-group">
                  <label>Penerimaan Dari</label>
                  <input type="text" id="penerimaan_dari" name="penerimaan_dari" class="form-control" value="{{$data->penerimaan_dari}}" required>
                </div>
                <div class="form-group">
                  <label>Keterangan Pelimpahan</label>
                  <textarea name="desc_penerimaan" id="desc_penerimaan" cols="30" rows="8" class="form-control">{{$data->desc_penerimaan}}</textarea>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" type="submit" id="simpan_data_penerimaan_lain" name="simpan_data_penerimaan_lain">Simpan</button>
                <a href="{{route('terima_lain.index')}}" class="btn btn-danger" id="kembali" name="kembali">Kembali</a>
              </div>
            </form>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <div class="card-title">
                  Data Penerimaan Dana
                </div>
                <div class="card-tools">
                  <a href="#" class="btn btn-primary" id="btn_tambah_detail" class="btn_tambah_detail" data-toggle="modal" data-target="#modal-tambah-penerimaan-detail">Tambah</a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="dataTable" class="table table-border">
                    <thead>
                      <th>No</th>
                      <th>Pos Terima</th>
                      <th>Keterangan</th>
                      <th>Detail Jumlah</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php 
                      $total = 0;  
                      ?>
                      @forelse ($detail as $item)
                      <?php 
                      $total += $item->detail_jumlah;  
                      ?>
                          <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$item->nama_pos}}</td>
                            <td>{{$item->detail_keterangan}}</td>
                            <td> <?= number_format($item->detail_jumlah) ?> </td>
                              <td>
                                <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                                action="{{ route('detail_terima_lain.destroy',$item->id_detail) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                                </form>
                              </td>
                          </tr>
                      @empty
                          <tr>
                            <td class="text-muted text-center" colspan="4">Tidak Ada Data</td>
                          </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer">
                <p>Total Biaya Yang Diterima : Rp. <b><?= number_format($total);?>,-</b> </p>
              </div>
            </div>
          </div>
        </div>
    </div>
    @include('lain_lain.penerimaan.detail.create')
    </section>
  </div>
@endsection