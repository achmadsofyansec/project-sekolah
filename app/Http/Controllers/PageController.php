<?php

namespace App\Http\Controllers;

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
        $siswa = data_siswa::latest()->get();
        $guru = data_guru::latest()->get();
        $kelas = Kelas::latest()->get();
        $mapel = MataPelajaran::latest()->get();
        return view('dashboard',compact(['siswa','guru','kelas','mapel']));
    }
    public function view_tahunajaran(){
        return view('tahun_ajaran.index');
    }
    public function view_jadwal(){
        return view('pembelajaran.jadwal.index');
    }
    public function view_predikat(){
        return view('nilai.predikat.index');
    }
    public function view_absensi(){
        return view('absensi.absen.index');
    }
    public function view_perizinan(){
        return view('absensi.perizinan.index');
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
