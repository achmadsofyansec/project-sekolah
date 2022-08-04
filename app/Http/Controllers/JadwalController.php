<?php

namespace App\Http\Controllers;

use App\Models\data_guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\tahun_ajaran;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Jadwal::join('data_gurus','jadwals.kode_guru','=','data_gurus.id')
                        ->join('kelas','jadwals.kode_kelas','=','kelas.kode_kelas')
                        ->join('tahun_ajarans','jadwals.kode_tahun_ajaran','=','tahun_ajarans.kode_tahun_ajaran')
                        ->join('mata_pelajarans','jadwals.kode_mapel','=','mata_pelajarans.kode_mapel')
                        ->get(['jadwals.*','mata_pelajarans.*','kelas.*','data_gurus.*','tahun_ajarans.*','jadwals.id as jadwalid']);
        return view('pembelajaran.jadwal.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mapel = MataPelajaran::latest()->get();
        $guru = data_guru::where('data_gurus.jabatan','=','Guru Mapel')->get();
        $tahun_ajaran = tahun_ajaran::latest()->get();
        $kelas = Kelas::latest()->get();
        return view('pembelajaran.jadwal.create',compact(['mapel','guru','tahun_ajaran','kelas']));
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
            'kode_jadwal' => ['required'],
            'kode_mapel' => ['required'],
            'kode_guru' => ['required'],
            'kode_kelas' => ['required'],
            'kode_tahun_ajaran' => ['required'],
        ]);
        if($validate){
            $create = Jadwal::create([

                'kode_jadwal' => $request->kode_jadwal,
                'kode_guru' => $request->kode_guru,
                'kode_mapel' => $request->kode_mapel,
                'kode_kelas' => $request->kode_kelas,
                'kode_tahun_ajaran' => $request->kode_tahun_ajaran,
            ]);
            if($create){                
                return redirect()
                ->route('jadwal.index')
                ->with([
                    'success' => 'Tahun Ajaran Has Been Added successfully'
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
        $data = Jadwal::findOrFail($id);
        $mapel = MataPelajaran::latest()->get();
        $guru = data_guru::latest()->get();
        $tahun_ajaran = tahun_ajaran::latest()->get();
        $kelas = Kelas::latest()->get();
        return view('pembelajaran.jadwal.edit',compact(['data','mapel','guru','tahun_ajaran','kelas']));
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
        $validate = $this->validate($request,[
            'kode_jadwal' => ['required'],
            'kode_mapel' => ['required'],
            'kode_guru' => ['required'],
            'kode_kelas' => ['required'],
            'kode_tahun_ajaran' => ['required'],
        ]);
        if($validate){
            $update = Jadwal::findOrFail($id);
            $update->update([

                'kode_jadwal' => $request->kode_jadwal,
                'kode_guru' => $request->kode_guru,
                'kode_mapel' => $request->kode_mapel,
                'kode_kelas' => $request->kode_kelas,
                'kode_tahun_ajaran' => $request->kode_tahun_ajaran,
            ]);
            if($update){                
                return redirect()
                ->route('jadwal.index')
                ->with([
                    'success' => 'Tahun Ajaran Has Been Update successfully'
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
