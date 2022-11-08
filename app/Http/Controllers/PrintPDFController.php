<?php

namespace App\Http\Controllers;

use App\Models\data_siswa;
use App\Models\pelanggaran;
use App\Models\sanksi_pelanggaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintPDFController extends Controller
{
    //
    public function print_pdf($isi,$nama){
        $tgl = date('Ymdhis');
        $data = DB::table('sekolahs')
        ->join('kelurahan','sekolahs.kode_kelurahan','=','kelurahan.kode_kelurahan')
        ->join('kecamatan','sekolahs.kode_kecamatan','=','kecamatan.kode_kecamatan')
        ->select(['sekolahs.*','sekolahs.id as id_sekolah','kelurahan.*','kecamatan.*'])->first();
        $img = config('app.url').'/assets/uploads/'.$data->logo_sekolah;
        $name = $tgl.'_'.$nama;
        $pdf = Pdf::loadview('layouts.laporan_print',[
            'data' => $data,
            'name' => $name,
            'img' => $img,
            'isi' => $isi
            ]);
        return $pdf->stream();
    }
    public function lap_point_siswa(Request $request){
        $req = $request;
        $isi = "";
        if($req != null){
            $kelas1 = ['aktivitas_belajars.kode_kelas','!=','null'];
            $jurusan1 = ['aktivitas_belajars.kode_jurusan','!=','null'];

            if($req->kode_kelas != null){
                $kelas1 = ['aktivitas_belajars.kode_kelas','=',$req->kode_kelas];
            }
            if($req->kode_jurusan != null){
                $jurusan1 = ['aktivitas_belajars.kode_jurusan','=',$req->kode_jurusan];
            }
            $data_siswas = data_siswa::join("aktivitas_belajars","aktivitas_belajars.kode_siswa","=",'data_siswas.nik')
                    ->where([['data_siswas.status_siswa','=','Aktif'],$kelas1,$jurusan1])
                    ->get(["data_siswas.*",'aktivitas_belajars.*',"data_siswas.id as id_siswas"]);
            $no = 1;
            
            $isi .= '<center><div style="text-transform:uppercase;"><h4> LAPORAN POIN SISWA</h4></div></center><br>';
            $isi .= 'kelas : '.$req->kode_kelas.' - '.$req->kode_jurusan.'<br>';
            $isi .= '<table class="table" style="width:100%; border: 1px;">
            <thead>
            <th>No</th>
            <th>Tanggal</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Kelas / Jurusan</th>
            <th>Poin</th>
          </thead>
          <tbody>';
            if($data_siswas != null){
                foreach($data_siswas as $item){
                    $poin = pelanggaran::where([['id_siswa','=',$item->id_siswas]])->get();
                    $last_point = 0;
                    foreach ($poin as $point) {
                       $last_point += $point->poin_minus;
                    }
                    $isi .= '<tr>
                    <td>'.$no++.'</td>
                    <td>'.$item->nik.'</td>
                    <td>'.$item->nisn.'</td>
                    <td>'.$item->nama.'</td>
                    <td>'.$item->kode_kelas.'/ '.$item->kode_jurusan.'</td>
                    <td>'.$last_point.'</td>
                    </tr>';
            }
            }else{
                $isi .= ' <tr>
                    <td class="text-muted text-center" colspan="100%">Tidak Ada Data </td>
                </tr>';
            }
            
            $isi .= '</tbody>
            </table>';
        }
        return $this->print_pdf($isi,'LAPORAN POINT SISWA');
    }
    public function lap_pelanggaran_siswa(Request $request){
        $req = $request;
        $isi = "";
        if($req != null){
            $data_pelanggaran = pelanggaran::join('data_siswas','pelanggarans.id_siswa','=','data_siswas.id')
                                ->join("aktivitas_belajars","aktivitas_belajars.kode_siswa","=",'data_siswas.nik')
                                ->join("point_pelanggarans","pelanggarans.id_poin_pelanggaran","=",'point_pelanggarans.id')
                                ->where([['data_siswas.status_siswa','=','Aktif'],['pelanggarans.created_at','>=',$req->filter_awal." 00:00:00"],['pelanggarans.created_at','<=',$req->filter_akhir." 23:59:59"]])
                                ->get(['point_pelanggarans.*','pelanggarans.id as id_pelanggaran','pelanggarans.*','pelanggarans.created_at as tgl_pelanggaran','data_siswas.*','aktivitas_belajars.*']);
            $no = 1;
            $isi .= '<center><div style="text-transform:uppercase;"><h4> LAPORAN PELANGGARAN SISWA</h4></div></center><br>';
            $isi .= 'Periode : '.$req->filter_awal.' - '.$req->filter_akhir.'<br>';
            $isi .= '<table class="table" style="width:100%; border: 1px;">
            <thead>
              <th>No</th>
              <th>Tanggal</th>
              <th>NISN</th>
              <th>Nama</th>
              <th>Kelas / Jurusan</th>
              <th>Pelanggaran</th>
              <th>Sanksi</th>
              <th>Poin</th>
            </thead>
            <tbody>';
            if($data_pelanggaran != null){
                foreach ($data_pelanggaran as $item) {
                    $data_sanksi = sanksi_pelanggaran::where([['dari_poin','<',$item->poin],['sampai_poin','>',$item->poin]])->get()->first();
                    $sanksi = $data_sanksi != null ? $data_sanksi->sanksi : '-';
                    $isi .= '<tr>
                    <td>'.$no++.'</td>
                    <td>'.$item->tgl_pelanggaran.'</td>
                    <td>'.$item->nisn.'</td>
                    <td>'.$item->nama.'</td>
                    <td>'.$item->kode_kelas.' / '.$item->kode_jurusan.'</td>
                    <td>'.$item->nama_poin_pelanggaran.'</td>
                    <td>'.$sanksi.'</td>
                    <td>'.$item->poin.'</td>
                    </tr>';
                }
            }else{
                $isi .= ' <tr>
                            <td class="text-muted text-center" colspan="100%">Tidak Ada Data </td>
                        </tr>';
            }
            $isi .= '</tbody>
            </table>';
           
        }
        return $this->print_pdf($isi,'LAPORAN PELANGGARAN SISWA');
    }
}
