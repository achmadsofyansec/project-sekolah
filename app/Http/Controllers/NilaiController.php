<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\akademik_nilai;
use App\Models\jurusan;
use App\Models\Kelas;
use App\Models\tahun_ajaran;

class NilaiController extends Controller
{
    public function view_input_capaian(){
        $data = akademik_nilai::where([['type_nilai','=','capaian']])->get();
        return view('nilai.input_nilai.capaian.index',compact(['data']));
    }
    public function view_input_ekstra(){
        $data = akademik_nilai::where([['type_nilai','=','ekstra']])->get();
        return view('nilai.input_nilai.ekstrakulikuler.index',compact(['data']));
    }
    public function view_input_harian(){
        $kelas = Kelas::where([['status_kelas','=','Aktif']])->get();
        $jurusan = jurusan::where([['status_jurusan','=','Aktif']])->get();
        $tahun_ajaran = tahun_ajaran::latest()->get();
        $data = akademik_nilai::join('kelas','akademik_nilais.kode_kelas','=','kelas.kode_kelas')
        ->join('jurusans','akademik_nilais.kode_jurusan','=','jurusans.kode_jurusan')
        ->join('tahun_ajarans','akademik_nilais.kode_tahun_ajaran','=','tahun_ajarans.kode_tahun_ajaran')
        ->where([['type_nilai','=','harian']])->get(['akademik_nilais.*','akademik_nilais.id as id_nilai','kelas.*','jurusans.*','tahun_ajarans.*']);
        return view('nilai.input_nilai.harian.index',compact(['data','kelas','jurusan','tahun_ajaran']));
    }
    public function view_input_prestasi(){
        $data = akademik_nilai::where([['type_nilai','=','prestasi']])->get();
        return view('nilai.input_nilai.prestasi.index',compact(['data']));
    }
    public function view_input_rapor(){
        $kelas = Kelas::where([['status_kelas','=','Aktif']])->get();
        $jurusan = jurusan::where([['status_jurusan','=','Aktif']])->get();
        $tahun_ajaran = tahun_ajaran::latest()->get();
        $data = akademik_nilai::join('kelas','akademik_nilais.kode_kelas','=','kelas.kode_kelas')
        ->join('jurusans','akademik_nilais.kode_jurusan','=','jurusans.kode_jurusan')
        ->join('tahun_ajarans','akademik_nilais.kode_tahun_ajaran','=','tahun_ajarans.kode_tahun_ajaran')
        ->where([['type_nilai','=','rapor']])->get();
        return view('nilai.input_nilai.rapor.index',compact(['data','kelas','jurusan','tahun_ajaran']));
    }
    public function view_input_ujian(){
        $kelas = Kelas::where([['status_kelas','=','Aktif']])->get();
        $jurusan = jurusan::where([['status_jurusan','=','Aktif']])->get();
        $tahun_ajaran = tahun_ajaran::latest()->get();
        $data = akademik_nilai::join('kelas','akademik_nilais.kode_kelas','=','kelas.kode_kelas')
        ->join('jurusans','akademik_nilais.kode_jurusan','=','jurusans.kode_jurusan')
        ->join('tahun_ajarans','akademik_nilais.kode_tahun_ajaran','=','tahun_ajarans.kode_tahun_ajaran')
        ->where([['type_nilai','=','ujian']])->get();
        return view('nilai.input_nilai.ujian.index',compact(['data','kelas','jurusan','tahun_ajaran']));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $validate = $this->validate($request,[
            'type_nilai' => ['required'],
            'tgl_input' => ['required'],
            'kode_kelas' => ['required'],
            'jurusan' => ['required'],
            'tahun_ajaran' => ['required']
        ]);
        if($validate){
            
            $create = akademik_nilai::create([

            ]);
        }
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
