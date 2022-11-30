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

    public function logout(Request $request){
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('../sekolahApp/');
    }

    public function login(Request $request){
        return redirect('../sekolahApp/');
    
    }
}
