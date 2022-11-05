<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanPortalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pengaturans')->select(['pengaturans.*', 'pengaturans.id as id_pengaturan'])->first();
        return view('portal.pengaturan.index', compact('data'));
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
            'nama_sekolah' => ['required'],
            'tahun_ajaran' => ['required'],
            'deskripsi' => ['required'],

        ]);
        if($validate){
            $update = Pengaturan::findOrFail($id);
            $update->update([
                'nama_sekolah' => $request->nama_sekolah,
                'tahun_ajaran' => $request->tahun_ajaran,
                'deskripsi' => $request->deskripsi,
            ]);
            $update = DB::table('pengaturans')->where('pengaturans.id','=',$id);
            if($update){
                return redirect()
                ->route('pengaturan.index')
                ->with([
                    'success' => 'Pengaturan Has Been Update successfully'
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
