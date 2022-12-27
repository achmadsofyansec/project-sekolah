@extends('layouts.app')
@section('page', 'Laporan Asset')
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
                <div class="card card-outline card-secondary">
                   <div class="card-header">
                   <!-- <a type="button" href="#" class="btn btn-primary"><i class="fas fa-plus"></i> Export</a> -->
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                            <table id="dataTable" class="table">
                                <thead>
                                    <th>No</th> 
                                    <th>Nama</th>                                  
                                    <th>Aksi</th>
                                </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>Gedung</td>
                                  <td><a href="{{ route('exp_gedung')}}" class="btn btn-primary my-3" target="_blank"><i class="fas fa-print"></i> Export</a></td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>Kebutuhan Tambahan</td>
                                  <td><a href="{{ route('exp_kebutuhan_tambahan')}}" class="btn btn-primary my-3" target="_blank"><i class="fas fa-print"></i> Export</a></td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td>Laboratorium</td>
                                  <td><a href="{{ route('exp_laboratorium')}}" class="btn btn-primary my-3" target="_blank"><i class="fas fa-print"></i> Export</a></td>
                                </tr>
                                <tr>
                                  <td>4</td>
                                  <td>Lahan</td>
                                  <td><a href="{{ route('exp_lahan') }}" class="btn btn-primary my-3" target="_blank"><i class="fas fa-print"></i> Export</a></td>
                                </tr>
                                <tr>
                                  <td>5</td>
                                  <td>Mebel</td>
                                  <td><a href="{{ route('exp_mebel')}}" class="btn btn-primary my-3" target="_blank"><i class="fas fa-print"></i> Export</a></td>
                                </tr>
                                <tr>
                                  <td>6</td>
                                  <td>Olahraga & Seni</td>
                                  <td><a href="{{ route('exp_olahraga_seni')}}" class="btn btn-primary my-3" target="_blank"><i class="fas fa-print"></i> Export</a></td>
                                </tr>
                                <tr>
                                  <td>7</td>
                                  <td>Penerangan & Internet</td>
                                  <td><a href="{{ route('exp_penerangan_internet')}}" class="btn btn-primary my-3" target="_blank"><i class="fas fa-print"></i> Export</a></td>
                                </tr>
                                <tr>
                                  <td>8</td>
                                  <td>Sanitasi</td>
                                  <td><a href="{{ route('exp_sanitasi')}}" class="btn btn-primary my-3" target="_blank"><i class="fas fa-print"></i> Export</a></td>
                                </tr>
                                <tr>
                                  <td>9</td>
                                  <td>Sarana Administrasi</td>
                                  <td><a href="{{ route('exp_sarana_administrasi')}}" class="btn btn-primary my-3" target="_blank"><i class="fas fa-print"></i> Export</a></td>
                                </tr>
                                <tr>
                                  <td>10</td>
                                  <td>Ruangan</td>
                                  <td><a href="{{ route('exp_ruagan')}}" class="btn btn-primary my-3" target="_blank"><i class="fas fa-print"></i> Export</a></td>
                                </tr>
                                </tbody>  
                                <tr>
                                  <td>11</td>
                                  <td>Lapangan</td>
                                  <td><a href="{{ route('exp_lapangan')}}" class="btn btn-primary my-3" target="_blank"><i class="fas fa-print"></i> Export</a></td>
                                </tr>
                                <tr>
                                  <td>12</td>
                                  <td>Sarana Belajar</td>
                                  <td><a href="{{ route('exp_sarana_belajar')}}" class="btn btn-primary my-3" target="_blank"><i class="fas fa-print"></i> Export</a></td>
                                </tr>
                                <tr>
                                  <td>13</td>
                                  <td>Asset Lain</td>
                                  <td><a href="{{ route('exp_asset_lain')}}" class="btn btn-primary my-3" target="_blank"><i class="fas fa-print"></i> Export</a></td>
                                </tr>
                                <tr>
                                  <td>14</td>
                                  <td>Data Asset</td>
                                  <td><a href="{{ route('exp_asset_tt')}}" class="btn btn-primary my-3" target="_blank"><i class="fas fa-print"></i> Export</a></td>
                                </tr>
                                <tr>
                                  <td>15</td>
                                  <td>Kategori Asset</td>
                                  <td><a href="{{ route('exp_kategori_tt')}}" class="btn btn-primary my-3" target="_blank"><i class="fas fa-print"></i> Export</a></td>
                                </tr>
                               
                            </table>
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