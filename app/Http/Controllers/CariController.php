<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\data_siswa;
use App\Models\KelulusanNilai;
use App\Models\KelulusanWaktu;
use App\Models\sekolah;
use App\Models\tahun_ajaran;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CariController extends Controller
{
    public function portal(Request $request){
        $sekolah = sekolah::latest()->get();
        $tahun_ajaran = tahun_ajaran::where('status_tahun_ajaran', '=', 'Aktif')->get();
        $waktu = KelulusanWaktu::first();
        $waktuOpen = $waktu->batas_akhir;
        
        // dd($waktu);
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');

       if ($tanggal > $waktuOpen) {
          // return view('portal.main.index', compact('sekolah', 'tahun_ajaran', 'waktu'));
            dd(true);
        } else {
          return view('portal.main.portal', compact('sekolah', 'tahun_ajaran', 'waktu', 'waktuOpen'));
        }
        
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
       $waktu = KelulusanWaktu::first();
       $tampil = $waktu->batas_akhir;
        // $waktu = KelulusanWaktu::where('id','=', 1)->get();
       
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $tes = "2023-01-01";
        dd($tampil);
        if ($tes < $tanggal) {

            dd(true);
        }
       

    //    if ($waktu > $tanggal) {
    //     return view('portal.main.hasil', compact('dataCari', 'waktu'));
    //    } else {
    //     return $this->portal($request);
    //    }   
    return view('portal.main.hasil', compact('dataCari', 'waktu'));
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

    public function editWaktu(Request $request){
		

        return view('pengaturan.index', compact(['data']));
	}

    public function pengaturan(Request $request) {
        //dd($dataWaktu);
        $data = DB::table('kelulusan_waktus')->where('id', '=', 1)->get();

        return view('portal.pengaturan.index',compact('data'));
    }
    
}
