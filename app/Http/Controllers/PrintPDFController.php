<?php

namespace App\Http\Controllers;

use App\Models\keuangan_detail_nonbulanan;
use App\Models\keuangan_pembayaran_bulanan;
use App\Models\keuangan_penerimaan_lain_detail;
use App\Models\keuangan_pengeluaran_detail;
use App\Models\keuangan_tabungan_siswa_detail;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintPDFController extends Controller
{

    //
    public function HeadPDF($name,$isi){
      $tgl = date('Ymdhis');
      $data = DB::table('sekolahs')
        ->join('kelurahan','sekolahs.kode_kelurahan','=','kelurahan.kode_kelurahan')
        ->join('kecamatan','sekolahs.kode_kecamatan','=','kecamatan.kode_kecamatan')
        ->select(['sekolahs.*','sekolahs.id as id_sekolah','kelurahan.*','kecamatan.*'])->first();
      $img = config('app.url').'/assets/uploads/'.$data->logo_sekolah;
      $name = $tgl."-".$name;
      $pdf = PDF::loadview('layouts.laporan_print',[
        'data' => $data,
        'name' => $name,
        'img' => $img,
        'isi' => $isi
        ]);
    return $pdf->stream();
    }
    public function laporan(Request $req)
    {
        $tgl = date('Ymdhis');
        $data = DB::table('sekolahs')
        ->join('kelurahan','sekolahs.kode_kelurahan','=','kelurahan.kode_kelurahan')
        ->join('kecamatan','sekolahs.kode_kecamatan','=','kecamatan.kode_kecamatan')
        ->select(['sekolahs.*','sekolahs.id as id_sekolah','kelurahan.*','kecamatan.*'])->first();
        $img = config('app.url').'/assets/uploads/'.$data->logo_sekolah;
        $name = $tgl.'_Laporan-pdf';
        $isi = "";
        $where = [];
        $data_isi = "";

        if($req->filter_awal != null || $req->filter_akhir != null || $req->type != null || $req->nama != null){
            $a = new DateTime($req->filter_awal);
            $filter_awal = $a->format('d/m/Y');

            $b = new DateTime($req->filter_akhir);
            $filter_akhir = $b->format('d/m/Y');
            $f_awal = "";
            $f_akhir = "";
            $isi .= '<center><div style="text-transform:uppercase;"><h4> LAPORAN '.$req->type.' '.$req->nama.'</h4></div></center><br>';
            $isi .= 'Periode : '.$filter_awal.' - '.$filter_akhir.'<br>';

            switch($req->type){
                case "harian":
                    $where = [['tgl_bayar','>=',$req->filter_awal],['tgl_bayar','<=',$req->filter_akhir]];
                    $f_awal = $req->filter_awal;
                    $f_akhir = $req->filter_akhir;
                    break;
                case "bulanan":
                    $where = [['tgl_bayar','>=',$req->filter_awal."-01"],['tgl_bayar','<=',$req->filter_akhir."-".date('t')]];
                    $f_awal = $req->filter_awal."-01";
                    $f_akhir = $req->filter_akhir."-".date('t');
                    break;
                case "tahunan":
                    $where = [['tgl_bayar','>=',$req->filter_awal."-01-01"],['tgl_bayar','<=',$req->filter_akhir."-12-".date('t')]];
                    $f_awal = $req->filter_awal."-01-01";
                    $f_akhir = $req->filter_akhir."-12-".date('t');    
                    break;
            }
            switch($req->nama){
                case "bulanan siswa":
                    $data_isi = keuangan_pembayaran_bulanan::join('biaya_siswas','keuangan_pembayaran_bulanans.kode_biaya_siswa','=','biaya_siswas.id')
                    ->join('data_siswas','keuangan_pembayaran_bulanans.kode_siswa','=','data_siswas.id')
                    ->join('kelas','keuangan_pembayaran_bulanans.kode_kelas','=','kelas.id')
                    ->join('methode_pembayarans','keuangan_pembayaran_bulanans.kode_jenis_pembayaran','=','methode_pembayarans.id')
                    ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                    ->where($where)
                    ->get(['keuangan_pembayaran_bulanans.id as id_bulanan','keuangan_pembayaran_bulanans.*','biaya_siswas.*','kelas.*','tahun_ajarans.*','data_siswas.*','methode_pembayarans.*']);
                    $isi .= '<table border="1" align="center" width="100%"><thead>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pembayaran</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Penerimaan</th>
                    <th>Ket</th>
                  </thead>
                  <tbody>';
                  $no = 1;
                  foreach ($data_isi as $item) {
                    $isi .= '<tr>
                                <td>'.$no++.'</td>
                                <td>'.$item->tgl_bayar.'</td>
                                <td>'.$item->nama_biaya.'</td>
                                <td>'.$item->nama.'</td>
                                <td>('.$item->kode_kelas.') '.$item->nama_kelas.'</td>
                                <td>Rp.'.number_format($item->nominal_pembayaran).'</td>
                                <td>'.$item->nama_methode.'</span>
                                </td>
                            </tr>';
                  }
                  $isi .= '</tbody></table>';
                    break;
                case "nonbulanan siswa":
                    $data_isi =  keuangan_detail_nonbulanan::join('keuangan_pembayaran_nonbulanans','keuangan_detail_nonbulanans.kode_non_bulanan','=','keuangan_pembayaran_nonbulanans.id')
                    ->join('data_siswas','keuangan_pembayaran_nonbulanans.kode_siswa','=','data_siswas.id')
                    ->join('kelas','keuangan_pembayaran_nonbulanans.kode_kelas','=','kelas.id')
                    ->join('methode_pembayarans','keuangan_detail_nonbulanans.jenis_pembayaran_detail','=','methode_pembayarans.id')
                    ->join('biaya_siswas','keuangan_pembayaran_nonbulanans.kode_biaya_siswa','=','biaya_siswas.id')
                    ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                    ->where($where)
                    ->get(['kelas.*','kelas.kode_kelas as code_kelas','keuangan_detail_nonbulanans.id as id_detail','keuangan_detail_nonbulanans.*','keuangan_pembayaran_nonbulanans.*','methode_pembayarans.*','biaya_siswas.*','data_siswas.*']);
                    $isi .= '<table border="1" align="center" width="100%"><thead>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pembayaran</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Penerimaan</th>
                    <th>Ket</th>
                  </thead>
                  <tbody>';
                  $no = 1;
                  foreach ($data_isi as $item) {
                    $isi .= '<tr>
                    <td>'.$no++.'</td>
                    <td>'.$item->tgl_bayar.'</td>
                    <td>'.$item->nama_biaya.'</td>
                    <td>'.$item->nama.'</td>
                    <td>('.$item->code_kelas.') '.$item->nama_kelas.'</td>
                    <td>Rp.'.number_format($item->nominal_detail).'</td>
                    <td>'.$item->nama_methode.'</span>
                    </td>
                  </tr>';
                  }
                  $isi .= '</tbody></table>';
                break;
                case "tabungan siswa":
                    $data_isi = keuangan_tabungan_siswa_detail::join('keuangan_tabungan_siswas','keuangan_tabungan_siswa_details.kode_tabungan','=','keuangan_tabungan_siswas.id')
                    ->join('data_siswas','keuangan_tabungan_siswas.kode_siswa','=','data_siswas.id')
                    ->join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
                    ->join('kelas','aktivitas_belajars.kode_kelas','=','kelas.kode_kelas')
                    ->where([['keuangan_tabungan_siswa_details.created_at','>=',$f_awal." 00:00:00"],['keuangan_tabungan_siswa_details.created_at','<=',$f_akhir." 00:00:00"]])
                    ->get(['keuangan_tabungan_siswa_details.*','keuangan_tabungan_siswa_details.id as id_tabungan','keuangan_tabungan_siswas.*','data_siswas.*','kelas.*','keuangan_tabungan_siswa_details.created_at as tgl_bayar']);
                    $isi .= '<table border="1" align="center" width="100%">
                    <thead>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Nominal</th>
                    <th>IN / OUT</th>
                  </thead>
                  <tbody>';
                  $no = 1;
                  foreach ($data_isi as $item) {
                    $type = $item->type_detail  == 0 ? "IN" : "OUT"; 
                   $isi .= '<tr style="text-align:center;">
                   <td>'.$no++.'</td>
                   <td>'.date('Y-m-d', strtotime($item->tgl_bayar)).'</td>
                   <td>'.$item->nama.'</td>
                   <td>( '.$item->kode_kelas.' ) '.$item->nama_kelas.'</td>
                   <td>Rp.'.number_format($item->nominal_detail).'</td>
                   <td>'.$type.'</td>
                 </tr>';
                  }
                  $isi .= '</tbody></table>';
                    break;
                case "penerimaan lain":
                  $data_isi = keuangan_penerimaan_lain_detail::join('keuangan_penerimaan_lains','keuangan_penerimaan_lain_details.kode_penerimaan','=','keuangan_penerimaan_lains.id')
                                                                    ->join('methode_pembayarans','keuangan_penerimaan_lains.methode_bayar','=','methode_pembayarans.kode_methode')
                                                                    ->where([['keuangan_penerimaan_lains.tgl_penerimaan','>=',$f_awal],['keuangan_penerimaan_lains.tgl_penerimaan','<=',$f_akhir]])                                                        
                                                                    ->get(['keuangan_penerimaan_lain_details.id as id_penerimaan','keuangan_penerimaan_lain_details.*','keuangan_penerimaan_lains.*','methode_pembayarans.*']);
                    $isi .= '<table border="1" align="center" width="100%">
                    <thead>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Dari</th>
                    <th>Penerimaan</th>
                    <th>Ket</th>
                    <th>Methode</th>
                  </thead>
                  <tbody>';
                  $no = 1;
                  foreach ($data_isi as $item) {
                    $isi .= ' <tr style="text-align:center;">
                    <td>'.$no++.'</td>
                    <td>'.$item->tgl_penerimaan.'</td>
                    <td>'.$item->penerimaan_dari.'</td>
                    <td>Rp.'.number_format($item->detail_jumlah).'</td>
                    <td>'.$item->desc_penerimaan.'</span>
                     <td>'.$item->nama_methode.'</td>
                    </td>
                  </tr>';
                  }
                  $isi .= '</tbody></table>';
                break;
                case "pengeluaran":
                    $data_isi = keuangan_pengeluaran_detail::join('keuangan_pengeluarans','keuangan_pengeluaran_details.kode_pengeluaran','=','keuangan_pengeluarans.id')
                    ->join('methode_pembayarans','keuangan_pengeluarans.methode_bayar','=','methode_pembayarans.kode_methode')
                    ->join('pos_penerimaans','keuangan_pengeluaran_details.pos_sumber','=','pos_penerimaans.kode_pos')
                    ->join('pos_pengeluarans','keuangan_pengeluaran_details.pos_keluar','=','pos_pengeluarans.kode_pos')
                    ->where([['keuangan_pengeluarans.tgl_pengeluaran','>=',$f_awal],['keuangan_pengeluarans.tgl_pengeluaran','<=',$f_akhir]])
                    ->get(['pos_penerimaans.nama_pos as sumber_dana','keuangan_pengeluaran_details.id as id_pengeluaran','keuangan_pengeluaran_details.*','keuangan_pengeluarans.*','methode_pembayarans.*','pos_penerimaans.*','pos_pengeluarans.*']);
                    $isi .= '<table border="1" align="center" width="100%">
                    <thead>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Sumber</th>
                    <th>Pembayaran</th>
                    <th>Nominal</th>
                    <th>Ket</th>
                  </thead>
                  <tbody>';
                  $no = 1;
                  foreach ($data_isi as $item) {
                    $isi .= ' <tr style="text-align:center;">
                    <td>'.$no++.'</td>
                    <td>'.$item->tgl_pengeluaran.'</td>
                    <td>'.$item->sumber_dana.'</td>
                    <td>'.$item->nama_pos.'</td>
                    <td>Rp.'.number_format($item->detail_jumlah).'</td>
                    <td>'.$item->detail_keterangan.'
                    </td>
                  </tr>';
                  }
                  $isi .= '</tbody></table>';
                break;
            }
            $pdf = PDF::loadview('layouts.laporan_print',[
                'data' => $data,
                'name' => $name,
                'img' => $img,
                'isi' => $isi
                ]);
            return $pdf->stream();
        }
        
    }
    public function cetak_struk(Request $req){
      date_default_timezone_set("Asia/Jakarta");
      $tgl = date('Y-m-d h:i:s');
      $name = "STRUK-PEMBAYARAN-PDF";
      $isi = "";
      if($req != null){
        switch($req->nama_pembayaran){
          case "nonbulanan_siswa":
            $where = $req->type == "all" ? ['keuangan_pembayaran_nonbulanans.id','=',$req->id_detail] : ['keuangan_detail_nonbulanans.id','=',$req->id_detail];
            $detail_non_bulanan = keuangan_detail_nonbulanan::join('keuangan_pembayaran_nonbulanans','keuangan_detail_nonbulanans.kode_non_bulanan','=','keuangan_pembayaran_nonbulanans.id')
                        ->join('kelas','keuangan_pembayaran_nonbulanans.kode_kelas','=','kelas.id')
                        ->join('methode_pembayarans','keuangan_detail_nonbulanans.jenis_pembayaran_detail','=','methode_pembayarans.id')
                        ->join('biaya_siswas','keuangan_pembayaran_nonbulanans.kode_biaya_siswa','=','biaya_siswas.id')
                        ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                        ->where([$where])
                        ->get(['keuangan_detail_nonbulanans.id as id_detail','keuangan_detail_nonbulanans.*','keuangan_pembayaran_nonbulanans.*','methode_pembayarans.*','tahun_ajarans.*','kelas.*','kelas.kode_kelas as id_kelases','biaya_siswas.*']);
            $isi .= '<center><div style="text-transform:uppercase;"><p style="font-size:20px; font-weight:bold;"> BUKTI PEMBAYARAN NONBULANAN SISWA </p><hr></div></center>';
            $isi .= '<table width="100%">
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td>'.$req->tahun_ajaran.'</td>
                        <td></td>
                        <td style="text-align:right;">Tanggal</td>
                        <td>:</td>
                        <td>'.$tgl.'</td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>:</td>
                        <td>'.$req->nisn.'</td>
                        <td></td>
                        <td style="text-align:right;">Kelas</td>
                        <td>:</td>
                        <td>'.$req->kode_kelas.'</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>'.$req->nama.'</td>
                    </tr>
                    </table><hr>';
            $isi .= '<table width="100%" border="1">
                      <tr style="text-align:center;">
                        <td width="5%">No</td>
                        <td width="25%">Tgl</td>
                        <td width="50%">Pembayaran</td>
                        <td width="20%">Nominal</td>
                      </tr>';
            $no = 1;
            $total = 0;
            foreach ($detail_non_bulanan as $item) {
              $total = $total + $item->nominal_detail;
              $isi .= '<tr>
                <td width="5%">'.$no++.'</td>
                <td width="25%">'.$item->tgl_input_detail.'</td>
                <td width="50%">'.$item->nama_biaya.'</td>
                <td width="20%">Rp.'.number_format($item->nominal_detail).',-</td>
              </tr>';
            }
            $isi .='<tr>
                        <td width="75" colspan="3">Total Pembayaran</td>
                        <td width="25%">Rp.'.number_format($total).'.-</td>
                      </tr>
                      </table>';
          break;
          case "bulanan_siswa":
            $detail_bulanan = keuangan_pembayaran_bulanan::join('biaya_siswas','keuangan_pembayaran_bulanans.kode_biaya_siswa','=','biaya_siswas.id')
            ->where([['keuangan_pembayaran_bulanans.id','=',$req->id_bulanan]])
            ->get(['keuangan_pembayaran_bulanans.id as id_bulanan','keuangan_pembayaran_bulanans.*','biaya_siswas.*']);
            $isi .= '<center><div style="text-transform:uppercase;"><p style="font-size:20px; font-weight:bold;"> BUKTI PEMBAYARAN BULANAN SISWA </p><hr></div></center>';
            $isi .= '<table width="100%">
                    <tr>
                        <td>Periode</td>
                        <td>:</td>
                        <td> '.$req->bulan_pembayaran.' ('.$req->tahun_ajaran.')</td>
                        <td></td>
                        <td style="text-align:right;">Tanggal</td>
                        <td>:</td>
                        <td> '.$req->tgl_bayar.'</td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>:</td>
                        <td>'.$req->nisn.'</td>
                        <td></td>
                        <td style="text-align:right;">Kelas</td>
                        <td>:</td>
                        <td>'.$req->kode_kelas.'</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>'.$req->nama.'</td>
                    </tr>
                    </table><hr>';
            $isi .= '<table width="100%" border="1">
                      <tr style="text-align:center;">
                        <td width="5%">No</td>
                        <td width="70%">Pembayaran</td>
                        <td width="25%">Nominal</td>
                      </tr>';
            $total = 0;
            $no = 1;
            foreach ($detail_bulanan as $item) {
              $total = $total + $item->tagihan_pembayaran;
                $isi .='<tr">
                        <td width="5%">'.$no++.'</td>
                        <td width="70%">'.$item->nama_biaya.' Bulan '.$item->bulan_pembayaran.'</td>
                        <td width="25%">Rp.'.number_format($item->tagihan_pembayaran).'.-</td>
                      </tr>';
            }
            $isi .='<tr>
                        <td width="75" colspan="2">Total Pembayaran</td>
                        <td width="25%">Rp.'.number_format($total).'.-</td>
                      </tr>
                      </table>';
          break;
        }
      }
      //dd($req);
      return $this->HeadPDF($name,$isi);
    }
}
