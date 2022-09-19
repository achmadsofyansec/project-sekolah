@extends('layouts.app')
@section('page', 'Edit Pengeluaran')
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
                Data Pengeluaran Dana
              </div>
              <form action="{{route('keluar_lain.update',$data->id_keluar)}}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label>Tanggal Pengeluaran</label>
                  <input type="date" name="tgl_pengeluaran" id="tgl_pengeluaran" value="{{$data->tgl_pengeluaran}}" class="form-control">
                </div>
                <div class="form-group">
                  <label>Pembayaran</label>
                  <select name="methode_bayar" id="methode_bayar" class="form-control">
                    @forelse ($metode_bayar as $item)
                  <option value="{{$item->kode_methode}}" @if ($data->methode_bayar == $item->kode_methode){
                    {{'selected'}}
                  }@endif>{{$item->nama_methode}}</option>
                    @empty
                        
                    @endforelse
                  </select>
                </div>
                <div class="form-group">
                  <label>Keterangan Pengeluaran</label>
                  <textarea name="desc_pengeluaran" id="desc_pengeluaran" cols="30" rows="8" class="form-control">{{$data->desc_pengeluaran}}</textarea>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" type="submit" id="simpan_pengeluaran" name="simpan_pengeluaran">Simpan</button>
                <a href="{{route('keluar_lain.index')}}" class="btn btn-danger" id="kembali" name="kembali">Kembali</a>
              </div>
            </form>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <div class="card-title">
                  Data Pengeluaran Dana
                </div>
                <div class="card-tools">
                  <a href="#" class="btn btn-primary" id="btn_tambah_detail" class="btn_tambah_detail" data-toggle="modal" data-target="#modal-tambah-pengeluaran-detail">Tambah</a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="dataTable" class="table table-border">
                    <thead>
                      <th>No</th>
                      <th>Pos Sumber</th>
                      <th>Pos Keluar</th>
                      <th>Keterangan</th>
                      <th>Detail Jumlah</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      @php
                          $total = 0;
                      @endphp
                      @forelse ($detail as $item)
                      @php
                           $total += $item->detail_jumlah; 
                      @endphp
                          <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$item->nama_pos_sumber}}</td>
                            <td>{{$item->nama_pos_keluar}}</td>
                            <td>{{$item->detail_keterangan}}</td>
                            <td> <?= number_format($item->detail_jumlah) ?></td>
                            <td>
                              <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                              action="{{ route('detail_keluar_lain.destroy',$item->id_detail) }}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                              </form>
                            </td>
                          </tr>
                      @empty
                          
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
        @include('lain_lain.pengeluaran.detail.create')
    </div>
    </section>
    <!-- /.content -->
  </div>
@endsection