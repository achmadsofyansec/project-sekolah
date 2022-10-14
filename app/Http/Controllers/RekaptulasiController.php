<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekaptulasiController extends Controller
{
    //
    public function view_rekap(Request $request){
        return view('rekaptulasi.rekap.index');
    }
    public function view_rekap_pertrx(Request $request){
        return view('rekaptulasi.per_trx.index');
    }
}
