<?php

namespace App\Http\Controllers;

use App\Models\predikat;
use Illuminate\Http\Request;

class PredikatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $predikat = predikat::latest()->get();
        return view('nilai.predikat.index',compact('predikat'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $data = predikat::findOrFail($id);
        return view('nilai.predikat.edit',compact('data'));

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
            'predikat_dari' => ['required'],
            'predikat_sampai' => ['required'],
            'grade' => ['required'],
            'keterangan' => ['required'],
        ]);
        if($validate){
            $update = predikat::findOrFail($id);
            $update->update([
                'dari' => $request->predikat_dari,
                'sampai' => $request->predikat_sampai,
                'grade' => $request->grade,
                'keterangan' => $request->keterangan,
            ]);
            if($update){
                return redirect()
                ->route('predikat.index')
                ->with([
                    'success' => 'Predikat Has Been Update successfully'
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
    }
}
