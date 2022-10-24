@extends('layouts.app')
@section('page', 'Pengembalian')
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
<div class="content">
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
              <div class="col-md-3">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <div class="card-title">
                      Data Siswa
                    </div>
                  </div>
                  <form action="{{route ('pengembalian.update',$data->id_peminjaman)}}" method="POST" enctype="multipart">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>NISN</label>
                        <input type="text" name="nis_siswa" id="nis_siswa" value="{{$data->id_siswa}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                        <input type="text" name="nama_siswa" id="nama_siswa" value="{{$data->nama}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Kelas / Jurusan</label>
                        <input type="text" name="kelas_siswa" id="kelas_siswa" value="{{$data->kode_kelas}} / {{$data->kode_jurusan}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggungan</label>
                        <input type="text" name="tanggungan" id="tanggungan" value="{{$tanggungan->count()}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Peminjaman</label>
                        <textarea name="desc_pinjam" id="desc_pinjam" class="form-control" cols="30" rows="10">{{$data->desc_pinjam}}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary" type="submit" id="simpan_pinjaman" name="simpan_pinjaman">Simpan</button>
                      <a href="{{route('pengembalian.index')}}" class="btn btn-danger" id="kembali" name="kembali">Kembali</a>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-9">
                <div class="card card-primary card-outline">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTable" class="table table-border">
                        <thead>
                          <th>No</th>
                          <th>Judul Buku</th>
                          <th>Jumlah Buku</th>
                          <th>Tanggal kembali</th>
                          <th>denda</th>
                          <th>status</th>
                          <th>Aksi</th>
                        </thead>
                        <tbody>
                          @forelse ($pinjam as $item)
                          <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$item->kode_buku}}</td>
                            <td>{{$item->jumlah}}</td>
                            <td><?php $tujuh_hari = mktime(0,0,0, date('n'), date('j') + $item->durasi, date('Y'));
                              $kembali = date('Y-m-d', $tujuh_hari);
                              echo $kembali;?></td>
                                @forelse ($denda as $item1)
                              <td>
                                <?php 
                                  $dendabuku = $item1->tarif_denda;
                                  $tgl_sekarang = date("Y-m-d");
                                  $tgl_kembali = $kembali;
                                  $sel1 = explode('-',$tgl_kembali);
                                  $sel1_pecah = $sel1[0].'-'.$sel1[1].'-'.$sel1[2];
                                  $sel2 = explode('-',$tgl_sekarang);
                                  $sel2_pecah = $sel2[0].'-'.$sel2[1].'-'.$sel2[2];
                                  $selisih = strtotime($sel2_pecah) - strtotime($sel1_pecah);
                                  $selisih = $selisih/86400;
                                  if($selisih < 0){
                                    echo "Tidak Ada";
                                  }else{
                                  echo $selisih." hari (Rp.". $dendabuku*$selisih.")";
                                }
                                 ?>
                                @empty
                                @endforelse
                                </td>
                                <td><?php if($item->status == 1){
                                  echo "Belum" ."<br>". "Dikembalikan";
                                }else{
                                  echo "Telah Dikembalikan";
                                } ?></td>
                                <td>
                                  <form onsubmit="return confirm('Apakah Anda yakin ?')"
                                    action="{{ route('data_peminjaman.update',$item->id_pinjam)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="nis_siswa" id="nis_siswa" value="{{$data->id_siswa}}" >
                                    <input type="hidden" id="status" name="status" value="0">
                                    <input type="hidden" id="keperluan" name="keperluan" value="Kembali Buku">
                                    <input type="hidden" id="kode_buku" name="kode_buku" value="{{$item->kode_buku}}">
                                    <button type="submit" class="btn btn-primary btn-xs">Kembali</button>
                                    </form></td>
                          </tr>
                          @empty
                              
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
</div>
@endsection