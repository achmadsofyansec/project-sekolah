@extends('layouts.app')
@section('page', 'Dashboard')
@section('content-app')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="fad fa-books-medical"></i></i> judul</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item active">judul</li>
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
            <div class="card card-navy card-outline">
              <div class="card-header col-md-12">
                @foreach ($laporan_peminjaman as $item)
                <?php $tgl_awal = $item['tanggal_pinjam'] ?>
                <?php $tgl_akhir = $item['tanggal_kembali'] ?>
                @endforeach
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
                          <input class="form-control tglcalendar" type="text" name="tgl_awal" readonly="readonly" placeholder="Dari Tanggal" value="<?php echo $item['tanggal_pinjam'] ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label>Sampai Tanggal</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend date" data-date="" data-date-format="yyyy-mm-dd">
                          <button type="button" class="btn btn-danger"><i class="fal fa-calendar-alt"></i></button>
                        </div>
                        <input class="form-control tglcalendar" type="text" name="tgl_akhir" readonly="readonly" placeholder="Dari Tanggal" value="<?php echo $tgl_akhir; ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label>&nbsp;</label>
                      <div class="input-group mb-3">
                      <div class="btn-group btn-group-sm">
                        <button class="btn bg-info btn-sm"><i class="fa fa-search "> </i> Tampilkan Data</button>
                        <button class="btn bg-navy btn-sm" onclick="printDiv('cetak')"><i class="fa fa-print "> </i> Print Data</button>
                        <a class="btn btn-danger btn-sm" href="<?php echo url('/'); ?>laporan/peminjaman_excel/<?php echo date('Y-m-d',strtotime($tgl_awal)); ?>/<?php echo date('Y-m-d',strtotime($tgl_akhir)); ?>" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                      </div>
                      </div>
                    </div>                             
                    </div>
                </form>
              </div>
              <!-- /.card-header -->
              <!-- TABLE: LATEST ORDERS -->
              <?php if (!empty($peminjaman)) { ?>
                <div class="card" id="cetak">
                  <div class="card-header border-transparent">
                    <center>
                        <h4 class="m-0 text-dark mt-3" style="text-shadow: 2px 2px 4px #17a2b8;">
                          <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/asis/asispanel/upload/'.$sekolah->logo; ?>" alt="Logo" class="brand-image img-rounded " style="width:60px;height:60px;">
                           <br><?php echo $nama_sekolah ?></h4>
                                  <h2 style="margin:0;">Laporan Peminjaman Buku </h2>
                          <p style="margin:0;">Periode : <?php echo $tgl_awal . ' s/d ' . $tgl_akhir; ?></p>
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
                              <th>Judul Buku</th>
                              <th>Jumlah</th>
                              <th>Tgl Pinjam</th>
                              <th>Tgl Kembali</th>
                              <th>Status</th>
                              <th>Telat</th>
                              <th>Denda</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                  $no = 1;
                  $now = strtotime(date("Y-m-d"));
                  foreach ($laporan_peminjaman as $item) {
                    $your_date = strtotime($item['tanggal_kembali']);
                    $datediff = $now - $your_date;
                    $telat = round($datediff / (60 * 60 * 24));
                    ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $item['nama_siswa']; ?></td>
                  <td><?php echo $item['kode_buku']; ?></td>
                  <td><?php echo $item['judul_buku']; ?></td>
                  <td><?php echo $item['jumlah']; ?></td>
                  <td><?php echo date("d-m-Y", strtotime($item['tanggal_pinjam'])); ?></td>
                  <td><?php
                          if ($item['status_pinjam_dt'] == 0) {
                            echo date("d-m-Y", strtotime($item['tanggal_kembali']));
                          } else {
                            echo date("d-m-Y", strtotime($item['tanggal_kembali_asli']));
                          } ?></td>
                  <td><?php if ($item['status_pinjam_dt'] == 0) echo 'Dipinjam';
                          else echo 'Kembali'; ?></td>
                   <td><?php if ($item['telat'] > 0) echo $item['telat'];  else echo '0'; ?> hari</td>
                  <td><?php echo number_format($item['denda']); ?></td>

                </tr>
                <?php $no++;
                  } ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!-- /.card-body -->
                  <!-- /.card-footer -->
                </div>
              <?php } ?>
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
    $(document).ready(function() {
      $('#cari-siswa').typeahead({
        source: function(query, result) {
          $.ajax({
            url: "<?php echo url('/'); ?>pelanggaran_siswa/ajax_siswa",
            data: 'query=' + query,
            dataType: "json",
            type: "POST",
            success: function(data) {
              result($.map(data, function(item) {
                return item;
              }));
            }
          });
        }
      });
    });
  </script>
@endsection