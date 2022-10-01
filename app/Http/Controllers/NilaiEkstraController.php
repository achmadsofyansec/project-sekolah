<?php

namespace App\Http\Controllers;

use App\Models\akademik_nilai_ekstra;
use Illuminate\Http\Request;
use App\Models\data_siswa;

class NilaiEkstraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = akademik_nilai_ekstra::join('data_siswas','akademik_nilai_ekstras.kode_siswa','=','data_siswas.id')
            ->get(['akademik_nilai_ekstras.id as id_ekstras','akademik_nilai_ekstras.*','data_siswas.*']);
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
            ->join("tahun_ajarans","aktivitas_belajars.kode_tahun_ajaran",'=','tahun_ajarans.kode_tahun_ajaran')
            ->where([['data_siswas.status_siswa','=','Aktif']])
            ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*','tahun_ajarans.*']);
        return view('nilai.input_nilai.ekstrakulikuler.index',compact(['data','siswa']));
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
