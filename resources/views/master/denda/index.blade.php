@extends('layouts.app')
@section('page', 'Data Denda')
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
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="animated fadeInUp col-12">
            <div class="card card-info card-outline">
              <div class="card-header">
               <a class="btn btn-info btn-sm" href="{{route('denda.create')}}"><i class="fa fa-plus"> </i> Transaksi Denda</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped table-sm">
                  <thead>
                    <tr class="text-info bg-navy text-sm">
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th>Denda</th>
                        <th style="width:180px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($denda as $item)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->kode_buku}}</td>
                                        <td>{{$item->judul_buku}}</td>
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
                                         @forelse ($denda1 as $item1)
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
                                             if($selisih <= 0){
                                               echo "Tidak Ada";
                                             }else{
                                               $data123 = $dendabuku * $selisih;
                                               
                                             echo $selisih." hari (Rp.".number_format($data123).")";
                                           }
                                            ?>
                                           @empty
                                           @endforelse
                                           </td>
                                        <td style="text-align:center;width:150px;">
                                            <div class="btn-group btn-group-sm">
                                            <a class="btn bg-navy btn-xs" href=""><i class="fa fa-edit"> </i> Edit</a>
                                            <a class="btn btn-danger btn-xs" href="" onclick="return confirm('Yakin ingin hapus data ? ');"><i class="fa fa-trash"> </i> Hapus </a>
                                        </div>
                                        </td>
                                        @empty
                                    <tr>
                                      <td colspan="9">tidak ada data</td>
                                    </tr>
                                </tr>
                      @endforelse
                  </tbody>
                </table>
              </div>
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
  @endsection