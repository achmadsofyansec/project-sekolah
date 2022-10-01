<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Peminjaman_buku;
use App\Models\Pengunjung_perpus;
use App\Models\Buku;

class PeminjamanBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $siswa = DB::table('data_siswas')->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        $data = DB::table('perpustakaan_peminjaman_bukus')
        ->join('data_siswas','data_siswas.nisn','=','perpustakaan_peminjaman_bukus.id_siswa')
        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->where('status','LIKE','1')
        ->get(['data_siswas.*','perpustakaan_peminjaman_bukus.id_siswa as id_peminjaman','perpustakaan_peminjaman_bukus.*','aktivitas_belajars.*']);
        

        return view('transaksi.peminjaman.index',compact (['siswa','data']));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
            //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $credential = $this->validate($request,[
            'nis' => ['required'],
            'nama' =>['required'],
            'kode_buku' => ['required'],
            'jumlah_pinjam' => ['required'],
            'status' => ['required'],
            'durasi' => ['required'],
            'tanggal_pinjam' => ['required'],
            'keperluan' => ['required'],
            'nama_kelas' => ['required']
        ]);
        if($credential){
            $create1 = Pengunjung_perpus::create([
                'nis' => $request->nis,
                'nama_siswa' => $request->nama,
                'kelas' => $request->nis,
                'keperluan' => $request->keperluan
            ]);
            $create = Peminjaman_buku::create([
                'id_siswa' => $request->nis,
                'id_buku' => $request->kode_buku,
                'jumlah_pinjam' => $request->jumlah_pinjam,
                'status' => $request->status,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'durasi' => $request->durasi
            ]);
            if($create){
                return redirect()
                ->route('peminjaman_buku.index')
                ->with([
                    'success' => 'Pinjam Buku Has Been Added successfully'
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('perpustakaan_peminjaman_buku_dts')
        ->join('data_siswas','data_siswas.nisn','=','perpustakaan_peminjaman_buku_dts.id_siswa')
        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->where('perpustakaan_peminjaman_buku_dts.id_siswa','=', $id)
        ->get(['data_siswas.*','perpustakaan_peminjaman_buku_dts.id_siswa as id_peminjaman','perpustakaan_peminjaman_buku_dts.*','aktivitas_belajars.*'])->first();
        $buku = DB::table('perpustakaan_data_bukus')->get();
        $denda = DB::table('perpustakaan_dendas')->get();
        $pinjam = DB::table('perpustakaan_peminjaman_buku_dts')->where('id_siswa','=',$id)->get();


        return view('transaksi.peminjaman.edit',compact('data','denda','pinjam','buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Peminjaman_buku::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('peminjaman_buku.index')
            ->with([
                'success' => 'Transaksi Has Been Deleted successfully'
            ]);
        }else{
            return redirect()
            ->back()
            ->with([
                'error' => 'Some problem has occurred, please try again'
            ]);
        }
    }
}
