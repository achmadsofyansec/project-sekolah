@extends('layouts.app')
@section('page', 'Dashboard')
@section('content-app')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <div class="content-header animated fadeInDown">
      <div class="container-fluid" >
        <div class="row mb-2" id="cetak">
          <div class="col-sm-12 mt-2">
            <div class="card">
              <center><h1 class="m-0 text-dark mt-3" style="text-shadow: 2px 2px 4px #17a2b8;">
              <img src="" alt="Logo" class="brand-image img-rounded " style="width:50px;height:50px;">
               <br>nama_sekolah</h1>
              alamat_sekolah<br>
              $website</center>
              <hr>
              <div class="container-fluid">
                <div class="row">
                  <!-- DATA KELAS -->
                  <div class="col-md-12">
                      <div class="card-body p-0">
                      <div class="row col-12 col-12 col-sm-12 col-md-12">

                      <div class="col-md-3 mt-2">
                    <div class="card card-info card-outline">
                      <div class="card-header">
                                <i class="card-title"></i><center><b>FOTO SISWA</b></center>
                        </div>
                      <div class="row ml-1 mr-1">
                        <div class="card-body">
                              <center>
                                </center>
                                </div>
                        </div>
                    </div>
                  </div>
                      <div class="col-md-9 mt-2">
                    <div class="card card-info card-outline">
                      <div class="card-header">
                                <i class="card-title"></i><center><b>DATA DIRI SISWA</b></center>
                        </div>
                        <table class="table table-striped text-sm table-sm">
                        <tr>
                                        <td style="width:200px;font-weight:bold;">NIS</td>
                                        <td style="width:10px;">:</td>
                                        <td>nis</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">NISN</td>
                                        <td>:</td>
                                        <td>nisn</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Nama Siswa</td>
                                        <td>:</td>
                                        <td>nama_siswa</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Jenis Kelamin</td>
                                        <td>:</td>
                                        <td>jenis_kelamin</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Tempat, Tanggal Lahir</td>
                                        <td>:</td>
                                        <td>tempat_lahir,tanggal_lahir</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">No Handphone</td>
                                        <td>:</td>
                                        <td>hp</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Telepon</td>
                                        <td>:</td>
                                        <td>telepon</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Email</td>
                                        <td>:</td>
                                        <td>email</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Alamat</td>
                                        <td>:</td>
                                        <td>alamat_jalan</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Kelurahan</td>
                                        <td>:</td>
                                        <td>kelurahan</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Kecamatan</td>
                                        <td>:</td>
                                        <td>kecamatan</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Agama</td>
                                        <td>:</td>
                                        <td>agama</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Angkatan</td>
                                        <td>:</td>
                                        <td>angkatan</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Kelas</td>
                                        <td>:</td>
                                        <td>nama_kelas</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Status</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
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
          </div><!-- /.col -->
          <div class="card-footer mb-2 text-right">
                <div class="btn-group btn-group-sm">
                  <a class="btn btn-danger float-right" href="../siswa/siswa"><i class="fa fa-undo"> </i> Kembali</a>
                  <button class="btn bg-navy float-right" onclick="printDiv('cetak')"><i class="fa fa-print" target="_blank" > </i> Cetak</button>
                  
                </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
  </div>
  @endsection