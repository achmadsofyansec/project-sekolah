<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="{{asset('template/dashboard/assets/images/favicon.ico')}}">
<title>Cetak SKL</title>
</head>
<style type="text/css">
/* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Arial Narrow";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 335.7mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0);
    }
    .subpage {
        padding: 1cm;
        border: 5px white solid;
        height: 330mm;
        outline: 0cm white solid;
    }
    
    @page {
        size: legal;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 335.7mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }


</style>
<body>
                
<div class="book">
    <div class="page">
        <div class="subpage">
          {{-- <img style="margin-left: -118px; margin-top: -115px;" src="{{asset('public/bahanSKL/kop.PNG')}}"> --}}
          <p style="margin-left: -80px; margin-right: -90px; margin-bottom: 0px; margin-top: 5px;">
            Yang bertanda tangan di bawah ini, Kepala  Sekolah Menengah Kejuruan Negeri 2 Madiun, Menerangkan bahwa :
          </p>
          <table style="margin-left: -55px; margin-top: 10px;">
              <tr>
                  <td style="width: 110px;">Nama</td>
                  <td style="width: 20px;">:</td>
                  <td>{{$dataCari->nama}}</td>
              </tr>
              <tr>
                  <td style="width: 110px;">Tempat Tanggal Lahir</td>
                  <td style="width: 20px;">:</td>
                  <td>{{$dataCari->tgl_lhr}}</td>
              </tr>
              <tr>
                  <td style="width: 110px;">Nomor Induk</td>
                  <td style="width: 20px;">:</td>
                  <td>{{$dataCari->nik}}</td>
              </tr>
              <tr>
                  <td style="width: 210px;">Nomor Induk Siswa Nasional</td>
                  <td style="width: 20px;">:</td>
                  <td>{{$dataCari->nisn}}</td>
              </tr>
              <tr>
                  <td style="width: 110px;">Kempetensi Keahlian</td>
                  <td style="width: 20px;">:</td>
                  <td>{{$dataCari->kode_jurusan}}</td>
              </tr>
          </table>
          <p style="margin-left: -80px; margin-right: -90px; margin-bottom: 6px; margin-top: 6px;">
            Telah mengikuti dan LULUS Ujian Sekolah yang di selenggarakan pada tanggal  24 Februari sampai 06 Maret 2022 dengan hasil sebagai berikut :
          </p>
          <style type="text/css">
              .table1{
                border-collapse: collapse;
              }
              .table1_1{
                border: 1px solid black;
                text-align: center;
              }
              .table1_2{
                border: 1px solid black;
              }
          </style>
          <table style="margin-left: -80px; margin-right: -80px;" class="table1"> 
            <tr>
                <th style="width: 40px; padding: 8px;" class="table1_1">No</th>
                <th style="width: 325px; padding: 8px;" class="table1_1">Mata Pelajaran</th>
                <th style="padding: 8px; width: 110px;" class="table1_1">Nilai Rata-rata Rapor (NR)</th>
                <th style="padding: 8px; width: 140px;" class="table1_1">Nilai Ujian Satuan Pendidikan (NUSP)</th>
                <th style="padding: 8px; width: 110px;" class="table1_1">Nilai Sekolah (NS)</th>
            </tr>
          </table>
          <table style="margin-top: -1px; margin-left: -80px; margin-right: -80px;" class="table1"> 
            <tr>
                <th style="width: 800px; padding: 8px; text-align: left;" class="table1_1">Muatan Nasional</th>
            </tr>
          </table>
          <table style="margin-top: -1px; margin-left: -80px; margin-right: -80px;" class="table1">
            <tr>
                <td style="width: 40px; padding: 8px;" class="table1_1">1.</th>
                <td style="width: 325px; padding: 8px;" class="table1_2">Pendidikan Agama dan Budi Pekerti</th>
                <td style="padding: 8px; width: 110px;" class="table1_1"></th>
                <td style="padding: 8px; width: 140px;" class="table1_1"></td>
                <td style="padding: 8px; width: 110px;" class="table1_1"></td>
            </tr>
            <tr>
                <td style="width: 40px; padding: 8px;" class="table1_1">2.</th>
                <td style="width: 325px; padding: 8px;" class="table1_2">Pendidikan Pancasila dan Kewarganegaraan</th>
                <td style="padding: 8px; width: 110px;" class="table1_1"></td>
                <td style="padding: 8px; width: 140px;" class="table1_1"></td>
                <td style="padding: 8px; width: 110px;" class="table1_1"></td>
            </tr>
            <tr>
                <td style="width: 40px; padding: 8px;" class="table1_1">3.</th>
                <td style="width: 325px; padding: 8px;" class="table1_2">Bahasa Indonesia</th>
                <td style="padding: 8px; width: 110px;" class="table1_1"></td>
                <td style="padding: 8px; width: 140px;" class="table1_1"></td>
                <td style="padding: 8px; width: 110px;" class="table1_1"></td>
            </tr>
            <tr>
                <td style="width: 40px; padding: 8px;" class="table1_1">4.</th>
                <td style="width: 325px; padding: 8px;" class="table1_2">Matematika</th>
                <td style="padding: 8px; width: 110px;" class="table1_1"></td>
                <td style="padding: 8px; width: 140px;" class="table1_1"></th>
                <td style="padding: 8px; width: 110px;" class="table1_1"></td>
            </tr>
            <tr>
                <td style="width: 40px; padding: 8px;" class="table1_1">5.</th>
                <td style="width: 325px; padding: 8px;" class="table1_2">Bahasa Inggris</th>
                <td style="padding: 8px; width: 10px;" class="table1_1"></td>
                <td style="padding: 8px; width: 140px;" class="table1_1"></td>
                <td style="padding: 8px; width: 110px;" class="table1_1"></td>
            </tr>
          </table>
          <table style="margin-top: -1px; margin-left: -80px; margin-right: -80px;" class="table1"> 
            <tr>
                <th style="width: 800px; padding: 8px; text-align: left;" class="table1_1">Muatan Peminatan Kejuruan</th>
            </tr>
          </table>
          <table style="margin-top: -1px; margin-left: -80px; margin-right: -80px;" class="table1">
            <tr>
                <td style="width: 40px; padding: 8px;" class="table1_1">1.</th>
                <td style="width: 325px; padding: 8px;" class="table1_2">Pemograman Berorientasi Objek (PBO)</th>
                <td style="padding: 8px; width: 110px;" class="table1_1"></th>
                <td style="padding: 8px; width: 140px;" class="table1_1"></th>
                <td style="padding: 8px; width: 110px;" class="table1_1"></th>
            </tr>
            <tr>
                <td style="width: 40px; padding: 8px;" class="table1_1">2.</th>
                <td style="width: 325px; padding: 8px;" class="table1_2">Basis Data (BD)</th>
                <td style="padding: 8px; width: 110px;" class="table1_1"></th>
                <td style="padding: 8px; width: 140px;" class="table1_1"></th>
                <td style="padding: 8px; width: 110px;" class="table1_1"></th>
            </tr>
            <tr>
                <td style="width: 40px; padding: 8px;" class="table1_1">2.</th>
                <td style="width: 325px; padding: 8px;" class="table1_2">Basis Data (BD)</th>
                <td style="padding: 8px; width: 110px;" class="table1_1"></th>
                <td style="padding: 8px; width: 140px;" class="table1_1"></th>
                <td style="padding: 8px; width: 110px;" class="table1_1"></th>
            </tr>
            <tr>
                <td style="width: 40px; padding: 8px;" class="table1_1">3.</th>
                <td style="width: 325px; padding: 8px;" class="table1_2">Pemograman Web & Perangkat Bergerak (PWPB)</th>
                <td style="padding: 8px; width: 110px;" class="table1_1"></th>
                <td style="padding: 8px; width: 140px;" class="table1_1"></th>
                <td style="padding: 8px; width: 110px;" class="table1_1"></th>
            </tr>
            <tr>
                <td style="width: 40px; padding: 8px;" class="table1_1">4.</th>
                <td style="width: 325px; padding: 8px;" class="table1_2">Produk Kreatif dan Kewirausahaan (PKK)</th>
                <td style="padding: 8px; width: 110px;" class="table1_1"></th>
                <td style="padding: 8px; width: 140px;" class="table1_1"></th>
                <td style="padding: 8px; width: 110px;" class="table1_1"></th>
            </tr>
          </table>
          <table style="margin-top: 2px; margin-left: -80px; margin-right: -80px;" class="table1"> 
            
          </table>
          <p style="margin-left: -80px; margin-right: -90px; margin-top: 0px;">
            Surat Keterangan Lulus ini dapat di gunakan sesuai dengan kebutuhan, berlaku 6 bulan sejak 02 Mei 2020 sampai dengan 02 Nopember 2020 atau sampai terbitnya ijazah asli.
          </p>
          <br>
          {{-- <img style="margin-left: -118px; margin-top: -10px;" src="{{asset('public/bahanSKL/bawah.PNG')}}"> --}}
        </div>    
    </div>

</div>
</body>
</html>
{{-- <script type="text/javascript">window.print();</script> --}}