<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengunjung;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(Request $request){
        return view('dashboard');
    }

    public function tambah_buku()
    {
        return view('master.tambah');
    }

    //export bermasalah
    public function export()
    {
        return view('master.export');
    }

    public function denda()
    {
        return view('pengaturan.denda');
    }

    public function pengembalian()
    {
        return view('transaksi.pengembalian');
    }

    public function laporan_peminjaman()
    {
        $laporan_peminjaman=Peminjaman::all();
        return view('laporan.peminjaman',compact('laporan_peminjaman'));
    }

    public function laporan_buku()
    {
        return view('laporan.buku');
    }

    public function laporan_pengunjung()
    {
        $laporan_pengunjung=Pengunjung::all();
        $laporan_peminjaman=Peminjaman::all();
        return view('laporan.pengunjung',compact('laporan_pengunjung','laporan_peminjaman'));
    }

    public function password()
    {
        return view('app.password');
    }

    public function kategori_tambah()
    {
        return view('master.kategori_tambah');
    }

    public function sumber_tambah()
    {
        return view('master.sumber_tambah');
    }

    public function siswa_detail()
    {
        return view('siswa.siswa_detail');
    }




    public function logout(Request $request){
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('../sekolahApp/');
       }
    
}
