@extends('layouts.app')
@section('page', 'Peminjaman')
@section('content-app')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="fad fa-books-medical"></i></i> @yield('page')</h1>
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
    <section class="content animated fadeInUp ">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class=" col-md-12">
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
            <div class="card card-navy card-outline">
              <div class="card-header col-md-12">
                <a><i class="fa fa-file-search text-navy"> </i> Cari Data Peminjaman</a>
                <form role="form" action="<?php echo url('/'); ?>laporan/proses_tampil_peminjaman" method="post">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Dari Tanggal</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend date" data-date="" data-date-format="yyyy-mm-dd">
                            <button type="button" class="btn btn-danger"><i class="fal fa-calendar-alt"></i></button>
                          </div>
                        
                          <input class="form-control tglcalendar" type="text" name="tgl_awal" readonly="readonly" placeholder="Dari Tanggal" value="" required>
                        
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label>Sampai Tanggal</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend date" data-date="" data-date-format="yyyy-mm-dd">
                          <button type="button" class="btn btn-danger"><i class="fal fa-calendar-alt"></i></button>
                        </div>
                        <input class="form-control tglcalendar" type="text" name="tgl_akhir" readonly="readonly" placeholder="Dari Tanggal" value="" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label>&nbsp;</label>
                      <div class="input-group mb-3">
                      <div class="btn-group btn-group-sm">
                        <button class="btn bg-info btn-sm"><i class="fa fa-search "> </i> Tampilkan Data</button>
                        <button class="btn bg-navy btn-sm" onclick="printDiv('cetak')"><i class="fa fa-print "> </i> Print Data</button>
                        <a class="btn btn-danger btn-sm" href="<?php echo url('/'); ?>laporan/peminjaman_excel/" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                      </div>
                      </div>
                    </div>                             
                    </div>
                </form>
              </div>
              <!-- /.card-header -->
              <!-- TABLE: LATEST ORDERS -->
                <div class="card" id="cetak">
                  <div class="card-header border-transparent">
                    <center>
                        <h4 class="m-0 text-dark mt-3" style="text-shadow: 2px 2px 4px #17a2b8;">
                                  <h2 style="margin:0;">Laporan Peminjaman Buku </h2>
                    </center>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table m-0 table-hover table-sm">
                        <thead>
                          <tr class="text-sm bg-navy">
                            <th>No</th>
                              <th>Nama Siswa</th>
                              <th>Kode Buku</th>
                              <th>Jumlah</th>
                              <th>Tgl Pinjam</th>
                              <th>Tgl Kembali</th>
                              <th>Status</th>
                              <th>Telat</th>
                              <th>Denda</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($peminjaman as $item)
                <tr>
                  <td>{{$loop->index +1}}</td>
                  <td>{{$item->nama}}</td>
                  <td>{{$item->kode_buku}}</td>
                  <td>{{$item->jumlah}}</td>
                  <td>{{$item->tanggal_pinjam}}</td>
                  <td><?php
                    $tanggal_pinjam = $item->tanggal_pinjam;
                    $tanggal_kembali = date('Y-m-d', strtotime($item->durasi.' days', strtotime($tanggal_pinjam))); 
                  echo $tanggal_kembali;?></td>
                  <td><?php if($item->status == 1){
                    echo "Dipinjam";
                  }else{
                    echo "Dikembalikan";
                  } ?></td>
                  @forelse ($denda as $item1)
                  <td>
                    <?php 
                      $dendabuku = $item1->tarif_denda;
                      $tgl_sekarang = date("Y-m-d");
                      $tgl_kembali = $tanggal_kembali;
                      $sel1 = explode('-',$tgl_kembali);
                      $sel1_pecah = $sel1[0].'-'.$sel1[1].'-'.$sel1[2];
                      $sel2 = explode('-',$tgl_sekarang);
                      $sel2_pecah = $sel2[0].'-'.$sel2[1].'-'.$sel2[2];
                      $selisih = strtotime($sel2_pecah) - strtotime($sel1_pecah);
                      $selisih = $selisih/86400;
                      if($selisih < 0){
                        echo "Tidak";
                      }else{
                      echo $selisih;
                    }
                     ?>
                  </td><td>
                    <?php 
                      $dendabuku = $item1->tarif_denda;
                      $tgl_sekarang = date("Y-m-d");
                      $tgl_kembali = $tanggal_kembali;
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
                  @empty
                </tr>
                @endforelse
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!-- /.card-body -->
                  <!-- /.card-footer -->
                </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
  </div>
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>

  </script>
@endsection