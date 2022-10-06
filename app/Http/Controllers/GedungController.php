<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SarprasGedung;
use App\Models\SarprasLahan;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gedung = SarprasGedung::latest()->get();
        return view('asset_tetap.gedung.index',compact('gedung'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $lahan = SarprasLahan::latest()->get();
        return view('asset_tetap.gedung.create', compact('lahan'));
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
            'nama_gedung' => ['required'],
            'nama_lahan' => ['required'],
            'jml_lantai' => ['required'],
            'kepemilikan' => ['required'],
            'kondisi_kerusakan' => ['required'],
            'kategori_kondisi' => ['required'],
            'tahun_dibangun' => ['required'],
            'luas_gedung' => ['required'],
        ]);
        if($credential){
            $create = SarprasGedung::create([
                'nama_gedung' => $request->nama_gedung,
                'nama_lahan' => $request->nama_lahan,
                'jml_lantai' => $request->jml_lantai,
                'kepemilikan' => $request->kepemilikan,
                'kondisi_kerusakan' => $request->kondisi_kerusakan,
                'kategori_kondisi' => $request->kategori_kondisi,
                'tahun_dibangun' => $request->tahun_dibangun,
                'luas_gedung' => $request->luas_gedung,
            ]);
            if($create){
                return redirect()
                ->route('gedung.index')
                ->with([
                    'success' => 'Data Gedung Has Been Added successfully'
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
        $data = SarprasGedung::findOrFail($id);
        $lahan = SarprasLahan::latest()->get();
        return view('asset_tetap.gedung.edit',compact(['data', 'lahan']));
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
        $validate = $this->validate($request,[
            'nama_gedung' => ['required'],
            'nama_lahan' => ['required'],
            'jml_lantai' => ['required'],
            'kepemilikan' => ['required'],
            'kondisi_kerusakan' => ['required'],
            'kategori_kondisi' => ['required'],
            'tahun_dibangun' => ['required'],
            'luas_gedung' => ['required'], 
        ]);
        if($validate){
            $update = SarprasGedung::findOrFail($id);
            $update->update([
                
                'nama_gedung' => $request->nama_gedung,
                'nama_lahan' => $request->nama_lahan,
                'jml_lantai' => $request->jml_lantai,
                'kepemilikan' => $request->kepemilikan,
                'kondisi_kerusakan' => $request->kondisi_kerusakan,
                'kategori_kondisi' => $request->kategori_kondisi,
                'tahun_dibangun' => $request->tahun_dibangun,
                'luas_gedung' => $request->luas_gedung,
            ]);
            if($update){
                return redirect()
                ->route('gedung.index')
                ->with([
                    'success' => 'Gedung Has Been Update successfully'
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
        $data = SarprasGedung::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('gedung.index')
            ->with([
                'success' => 'Data Gedung Has Been Deleted successfully'
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
