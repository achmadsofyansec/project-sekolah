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
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="fad fa-books-medical"></i></i>Laporan Pengunjung</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item active">Judul</li>
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
            <div class="card card-info card-outline">
              <div class="card-header col-md-12">

                <a><i class="fa fa-file-search text-info"> </i> Cari Data Pengunjung Berdasarkan</a>
                <form role="form" action="<?php echo url('/'); ?>/laporan/proses_tampil_pengunjung" method="post">
                  <div class="row">
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                      <label>Sampai Tanggal</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend date" data-date="" data-date-format="yyyy-mm-dd">
                          <button type="button" class="btn btn-danger"><i class="fal fa-calendar-alt"></i></button>
                        </div>
                        <input class="form-control tglcalendar" type="text" name="tgl_akhir" readonly="readonly" placeholder="Dari Tanggal" value="" required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Keperluan</label>
                                        <select class="form-control select2" type="text" name="keperluan">
                                            <option value="all">[ SEMUA KEPERLUAN ]</option>
                                            <option value="Baca Buku">Baca Buku</option>
                                            <option value="Baca dan Pinjam">Baca dan Pinjam</option>
                                            <option value="Pinjam Buku">Pinjam Buku</option>
                                            <option value="Kembali Buku">Kembali Buku</option>
                                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group">
                      <div class="btn-group btn-group-sm">
                        <button class="btn bg-info btn-sm"><i class="fa fa-search "> </i> Tampilkan Data</button>
                        <button class="btn bg-navy btn-sm" onclick="printDiv('cetak')"><i class="fa fa-print "> </i> Print Data</button>
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
              <img src="" alt="Logo" class="brand-image img-rounded " style="width:60px;height:60px;">
               <br></h4>
                      <h4 style="margin:0;">Laporan Pengunjung Perpus </h4>
                      <p style="margin:0;">Periode :</p>
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
                                    <th>Kelas</th>
                                    <th>Keperluan</th>
                                    <th>Tanggal Kunjungan</th>
                          </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
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
    $(document).ready(function() {
      $('#cari-siswa').typeahead({
        source: function(query, result) {
          $.ajax({
            url: "<?php echo url('/'); ?>/pelanggaran_siswa/ajax_siswa",
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