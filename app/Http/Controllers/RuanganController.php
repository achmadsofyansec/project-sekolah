<?php

namespace App\Http\Controllers;


use App\Models\Dokumen;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ruangan = Dokumen::latest()->get();
        return view('ruangan.index',compact('ruangan'));
        
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
        // //
        // $data = Pengaturan::findOrFail($id);
        // return view('pengaturan.edit',compact('data'));

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
        // $validate = $this->validate($request,[
        //     'tanggal_pengumuman' => ['required'],
        //     'tahun' => ['required'],
        //     'informasi_kelulusan' => ['required'],
        //     'informasi_lain' => ['required'],
        // ]);
        // if($validate){
        //     $update = Pengaturan::findOrFail($id);
        //     $update->update([
        //         'pengumuman' => $request->tanggal_penguman,
        //         'tahun' => $request->tahun,
        //         'info_kelulusan' => $request->informasi_kelulusan,
        //         'info_lainya' => $request->informasi_lain,
        //     ]);
        //     if($update){
        //         return redirect()
        //         ->route('pengaturan.index')
        //         ->with([
        //             'success' => 'Pengaturan Has Been Update successfully'
        //         ]);
        //     }else{
        //         return redirect()
        //         ->back()
        //         ->with([
        //             'error' => 'Some problem has occurred, please try again'
        //         ]);
        //     }
        // }
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
