<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SarprasLapangan;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lapangan = SarprasLapangan::latest()->get();
        return view('asset_tetap.lapangan.index',compact('lapangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset_tetap.lapangan.create');
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
            'kondisi' => ['required'],
            'panjang' => ['required'],
            'lebar' => ['required'],
        ]);

        if($credential){
            $data = [];
            $foto = $request->file('foto');
            if($foto != null){
                $name = $request->file('foto')->getClientOriginalName();
                $foto->move(public_path('uploads'),$name);
                $data = [
                'unit' => $request->unit,
                'kondisi' => $request->kondisi,
                'panjang' => $request->panjang,
                'lebar' => $request->lebar,
                'foto' => $name,
                ];
            } else {
                $data = [
                'unit' => $request->unit,
                'kondisi' => $request->kondisi,
                'panjang' => $request->panjang,
                'lebar' => $request->lebar,
                'foto' => '-',

                ];
            }
            $create = SarprasLapangan::create($data);

            if($create){
                return redirect()
                ->route('lapangan.index')
                ->with([
                    'success' => 'Data Lapangan Has Been Added successfully'
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SarprasLapangan::findOrFail($id);
        return view('asset_tetap.lapangan.edit',compact('data'));
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
            'kondisi' => ['required'],
            'panjang' => ['required'],
            'lebar' => ['required'],
        ]);
        if($validate){
            $data = [];
            $foto = $request->file('foto');
            if($foto != null){
                $name = $request->file('foto')->getClientOriginalName();
                $foto->move(public_path('uploads'),$name);
                $data = [
                'unit' => $request->unit,
                'kondisi' => $request->kondisi,
                'panjang' => $request->panjang,
                'lebar' => $request->lebar,
                'foto' => $name,
                ];
            } else {
                $data = [
                'unit' => $request->unit,
                'kondisi' => $request->kondisi,
                'panjang' => $request->panjang,
                'lebar' => $request->lebar,
                
                ];
            }


            $update = SarprasLapangan::findOrFail($id);
            $update->update($data);
            if($update){
                return redirect()
                ->route('lapangan.index')
                ->with([
                    'success' => 'Data Lapangan Has Been Update successfully'
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
        $data = SarprasLapangan::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('lapangan.index')
            ->with([
                'success' => 'Data Lapangan Has Been Deleted successfully'
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
