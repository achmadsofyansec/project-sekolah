<?php

namespace App\Http\Controllers;

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
}
