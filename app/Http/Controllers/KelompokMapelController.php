<?php

namespace App\Http\Controllers;

use App\Models\kelompok_pelajaran;
use Illuminate\Http\Request;

class KelompokMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelompok = kelompok_pelajaran::latest()->get();
        return view('pembelajaran.kelompok.index',compact('kelompok'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembelajaran.kelompok.create');
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
        $credential = $this->validate($request,[
            'kode_kelompok' => ['required'],
            'nama_kelompok' => ['required'],
            'status_kelompok' => ['required'],
        ]);
        if($credential){
            $create = kelompok_pelajaran::create([
                'kode_kelompok' => $request->kode_kelompok,
                'nama_kelompok' => $request->nama_kelompok,
                'status_kelompok' => $request->status_kelompok,
            ]);
            if($create){
                return redirect()
                ->route('kelompok_mapel.index')
                ->with([
                    'success' => 'Kelompok Has Been Added successfully'
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
        $data = kelompok_pelajaran::findOrFail($id);
        return view('pembelajaran.kelompok.edit',compact('data'));
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
            'kode_kelompok' => ['required'],
            'nama_kelompok' => ['required'],
            'status_kelompok' => ['required'],
        ]);
        if($credential){
            $create = kelompok_pelajaran::findOrFail($id);
            $create->update([
                'kode_kelompok' => $request->kode_kelompok,
                'nama_kelompok' => $request->nama_kelompok,
                'status_kelompok' => $request->status_kelompok,
            ]);
            if($create){
                return redirect()
                ->route('kelompok_mapel.index')
                ->with([
                    'success' => 'Kelompok Has Been Updated successfully'
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
        $data = kelompok_pelajaran::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('kelompok_mapel.index')
            ->with([
                'success' => 'Kelompok Has Been Deleted successfully'
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
