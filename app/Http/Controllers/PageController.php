<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(Request $request){
        return view('dashboard');
    }
    public function view_point_pelanggaran(){
        return view('pelanggaran.point.index');
    }
    public function view_sanksi(){
        return view('pelanggaran.sanksi.index');
    }
    public function view_pelanggaran(){
        return view('pelanggaran.pelanggaran.index');
    }
    public function view_kehadiran(){
        return view('kehadiran.index');
    }
    public function view_barang_sitaan(){
        return view('barang_sitaan.index');
    }
    public function view_peminjaman(){
        return view('peminjaman.index');
    }
    public function view_point_siswa(){
        return view('point_siswa.index');
    }
    public function view_lap_pelanggaran(){
        return view('laporan.pelanggaran.index');
    }
    public function view_lap_kehadiran(){
        return view('laporan.kehadiran.index');
    }
    public function view_lap_peminjaman(){
        return view('laporan.peminjaman.index');
    }
    public function view_lap_sitaan(){
        return view('laporan.barang_sitaan.index');
        
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
