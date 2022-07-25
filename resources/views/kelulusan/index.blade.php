@extends('layouts.auth_layout')
@section('page', 'Kelulusan')
@section('class-body', 'login-page')
@section('content-auth')
<div class="wrapper">
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <br>
                <br>
                <br>
                <div class="widget-user-image">
                  <img class="profile-user-img  elevation-2" >
                </div>
                <br>
                <br>
                <br>
                <div class="description-block mt-4">
                  <h4 class="m-0 text-white" style="text-shadow: 2px 2px 4px #black;">
                    <b>
                      nama seokolah
                    </b>
                  </h4>
                  <span class="description-text">
                    <b>SISTEM INFORMASI KELULUSAN
                      <br>TAHUN 
                      2022
                    </b>
                  </span>
                </div>
              </div>
              <div class="card-body" >
                <div id="clock" class="lead text-uppercase" style="font-weight:bold;color:red;">
                </div>
                <div class="row"id="xpengumuman" >
                  <div class="col-md-12">
                    nomor
                    <div class="row">
                      <div class="col-md-4">
                      <!-- Widget: user widget style 2 -->
                      <div class="card card-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="card-footer p-0">
                          <ul class="nav flex-column ">
                            <li class="nav-item bg-navy">
                              <a href="#" class="nav-link">
                                <i class="fad fa-bookmark"></i>
                                <b>INFORMASI</b>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link text-danger">
                                informasi_kelulusan 
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                informasi_lain 
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>

                        <a class="btn btn-danger btn-block float-right"><i class="fa fa-undo"> </i> Kembali</a>
                        <!-- /.widget-user -->
                      </div>
                      <div class="col-md-8">
                            <table class="table table-bordered table-hover table-striped dataTable no-footer responsive">
                              <tr>
                                <td>
                                  <b>Nomor Ujian</b>
                                    </td>
                                <td>
                                  <b>
                                    no_ujian</b>
                                    </td>
                              </tr>
                              <tr>
                                <td>
                                  <b>Nama Siswa</b>
                                    </td>
                                <td><b>
                                  nama_siswa</b>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <b>Jurusan</b>
                                    </td>
                                <td class="text-uppercase"><b>
                                  jurusan</b>
                                </td>
                              </tr>
                            </table>
                            <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped dataTable no-footer ">
                              <thead>
                                <tr class="bg-navy text-center">
                                  <th colspan="4">HASIL NILAI UN
                                  </th>
                                </tr>
                                <tr class="bg-info text-center">
                                  <th>Bahasa Indonesia
                                  </th>
                                  <th>Bahasa Inggris
                                  </th>
                                  <th>Matematika
                                  </th>
                                  <th>Kejuruan
                                  </th>
                                </tr>
                              </thead>
                              <tbody class="text-center text-navy">
                                <td class="text-danger">
                                  <b>nilai_indo</b>
                                </td>
                                <td class="text-danger">
                                  <b>nilai_eng</b>
                                </td>
                                <td class="text-danger">
                                  <b>nilai_mtk</b>
                                </td>
                                <td class="text-danger">
                                  <b>nilai_kejurusan</b>
                                </td>
                              </tbody>
                            </table>
                            </div>
                      
                      <div class="row">
                      <div class="col-md-4">
                      </div> 
                      <div class="col-md-4">
                        <div class="card card-widget widget-user">
                          <!-- Add the bg color to the header using any of the bg-* classes -->
                          <div class="widget-user-header bg-info">
                            <h3 class="widget-user-username">
                              <b>DATA INFORMASI KELULUSAN
                              </b>
                            </h3>
                            <h5 class="widget-user-desc">
                              <hr>
                            </h5>
                          </div>
                          <div class="widget-user-image">
                            <img class="img-rounded elevation-2">
                          </div>
                          <br>
                          <div class="card-footer">
                            <div class="row">
                              <form class="lockscreen-credentials">
                                <div class=t" name="nomor" class="form-control bg-navy text-white btn-lg" data-mask="9-99-99-99-9999-9999-9" placeholder="Nomor Ujian" required>
                                  <div class="input-group-append">
                                    <button type="submit" name="submit" class="btn bg-warning ">
                                      <i class="fas fa-arrow-right text-muted">
                                      </i>
                                    </button>
                                  </div>
                                </div>
                                <font size="1" class="text-navy" style="text-shadow: 2px 2px 4px #827e7e">
                                  <i>*  Silakan Masukan Nomor Peserta Ujian 
                                  </i>
                                </font>
                                <br>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                      </div> 
                    </div>
                      </div>

                    </div>
                                      </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <hr>
              <div class="row" >
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                </div>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <div class="col-md-2" >
          </div>
        </div>
@endsection