<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SarprasPengembalian;
use App\Models\SarprasPeminjamans;
use App\Models\SarprasDataAset;
use App\Models\data_siswa;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalian = SarprasPengembalian::join('data_siswas', 'data_siswas.id', '=', 'sarpras_peminjamans.kode_siswa')
                                                    ->join('sarpras_peminjamans', 'sarpras_pengembalians.kode_siswa', '=', 'sarpras_peminjamans.kode_siswa')->get();
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        $kategori = SarprasDataAset::latest()->get();
        $data = SarprasPeminjamans::join('data_siswas','sarpras_peminjamans.kode_siswa','=','data_siswas.id')
                                        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
                                        ->where([['data_siswas.status_siswa','=','Aktif']])
                                        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*'
                                            ,'sarpras_peminjamans.kode_peminjaman as kode_peminjaman'
                                            ,'sarpras_peminjamans.*','sarpras_peminjamans.id as id_peminjaman']);
        return view('pengembalian.index',compact(['data','siswa', 'kategori', 'pengembalian']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    }
}
