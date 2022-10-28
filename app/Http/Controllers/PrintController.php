<?php

namespace App\Http\Controllers;

use App\Models\akademik_nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;

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
                $harian = akademik_nilai::join('kelas','akademik_nilais.kode_kelas','=','kelas.kode_kelas')
                ->join('jurusans','akademik_nilais.kode_jurusan','=','jurusans.kode_jurusan')
                ->join('mata_pelajarans','akademik_nilais.kode_mapel','=','mata_pelajarans.kode_mapel')
                ->join('akademik_kategori_nilais','akademik_nilais.kode_kategori','=','akademik_kategori_nilais.id')
                ->join('tahun_ajarans','akademik_nilais.kode_tahun_ajaran','=','tahun_ajarans.kode_tahun_ajaran')
                ->where([['type_nilai','=','harian'],['tgl_input','>=',$req->filter_awal],['tgl_input','<=',$req->filter_akhir]])
                ->get(['akademik_nilais.*','akademik_nilais.id as id_nilai','kelas.*','jurusans.*','tahun_ajarans.*','mata_pelajarans.*','akademik_kategori_nilais.id as id_kategori_nilai','akademik_kategori_nilais.*']);    
            break;
            case "ujian":

            break;
            case "rapor":
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
