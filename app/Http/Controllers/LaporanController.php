<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function view_lap_pelanggaran(Request $request){
        $req = $request;
        if($req != null){
            
        }
        return view('laporan.pelanggaran.index',compact(['req']));
    }
}
