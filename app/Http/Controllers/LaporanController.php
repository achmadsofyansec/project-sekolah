<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function view_lap_absensi(){
        return view('laporan.absensi.index');
    }
    public function view_lap_nilai(){
        return view('laporan.nilai.index');
    }
}
