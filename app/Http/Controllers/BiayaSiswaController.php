<?php

namespace App\Http\Controllers;

use App\Models\biaya_siswa;
use App\Models\pos_penerimaan;
use Illuminate\Http\Request;

class BiayaSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = biaya_siswa::latest()->get();
        return view('biaya_siswa.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pos = pos_penerimaan::latest()->get();
        return view('biaya_siswa.create',compact('pos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request,[
            'nama_biaya' => ['required'],
            'pos_biaya' => ['required'],
        ]);
        if($validate){
            
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
        $data = biaya_siswa::findOrFail($id);
        $pos = pos_penerimaan::latest()->get();
        if($data){
            return view('biaya_siswa.edit',compact(['data','pos']));
        }
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = biaya_siswa::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('biaya_siswa.index')
            ->with([
                'success' => 'Biaya Siswa Has Been Deleted successfully'
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
