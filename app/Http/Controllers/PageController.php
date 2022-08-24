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
    public function view_tunggakan(){
        return view('tunggakan.index');
    }
    public function view_tabungan(){
        return view('tabungan.index');
    }
    public function view_riwayat_bayar(){
        return view('riwayat_pembayaran.index');
    }
    public function view_rekap(){
        return view('rekaptulasi.rekap.index');
    }
    public function view_rekap_pertrx(){
        return view('rekaptulasi.per_trx.index');
    }
    public function view_pos_penerimaan(){
        return view('pos.penerimaan.index');
    }
    public function view_terima_lain(){
        return view('lain_lain.penerimaan.index');
    }
    public function view_keluar_lain(){
        return view('lain_lain.pengeluaran.index');
    }
    public function view_pos_pembayaran(){
        return view('pos.pengeluaran.index');
    }
    public function view_pembayaran_siswa(){
        return view('pembayaran_siswa.index');
    }
    public function view_metode_pembayaran(){
        return view('master.metode_pembayaran.index');
    }
    public function view_laporan_tahunan(){
        return view('laporan.tahunan.index');
    }
    public function view_laporan_bulanan(){
        return view('laporan.bulanan.index');
    }
    public function view_laporan_harian(){
        return view('laporan.harian.index');
    }
    public function view_biaya_siswa(){
        return view('biaya_siswa.index');
    }
    public function view_wa_gateway(){
        return view('gateway.wa.index');
    }


    public function logout(Request $request){
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('../sekolahApp/');
       }
    
}
