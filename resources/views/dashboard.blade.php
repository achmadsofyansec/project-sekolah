@extends('layouts.app')
@section('page', 'Dashboard')
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
    <section class="content">
      <div class="container-fluid">
        <div class="row-mb-2">
          <div class="col-sm-12 mt-1">
            <div class="card card-primary card-outline">
              <center><h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px #0689e0;"><br>SISTEM INFORMASI BUKU TAMU</h1> </center>
              <hr>
              <div class="card-body">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <canvas id="tamu-chart" style="min-height: 250px; height: 280px; max-width: 100%; display: block; width: 370px;">
                      </canvas>
                    </div>
                    <div class="col-md-6">
                      <label>Data Kunjungan Hari Ini</label>
                      <div class="table-responsive" style="height: 280px;">
                        <table class="table">
                            <thead>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Nama</th>
                              <th>No Telp</th>
                            </thead>
                            <tbody>
                              @forelse ($tamu as $item)
                                  <tr>
                                    <td>{{$loop->index + 1}}</td>
                                  <td>{{$item->created_at}}</td>
                                    <td>{{$item->nama_tamu}}</td>
                                    <td>{{$item->no_telp}}</td>
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('content-script')
    <script>
        $(document).ready(function(){
    var donutChartCanvas = $('#tamu-chart').get(0).getContext('2d')
  var donutData        = {
  labels: [
      'Data Tamu',
      'Agenda'
  ],
  datasets: [
    {
      data: [{{$tamu->count()}},{{$agenda->count()}}],
      backgroundColor : ['#1c97fc', '#11f73b'],
      }
    ]
  }
  var donutOptions     = {
  maintainAspectRatio : false,
  responsive : true,
  }

  new Chart(donutChartCanvas, {
    type: 'doughnut',
    data: donutData,
    options: donutOptions
    });
  });
    </script>
@endsection