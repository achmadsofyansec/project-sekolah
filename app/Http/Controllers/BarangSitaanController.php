<?php

namespace App\Http\Controllers;

use App\Models\barang_sitaan;
use App\Models\data_siswa;
use Illuminate\Http\Request;

class BarangSitaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang_sita = barang_sitaan::latest()->get();
        return view('barang_sitaan.index',compact('barang_sita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')->where([['data_siswas.status_siswa','=','Aktif']])->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        return view('barang_sitaan.create',compact('siswa'));
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
        $data = barang_sitaan::findOrFail($id);
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')->where([['data_siswas.status_siswa','=','Aktif']])->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        return view('barang_sitaan.create',compact(['data','siswa']));
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
