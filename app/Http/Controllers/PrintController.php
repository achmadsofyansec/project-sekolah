<?php

namespace App\Http\Controllers;

use App\Models\akademik_nilai;
use App\Models\akademik_nilai_details;
use App\Models\akademik_nilai_prestasi;
use App\Models\data_siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use PHPUnit\Framework\Constraint\Count;

class PrintController extends Controller
{
    //
    public function laporan(Request $request){
        $tgl = date('Ymdhis');
        $data = DB::table('sekolahs')
        ->join('kelurahan','sekolahs.kode_kelurahan','=','kelurahan.kode_kelurahan')
        ->join('kecamatan','sekolahs.kode_kecamatan','=','kecamatan.kode_kecamatan')
        ->select(['sekolahs.*','sekolahs.id as id_sekolah','kelurahan.*','kecamatan.*'])->first();
        $img = config('app.url').'/assets/uploads/'.$data->logo_sekolah;
        $name = $tgl.'_Laporan-pdf';
        $isi = "";
        $data_isi = "";
       $req = $request;
       if($req->filter_awal != null || $req->filter_akhir != null){
        $a = new DateTime($req->filter_awal);
        $filter_awal = $a->format('d/m/Y');

        $b = new DateTime($req->filter_akhir);
        $filter_akhir = $b->format('d/m/Y');

        $kelas = $req->kode_kelas != null ? $req->kode_kelas : "";
        $jurusan = $req->kode_jurusan != null ? $req->kode_jurusan : ""; 
        $isi .= '<center><div style="text-transform:uppercase;"><h4> LAPORAN '.$req->type.' '.$req->nama.' '.$kelas.' '.$jurusan.'</h4></div></center><br>';
        $isi .= 'Periode : '.$filter_awal.' - '.$filter_akhir.'<br>';

        switch($req->nama){
            case "harian":
            case "ujian":
            case "rapor":
                $data_isi = akademik_nilai_details::join('data_siswas','akademik_nilai_details.kode_siswa','=','data_siswas.id')
                                                    ->join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
                                                    ->where([['akademik_nilai_details.kode_nilai','=',$req->id_nilai]])
                                                    ->get(['akademik_nilai_details.*','data_siswas.*','aktivitas_belajars.*']);
                $isi .= '<table border="1" align="center" width="100%"><thead>
                            <th style="width:5%">No</th>
                            <th style="width: 20%;">NISN</th>
                            <th style="width: 55%;">Nama</th>
                            <th>Nilai</th>
                            </thead>
                        <tbody>';
                $no = 1;
                if(count($data_isi) > 0){
                    foreach ($data_isi as $item) {
                   
                        $isi .= '<tr>
                            <td>'.$no++.'</td>
                            <td>'.$item->nisn.'</td>
                            <td>'.$item->nama.'</td>
                            <td>'.$item->nilai.'</td>
                        </tr>';
                    }   
                }else{
                    $isi .= '<tr>
                            <td colspan="4" class="text-center text-muted">Tidak Ada Data</td>
                            </tr>';
                }
                $isi .= '</tbody></table>';
            break;
            case "prestasi":
                $data_isi = akademik_nilai_prestasi::join('data_siswas','akademik_nilai_prestasis.kode_siswa','=','data_siswas.id')
                ->where([['akademik_nilai_prestasis.created_at','>=',$req->filter_awal." 00:00:00"],['akademik_nilai_prestasis.created_at','<=',$req->filter_akhir." 00:00:00"]])
                ->get(['akademik_nilai_prestasis.id as id_prestasi','akademik_nilai_prestasis.*','data_siswas.*']);
                $isi .= '<table border="1" align="center" width="100%"> <thead>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Lomba</th>
                            <th>Tahun</th>
                            <th>Penyelenggara</th>
                            <th>Tingkat</th>
                            <th>Peringkat Yang Diraih</th>
                        </thead>
                        <tbody>';
                $no = 1;
                if(count($data_isi) > 0){
                    foreach ($data_isi as $item) {
                        $isi .= '<tr>
                            <td>'.$no++.'</td>
                            <td>'.$item->nisn.'</td>
                            <td>'.$item->nama.'</td>
                            <td>'.$item->nama_lomba.'</td>
                            <td>'.$item->tahun_lomba.'</td>
                            <td>'.$item->nama_penyelenggara.'</td>
                            <td>'.$item->tingkat_lomba.'</td>
                            <td>'.$item->peringkat_lomba.'</td>
                        </tr>';
                    }   
                }else{
                    $isi .= '<tr>
                            <td colspan="8" class="text-center text-muted">Tidak Ada Data</td>
                            </tr>';
                }
                $isi .= '</tbody></table>';
            break;
        }

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
