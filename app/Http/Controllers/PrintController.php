<?php

namespace App\Http\Controllers;

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
        $where = [];
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
