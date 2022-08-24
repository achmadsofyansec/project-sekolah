<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Peminjaman_buku;
use App\Models\Buku;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PeminjamanBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = DB::table('kelas')->select(['kelas.*'])->get();
        $siswa = DB::table('data_siswas')->select(['data_siswas.*'])->get();
        return view('transaksi.peminjaman.index',compact('kelas','siswa'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('transaksi.peminjaman.index',compact('siswa','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman_buku  $peminjaman_buku
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman_buku $peminjaman_buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman_buku  $peminjaman_buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman_buku $peminjaman_buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman_buku  $peminjaman_buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman_buku $peminjaman_buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman_buku  $peminjaman_buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman_buku $peminjaman_buku)
    {
        //
    }
}
