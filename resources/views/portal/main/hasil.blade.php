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
  
                
                
                <!--<div class="card">
                  <div class="card-body">Basic card</div>
                </div>-->
                @if($dataCari != null)
                <div class="section-top-border">
                  <table class="table table-bordered table-sm">
                    <tbody>
                      <tr>
                        <td><span style="float: left;">No. Peserta</span></td>
                        <td><span style="float: left;">: {{ $dataCari->kode_ujian }} </span></td>
                      </tr>
                      <tr>
                        <td><span style="float: left;">Nama Siswa</span></td>
                        <td><span style="float: left;">: {{ $dataCari->nama }} </span></td>
                      </tr>
                      <tr>
                        <td><span style="float: left;">Kompetensi Keahlian</span></td>
                        <td><span style="float: left;">: {{ $dataCari->kode_jurusan }}</span></td>
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
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;2.</span></td>
                          <td><span style="float: left;">&nbsp;Pendidikan Pancasila dan Kewarganegaraan</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;3.</span></td>
                          <td><span style="float: left;">&nbsp;Bahasa Indonesia</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;4.</span></td>
                          <td><span style="float: left;">&nbsp;Matematika</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;5.</span></td>
                          <td><span style="float: left;">&nbsp;Bahasa Inggris</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
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
                          <td><span style="float: left;">&nbsp;Pemograman Berorientasi Objek (PBO)</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;2.</span></td>
                          <td><span style="float: left;">&nbsp;Basis Data (BD)</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;3.</span></td>
                          <td><span style="float: left;">&nbsp;Pemograman Web & Perangkat Bergerak (PWPB)</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                        </tr>
                        <tr>
                          <td><span style="float: left;">&nbsp;4.</span></td>
                          <td><span style="float: left;">&nbsp;Produk Kreatif dan Kewirausahaan (PKK)</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                          <td><span style="float: left;">&nbsp;</span></td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  @if($dataCari->status == "Lulus")
                  <div class="alert alert-success">
                    Anda Dinyatakan <strong>LULUS</strong> Ujian</a>.
                  </div>
                  <div style="float: left;">
                    <a target="_blank" href="{{URL('/cetak/'.$dataCari->kode_ujian)}}" class="btn btn-success"><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak SKL</a>
                    <a href="{{  URL('/portal') }}" class="btn btn-danger">&nbsp;&nbsp;Kembali</a>
                  </div>
                  @endif
                  @if($dataCari->status == "Tidak Lulus")
                  <div class="alert alert-danger">
                    Anda Dinyatakan <strong>TIDAK LULUS</strong> Ujian</a>.
                  </div>
                  <div style="float: left;">
                    <a href="{{URL('/portal')}}" class="btn btn-danger">
                      <i class="fa fa-sign-out"></i>
                      &nbsp;&nbsp;Kembali Ke Home
                    </a>
                  </div>
                  @endif
                </div>
                @endif
              </div>
            </div>
          
          @if($dataCari == null)
            <div class="alert alert-danger mt-3">
                Data <strong>Tidak Ditemukan <a href="{{URL('/portal')}}">Kembali Cari</a></strong></a>.
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
  
      </div>
@endsection