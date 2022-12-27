<?php

namespace App\Http\Controllers;

use App\Models\SarprasDataAset;
use App\Models\SarprasGedung;
use App\Models\SarprasPeminjamans;
use App\Models\SarprasPengembalian;
use App\Models\SarprasKategoriAset;
use App\Models\SarprasDenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(){
        $aset = SarprasGedung::latest()->get();
        $dataPeminjaman = SarprasPeminjamans::latest()->get();
        $peminjaman = SarprasPeminjamans::where('status_peminjaman', '=', '0');
        $pengembalian = SarprasPeminjamans::where('status_peminjaman', '=', '1');
        $denda = SarprasDenda::latest()->get();
        $dataAset = SarprasDataAset::latest()->get();
        $kategori = SarprasKategoriAset::latest()->get();
        $data = SarprasPeminjamans::join('data_siswas','sarpras_peminjamans.kode_siswa','=','data_siswas.id')
        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->where([['data_siswas.status_siswa','=','Aktif']])
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*'
            ,'sarpras_peminjamans.kode_peminjaman as kode_peminjaman'
            ,'sarpras_peminjamans.*','sarpras_peminjamans.id as id_peminjaman']);
        
        return view('dashboard', compact(['aset', 'peminjaman', 'pengembalian', 'kategori', 'data', 'denda', 'dataPeminjaman', 'dataAset']));
    }
    
    public function view_laporan_asset(){
        return view('laporan.laporan_asset.index');
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

    public function login(Request $request){
        return redirect('../sekolahApp/');
    
    }
    
}
