@extends('layouts.app')
@section('page', 'Dashboard')
@section('content-app')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @foreach ($tentang as $item2)
    <!-- Content Header (Page header) -->
    <div class="content-header animated fadeInDown">
      <div class="container-fluid" >
        <div class="row mb-2" id="cetak">
          <div class="col-sm-12 mt-2">
            <div class="card">
              <center><h1 class="m-0 text-dark mt-3" style="text-shadow: 2px 2px 4px #17a2b8;">
              <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/asis/upload/logo.png'; ?>" alt="Logo" class="brand-image img-rounded " style="width:50px;height:50px;">
               <br><?php echo $item2['nama_sekolah']; ?></h1>
              <?php echo $item2['alamat']; ?><br>
              <?php echo $item2['website']; ?></center>
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
                      @foreach($siswa as $item)
                              <center>
                               <?php if (!empty($item2['foto'])) { ?>
                                        <img class="img-rounded elevation-2" style="width:180px;height:250px;" alt="User Image" src="<?php echo '../../../akademik/upload/siswa/' . $foto; ?>" alt="<? echo $item['nama_siswa']?>">
                                    <?php } else { ?>
                                        <img class="img-rounded elevation-2" style="width:180px;height:250px;" alt="User Image" src="<?php echo '../../../akademik/upload/user.jpg'; ?>" alt="<?php echo $item['nama_siswa'] ?>">
                                    <?php } ?>
                                </center>
                                </div>
                        </div>
                    </div>
                    @endforeach
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
                                        <td><?php echo $item['nis']?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">NISN</td>
                                        <td>:</td>
                                        <td><?php echo $item['nisn']?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Nama Siswa</td>
                                        <td>:</td>
                                        <td><?php echo $item['nama_siswa'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Jenis Kelamin</td>
                                        <td>:</td>
                                        <td><?php echo $item['jenis_kelamin'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Tempat, Tanggal Lahir</td>
                                        <td>:</td>
                                        <td><?php echo $item['tempat_lahir'] . ', ' . $item['tanggal_lahir']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">No Handphone</td>
                                        <td>:</td>
                                        <td><?php echo $item['hp']?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Telepon</td>
                                        <td>:</td>
                                        <td><?php echo $item['telepon']?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Email</td>
                                        <td>:</td>
                                        <td><?php echo $item['email']?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Alamat</td>
                                        <td>:</td>
                                        <td><?php echo $item['alamat_jalan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Kelurahan</td>
                                        <td>:</td>
                                        <td><?php echo $item['kelurahan']?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Kecamatan</td>
                                        <td>:</td>
                                        <td><?php echo $item['kecamatan']?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Agama</td>
                                        <td>:</td>
                                        <td><?php echo $item['agama']?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Angkatan</td>
                                        <td>:</td>
                                        <td><?php echo $item['angkatan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Kelas</td>
                                        <td>:</td>
                                        <td><?php echo $item['nama_kelas']?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Status</td>
                                        <td>:</td>
                                        <td><?php if ($item['aktif_siswa'] == '1') echo 'AKTIF';
                                            else echo 'TIDAK AKTIF'; ?></td>
                                    </tr>
                      </table>
                    </div>
                  </div>                 
                </div>
                                  @endforeach


                    </div>
                    </div>
                  </div>
                  
                
                </div>
              </div>
            </div>
          </div><!-- /.col -->
          <div class="card-footer mb-2 text-right">
                <div class="btn-group btn-group-sm">
                  <a class="btn btn-danger float-right" href="<?php echo url('/') . 'siswa/siswa/' . $item['id_kelas'] ?>"><i class="fa fa-undo"> </i> Kembali</a>
                  <button class="btn bg-navy float-right" onclick="printDiv('cetak')"><i class="fa fa-print" target="_blank" > </i> Cetak</button>
                  
                </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
  </div>
  @endsection