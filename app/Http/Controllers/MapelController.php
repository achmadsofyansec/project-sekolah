<?php

namespace App\Http\Controllers;

use App\Models\kelompok_pelajaran;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mapel = MataPelajaran::join('kelompok_pelajarans','mata_pelajarans.kode_kelompok','=','kelompok_pelajarans.kode_kelompok')
                ->get(['mata_pelajarans.*','kelompok_pelajarans.*','mata_pelajarans.id as mapelid']);
        return view('pembelajaran.mata_pelajaran.index',compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kelompok = kelompok_pelajaran::where('status_kelompok','=','Aktif')->get();
        return view('pembelajaran.mata_pelajaran.create',compact('kelompok'));
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
        $credential = $this->validate($request,[
            'kelompok' => ['required'],
            'kode_mapel' => ['required'],
            'nama_mapel' => ['required'],
            'status_mapel' => ['required'],
        ]);
        if($credential){
            $create = MataPelajaran::create([
                'kode_kelompok' => $request->kelompok,
                'kode_mapel' => $request->kode_mapel,
                'nama_mapel' => $request->nama_mapel,
                'status_mapel' => $request->status_mapel,
            ]);
            if($create){
                return redirect()
                ->route('mapel.index')
                ->with([
                    'success' => 'Mata Pelajaran Has Been Added successfully'
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
            ->back()
            ->with([
                'error' => 'Some problem has occurred, please try again'
            ]);
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
        $kelompok = kelompok_pelajaran::where('status_kelompok','=','Aktif')->get();
        $data = MataPelajaran::findOrFail($id);
        return view('pembelajaran.mata_pelajaran.edit',compact(['kelompok','data']));
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
        $credential = $this->validate($request,[
            'kelompok' => ['required'],
            'kode_mapel' => ['required'],
            'nama_mapel' => ['required'],
            'status_mapel' => ['required'],
        ]);
        if($credential){
            $update = MataPelajaran::findOrFail($id);
            
            $update->update([
                'kode_kelompok' => $request->kelompok,
                'kode_mapel' => $request->kode_mapel,
                'nama_mapel' => $request->nama_mapel,
                'status_mapel' => $request->status_mapel,
            ]);
            if($update){
                return redirect()
                ->route('mapel.index')
                ->with([
                    'success' => 'Mata Pelajaran Has Been Updated successfully'
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
            ->back()
            ->with([
                'error' => 'Some problem has occurred, please try again'
            ]);
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
        $data = MataPelajaran::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('mapel.index')
            ->with([
                'success' => 'Mata Pelajaran Has Been Deleted successfully'
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
