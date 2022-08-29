@extends('layouts.app')
@section('page', 'Peminjaman')
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
              <div class="col-md-7">
                <form action="{{route('peminjaman_buku.create')}}" method="GET">
                  <table class="table table-bordered tble-hover table-striped table-sm">
                    <tbody>
                      <tr>
                        <td style="width:150px;vertical-align:middle;"><b>Cari Siswa</b></td>
                        <td>
                          <div class="input-group">
                            <select class="form-control select2" name="cari" required>
                                        <option id="">NIS Siswa</option>
                                        
                                        @forelse ($siswa as $item)
                                        <option id="{{$item->id}}">{{$item->nisn}}</option>
                                          @empty
                                              
                                          @endforelse
                            </select>
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
              <div class="col-md-5">
                <table class="table table-bordered table-hover table-striped table-sm">
                  <tbody>
                    <tr>
                      <td style="vertical-align:middle;text-align:center;">
                        <a class="btn bg-navy" href="<?php echo url('/'); ?>transaksi/daftar_peminjaman"><i class="fa fa-list-alt"> </i> Daftar Transaksi Peminjaman </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-12">
                <form role="form" action="<?php echo url('/'); ?>transaksi/tambah_pinjam_buku" method="post">
                <input type="hidden" name="id_kelas" id="id_kelas">
                <input type="hidden" name="id_siswa" id="id_siswa">
                <div class="row">
                <div class="col-md-7">
                  <table class="table table-bordered table-hover table-striped table-sm">
                    <tbody>
                      <tr>
                        <td style="width:150px;vertical-align:middle;">NIS</td>
                        <td><input class="form-control nisn" name="nisn"  type="text"  readonly></td>
                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Nama Siswa</td>
                        <td><input class="form-control nama" name="nama" id="nama"  type="text" readonly></td>
                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Kelas</td>
                        <td><input class="form-control nama_kelas" name="nama_kelas" id="nama_kelas" type="text" readonly></td>
                      </tr>
                  </table>
                </div>
                <div class="col-md-5">
                  <table class="table table-bordered table-hover table-striped table-sm">
                    <tbody>
                      <tr>
                        <td style="vertical-align:middle;">Tanggungan</td>
                        <td><input class="form-control tanggungan" name="tanggungan" id="tanggungan" type="text" value="" readonly></td>
                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Jumlah Pinjam</td>
                        <td><input class="form-control jumlah" name="jumlah" id="jumlah" type="number" required value="1"></td>
                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Durasi Pinjam (hari)</td>
                        <td><input class="form-control durasi" name="durasi" id="durasi" type="text" placeholder="Silahkan Input Durasi Pinjam" required></td>
                      </tr>
                  </table>
                </div>
                </div>
                <div class="col-md-12">
                  <table class="table table-bordered table-hover table-striped table-sm">
                    <tbody>
                      <tr>
                        <td style="width:150px;">Kode Buku</td>
                        <td>
                        <input class="form-control id_buku_real" name="id_buku_real" id="id_buku_real" type="hidden" required>
                          <input class="form-control id_buku" name="id_buku" id="id_buku" type="text" placeholder="Silahkan Input Kode Buku" required>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Judul Buku</td>
                        <td><input class="form-control judul_buku" name="judul_buku" id="kode_buku" type="text" readonly></td>
                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Stok</td>
                        <td><input class="form-control stok" name="stok" id="stok" type="text" readonly></td>
                      </tr>

                    </tbody>
                  </table>
                </div>
                <?php if (!empty($nis)) { ?>
                  <div class="col-md-12 text-center">
                    <button class="btn bg-navy" name="tambah"><i class="fa fa-plus"> </i> Tambah Buku</button>
                  </div>
                <?php } ?>
              </form>
              </div>


              <div class="col-md-12">
                <br>
                <table class="table table-bordered table-hover table-striped table-sm">
                  <thead>
                    <tr>
                      <th colspan="7" class="bg-navy">Daftar Transaksi Peminjaman</th>
                    </tr>
                    <tr>
                      <th>No</th>
                      <th>Kode Buku</th>
                      <th>Judul Buku</th>
                      <th>Jumlah Pinjam</th>
                      <th>Tgl Pinjam</th>
                      <th>Tgl Kembali</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if (!empty($nis)) {
                      $no = 1;
                      $id_peminjaman = "";
                      foreach ($peminjaman_dt->result_array() as $data) {
                      $id_peminjaman = $data['id_peminjaman'];
                    ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['kode_buku']; ?></td>
                          <td><?php echo $data['judul_buku']; ?></td>
                          <td><?php echo $data['jumlah']; ?></td>
                          <td><?php echo date("d-m-Y", strtotime($data['tanggal_pinjam'])); ?></td>
                          <td><?php echo date("d-m-Y", strtotime($data['tanggal_kembali'])); ?></td>
                          <td class="text-center">
                            <a class="btn btn-danger btn-xs" href="<?php echo url('/') . 'transaksi/peminjaman_hapus/' . $data['id_peminjaman_dt'] . '/' . $nis; ?>" onclick="return confirm('Yakin ingin hapus data ?');"><i class="fa fa-trash"> </i></a>

                          </td>
                        </tr>
                    <?php   }
                                                                                                        } ?>
                  </tbody>
                </table>

                <?php
                  if (!empty($nis)) {
                  $hitung = count($peminjaman_dt->result_array());
                  if ($hitung > 0) { ?>
                    <div class="text-center"> <a class="btn btn-primary btn-lg" href="<?php echo url('/') . 'transaksi/peminjaman_simpan/' . $id_peminjaman; ?>" onclick="return confirm('Yakin ingin simpan data ?');"> <i class="fa fa-save"> </i> Simpan Transaksi</a> </div>
                <?php }
                                                                                                        } ?>
              </div>

            </div>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
</div>

<script>
  $(".id_buku").change(function() {
    var id_buku = $(".id_buku").val();
    $.getJSON("<?php echo url('/'); ?>transaksi/ajax_combo_buku", {
      id_buku: id_buku
    }, function(data) {
      $(".judul_buku").val(data[0].judul_buku);
      $(".stok").val(data[0].jumlah_buku);
    });
  });
</script>


<script>
  $(document).ready(function() {
    var barcode = "";
    $(document).keydown(function(e) {

      var code = (e.keyCode ? e.keyCode : e.which);
      if (code == 13) // Enter key hit
      {
        var id_buku = $(".id_buku").val();
        $.getJSON("<?php echo url('/'); ?>transaksi/ajax_combo_buku", {
          id_buku: id_buku
        }, function(data) {
          $(".judul_buku").val(data[0].judul_buku);
            $(".stok").val(data[0].jumlah_buku);
            $(".id_buku_real").val(data[0].id_buku);
        });
      } else if (code == 9) // Tab key hit
      {
        var id_buku = $(".id_buku").val();
        $.getJSON("<?php echo url('/'); ?>transaksi/ajax_combo_buku", {
          id_buku: id_buku
        }, function(data) {
          $(".judul_buku").val(data[0].judul_buku);
            $(".stok").val(data[0].jumlah_buku);
            $(".id_buku_real").val(data[0].id_buku);
        });
      } else {
        barcode = barcode + String.fromCharCode(code);
      }
    });

  });
</script>
@endsection