<?php

namespace App\Http\Controllers;

use App\Models\KelulusanNilai;
use App\Models\sekolah;
use App\Models\tahun_ajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(){
        $sekolah = sekolah::latest()->get();
        $tahun_ajaran = tahun_ajaran::where('status_tahun_ajaran', '=', 'Aktif')->get();
        $siswa = KelulusanNilai::latest()->get();
        $tidaklulus = KelulusanNilai::where('status', '=', 'Tidak Lulus')->get();
        $lulus = KelulusanNilai::where('status', '=', 'Lulus')->get();
        $dropout = KelulusanNilai::where('status', '=', 'Drop Out')->get();
        return view('dashboard', compact('siswa', 'lulus', 'tidaklulus', 'dropout', 'sekolah', 'tahun_ajaran'));
    }
    public function view_jabatan(){
        return view('jabatan.index');
    }
    public function view_users(){
        return view('users.index');
    }
    public function view_pengumuman(){
        return view('pengumuman.index');
    }
    public function view_pemeliharaan(){
        return view('pemeliharaan.index');
    }
    public function view_singkronisasi(){
        return view('singkronisasi.index');
    }

    public function login_portal(){
        return view('portal.main.login');
    }

    public function nilai(){
        return view('nilai.index');
    }
    
    public function cek(){
        return view('cari');
    }
}
