<?php

namespace App\Http\Controllers;

use App\Models\anggota_ekstra;
use App\Models\data_siswa;
use App\Models\Ekstrakulikuler;
use App\Models\jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class AnggotaEkstraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kelas = Kelas::latest()->get();
        $ekstra = Ekstrakulikuler::latest()->get();
        $jurusan = jurusan::latest()->get();
        return view('ekstrakulikuler.anggota_ekstra.index',compact(['kelas','ekstra','jurusan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->where([['data_siswas.status_siswa','=','Aktif']])
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        $ekstra = Ekstrakulikuler::latest()->get();
        return view('ekstrakulikuler.anggota_ekstra.create',compact(['siswa','ekstra']));
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
        $validate = $this->validate($request,[
            'tgl_daftar' => ['required'],
            'kode_siswa' => ['required'],
            'kode_ekstra' => ['required'],
        ]);
        if($validate){
            $create = anggota_ekstra::create([
                'tanggal_daftar' => $request->tgl_daftar,
                 'kode_siswa' => $request->kode_siswa,
                 'kode_ekstra' => $request->kode_ekstra,
            ]);
            if($create){                
                return redirect()
                ->route('anggota_ekstra.index')
                ->with([
                    'success' => 'Anggota Ekstra Has Been Added successfully'
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
