<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function view_lap_absensi(Request $request){
        $req = $request;
        return view('laporan.absensi.index',compact('req'));
    }
    public function view_lap_nilai(Request $request){
        $req = $request;
        return view('laporan.nilai.index',compact('req'));
    }
}
