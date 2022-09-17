<?php

namespace App\Http\Controllers;

use App\Models\PengembalianBuku;
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

            $siswa = DB::table('data_siswas')->select(['data_siswas.*'])->get();
            $denda = DB::table('dendas')->select(['dendas.*'])->get();
            $data = DB::table('data_bukus')
                        ->join('peminjaman_bukus', 'peminjaman_bukus.id_buku', '=', 'data_bukus.kode_buku')
                        ->get();
            return view('transaksi.pengembalian.index',compact (['siswa','denda','data']));
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
        //

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
        //
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
