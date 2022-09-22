<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Peminjaman_buku;
use App\Models\Pengunjung_perpus;

class PeminjamanBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = DB::table('data_siswas')->select(['data_siswas.*'])->get();
        $buku = DB::table('data_bukus')->select(['data_bukus.*'])->get();
        $peminjaman = Peminjaman_buku::latest()->get();
        $data = DB::table('data_bukus')
                    ->join('peminjaman_bukus', 'peminjaman_bukus.id_buku', '=', 'data_bukus.kode_buku')
                    ->where('status','LIKE', "1" )
                    ->get();
        return view('transaksi.peminjaman.index',compact (['siswa','buku','data']));
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
        //
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
