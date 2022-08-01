@extends('layouts.app')
@section('page', 'Pengembalian')
@section('content-app')
<div class="content-wrapper">
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
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <form action="<?php echo url('/'); ?>/transaksi/proses_cari_kembali" method="post">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td style="width:150px;vertical-align:middle;"><b>Cari Siswa</b></td>
                        <td>
                          <div class="input-group">
                            <input type="text" class="form-control" autofocus="" name="nis" placeholder="NIS Siswa" required>
                            <span class="input-group-btn">
                              <button class="btn bg-navy" type="submit">Cari</button>
                            </span>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </form>
              </div>
              <div class="col-md-4">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td style="vertical-align:middle;text-align:center;">
                        <a class="btn bg-navy" href="<?php echo url('/'); ?>/transaksi/daftar_peminjaman"><i class="fa fa-list-alt"> </i> Daftar Transaksi Peminjaman </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-8"> 
              <form action="<?php echo url('/'); ?>transaksi/tambah_kembali_buku" method="post">
                <input type="hidden" name="id_kelas" value="id Kelas">
                <input type="hidden" name="id_siswa" value="id_siswa">
                <div class="col-md-12">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td style="width:150px;vertical-align:middle;">NIS</td>
                        <td><input class="form-control nis" name="nis" type="text" value="nis" readonly></td>
                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Nama Siswa</td>
                        <td><input class="form-control nama_siswa" name="nama_siswa" type="text" value="nama_siswa" readonly></td>
                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Kelas</td>
                        <td><input class="form-control nama_kelas" name="nama_kelas" type="text" value="nama_kelas" readonly></td>
                      </tr>
                  </table>
                </div>
              </form>
              </div>
              <div class="col-md-12">
                <br>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th colspan="8" style="background:#000;color:#fff;">Daftar Transaksi Pengembalian</th>
                    </tr>
                    <tr>
                      <th>No</th>
                      <th>Kode Buku</th>
                      <th>Judul Buku</th>
                      <th>Tgl Pinjam</th>
                      <th>Tgl Kembali</th>
                      <th>Telat</th>
                      <th>Denda</th>
                      <th class="text-center">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (!empty($nis)) {
                      $no = 1;
                      $id_peminjaman = "";
                      $now = strtotime(date("Y-m-d"));
                      foreach ($pengembalian_dt->result_array() as $data) {
                        $id_peminjaman = $data['id_peminjaman'];

                        $your_date = strtotime($data['tanggal_kembali']);
                                    $datediff = $now - $your_date;
                                    $telat = round($datediff / (60 * 60 * 24));
                        ?>
                    <tr>
                      <td>0</td>
                      <td>kode_buku</td>
                      <td>judul_buku</td>
                      <td>0</td>
                      <td><0</td>
                      <td><?php if ($data['telat'] > 0) echo $data['telat'];
                                            else echo '0'; ?> hari</td>
                      <td><?php echo number_format($data['denda']); ?></td>
                      <td class="text-center">
                      <?php if($data['status_pinjam_dt'] == 1) { ?>
                        Selesai
                      <?php } else { ?>
                      <a class="btn btn-primary btn-xs" href="<?php echo url('/') . 'transaksi/pengembalian_simpan/' . $data['id_peminjaman_dt'] . '/' . $nis.'/'.$telat_in; ?>" onclick="return confirm('Yakin ingin mengembalikan buku ini ?');"><i class="fa fa-edit"> </i> Kembali</a></td>

                      <?php } ?>
                    </tr>
                    <?php   }
                    } ?>
                  </tbody>
                </table>

             
              </div>

            </div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
</div>
@endsection