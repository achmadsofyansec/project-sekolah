<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;
use App\Models\Buku;

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

    public function kategori()
    {
        return view('master.kategori');
    }

    public function sumber()
    {
        return view('master.sumber');
    }

    public function denda()
    {
        return view('pengaturan.denda');
    }

    public function peminjaman()
    {
        return view('transaksi.peminjaman');
    }

    public function pengembalian()
    {
        return view('transaksi.pengembalian');
    }
    public function daftar_peminjaman()
    {
        return view('transaksi.daftar_peminjaman');
    }

    public function siswa()
    {
        return view('siswa.siswa');
    }

    public function laporan_peminjaman()
    {
        return view('laporan.peminjaman');
    }

    public function laporan_buku()
    {
        return view('laporan.buku');
    }

    public function laporan_pengunjung()
    {
        return view('laporan.pengunjung');
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

    public function data_denda()
    {
        return view('master.data_denda');
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
