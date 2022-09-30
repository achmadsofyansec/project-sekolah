<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MutasiGuruController extends Controller
{
    public function view_mutasi_keluar_guru(){
        return view('mutasi.guru.keluar.index');
    }
    public function view_mutasi_masuk_guru(){
        return view('mutasi.guru.masuk.index');
    }
}
