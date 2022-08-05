<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\data_guru;
use App\Models\data_siswa;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(){
        $siswa = data_siswa::where([['status_siswa','=','Aktif']])->get();
        $guru = data_guru::latest()->get();
        $kelas = Kelas::latest()->get();
        $mapel = MataPelajaran::latest()->get();
        $masuk = Absensi::join("data_siswas","data_siswas.id","=",'absensis.kode_siswa')->where([['keterangan','=','Masuk'],['tgl_absensi','>=',date('Y-m-d').' 00:00:00'],['tgl_absensi','<=',date('Y-m-d',strtotime('+1 day')).' 00:00:00']])->get();
        $izin = Absensi::join("data_siswas","data_siswas.id","=",'absensis.kode_siswa')->where([['keterangan','=','Izin'],['tgl_absensi','>=',date('Y-m-d').' 00:00:00'],['tgl_absensi','<=',date('Y-m-d',strtotime('+1 day')).' 00:00:00']])->get();
        $tanpa_keterangan = Absensi::join("data_siswas","data_siswas.id","=",'absensis.kode_siswa')->where([['keterangan','=','Tanpa Keterangan'],['tgl_absensi','>=',date('Y-m-d').' 00:00:00'],['tgl_absensi','<=',date('Y-m-d',strtotime('+1 day')).' 00:00:00']])->get();
        $sakit = Absensi::join("data_siswas","data_siswas.id","=",'absensis.kode_siswa')->where([['keterangan','=','Sakit'],['tgl_absensi','>=',date('Y-m-d').' 00:00:00'],['tgl_absensi','<=',date('Y-m-d',strtotime('+1 day')).' 00:00:00']])->get();
        $belum_absen = $siswa->count() - $masuk->count() - $izin->count() - $tanpa_keterangan->count() - $sakit->count();
        return view('dashboard',compact(['siswa','guru','kelas','mapel','masuk','izin','tanpa_keterangan','sakit','belum_absen']));
    }
    
    public function view_lap_absensi(){
        return view('laporan.absensi.index');
    }
    public function view_lap_nilai(){
        return view('laporan.nilai.index');
    }
    public function view_input_capaian(){
        return view('nilai.input_nilai.capaian.index');
    }
    public function view_input_ekstra(){
        return view('nilai.input_nilai.ekstrakulikuler.index');
    }
    public function view_input_harian(){
        return view('nilai.input_nilai.harian.index');
    }
    public function view_input_prestasi(){
        return view('nilai.input_nilai.prestasi.index');
    }
    public function view_input_rapor(){
        return view('nilai.input_nilai.rapor.index');
    }
    public function view_input_ujian(){
        return view('nilai.input_nilai.ujian.index');
    }
    
    public function view_pindah(){
        return view('pindah_kelas.index');
    }
    public function logout(Request $request){
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('../sekolahApp/');
       }
    public function back(){
        return redirect('../sekolahApp/');
       }
    
}
