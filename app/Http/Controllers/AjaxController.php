<?php

namespace App\Http\Controllers;


use DateTime;
use App\Models\Buku;
use App\Models\Peminjaman_buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AjaxController extends Controller
{
    public function filter_buku(Request $request){
        $kode_buku = ['perpustakaan_data_bukus.kode_buku','!=','null'];
        if($request->kode_buku != null){
            $kode_buku = ['perpustakaan_data_bukus.kode_buku','=',$request->kode_buku];
        }
        $buku = Buku::where([$kode_buku])->get(['perpustakaan_data_bukus.*']);

        $data = "";
        $no = 1;

       return response()->json($buku);
    }

    public function filter_siswa(Request $request){
        $nisn = ['data_siswas.nisn','!=','null'];
        if($request->nisn != null){
            $nisn = ['data_siswas.nisn','=',$request->nisn];
        }
        $nis = ['perpustakaan_peminjaman_bukus.id_siswa','=',$request->nis];
        $siswa = DB::table('data_siswas')->where([$nisn])->get(['data_siswas.*']);
        $data = DB::table('perpustakaan_peminjaman_bukus')->where([$nis])->get(['perpustakaan_peminjaman_bukus.*']);


        $data = "";
        $no = 1;

       return response()->json($siswa,$data);
    }
}