@extends('layouts.app')
@section('page', 'Dashboard')
@section('content-app')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header animated bounceIn">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-2">
            <div class="card card-navy card-outline">
              <center><h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px #17a2b8;"><i class="fal fa-school mt-1"></i> <br>DAFTAR LAYOUT INFORMASI PERPUSTAKAAN</h1> </center>
              <hr>
              <div class="container-fluid">
                <div class="row">
                  <!-- DATA KELAS -->
                  <div class="col-md-12">
                    <div class="card card-navy card-outline">
                      <div class="card-header">
                        <h3 class="card-title text-navy"><i class="fad fa-books-medical"></i> DATA PERPUSTAKAAN</h3>
                        <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                        </div>
                      </div>
                      <div class="card-body p-0">
                        <div class="row mt-3 ml-1 mr-1">
                          <div class="col-12 col-sm-3 col-md-3">
                            <a style="color:black;">
                            <div class="info-box">
                              <span class="info-box-icon bg-navy elevation-1"><i class="fad fa-books-medical"></i></span>
                              <div class="info-box-content">
                                <span class="info-box-text text-navy" ><b>DATA BUKU</b></span>
                                <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e">{{$buku->count()}}</span>
                              </div>
                            </div></a>
                          </div>

                          <div class="col-12 col-sm-3 col-md-3">
                            <a style="color:black;">
                            <div class="info-box">
                              <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-users-class"></i></span>
                              <div class="info-box-content">
                                <span class="info-box-text text-navy" ><b>PENGUNJUNG</b></span>
                                <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e">{{$pengunjung->count()}}</span>
                              </div>
                            </div></a>
                          </div>

                          <div class="col-12 col-sm-3 col-md-3">
                            <a style="color:black;">
                            <div class="info-box">
                              <span class="info-box-icon bg-navy elevation-1"><i class="fad fa-person-carry"></i></span>
                              <div class="info-box-content">
                                <span class="info-box-text text-navy" ><b>PEMINJAMAN</b></span>
                                <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e">{{$pinjaman->count()}}</span>
                              </div>
                            </div></a>
                          </div>

                          <div class="col-12 col-sm-3 col-md-3">
                            <a style="color:black;">
                            <div class="info-box">
                              <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-money-check-alt"></i></span>
                              <div class="info-box-content">
                                <span class="info-box-text text-navy" ><b>TOTAL UANG DENDA</b></span>
                                <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e">0</span>
                              </div>
                            </div></a>
                          </div>
                        </div>
                        
                        <div class="row">
           <!-- /.col -->
          <div class="col-md-6">
            <div class="card card-navy">
              <div class="card-header">
                <h3 class="card-title"><i class="fad fa-spin fa-chart-pie"></i> Grafik Pengunjung Perpustakaan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="pie-absen" style="background:none;height: 400px; width:100%; margin: 0 auto"></div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-6 ">
            <div class="card card-navy card-outline">
              <div class="card-header">
                <h3 class="card-title text-navy" ><i class="fad fa-calendar-check"></i> Catatan Agenda Atau Kegiatan</h3>
                <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                    </div>
                </div>
              <div class="card-body p-0 mr-2 ml-2 mb-2">
                  <div id="calendar"></div>
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
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>


  <div class="modal fade in" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?php echo url('/'); ?>/app/agenda_save" method="post" accept-charset="utf-8">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="addModalLabel">Tambah Catatan / Agenda</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="add" value="1">
          <label>Tanggal*</label>
          <p id="labelDate"></p>
          <input type="hidden" name="date" class="form-control" id="inputDate">
          <label>Keterangan*</label>
          <textarea name="info" id="inputDesc" class="form-control"></textarea><br />
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnSimpan" class="btn btn-success">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="delModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?php echo url('/'); ?>/app/agenda_hapus" method="post" accept-charset="utf-8">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="delModalLabel">Hapus Catatan / Agenda</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="idDel">
          <label>Tahun</label>
          <p id="showYear"></p>
          <label>Tanggal</label>
          <p id="showDate"></p>
          <label>Keterangan*</label>
          <p id="showDesc"></p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'prevYear,nextYear',
    },

    events: "<?php echo url('/'); ?>/home/get_calendar",

    dayClick: function(date, jsEvent, view) {

      var tanggal = date.getDate();
      var bulan = date.getMonth() + 1;
      var tahun = date.getFullYear();
      var fullDate = tahun + '-' + bulan + '-' + tanggal;

      $('#addModal').modal('toggle');
      $('#addModal').modal('show');

      $("#inputDate").val(fullDate);
      $("#labelDate").text(fullDate);
      $("#inputYear").val(date.getFullYear());
      $("#labelYear").text(date.getFullYear());
    },

    eventClick: function(calEvent, jsEvent, view) {
      $("#delModal").modal('toggle');
      $("#delModal").modal('show');
      $("#idDel").val(calEvent.id);
      $("#showYear").text(calEvent.year);

      var tgl = calEvent.start.getDate();
      var bln = calEvent.start.getMonth() + 1;
      var thn = calEvent.start.getFullYear();

      $("#showDate").text(tgl + '-' + bln + '-' + thn);
      $("#showDesc").text(calEvent.title);
    }


  });
</script>

<script>
  Highcharts.chart('pie-absen', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      backgroundColor: 'transparent',
      type: 'pie'
    },
    title: {
      text: ''
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
          style: {
            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
          }
        }
      }
    },
    series: [{
      name: 'Kategori',
      colorByPoint: true,
      data: [{
        name: 'Baca Buku',
        y: 
      }, {
        name: 'Baca dan Pinjam',
        y: 
      }, {
        name: 'Kembali Buku',
        y: 
      }, {
        name: 'Pinjam Buku',
        y:
      }]
    }]
  });
</script>
</script>
@endsection