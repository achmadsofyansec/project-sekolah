<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman_buku_dts;
use App\Models\Peminjaman_buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;

class PeminjamanBukuDtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = DB::table('data_siswas')->select(['data_siswas.*'])->get();
        $pengembalian = DB::table('peminjaman_buku_dts')->select(['peminjaman_buku_dts.*'])->get();
        return view('transaksi.pengembalian.index',compact ('siswa','pengembalian'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman_buku_dts  $peminjaman_buku_dts
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman_buku_dts $peminjaman_buku_dts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman_buku_dts  $peminjaman_buku_dts
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman_buku_dts $peminjaman_buku_dts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman_buku_dts  $peminjaman_buku_dts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman_buku_dts $peminjaman_buku_dts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman_buku_dts  $peminjaman_buku_dts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman_buku_dts $peminjaman_buku_dts)
    {
        //
    }
}
