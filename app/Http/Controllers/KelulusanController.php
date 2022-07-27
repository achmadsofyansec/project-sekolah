<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KelulusanController extends Controller
{
    public function index()
    {
        $kelulusan = DB::table('data_siswas')->paginate(10);
 
        return view('kelulusan.index',['kelulusan' => $kelulusan]);
 
    }
 
    public function cari(Request $request)
    {

        $cari = $request->cari;
 
        $kelulusan = DB::table('data_siswas')
        ->where('nik','like',"%".$cari."%")
        ->paginate();
 
        return view('kelulusan.index',['kelulusan' => $kelulusan]);
 
    }
}
