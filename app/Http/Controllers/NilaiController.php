<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\data_siswa;
use App\Models\KelulusanNilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lulus = KelulusanNilai::latest()->get();
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        $data = KelulusanNilai::join('data_siswas','kelulusan_nilais.kode_siswa','=','data_siswas.id')
                                        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
                                        ->where([['data_siswas.status_siswa','=','Aktif']])
                                        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*'
                                            ,'kelulusan_nilais.kode_ujian as kode_kode_ujian'
                                            ,'kelulusan_nilais.*','kelulusan_nilais.id as id_kelulusan']);
        return view('nilai.index',compact(['data', 'lulus', 'siswa']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nilai.create');
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
            'kode_siswa' => ['required'],
            'kode_ujian' => ['required'],
            'bind' => ['required'],
            'bing' => ['required'],
            'mat' => ['required'],
            'kejurusan' => ['required'],
            'status' => ['required'],
        ]);
        if($validate){
            $cek = SarprasPeminjamans::where([['kode_siswa','=',$request->kode_siswa]])->get()->first();
            if(!$cek){
                $qode = Str::random(6);
                $length = SarprasPeminjamans::latest()->get()->count();
                $kode = 'PMJ_'.$qode.$length;
                $create= SarprasPeminjamans::create([
                    'kode_peminjaman' => $kode,
                    'kode_siswa' => $request->kode_siswa,
                    'kode_ujian' => $request->kode_ujian,
                    'bind' => $request->bind,
                    'bing' => $request->bing,
                    'mat' => $request->mat,
                    'kejurusan' => $request->kejurusan,
                ]);
                if($create){
                    return redirect()
                    ->route('peminjaman.index')
                    ->with([
                        'success' => 'Peminjman Has Been Added successfully'
                    ]);
                }else{
                    return redirect()
                    ->back()
                    ->with([
                        'error' => 'Some problem has occurred, please try again'
                    ]);
                }
            }else{
                return redirect()
                    ->route('peminjman.index')
                    ->with([
                        'success' => 'Peminjaman Has Been Already Added'
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
