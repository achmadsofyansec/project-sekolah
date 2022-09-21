<?php

namespace App\Http\Controllers;

use App\Models\akademik_pindah_kelas;
use App\Models\data_siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class PindahKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = akademik_pindah_kelas::latest()->get();
        return view('pindah_kelas.index',compact(['data']));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::latest()->get();
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
                            ->join("tahun_ajarans","aktivitas_belajars.kode_tahun_ajaran",'=','tahun_ajarans.kode_tahun_ajaran')
        ->where([['data_siswas.status_siswa','=','Aktif']])
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*','tahun_ajarans.*']);
        return view('pindah_kelas.create',compact(['kelas','siswa']));
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
