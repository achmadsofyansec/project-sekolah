<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //
    public function view_harian(Request $request){
        return view('laporan.harian.index');
    }
    public function view_laporan_tahunan(Request $request){
        return view('laporan.tahunan.index');
    }
    public function view_laporan_bulanan(Request $request){
        return view('laporan.bulanan.index');
    }
}
