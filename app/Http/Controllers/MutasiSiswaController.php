<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MutasiSiswaController extends Controller
{
    public function view_mutasi_keluar_siswa(){
        return view('mutasi.siswa.keluar.index');
    }
    public function view_mutasi_masuk_siswa(){
        return view('mutasi.siswa.masuk.index');
    }
}
