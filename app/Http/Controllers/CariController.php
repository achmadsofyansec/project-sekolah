<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\data_siswa;
use App\Models\KelulusanNilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CariController extends Controller
{
    public function portal(Request $request){
        return view('portal.main.index');
    }

    public function cekNomor(Request $request){
		$no_peserta = $request->no_peserta;
		// return view('hasil'.$no_peserta);
        return Redirect::to('hasil/'.$no_peserta);
		//dd($no_peserta);
	}

    public function hasilCari(Request $request, $id){
		
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        $dataCari = KelulusanNilai::join('data_siswas','kelulusan_nilais.kode_siswa','=','data_siswas.id')
                                        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
                                        ->where([['data_siswas.status_siswa','=','Aktif']])
                                        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*'
                                            ,'kelulusan_nilais.kode_ujian as kode_kode_ujian'
                                            ,'kelulusan_nilais.*','kelulusan_nilais.id as id_kelulusan'])
                                            ->where('kode_ujian', '=', $id)->first();
        return view('portal.main.hasil', compact('dataCari'));
	}

    public function cetak(Request $request, $id){
		$dataCari = KelulusanNilai::join('data_siswas','kelulusan_nilais.kode_siswa','=','data_siswas.id')
                                        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
                                        ->where([['data_siswas.status_siswa','=','Aktif']])
                                        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*'
                                            ,'kelulusan_nilais.kode_ujian as kode_kode_ujian'
                                            ,'kelulusan_nilais.*','kelulusan_nilais.id as id_kelulusan'])
                                            ->where('kode_ujian', '=', $id)->first();
		return view('portal.main.cetakSkl', compact('dataCari'));
	}
    
}
