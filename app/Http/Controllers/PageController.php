<?php

namespace App\Http\Controllers;

use App\Models\biaya_siswa;
use App\Models\keuangan_penerimaan_lain;
use App\Models\keuangan_penerimaan_lain_detail;
use App\Models\keuangan_pengeluaran_detail;
use App\Models\methode_pembayaran;
use App\Models\pos_penerimaan;
use App\Models\pos_pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(){
        $pos_terima = pos_penerimaan::latest()->get();
        $pos_keluar = pos_pengeluaran::latest()->get();
        $biaya_siswa = biaya_siswa::latest()->get();
        $methode = methode_pembayaran::latest()->get();
        $penerimaan_lain = keuangan_penerimaan_lain_detail::latest()->get();
        $pengeluaran = keuangan_pengeluaran_detail::latest()->get();
        return view('dashboard',compact(['pos_terima','pos_keluar','biaya_siswa','methode','penerimaan_lain','pengeluaran']));
    }
    public function view_tunggakan(){
        return view('tunggakan.index');
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
  
    public function view_pembayaran_siswa(){
        return view('pembayaran_siswa.index');
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
