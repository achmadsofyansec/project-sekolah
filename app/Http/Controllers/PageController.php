<?php

namespace App\Http\Controllers;

use App\Models\barang_sitaan;
use App\Models\pelanggaran;
use App\Models\point_pelanggaran;
use App\Models\sanksi_pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(Request $request){
        $poin = point_pelanggaran::latest()->get();
        $sanksi = sanksi_pelanggaran::latest()->get();
        $pelanggaran = pelanggaran::latest()->get();
        $barang_sita = barang_sitaan::latest()->get();
        return view('dashboard',compact(['poin','sanksi','pelanggaran','barang_sita']));
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
