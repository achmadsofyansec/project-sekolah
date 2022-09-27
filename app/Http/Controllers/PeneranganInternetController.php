<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SarprasPeneranganInternet;

class PeneranganInternetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internet = SarprasPeneranganInternet::latest()->get();
        return view('asset_tetap.penerangan_internet.index',compact('internet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset_tetap.penerangan_internet.create');
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
            'sumber' => ['required'],
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
                'sumber' => $request->sumber,
                'jml_baik' => $request->jml_baik,
                'jml_rusak_ringan' => $request->jml_rusak_ringan,
                'jml_rusak_berat' => $request->jml_rusak_berat,
                'foto' => $name,
                ];
            } else {
                $data = [
                'unit' => $request->unit,
                'sumber' => $request->sumber,
                'jml_baik' => $request->jml_baik,
                'jml_rusak_ringan' => $request->jml_rusak_ringan,
                'jml_rusak_berat' => $request->jml_rusak_berat,
                'foto' => '-',

                ];
            }
            $create = SarprasPeneranganInternet::create($data);

            if($create){
                return redirect()
                ->route('penerangan_internet.index')
                ->with([
                    'success' => 'Data Penerangan dan Internet Has Been Added successfully'
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
        $data = SarprasPeneranganInternet::findOrFail($id);
        return view('asset_tetap.penerangan_internet.edit',compact('data'));
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
            'sumber' => ['required'],
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
                'sumber' => $request->sumber,
                'jml_baik' => $request->jml_baik,
                'jml_rusak_ringan' => $request->jml_rusak_ringan,
                'jml_rusak_berat' => $request->jml_rusak_berat,
                'foto' => $name,
                ];
            } else {
                $data = [
                'unit' => $request->unit,
                'sumber' => $request->sumber,
                'jml_baik' => $request->jml_baik,
                'jml_rusak_ringan' => $request->jml_rusak_ringan,
                'jml_rusak_berat' => $request->jml_rusak_berat,
                'foto' => '-',
                ];
            }


            $update = SarprasPeneranganInternet::findOrFail($id);
            $update->update($data);
            if($update){
                return redirect()
                ->route('penerangan_internet.index')
                ->with([
                    'success' => 'Data Penerangan & Internet Has Been Update successfully'
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
        $data = SarprasPeneranganInternet::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('penerangan_internet.index')
            ->with([
                'success' => 'Data Penerangan & Internet Has Been Deleted successfully'
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
