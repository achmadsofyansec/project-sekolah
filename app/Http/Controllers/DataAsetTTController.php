<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SarprasDataAset;
use App\Models\SarprasKategoriAset;

class DataAsetTTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAset = SarprasDataAset::latest()->get();
        return view('asset_tidak_tetap.asset.index',compact('dataAset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = SarprasKategoriAset::latest()->get();
        $dataAset = SarprasDataAset::latest()->get();
        return view('asset_tidak_tetap.asset.create',compact(['kategori', 'dataAset']));
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
            'unit' => ['required'],
            'kategori' => ['required'],
            'jml_baik' => ['required'],
            'jml_rusak_ringan' => ['required'],
            'jml_rusak_berat' => ['required'],
        ]);

        if($credential){
            $data = [];
            $foto = $request->file('foto');
            if($foto != null){
                $name = $request->file('foto')->getClientOriginalName();
                $foto->move('../assets/upload',$name);
                $data = [
                'unit' => $request->unit,
                'kategori' => $request->kategori,
                'jml_baik' => $request->jml_baik,
                'jml_rusak_ringan' => $request->jml_rusak_ringan,
                'jml_rusak_berat' => $request->jml_rusak_berat,
                'foto' => $name,
                ];
            } else {
                $data = [
                'unit' => $request->unit,
                'kategori' => $request->kategori,
                'jml_baik' => $request->jml_baik,
                'jml_rusak_ringan' => $request->jml_rusak_ringan,
                'jml_rusak_berat' => $request->jml_rusak_berat,
                'foto' => '-',

                ];
            }
            $create = SarprasDataAset::create($data);

            if($create){
                return redirect()
                ->route('aset_tt.index')
                ->with([
                    'success' => 'Data Asset Has Been Added successfully'
                ]);
            }else{
                return redirect()
                ->back()
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
            }
        } else {
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
        $data = SarprasDataAset::findOrFail($id); 
        $kategori = SarprasKategoriAset::latest()->get();
        return view('asset_tidak_tetap.asset.edit',compact(['kategori', 'data']));
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
            'unit' => ['required'],
            'kategori' => ['required'],
            'jml_baik' => ['required'],
            'jml_rusak_ringan' => ['required'],
            'jml_rusak_berat' => ['required'],
        ]);
        if($validate){
            $data = [];
            $foto = $request->file('foto');
            if($foto != null){
                $name = $request->file('foto')->getClientOriginalName();
                $foto->move('../assets/upload',$name);
                $data = [
                'unit' => $request->unit,
                'kategori' => $request->kategori,
                'jml_baik' => $request->jml_baik,
                'jml_rusak_ringan' => $request->jml_rusak_ringan,
                'jml_rusak_berat' => $request->jml_rusak_berat,
                'foto' => $name,
                ];
            } else {
                $data = [
                'unit' => $request->unit,
                'kategori' => $request->kategori,
                'jml_baik' => $request->jml_baik,
                'jml_rusak_ringan' => $request->jml_rusak_ringan,
                'jml_rusak_berat' => $request->jml_rusak_berat,
                'foto' => '-',
                ];
            }


            $update = SarprasDataAset::findOrFail($id);
            $update->update($data);
            if($update){
                return redirect()
                ->route('aset_tt.index')
                ->with([
                    'success' => 'Data Asset Has Been Update successfully'
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
        $data = SarprasDataAset::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('aset_tt.index')
            ->with([
                'success' => 'Data Asset Has Been Deleted successfully'
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
