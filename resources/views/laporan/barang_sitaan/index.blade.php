@extends('layouts.app')
@section('page', 'Laporan Barang Sitaan')
@section('content-app')
  <div class="content-wrapper">
    <!-- Main content -->
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
            <div class="card card-navy card-outline">
              <div class="card-body">
                <form action="{{route('lap_sitaan')}}" method="GET">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <input type="date" name="filter_awal" value="@if($req->filter_awal != null){{$req->filter_awal}}@endif" id="filter_awal" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">                         
                        <input type="date" name="filter_akhir" value="@if($req->filter_akhir != null){{$req->filter_akhir}}@endif" id="filter_akhir" class="form-control" required>
                      </div>
                    </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <input type="submit" value="Search" class="btn btn-primary" style="width: 100%">
                        </div>
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
      @if ($req->filter_awal !=null && $req->filter_akhir != null )
      <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-navy">
              <div class="card-header">
                <div class="card-title">
                  Laporan Barang Sitaan
                </div>
                <div class="card-tools">
                  <form action="#">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
                  </form>
                </div>
                
              </div>
              <div class="card-body">
                <table class="table" id="dataTable">
                  <thead>
                    <th>No</th>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
          
      @endif
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection