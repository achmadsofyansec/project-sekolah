<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::latest()->get();
        return view('master.kategori.index',compact('kategori'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('master.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credential = $this->validate($request,[
            'tipe' => ['required'],
            'id_kategori' => ['required'],
            'nama_kategori' => ['required']
        ]);
        if($credential){
            $create = Kategori::create([
                'tipe' => $request->tipe,
                'id_kategori' => $request->id_kategori,
                'nama_kategori' => $request->nama_kategori
            ]);
            if($create){
                return redirect()
                ->route('kategori.index')
                ->with([
                    'success' => 'Kategori Has Been Added successfully'
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
        $data = Kategori::findOrFail($id);
        return view('master.kategori.edit',compact('data'));
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
            'id_kategori' => ['required'],
            'nama_kategori' => ['required'],
            'status_kelompok' => ['required'],
        ]);
        if($credential){
            $create = Kategori::findOrFail($id);
            $create->update([
                'id_kategori' => $request->id_kategori,
                'nama_kategori' => $request->nama_kategori,
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
    $data = Kategori::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('master.kategori.index')
            ->with([
                'success' => 'kategori Has Been Deleted successfully'
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
