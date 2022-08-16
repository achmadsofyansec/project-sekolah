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
    public function view_umum(){
        return view('asset_tetap.umum.index');
    }
    public function view_gedung(){
        return view('asset_tetap.gedung.index');
        
    }
    public function view_ruangan(){
        return view('asset_tetap.ruangan.index');
    }
    public function view_lapangan(){
        return view('asset_tetap.lapangan.index');
    }
    public function view_sarana_belajar(){
        return view('asset_tetap.sarana_belajar.index');
    }
    public function view_aset_lain(){
        return view('asset_tetap.lain_lain.index');
    }
    public function view_aset_tt(){
        return view('asset_tidak_tetap.asset.index');
    }
    public function view_kategori_aset_tt(){
        return view('asset_tidak_tetap.kategori_asset.index');
    }
    public function view_peminjaman(){
        return view('peminjaman.index');
    }
    public function view_pengembalian(){
        return view('pengembalian.index');
    }
    public function view_denda(){
        return view('denda.index');
    }
    public function view_laporan_aset(){
        return view('laporan.laporan_asset.index');
    }
    public function view_laporan_peminjaman(){
        return view('laporan.peminjaman.index');
    }
    public function view_laporan_pengembalian(){
        return view('laporan.pengembalian.index');
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
    
}
