<?php

namespace App\Http\Controllers;

use App\Models\sanksi_pelanggaran;
use Illuminate\Http\Request;

class SanksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sanksi = sanksi_pelanggaran::latest()->get();
        return view('pelanggaran.sanksi.index',compact('sanksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pelanggaran.sanksi.create');
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
            'kode_sanksi' => ['required'],
            'dari_poin' => ['required'],
            'sampai_poin' => ['required'],
            'sanksi' => ['required'],
        ]);
        if($validate){
            $create = sanksi_pelanggaran::create([
                'kode_sanksi' => $request->kode_sanksi,
                'dari_poin' => $request->dari_poin,
                'sampai_poin' => $request->sampai_poin,
                'sanksi' => $request->sanksi,

            ]);
            if($create){
                return redirect()
                ->route('sanksi.index')
                ->with([
                    'success' => 'Sanksi Has Been Add successfully'
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
        $data = sanksi_pelanggaran::findOrFail($id);
        return view('pelanggaran.sanksi.edit',compact('data'));
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
            'kode_sanksi' => ['required'],
            'dari_poin' => ['required'],
            'sampai_poin' => ['required'],
            'sanksi' => ['required'],
        ]);
        if($validate){
            $update = sanksi_pelanggaran::findOrFail($id);
            $update->update([
                'kode_sanksi' => $request->kode_sanksi,
                'dari_poin' => $request->dari_poin,
                'sampai_poin' => $request->sampai_poin,
                'sanksi' => $request->sanksi,

            ]);
            if($update){
                return redirect()
                ->route('sanksi.index')
                ->with([
                    'success' => 'Sanksi Has Been Update successfully'
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
        $data = sanksi_pelanggaran::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('sanksi.index')
            ->with([
                'success' => 'Sanksi Has Been Deleted successfully'
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
