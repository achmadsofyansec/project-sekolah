<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function index(Request $request)
    {
        $data = DB::table('sekolahs')->select(['sekolahs.*','sekolahs.id as id_sekolah'])->first();
        $buku = Buku::latest()->get();
        $pinjaman = Peminjaman_buku::latest()->get();
        $pengunjung = Pengunjung_perpus::latest()->get();
        return view('dashboard', compact('buku', 'pinjaman', 'pengunjung','data'));
    }

    public function pengembalian()
    {
        return view('transaksi.pengembalian.index');
    }

    public function laporan_peminjaman()
    {
        $data = DB::table('sekolahs')->select(['sekolahs.*','sekolahs.id as id_sekolah'])->first();
        $img = config('app.url').'/assets/uploads/'.$data->logo_sekolah;
        $denda = DB::table('perpustakaan_dendas')->get();
        $peminjaman = DB::table('perpustakaan_peminjaman_buku_dts')
        ->join('data_siswas','data_siswas.nisn','=','perpustakaan_peminjaman_buku_dts.id_siswa')->get();
        return view('laporan.peminjaman.index', compact('peminjaman','denda','img'));
    }


    public function denda()
    {
        $cek = Denda::latest()->get();
        $data = null;
        if($cek->count() > 0){
            $data = $cek->first();
        }
        return view('pengaturan.denda',compact(['data']));
    }

    public function denda_save(Request $request)
    {
        $credential = $this->validate($request,[
            'denda' => ['required'],
        ]);
        if($credential){
            $cek = Denda::latest()->get();
            $data = "";
            if($cek->count() > 0){
                $data = $cek->first();
                $data->update([
                    'tarif_denda'=> $request->denda
                ]);
            }else{
                $data = Denda::create([
                    'tarif_denda' => $request->denda,
                ]);
            }
            if($data){
                return redirect()
                ->back()
                ->with([
                    'success' => 'Denda Has Been Added successfully'
                ]);
            }else{
                return redirect()
                ->back()
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
            }
        }else{
            return redirect()
            ->back()
            ->with([
                'error' => 'Some problem has occurred, please try again'
            ]);
        }
    }

    public function laporan_buku()
    {
        $buku = Buku::latest()->get();
        return view('laporan.buku.index', compact('buku'));
    }

    public function laporan_pengunjung()
    {
        $data = DB::table('sekolahs')->select(['sekolahs.*','sekolahs.id as id_sekolah'])->first();
        $img = config('app.url').'/assets/uploads/'.$data->logo_sekolah;
        $pengunjung = DB::table('perpustakaan_pengunjung_perpuses')
                            ->join('data_siswas','data_siswas.nisn','=','perpustakaan_pengunjung_perpuses.nis')
                            ->get();
        return view('laporan.pengunjung.index', compact('pengunjung','img'));
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('../sekolahApp/');
    }

}
