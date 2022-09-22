<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SarprasLahan;
use App\Models\SarprasKepemilikanLahan;
use App\Models\SarprasPenggunaanLahan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;


class LahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        // $lahan = SarprasLahan::latest()->get();
        $lahan = DB::table('sarpras_lahans')->select(['sarpras_lahans.*'])->get();
        return view('asset_tetap.lahan.index',compact ('lahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('asset_tetap.lahan.create');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = SarprasLahan::findOrFail($id);
        $lahan = DB::table('sarpras_lahans')->select(['sarpras_lahans.*'])->get();
        $kepemilikan = DB::table('sarpras_kepemilikan_lahans')->select(['sarpras_kepemilikan_lahans.*'])->get();
        $pengguna = DB::table('sarpras_penggunaan_lahans')->select(['sarpras_penggunaan_lahans.*'])->get();
        // $kepemilikan = SarprasKepemilikanLahan::latest()->get();
        $pemggunaan = SarprasPenggunaanLahan::latest()->get();
        $data_kepemilikan = DB::table('sarpras_lahans')
                    ->join('sarpras_kepemilikan_lahans', 'sarpras_lahans.nama_lahan', '=', 'sarpras_kepemilikan_lahans.nama_lahan')
                    ->get();
        $data_pengguna = DB::table('sarpras_lahans')
                    ->join('sarpras_penggunaan_lahans', 'sarpras_lahans.nama_lahan', '=', 'sarpras_penggunaan_lahans.nama_lahan')
                    ->get();            
        return view('asset_tetap.lahan.tampil',compact (['lahan', 'data_kepemilikan', 'data_pengguna']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SarprasLahan::findOrFail($id);
        $lahan = DB::table('sarpras_lahans')->select(['sarpras_lahans.*'])->get();
        $kepemilikan = DB::table('sarpras_kepemilikan_lahans')->select(['sarpras_kepemilikan_lahans.*'])->get();
        $pengguna = DB::table('sarpras_penggunaan_lahans')->select(['sarpras_penggunaan_lahans.*'])->get();
        // $kepemilikan = SarprasKepemilikanLahan::latest()->get();
        $pemggunaan = SarprasPenggunaanLahan::latest()->get();
        $data_kepemilikan = DB::table('sarpras_lahans')
                    ->join('sarpras_kepemilikan_lahans', 'sarpras_lahans.nama_lahan', '=', 'sarpras_kepemilikan_lahans.nama_lahan')
                    ->get();
        $data_pengguna = DB::table('sarpras_lahans')
                    ->join('sarpras_penggunaan_lahans', 'sarpras_lahans.nama_lahan', '=', 'sarpras_penggunaan_lahans.nama_lahan')
                    ->get();            
        return view('asset_tetap.lahan.edit',compact (['lahan', 'data_kepemilikan', 'data_pengguna', 'data']));
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
    }
}
