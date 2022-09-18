<?php

namespace App\Http\Controllers;


use DateTime;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AjaxController extends Controller
{

    public function filter_siswa(Request $request){
        $nisn = ['data_siswas.nisn','!=','null'];
        if($request->nisn != null){
            $nisn = ['data_siswas.nisn','=',$request->nisn];
        }
        $siswa = DB::table('data_siswas')->where([$nisn])->get(['data_siswas.*']);


        $data = "";
        $no = 1;

       return response()->json($siswa);
    }
}