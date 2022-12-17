<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ppbdSiswa;
use Illuminate\Support\Facades\Auth;
use PDO;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(Request $request){
        $pendaftar = ppbdSiswa::latest()->get();
        $laki = ppbdSiswa::where('jns_kelamin', '=', 'Laki Laki')->get();
        $perempuan = ppbdSiswa::where('jns_kelamin', '=', 'Perempuan')->get();
        $diterima = ppbdSiswa::where('status_siswa', '=', 'Diterima')->get();
        $ditolak = ppbdSiswa::where('status_siswa', '=', 'Ditolak')->get();
        $proses = ppbdSiswa::where('status_siswa', '=', 'Diverivikasi')->get();
        return view('dashboard', compact('pendaftar', 'laki', 'perempuan', 'diterima', 'ditolak', 'proses'));
    }
    public function view_pendaftar(){
        return view('calon_pendaftar.index');
    }
    public function view_pengumuman(){
        return view('pengumuman.index');
    }
    public function view_pengaturan(){
        return view('pengaturan.index');
    }
    public function view_manual_book(){
        return view('manual_book.index');
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
