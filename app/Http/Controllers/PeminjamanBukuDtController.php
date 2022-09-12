<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanBukuDt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;


class PeminjamanBukuDtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = DB::table('data_siswas')->select(['data_siswas.*'])->get();
        $data = DB::table('data_bukus')
                    ->join('peminjaman_bukus', 'peminjaman_bukus.id_buku', '=', 'data_bukus.kode_buku')
                    ->get();
        return view('transaksi.index',compact (['siswa','data']));
        //
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
    public function store(Request $request)
    {
        $credential = $this->validate($request,[
            'nis' => ['required'],
        ]);
        if($credential){
            $create = Peminjaman_buku::create([
                'id_siswa' => $request->nis,
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
     * @param  \App\Models\PeminjamanBukuDt  $peminjamanBukuDt
     * @return \Illuminate\Http\Response
     */
    public function show(PeminjamanBukuDt $peminjamanBukuDt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeminjamanBukuDt  $peminjamanBukuDt
     * @return \Illuminate\Http\Response
     */
    public function edit(PeminjamanBukuDt $peminjamanBukuDt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PeminjamanBukuDt  $peminjamanBukuDt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PeminjamanBukuDt $peminjamanBukuDt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeminjamanBukuDt  $peminjamanBukuDt
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeminjamanBukuDt $peminjamanBukuDt)
    {
        //
    }
}
