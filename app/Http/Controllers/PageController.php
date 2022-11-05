<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use App\Models\barang_sitaan;
use App\Models\data_siswa;
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
        $siswa = data_siswa::where([['status_siswa','=','Aktif']])->get();
        $poin = point_pelanggaran::latest()->get();
        $sanksi = sanksi_pelanggaran::latest()->get();
        $pelanggaran = pelanggaran::join('data_siswas','pelanggarans.id_siswa','=','data_siswas.id')
        ->join('point_pelanggarans','pelanggarans.id_poin_pelanggaran','=','point_pelanggarans.id')
        ->join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
        ->join('kelas','aktivitas_belajars.kode_kelas','=','kelas.kode_kelas')
        ->where([['tanggal_pelanggaran','>=',date('Y-m-d')],['tanggal_pelanggaran','<=',date('Y-m-d',strtotime('+1 day'))]])
        ->get(['data_siswas.*','aktivitas_belajars.*','kelas.*','pelanggarans.*','pelanggarans.id as id_pelanggaran','point_pelanggarans.*']);
        $barang_sita = barang_sitaan::latest()->get();
        $masuk = absensi::join("data_siswas","data_siswas.id","=",'absensis.kode_siswa')->where([['keterangan','=','Masuk'],['tgl_absensi','>=',date('Y-m-d').' 00:00:00'],['tgl_absensi','<=',date('Y-m-d',strtotime('+1 day')).' 00:00:00']])->get();
        $izin = absensi::join("data_siswas","data_siswas.id","=",'absensis.kode_siswa')->where([['keterangan','=','Izin'],['tgl_absensi','>=',date('Y-m-d').' 00:00:00'],['tgl_absensi','<=',date('Y-m-d',strtotime('+1 day')).' 00:00:00']])->get();
        $tanpa_keterangan = absensi::join("data_siswas","data_siswas.id","=",'absensis.kode_siswa')->where([['keterangan','=','Tanpa Keterangan'],['tgl_absensi','>=',date('Y-m-d').' 00:00:00'],['tgl_absensi','<=',date('Y-m-d',strtotime('+1 day')).' 00:00:00']])->get();
        $sakit = absensi::join("data_siswas","data_siswas.id","=",'absensis.kode_siswa')->where([['keterangan','=','Sakit'],['tgl_absensi','>=',date('Y-m-d').' 00:00:00'],['tgl_absensi','<=',date('Y-m-d',strtotime('+1 day')).' 00:00:00']])->get();
        $belum_absen = $siswa->count() - $masuk->count() - $izin->count() - $tanpa_keterangan->count() - $sakit->count();
        return view('dashboard',compact(['siswa','poin','sanksi','pelanggaran','barang_sita','masuk','izin','tanpa_keterangan','sakit','belum_absen']));
    }
    
    public function view_peminjaman(){
        return view('peminjaman.index');
    }
        
    public function view_point_siswa(){
        return view('point_siswa.index');
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
