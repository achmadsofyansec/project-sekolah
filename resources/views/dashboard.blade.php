@extends('layouts.app')
@section('page', 'Dashboard')
@section('content-app')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header animated bounceIn">
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                  <div class="card card-outline card-success">
                    <div class="card-header">
                      <h1 class="card-title">
                        Data Kelulusan
                      </h1>
                    </div>
                    <div class="card-body">
                      <div class="d-md-flex">
                        <div class="p-1 flex-fill" style="overflow: hidden">
                          <canvas id="data-chart" style="min-height: 250px; height: 310px; max-width: 100%; display: block; width: 370px;">
                          </canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="card card-outline card-success">
                    <div class="card-header">
                      <h1 class="card-title">
                        Nilai Siswa
                      </h1>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table" id="dataTable">
                          <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Rata Rata</th>
                            
                          </thead>
                          <tbody>
                           
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  </div>
@endsection
@section('content-script')
<script>
  $(document).ready(function(){
    var donutChartCanvas = $('#data-chart').get(0).getContext('2d')
  var donutData        = {
  labels: [
      'Lulus',
      'Tidak Lulus',
      'Drop Out'
  ],
  datasets: [
    {
      data: ['30','115','60'],
      backgroundColor : ['#28a745', '#ffc107', '#dc3545'],
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