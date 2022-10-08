@extends('layouts.app')
@section('page', 'Sanitasi')
@section('content-app')
<div class="content-wrapper">
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> @yield('page')</h1>
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
<div class="content">
  <div class="container-fluid">
    <div class="row-mb-2">
      <div class="row">
        <div class="col-md-8 mt-1">
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
          <div class="card card-success card-outline">
            <div class="card-header">
              <h1 class="card-title"><i class="nav-icon fas fa-school text-success"></i> Data Sanitasi</h1>
            </div>
          <form action="{{route('sanitasi.update',$data->id_sanitasi)}}" enctype="multipart/form-data" method="POST">
              @csrf
              @method('PUT')
            <div class="card-body">
                <div class="form-group">    
                  <label>Sumber Air Bersih</label>
                  <select name="sumber_air_bersih" id="sumber_air_bersih" class="form-control">
                    <option value="">{{ $data->sumber_air_bersih }}</option>
                    <option value="Air PAM">Air PAM</option>
                    <option value="Air Kemasan">Air Kemasan</option>
                    <option value="Sumur">Sumur</option>
                    <option value="Pompa">Pompa</option>
                    <option value="Lainnya">Lainnya</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Sumber Air Minum</label>
                  <select name="sumber_air_minum" id="sumber_air_minum" class="form-control">
                    <option value="">{{ $data->sumber_air_minum }}</option>
                    <option value="Disediakan Oleh Madrasah">Disediakan Oleh Madrasah</option>
                    <option value="Disediakan Oleh Siswa">Disediakan Oleh Siswa</option>
                    <option value="Tidak ada">Tidak ada</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Kecukupan Air Bersih</label>
                  <select name="kecukupan_air_bersih" id="kecukupan_air_bersih" class="form-control">
                    <option value="">{{ $data->kecukupan_air_bersih }}</option>
                    <option value="Cukup Setiap Saat">Cukup Setiap Saat</option>
                    <option value="Cukup Tapi Tidak Setiap Saat">Cukup Tapi Tidak Setiap Saat</option>
                    <option value="Tidak Cukup">Tidak Cukup</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Madarasah Menyediakan Jamban Yang Dilengkapi Fasilitas Pendukung Untuk Siswa Berkebutuhan Khusus</label>
                  <select name="fasilitas_jamban_khusus" id="fasilitas_jamban_khusus" class="form-control">
                    <option value="">{{ $data->fasilitas_jamban_khusus }}</option>
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Tipe toilet yang dimiliki madrasah</label>
                  <select name="tipe_toilet" id="tipe_toilet" class="form-control">
                    <option value="">{{ $data->tipe_toilet }}</option>
                    <option value="Leher agsa ( jamban duduk/jongkok )">Leher agsa ( jamban duduk/jongkok )</option>
                    <option value="Cubluk dengan tutup">Cubluk dengan tutup</option>
                    <option value="Tidak ada jamban">Tidak ada jamban</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Madrasah menyediakan pembalut cadangan?</label>
                  <select name="pembalut_cadangan" id="pembalut_cadangan" class="form-control">
                    <option value="">{{ $data->pembalut_cadangan }}</option>
                    <option value="Meyediakan tetapi siswi harus membeli">Meyediakan tetapi siswi harus membeli</option>
                    <option value="Menyediakan dengan cara memberikan secara gratis">Menyediakan dengan cara memberikan secara gratis</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Jumlah hari dalam seminggu siswa mengikuti kegiatan cuci tangan</label>
                  <input type="number" value="{{ $data->cuci_tangan }}" name="cuci_tangan" id="cuci_tangan" class="form-control" placeholder="0">
                </div>
                <div class="form-group">    
                  <label>Jumlah tempat cuci tangan yang ada di madrasah dalam kondisi baik</label>
                  <input type="number" value="{{ $data->jumlah_cuci_tangan_kb }}" name="jumlah_cuci_tangan_kb" id="jumlah_cuci_tangan_kb" class="form-control" placeholder="0">
                </div>
                <div class="form-group">    
                  <label>Jumlah tempat cuci tangan yang ada di madrasah dalam kondisi rusak</label>
                <input type="number" value="{{ $data->jumlah_cuci_tangan_kr }}" name="jumlah_cuci_tangan_kr" id="jumlah_cuci_tangan_kr" class="form-control" placeholder="0">
                </div>
                <div class="form-group">    
                  <label>Apakah sabun dan air menggalir tersedia di tempat cuci tangan?</label>
                  <select name="jumlah_sabun_cuci_tangan" id="jumlah_sabun_cuci_tangan" class="form-control">
                    <option value="">{{ $data->jumlah_sabun_cuci_tangan }}</option>
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Madrasah memiliki saluran pembuangan air limbah dari jamban?</label>
                  <select name="pembuangan_limbah" id="pembuangan_limbah" class="form-control">
                    <option value="">{{ $data->pembuangan_limbah }}</option>
                    <option value="Ada saluran pembuangan air limbah ke tangki septik atau IPAL">Ada saluran pembuangan air limbah ke tangki septik atau IPAL</option>
                    <option value="Ada saluran pembuangan air limbah ke selokan/kali/sungai">Ada saluran pembuangan air limbah ke selokan/kali/sungai</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Madrasah pernah menguras tangki septik tank dalam 3 hingga 5 tahun terakhir dengan truk / motor sedot tinja?</label>
                  <select name="waktu_pembuagan_limbah" id="waktu_pembuagan_limbah" class="form-control">
                    <option value="">{{ $data->waktu_pembuagan_limbah }}</option>
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Madrasah memiliki selokan untuk mengindari genangan air?</label>
                  <select name="selokan_air" id="selokan_air" class="form-control">
                    <option value="">{{ $data->selokan_air }}</option>
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Madrasah menyediakan tempat sampah di setiap ruang kelas?</label>
                  <select name="tempat_sampah_kelas" id="tempat_sampah_kelas" class="form-control">
                    <option value="">{{ $data->tempat_sampah_kelas }}</option>
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Madrasah menyediakan tempat sampah tertutup di setiap unit jamban perempuan?</label>
                  <select name="tempat_sampah_tertutup" id="tempat_sampah_tertutup" class="form-control">
                    <option value="">{{ $data->tempat_sampah_tertutup }}</option>
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Madrasah menyediakan cermin di setiap unit jamban perempuan?</label>
                  <select name="cermin" id="cermin" class="form-control">
                    <option value="">{{ $data->cermin }}</option>
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Madrasah memiliki tempat pembuangan sampah sementara (TPS) yang tertutup?</label>
                  <select name="tps" id="tps" class="form-control">
                    <option value="">{{ $data->tps }}</option>
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Sampah dari tempat pembuangan sementara diangkut secara rutin?</label>
                  <select name="pengangkatan_sampah" id="pengangkatan_sampah" class="form-control">
                    <option value="">{{ $data->pengangkatan_sampah }}</option>
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Anggaran untuk pengagankatan sampah</label>
                  <select name="anggaran_pemeliharaan" id="anggaran_pemeliharaan" class="form-control">
                    <option value="">{{ $data->anggaran_pemeliharaan }}</option>
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Ada kegiatan rutin yang melibatkan siswa untuk memelihara dan merawat fasilitas sanitasi dari madrasah?</label>
                  <select name="kegiatan_rutin" id="kegiatan_rutin" class="form-control">
                    <option value="">{{ $data->kegiatan_rutin }}</option>
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Ada kemitraan dengan pihak luar untuk sanitasi madrasah?</label>
                  <select name="kemitraan_sekolah" id="kemitraan_sekolah" class="form-control">
                    <option value="">{{ $data->kemitraan_sekolah }}</option>
                    <option value="Ada dengan pemerintah daerah">Ada dengan pemerintah daerah</option>
                    <option value="Ada dengan pukesmas">Ada dengan pukesmas</option>
                    <option value="Ada dengan perusahaan swasta">Ada dengan perusahaan swasta</option>
                    <option value="Ada dengan lembaga non-pemerintahan">Ada dengan lembaga non-pemerintahan</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="form-group">    
                  <label>Apakah jamban yang ada dipisahkan antara laki dan perempuan?</label>
                  <select name="pemisahan_jamban" id="pemisahan_jamban" class="form-control">
                    <option value="">{{ $data->pemisahan_jamban }}</option>
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                  </select>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label>Jumlah jamban baik Laki-laki</label>
                    <div class="form-group">
                      <input type="number" value="{{ $data->jumlah_jamban_baik_lk }}" name="jumlah_jamban_baik_lk" id="jumlah_jamban_baik_lk" class="form-control" placeholder="0">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Jumlah jamban baik Perempuan</label>
                      <input type="text" value="{{ $data->jumlah_jamban_baik_pr }}" name="jumlah_jamban_baik_pr" id="jumlah_jamban_baik_pr" class="form-control" placeholder="0">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Jumlah jamban baik bersama</label>
                      <input type="number" value="{{ $data->jumlah_jamban_baik_br }}" name="jumlah_jamban_baik_br" id="jumlah_jamban_baik_br" class="form-control" placeholder="0">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label>Jumlah jamban Rusak Laki-laki</label>
                    <div class="form-group">
                      <input type="number" value="{{ $data->jumlah_jamban_rusak_lk }}" name="jumlah_jamban_rusak_lk" id="jumlah_jamban_rusak_lk" class="form-control" placeholder="0">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Jumlah jamban Rusak Perempuan</label>
                      <input type="number" value="{{ $data->jumlah_jamban_rusak_pr }}" name="jumlah_jamban_rusak_pr" id="jumlah_jamban_rusak_lk" class="form-control" placeholder="0">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Jumlah jamban Rusak bersama</label>
                      <input type="number" value="{{ $data->jumlah_jamban_rusak_br }}" name="jumlah_jamban_rusak_br" id="jumlah_jamban_rusak_br" class="form-control" placeholder="0">
                    </div>
                  </div>
                </div>                
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
            </div>
            </form>
          </div>
        </div>
        <div class="col-md-4 mt-1">
          <div class="card card-success card-outline">
            <div class="card-header">
              <h1 class="card-title"> <span class="badge badge-danger"><i class="fas fa-angle-right right"></i></span> Petunjuk</h1>
            </div>
            <div class="card-body">
              <p>1. isi <b>Identitas Sekolah</b> Dengan Baik dan Benar.</p>
              <p>2. Simpan Perubahan Dengan Cara Menekan <b>Tombol Simpan</b>  Yang berada di bawah Form</p>
            </div>
            <div class="card-footer">
              Untuk <b>Keterangan dan Informasi</b>  lebih lanjut silahkan hubungi Bagian <b>IT (Information & Technology)</b> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection