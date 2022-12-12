<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ppbdSiswa;
use App\Models\ppdbPengaturan;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PortalController extends Controller
{
   public function index(Request $request){
       $pegumuman = ppdbPengaturan::first();
       $pangumumanTampil = $pegumuman->pengumuman_open;
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
      
       if ($tanggal > $pangumumanTampil) {
          return view('pengumuman.index'); 
        } else {
          return view('pengumuman.hasil'); 
        }
      
        
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
