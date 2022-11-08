<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KelulusanNilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CariController extends Controller
{
    public function cari(Request $request){
        $name = $request->name;
        $categories = KelulusanNilai::where('kode_ujian','like',"%".$name."%")->paginate(1);
        return view('cari',compact('categories'));
    }

    public function portal(Request $request){
        return view('tespencarian');
    }

    public function cekNomor(Request $request){
		$no_peserta = $request->no_peserta;
		// return view('hasil'.$no_peserta);
        return Redirect::to('hasil/'.$no_peserta);
		//dd($no_peserta);
	}

    public function hasilCari(Request $request, $id){
		
        $dataCari = KelulusanNilai::where('kode_ujian', '=', $id)->first();
        return view('hasil', compact('dataCari'));
	}
}
