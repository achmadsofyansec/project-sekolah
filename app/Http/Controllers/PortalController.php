<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ppbdSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PortalController extends Controller
{
   public function index(Request $request){
        return view('pengumuman.index');
    }

    public function cari(Request $request){
        $pendaftar = $request->pendaftar;
        // return view('hasil'.$no_peserta);
        return Redirect::to('pengumuman/'.$pendaftar);
        //dd($no_peserta);
    }

    public function hasil(Request $request, $id){
       $dataCari = ppbdSiswa::where('nik', '=', $id)->first();
       return view('pengumuman.hasil', compact('dataCari'));
    }
}
