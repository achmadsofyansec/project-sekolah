<?php

namespace App\Http\Controllers;

use App\Models\PengembalianBuku;
use App\Models\PeminjamanBukuDt;
use App\Models\Pengunjung_perpus;
use App\Models\Peminjaman_buku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class PengembalianBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = DB::table('data_siswas')->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->get(['data_siswas.*','data_siswas.nisn as id_siswa','aktivitas_belajars.*']);
        $data = DB::table('perpustakaan_peminjaman_bukus')
        ->join('data_siswas','data_siswas.nisn','=','perpustakaan_peminjaman_bukus.id_siswa')
        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->get(['data_siswas.*','data_siswas.id as id_siswa','perpustakaan_peminjaman_bukus.*','perpustakaan_peminjaman_bukus.id as id_peminjaman','aktivitas_belajars.*']);
        

        return view('transaksi.pengembalian.index',compact (['siswa','data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengembalianBuku  $pengembalianBuku
     * @return \Illuminate\Http\Response
     */
    public function show(PengembalianBuku $pengembalianBuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengembalianBuku  $pengembalianBuku
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $data = DB::table('perpustakaan_peminjaman_bukus')
        ->join('data_siswas','data_siswas.nisn','=','perpustakaan_peminjaman_bukus.id_siswa')
        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->where([['perpustakaan_peminjaman_bukus.id_siswa','=',$id]])
        ->get(['data_siswas.*','data_siswas.id as id_siswa','perpustakaan_peminjaman_bukus.id as id_peminjaman','perpustakaan_peminjaman_bukus.*','aktivitas_belajars.*'])->first();
        $buku = DB::table('perpustakaan_data_bukus')->get();
        $tanggungan = DB::table('perpustakaan_peminjaman_buku_dts')->where('status', '=', 'Dipinjam')->where('id_siswa','=',$id)->get();
        $denda = DB::table('perpustakaan_dendas')->get();
        $pinjam = DB::table('perpustakaan_peminjaman_buku_dts')->where('id_siswa','=',$id)->get(['perpustakaan_peminjaman_buku_dts.*','perpustakaan_peminjaman_buku_dts.id as id_pinjam']);
        return view('transaksi.pengembalian.edit',compact(['data','denda','tanggungan','pinjam','buku']));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengembalianBuku  $pengembalianBuku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
        
            $validate = $this->validate($request,[
                'tanggungan' => ['required'],
                'desc_pinjam' => ['required'],
                
            ]);
            if($validate){
                $update = Peminjaman_buku::findOrFail($id);
                $update->update([
                    'tanggungan' => $request->tanggungan,
                    'desc_pinjam' => $request->desc_pinjam,
                ]);
                if($update){
                    return redirect()
                    ->route('pengembalian.index')
                    ->with([
                        'success' => 'peminjaman Has Been Update successfully'
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengembalianBuku  $pengembalianBuku
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengembalianBuku $pengembalianBuku)
    {
        //
    }
}
