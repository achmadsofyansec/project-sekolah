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
    <!-- Main content -->
    <section class="content">
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
            </div>
        </div>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?php echo url('/jenis_dokumen') ?>"style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-paste"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-primary" ><b>Jenis Dokumen</b></span>
                <font  style="text-shadow: 2px 2px 4px #827e7e"><?= $jenis_dokumen->count(); ?></font>
              </div>
            </div></a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?php echo url('/ruangan') ?>" style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-building"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-danger" ><b>Ruangan</b></span>
                <font style="text-shadow: 2px 2px 4px #827e7e"><?= $ruangan->count(); ?></font>
              </div>
            </div></a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?php echo url('/lemari') ?>"style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-door-closed"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-success" ><b>Lemari</b></span>
                <font style="text-shadow: 2px 2px 4px #827e7e"><?= $lemari->count(); ?></font>
              </div>
            </div></a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?php echo url('/box') ?>" style="color:black;">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-box-open"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-info" ><b>Box</b></span>
                <font style="text-shadow: 2px 2px 4px #827e7e"><?= $box->count(); ?></font>
              </div>
            </div></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title "><i class="nav-icon fas fa-calendar-alt text-danger"></i> DOKUMEN MASUK HARI INI</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="d-md-flex">
                  <div class="p-1 flex-fill" style="min-height: 250px; height: 310px; max-width: 100%; display: block; width: 370px;">
                    <!-- Map will be created here -->
                    <div class="table-responsive">
                      <table class="table table-bordered">
                          <thead>
                            <th>No</th>
                            <th>Dokumen</th>
                            <th>Deskripsi</th>
                          </thead>
                          <tbody>
                            @forelse ($dokumen as $item)
                                <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$item->nama_dokumen}}</td>
                                <td>{{$item->deskripsi}}</td>
                                </tr>
                            @empty
                                <tr>
                                  <td colspan="3">Tidak Ada Data</td>
                                </tr>
                            @endforelse
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div><!-- /.d-md-flex -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-md-7">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title "><i class="nav-icon fas fa-calendar-alt text-danger"></i>Grafik Dokumen</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="d-md-flex">
                  <div class="p-1 flex-fill" style="overflow: hidden">
                    <!-- Map will be created here -->
                    <canvas id="dokumen-chart" style="min-height: 250px; height: 310px; max-width: 100%; display: block; width: 370px;">
                    </canvas>
                  </div>
                </div><!-- /.d-md-flex -->
              </div>
              <!-- /.card-body -->
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
    var donutChartCanvas = $('#dokumen-chart').get(0).getContext('2d')
  var donutData        = {
  labels: [
      'Jenis',
      'Ruangan',
      'Lemari',
      'Rak',
      'Box',
      'Map',
      'Urut'
  ],
  datasets: [
    {
      data: [{{$jenis_dokumen->count()}},{{$ruangan->count()}},
      {{$lemari->count()}},{{$rak->count()}},{{$box->count()}},{{$map->count()}},{{$urut->count()}}],
      backgroundColor : ['#28a745', '#ffc107', '#dc3545', '#17a2b8','#007bff',,'#000',,'#333'],
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