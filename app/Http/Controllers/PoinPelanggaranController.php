<?php

namespace App\Http\Controllers;

use App\Models\point_pelanggaran;
use Illuminate\Http\Request;

class PoinPelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $poin = point_pelanggaran::latest()->get();
        return view('pelanggaran.point.index',compact('poin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pelanggaran.point.create');
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
        $validate = $this->validate($request,[
            'kode_poin_pelanggaran' => ['required'],
            'nama_poin_pelanggaran' => ['required'],
            'poin_pelanggaran' => ['required'],
        ]);
        if($validate){
            $create = point_pelanggaran::create([
                'kode_poin' => $request->kode_poin_pelanggaran,
                'nama_poin_pelanggaran' => $request->nama_poin_pelanggaran,
                'poin' => $request->poin_pelanggaran,

            ]);
            if($create){
                return redirect()
                ->route('point_pelanggaran.index')
                ->with([
                    'success' => 'Poin Has Been Add successfully'
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
        $data = point_pelanggaran::findOrFail($id);
        return view('pelanggaran.point.edit',compact('data'));
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
        $validate = $this->validate($request,[
            'kode_poin_pelanggaran' => ['required'],
            'nama_poin_pelanggaran' => ['required'],
            'poin_pelanggaran' => ['required'],
        ]);
        if($validate){
            $update = point_pelanggaran::findOrFail($id);
            $update->update([
                'kode_poin' => $request->kode_poin_pelanggaran,
                'nama_poin_pelanggaran' => $request->nama_poin_pelanggaran,
                'poin' => $request->poin_pelanggaran,

            ]);
            if($update){
                return redirect()
                ->route('point_pelanggaran.index')
                ->with([
                    'success' => 'Poin Has Been Update successfully'
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
        //
        $data = point_pelanggaran::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('point_pelanggaran.index')
            ->with([
                'success' => 'Poin Has Been Deleted successfully'
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
