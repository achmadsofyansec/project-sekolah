<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;
use App\Models\Sekolah;
use App\Models\Buku;
use App\Models\Peminjaman_buku;
use App\Models\Pengunjung_perpus;
use App\Models\Siswa;
use App\Models\Denda;


class PageController extends Controller
{
    
    //VIEW Pages
    public function index(Request $request){
    $buku = Buku::latest()->get();
    $pinjaman = Peminjaman_buku::latest()->get();
    $pengunjung = Pengunjung_perpus::latest()->get();
        return view('dashboard',compact('buku','pinjaman','pengunjung'));
    }


    public function siswa()
    {
        //$siswa = Siswa::latest()->get();
        return view('siswa.index',/*compact('siswa')*/);
    }


    public function denda()
    {
        return view('pengaturan.denda');
    }


    public function pengembalian()
    {
        return view('transaksi.pengembalian.index');
    }

    public function laporan_peminjaman()
    {
        $peminjaman = Peminjaman_buku::latest()->get();
        return view('laporan.peminjaman.index',compact('peminjaman'));
    }

    public function laporan_buku()
    {
        $buku = Buku::latest()->get();
        return view('laporan.buku.index',compact('buku'));
    }

    public function laporan_pengunjung()
    {
        $pengunjung = Pengunjung_perpus::latest()->get();
        return view('laporan.pengunjung.index',compact('pengunjung'));
    }

    public function password()
    {
        return view('app.password');
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
