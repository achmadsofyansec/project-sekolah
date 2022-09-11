<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SarprasKategoriAset;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = SarprasKategoriAset::latest()->get();
        return view('asset_tidak_tetap.kategori_asset.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset_tidak_tetap.kategori_asset.create');
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
            'kategori' => ['required']
        ]);
        if($credential){
            $create = SarprasKategoriAset::create([
                'kategori' => $request->kategori
            ]);
            if($create){
                return redirect()
                ->route('kategori_aset_tt.index')
                ->with([
                    'success' => 'Data Kategori Has Been Added successfully'
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
        $data = SarprasKategoriAset::findOrFail($id);
        return view('kategori_aset_tt.edit',compact('data'));
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
            'kategori' => ['required']
        ]);
        if($validate){
            $update = SarprasKategoriAset::findOrFail($id);
            $update->update([
                'kategori' => $request->kategori
            ]);
            if($update){
                return redirect()
                ->route('kategori_aset_tt.index')
                ->with([
                    'success' => 'Kategori Has Been Update successfully'
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
        $data = SarprasKategoriAset::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('kategori_aset_tt.index')
            ->with([
                'success' => 'Data kategori Has Been Deleted successfully'
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
