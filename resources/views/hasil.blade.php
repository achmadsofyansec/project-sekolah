@extends('layouts.auth_layout')
@section('page', 'Sign In')
@section('class-body', 'login-page')
@section('content-auth')
<section class="section pt-0 position-relative pull-top">
    <div class="container">
      <div class="rounded shadow p-5 bg-white">
      <br><br><br>
        <div class="row justify-content-center">
          <div class="col-lg-9">
              @if($dataCari != null)
              <div class="alert alert-success alert-dismissable" style="margin-top: -50px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Pencarian dengan nama <strong> Berhasil</strong> Ditemukan, Scroll Kebawah.
                  <!--<a href="#" class="alert-link">Alert Link</a>.-->
              </div>
              @endif
              <div class="main_title">
  
                <div class="card">
                  <h2 class="mb-3 mt-3">Hasil Pencarian</h2>
                </div>
                
                <!--<div class="card">
                  <div class="card-body">Basic card</div>
                </div>-->
                @if($dataCari != null)
                <div class="section-top-border">
                  <table class="table table-bordered table-sm">
                    <tbody>
                      <tr>
                        <td><span style="float: left;">No. Peserta</span></td>
                        <td><span style="float: left;">: {{ $dataCari->kode_ujian }}</span></td>
                      </tr>
                      <tr>
                        <td><span style="float: left;">Nama Siswa</span></td>
                        <td><span style="float: left;">: tes</span></td>
                      </tr>
                      <tr>
                        <td><span style="float: left;">Kompetensi Keahlian</span></td>
                        <td><span style="float: left;">: tes</span></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th style="width: 400px;"><span style="float: left;">Mata Pelajaran</span></td></th>
                          <th><span style="float: left;">Rerata Nilai Rapor</span></td></th>
                          <th><span style="float: left;">Nilai Ujian Satuan Pendidikan</span></th>
                          <th><span style="float: left;">Nilai Sekolah</span></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><strong>#</strong></td>
                          <td><span style="float: left;">&nbsp;<strong>Muatan Nasional</span></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;1.</span></td>
                          <td><span style="float: left;">&nbsp;Pendidikan Agama dan Budi Pekerti</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;{{Round($usp_pabp)}}</span></td>
                          <td><span style="float: left;">&nbsp;{{Round($ns_pabp)}}</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;2.</span></td>
                          <td><span style="float: left;">&nbsp;Pendidikan Kewarganegaraan</span></td>
                          <td><span style="float: left;">&nbsp;{{Round($nr_ppkn)}}</span></td>
                          <td><span style="float: left;">&nbsp;{{Round($usp_ppkn)}}</span></td>
                          <td><span style="float: left;">&nbsp;{{Round($ns_ppkn)}}</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;3.</span></td>
                          <td><span style="float: left;">&nbsp;Bahasa Indonesia</span></td>
                          <td><span style="float: left">&nbsp;{{Round($nr_bind)}}</span></td>
                          <td><span style="float: left">&nbsp;{{Round($usp_bind)}}</span></td>
                          <td><span style="float: left">&nbsp;{{Round($ns_bind)}}</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;4.</span></td>
                          <td><span style="float: left;">&nbsp;Matematika</span></td>
                          <td><span style="float: left">&nbsp;{{Round($nr_mtk)}}</span></td>
                          <td><span style="float: left">&nbsp;{{Round($usp_mtk)}}</span></td>
                          <td><span style="float: left">&nbsp;{{Round($ns_mtk)}}</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;5.</span></td>
                          <td><span style="float: left;">&nbsp;Sejarah Indonesia</span></td>
                          <td><span style="float: left">&nbsp;{{Round($nr_si)}}</span></td>
                          <td><span style="float: left">&nbsp;{{Round($usp_si)}}</span></td>
                          <td><span style="float: left">&nbsp;{{Round($ns_si)}}</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;6.</span></td>
                          <td><span style="float: left;">&nbsp;Bahasa Inggris</span></td>
                          <td><span style="float: left">&nbsp;{{Round($nr_bing)}}</span></td>
                          <td><span style="float: left">&nbsp;{{Round($usp_bing)}}</span></td>
                          <td><span style="float: left">&nbsp;{{Round($ns_bing)}}</span></td>
                        </tr>
                        <tr>
                          <td><strong>#</strong></td>
                          <td><span style="float: left;">&nbsp;<strong>Muatan Kewilayahan</span></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;1.</span></td>
                          <td><span style="float: left;">&nbsp;Seni Budaya</span></td>
                          <td><span style="float: left;">{{Round($nr_sbdy)}}</span></td>
                          <td><span style="float: left;">{{Round($usp_sbdy)}}</span></td>
                          <td><span style="float: left;">{{Round($ns_sbdy)}}</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;2.</span></td>
                          <td><span style="float: left;">&nbsp;Pendidikan Jasmani, Olahraga dan Kesehatan</span></td>
                          <td><span style="float: left;">{{Round($nr_penjas)}}</span></td>
                          <td><span style="float: left;">{{Round($usp_penjas)}}</span></td>
                          <td><span style="float: left;">{{Round($ns_penjas)}}</span></td>
                        </tr>
                        <tr>
                          <td><strong>#</strong></td>
                          <td><span style="float: left;">&nbsp;<strong>Muatan Lokal</span></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;1.</span></td>
                          <td><span style="float: left;">&nbsp;Bahasa Jawa</span></td>
                          <td><span style="float: left;">{{Round($nr_bjw)}}</span></td>
                          <td><span style="float: left;">{{Round($usp_bjw)}}</span></td>
                          <td><span style="float: left;">{{Round($ns_bjw)}}</span></td>
                        </tr>
                        <tr>
                          <td><strong>#</strong></td>
                          <td><span style="float: left;">&nbsp;<strong>Muatan Peminatan Kejuruan</span></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;1.</span></td>
                          <td><span style="float: left;">&nbsp;Simulasi dan Komunikasi Digital</span></td>
                          <td><span style="float: left;">{{Round($nr_simdig)}}</span></td>
                          <td><span style="float: left;">{{Round($usp_simdig)}}</span></td>
                          <td><span style="float: left;">{{Round($ns_simdig)}}</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;2.</span></td>
                          <td><span style="float: left;">&nbsp;Fisika</span></td>
                          <td><span style="float: left;">{{Round($nr_fis)}}</span></td>
                          <td><span style="float: left;">{{Round($usp_fis)}}</span></td>
                          <td><span style="float: left;">{{Round($ns_fis)}}</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;3.</span></td>
                          <td><span style="float: left;">&nbsp;Kimia</span></td>
                          <td><span style="float: left;">{{Round($nr_kim)}}</span></td>
                          <td><span style="float: left;">{{Round($usp_kim)}}</span></td>
                          <td><span style="float: left;">{{Round($ns_kim)}}</span></td>
                        </tr>
                        </tr>
                        @if($dataCari->k_keahlian == "Agribisnis Perikanan Air Tawar")
                        <tr>
                          <td><span style="float: left;">&nbsp;4.</span></td>
                          <td><span style="float: left;">&nbsp;Biologi</span></td>
                          <td><span style="float: left;">{{Round($nr_bio)}}</span></td>
                          <td><span style="float: left;">{{Round($usp_bio)}}</span></td>
                          <td><span style="float: left;">{{Round($ns_bio)}}</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;5.</span></td>
                          <td><span style="float: left;">&nbsp;Dasar Program Keahlian</span></td>
                          <td><span style="float: left;">{{Round($nr_dasar_pk)}}</span></td>
                          <td><span style="float: left;">{{Round($usp_dasar_pk)}}</span></td>
                          <td><span style="float: left;">{{Round($ns_dasar_pk)}}</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;6.</span></td>
                          <td><span style="float: left;">&nbsp;Paket Keahlian</span></td>
                          <td><span style="float: left;">{{Round($nr_paket_k)}}</span></td>
                          <td><span style="float: left;">{{Round($usp_paket_k)}}</span></td>
                          <td><span style="float: left;">{{Round($ns_paket_k)}}</span></td>
                        </tr>
                        @endif
                        @if($dataCari->k_keahlian != "Agribisnis Perikanan Air Tawar")
                        
                        <tr>
                          <td><span style="float: left;">&nbsp;4.</span></td>
                          <td><span style="float: left;">&nbsp;Dasar Program Keahlian</span></td>
                          <td><span style="float: left;">{{Round($nr_dasar_pk)}}</span></td>
                          <td><span style="float: left;">{{Round($usp_dasar_pk)}}</span></td>
                          <td><span style="float: left;">{{Round($ns_dasar_pk)}}</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;5.</span></td>
                          <td><span style="float: left;">&nbsp;Paket Keahlian</span></td>
                          <td><span style="float: left;">{{Round($nr_paket_k)}}</span></td>
                          <td><span style="float: left;">{{Round($usp_paket_k)}}</span></td>
                          <td><span style="float: left;">{{Round($ns_paket_k)}}</span></td>
                        @endif
                        
                      </tbody>
                    </table>
                  </div>
                  @if($dataCari->status == "Lulus")
                  <div class="alert alert-success">
                    Anda Dinyatakan <strong>LULUS</strong> Ujian</a>.
                  </div>
                  <div style="float: left;">
                    <a target="_blank" href="" class="btn btn-success"><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak SKL</a>
                  </div>
                  @endif
                  @if($dataCari->status == "Tidak Lulus")
                  <div class="alert alert-danger">
                    Anda Dinyatakan <strong>TIDAK LULUS</strong> Ujian</a>.
                  </div>
                  <div style="float: left;">
                    <a href="{{URL('/')}}" class="btn btn-danger">
                      <i class="fa fa-sign-out"></i>
                      &nbsp;&nbsp;Kembali Ke Home
                    </a>
                  </div>
                  @endif
                </div>
              </div>
            </div>
          @endif
          @if($dataCari == null)
            <div class="alert alert-danger mt-3">
                Data <strong>Tidak Ditemukan <a href="{{URL('/')}}">Kembali Cari</a></strong></a>.
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
  
      </div>
@endsection