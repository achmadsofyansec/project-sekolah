<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SarprasSaranaAdministrasi;

class SaranaAdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administrasi = SarprasSaranaAdministrasi::latest()->get();
        return view('asset_tetap.sarana_administrasi.index',compact('administrasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset_tetap.sarana_administrasi.create');
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
            $create = SarprasSaranaAdministrasi::create($data);

            if($create){
                return redirect()
                ->route('sarana_administrasi.index')
                ->with([
                    'success' => 'Sarana Administrasi Has Been Added successfully'
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
        $data = SarprasSaranaAdministrasi::findOrFail($id);
        return view('asset_tetap.sarana_administrasi.edit',compact('data'));
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


            $update = SarprasSaranaAdministrasi::findOrFail($id);
            $update->update($data);
            if($update){
                return redirect()
                ->route('sarana_administrasi.index')
                ->with([
                    'success' => 'Data Sarana Administrasi Has Been Update successfully'
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
        $data = SarprasSaranaAdministrasi::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('sarana_administrasi.index')
            ->with([
                'success' => 'Data Sarana Administrasi Has Been Deleted successfully'
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
