<?php

namespace App\Http\Controllers;


use DateTime;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AjaxController extends Controller
{
    public function filter_buku(Request $request){
        $kode_buku = ['data_bukus.id','!=','null'];
        if($request->kode_buku != null){
            $kode_buku = ['data_bukus.id','!=',$request->kode_buku];
        }
        $buku = Buku::where([$kode_buku])->get(['data_bukus.*']);

        $data = "";
        $no = 1;

       return response()->json($buku);
    }
}