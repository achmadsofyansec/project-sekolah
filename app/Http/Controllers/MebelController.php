<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SarprasMebel;

class MebelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mebel = SarprasMebel::latest()->get();
        return view('asset_tetap.mebel.index',compact('mebel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset_tetap.mebel.create');
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
            'jml_baik' => ['required'],
            'jml_rusak_ringan' => ['required'],
            'jml_rusak_berat' => ['required'],
        ]);

        if($credential){
            $data = [];
            $foto = $request->file('foto');
            if($foto != null){
                $name = $request->file('foto')->getClientOriginalName();
                $foto->move(public_path('uploads'),$name);
                $data = [
                'unit' => $request->unit,
                'jml_baik' => $request->jml_baik,
                'jml_rusak_ringan' => $request->jml_rusak_ringan,
                'jml_rusak_berat' => $request->jml_rusak_berat,
                'foto' => $name,
                ];
            } else {
                $data = [
                'unit' => $request->unit,
                'jml_baik' => $request->jml_baik,
                'jml_rusak_ringan' => $request->jml_rusak_ringan,
                'jml_rusak_berat' => $request->jml_rusak_berat,
                

                ];
            }
            $create = SarprasMebel::create($data);

            if($create){
                return redirect()
                ->route('mebel.index')
                ->with([
                    'success' => 'Data Mebel Has Been Added successfully'
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
        $data = SarprasMebel::findOrFail($id);
        return view('asset_tetap.mebel.edit',compact('data'));
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
            'jml_baik' => ['required'],
            'jml_rusak_ringan' => ['required'],
            'jml_rusak_berat' => ['required'],
        ]);
        if($validate){
            $data = [];
            $foto = $request->file('foto');
            if($foto != null){
                $name = $request->file('foto')->getClientOriginalName();
                $foto->move(public_path('uploads'),$name);
                $data = [
                'unit' => $request->unit,
                'jml_baik' => $request->jml_baik,
                'jml_rusak_ringan' => $request->jml_rusak_ringan,
                'jml_rusak_berat' => $request->jml_rusak_berat,
                'foto' => $name,
                ];
            } else {
                $data = [
                'unit' => $request->unit,
                'jml_baik' => $request->jml_baik,
                'jml_rusak_ringan' => $request->jml_rusak_ringan,
                'jml_rusak_berat' => $request->jml_rusak_berat,
                'foto' => '-',
                ];
            }


            $update = SarprasMebel::findOrFail($id);
            $update->update($data);
            if($update){
                return redirect()
                ->route('mebel.index')
                ->with([
                    'success' => 'Data Mebel Has Been Update successfully'
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
        $data = SarprasMebel::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('mebel.index')
            ->with([
                'success' => 'Data Mebel Has Been Deleted successfully'
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
