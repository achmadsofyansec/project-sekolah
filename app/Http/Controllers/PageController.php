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
use DateTime;



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

    // public function laporan_peminjaman( Request $request)
    // {   
    //     $req = $request;
    //     $data = DB::table('sekolahs')->select(['sekolahs.*','sekolahs.id as id_sekolah'])->first();
    //     $img = config('app.url').'/assets/uploads/'.$data->logo_sekolah;
    //     $denda = DB::table('perpustakaan_dendas')->get();
    //     $peminjaman = DB::table('perpustakaan_peminjaman_buku_dts')
    //     ->join('data_siswas','data_siswas.nisn','=','perpustakaan_peminjaman_buku_dts.id_siswa')->get();
    //     return view('laporan.peminjaman.index', compact('peminjaman','denda','img','req'));
    // }

    public function cari_peminjaman(Request $request)
    {
        $data1 = DB::table('sekolahs')->select(['sekolahs.*','sekolahs.id as id_sekolah'])->first();
        $img = config('app.url').'/assets/uploads/'.$data1->logo_sekolah;
        $req = $request;
        $data = "";
        $pengunjung = Peminjaman_buku::latest()->get();
        if($req != null){
            
            $dari_tanggal = $req->tgl_awal != null ? ['perpustakaan_peminjaman_buku_dts.tanggal_pinjam','>=',$req->tgl_awal." 00:00:00"] : ['perpustakaan_peminjaman_buku_dts.tanggal_pinjam','!=',null];
            $sampai_tanggal = $req->tgl_akhir != null ? ['perpustakaan_peminjaman_buku_dts.tanggal_pinjam','<=',$req->tgl_akhir." 23:59:59"] : ['perpustakaan_peminjaman_buku_dts.tanggal_pinjam','!=',null];
            $status = $req->status != null ? ['perpustakaan_peminjaman_buku_dts.status','=',$req->status] : ['perpustakaan_peminjaman_buku_dts.status','!=',null];
            $denda = DB::table('perpustakaan_dendas')->get();
            $laporanpeminjaman = DB::table('perpustakaan_peminjaman_buku_dts')->join('data_siswas','data_siswas.nisn','=','perpustakaan_peminjaman_buku_dts.id_siswa')
            ->where([$dari_tanggal,$sampai_tanggal,$status])
            ->get();
            
            $no = 1;
            foreach ($laporanpeminjaman as $item) {
                $tgl_sekarang = date("Y-m-d");
                $tgl_kembali = $item->tanggal_kembali;
                $sel1 = explode('-',$tgl_kembali);
                $sel1_pecah = $sel1[0].'-'.$sel1[1].'-'.$sel1[2];
                $sel2 = explode('-',$tgl_sekarang);
                $sel2_pecah = $sel2[0].'-'.$sel2[1].'-'.$sel2[2];
                $selisih = strtotime($sel2_pecah) - strtotime($sel1_pecah);
                $selisih = $selisih/86400;
                if($selisih <= 0){
                    $selisihasli = "Tidak";
                }else{
                    $selisihasli = $selisih. " hari";
                }
                $data .='<tr>
                <td>'.$no++.'</td>
                <td>'.$item->nama.'</td>
                <td>'.$item->kode_buku.'</td>
                <td>'.$item->jumlah.'</td>
                <td>'.$item->tanggal_pinjam.'</td>
                <td>'.$item->tanggal_kembali.'</td>
                <td>'.$item->status.'</td>
                <td>'.$selisihasli.'</td>
                </tr>';
                
            }
        }

        return view('laporan.peminjaman.index',compact(['data','img','req','pengunjung']));
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

    public function laporan_pengunjung(Request $request)
    {
        $req = $request;
        $pengunjung = DB::table('perpustakaan_pengunjung_perpuses')
                            ->join('data_siswas','data_siswas.nisn','=','perpustakaan_pengunjung_perpuses.nis')
                            ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
                            ->get(['data_siswas.*','data_siswas.id as id_siswa','perpustakaan_pengunjung_perpuses.*','perpustakaan_pengunjung_perpuses.id as id_pengunjung','aktivitas_belajars.*','perpustakaan_pengunjung_perpuses.updated_at as create_pengunjung']);
        return view('laporan.pengunjung.index', compact('pengunjung','req'));
    }

    public function cari_pengunjung(Request $request)
    {
        $periode = DB::table('tahun_ajarans')->first();
        $data1 = DB::table('sekolahs')->select(['sekolahs.*','sekolahs.id as id_sekolah'])->first();
        $img = config('app.url').'/assets/uploads/'.$data1->logo_sekolah;
        $req = $request;
        $data = "";
        $pengunjung = Pengunjung_perpus::latest()->get();
        if($req != null){
            
            $dari_tanggal = $req->tgl_awal != null ? ['perpustakaan_pengunjung_perpuses.created_at','>=',$req->tgl_awal." 00:00:00"] : ['perpustakaan_pengunjung_perpuses.created_at','!=',null];
            $sampai_tanggal = $req->tgl_akhir != null ? ['perpustakaan_pengunjung_perpuses.created_at','<=',$req->tgl_akhir." 23:59:59"] : ['perpustakaan_pengunjung_perpuses.created_at','!=',null];
            $keperluan1 = $req->keperluan != null ? ['perpustakaan_pengunjung_perpuses.keperluan','=',$req->keperluan] : ['perpustakaan_pengunjung_perpuses.keperluan','!=',null];
           
            $laporanpengunjung = Pengunjung_perpus::join('data_siswas','data_siswas.nisn','=','perpustakaan_pengunjung_perpuses.nis')
            ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
            ->where([$dari_tanggal,$sampai_tanggal,$keperluan1])
            ->get(['data_siswas.*','data_siswas.id as id_siswa','perpustakaan_pengunjung_perpuses.*','perpustakaan_pengunjung_perpuses.id as id_pengunjung','aktivitas_belajars.*','perpustakaan_pengunjung_perpuses.updated_at as create_pengunjung']);
            
            $no = 1;
            foreach ($laporanpengunjung as $item) {
               
                $data .='<tr>
                <td>'.$no++.'</td>
                <td>'.$item->nama.'</td>
                <td>'.$item->kode_kelas. ' / ' .$item->kode_jurusan.'</td>
                <td>'.$item->keperluan.'</td>
                <td>'.$item->create_pengunjung.'</td>
                </tr>';
            }
        }

        return view('laporan.pengunjung.index',compact(['data','img','req','pengunjung','periode']));
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('../sekolahApp/');
    }

}
