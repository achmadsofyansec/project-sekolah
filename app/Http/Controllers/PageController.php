<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;
use App\Models\Sekolah;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengunjung;
use App\Models\Siswa;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(Request $request){
        return view('dashboard');
    }

    public function buku()
    {
        return view('master.buku.index');
    }

    public function kategori()
    {
        return view('master.kategori.index');
    }

    public function sumber()
    {
        return view('master.sumber.index');
    }

    public function siswa()
    {
        return view('siswa.index');
    }

    public function tambah_buku()
    {
        return view('master.buku.tambah');
    }

    //export bermasalah
    public function export()
    {
        return view('master.buku.export');
    }

    public function denda()
    {
        return view('pengaturan.denda.index');
    }

    public function pengembalian()
    {
        return view('transaksi.pengembalian.index');
    }

    public function laporan_peminjaman()
    {
        return view('laporan.peminjaman.index');
    }

    public function laporan_buku()
    {
        return view('laporan.buku.index');
    }

    public function laporan_pengunjung()
    {
        return view('laporan.pengunjung.index');
    }

    public function password()
    {
        return view('app.password');
    }

    public function kategori_tambah()
    {
        return view('master.kategori.kategori_tambah');
    }

    public function sumber_tambah()
    {
        return view('master.sumber.sumber_tambah');
    }

    public function siswa_detail()
    {
        return view('siswa.siswa_detail');
    }

    public function peminjaman()
    {
        return view('transaksi.peminjaman.index');
    }

    public function data_denda()
    {
        return view('master.denda.index');
    }




    public function logout(Request $request){
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('../sekolahApp/');
       }
    
}
