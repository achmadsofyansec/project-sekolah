<?php

namespace App\Http\Controllers;


use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dokumen = Dokumen::latest()->get();
        return view('dokumen.input.index',compact('dokumen'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('dokumen.input.create');
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
            // 'ruangan' => ['required'],
            // 'lemari' => ['required'],
            // 'rak' => ['required'],
            // 'box' => ['required'],
            // 'map' => ['required'],
            // 'urut' => ['required'],
            // 'tanggal_dokumen' => ['required'],
            // 'jenis_dokumen' => ['required'],
            // 'nomor_dokumen' => ['required'],
            // 'nama_dokumen' => ['required'],
            // 'deskripsi' => ['required'],
        ]);
        if($credential){
            $create = ArsipJenisDokumen::create([
                'nama_jenis_dokumen' => $request->nama_jenis_dokumen
            ]);
            if($create){
                return redirect()
                ->route('jenis_dokumen.index')
                ->with([
                    'success' => 'Dokumen Has Been Added successfully'
                ]);
            }else{
                return redirect()
                ->back()
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
            }
        }else{
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
        $data = Dokumen::findOrFail($id);
        return view('dokumen.input.edit',compact('data'));

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
        
        // $validate = $this->validate($request,[
        //     'nama_jenis_dokumen' => ['required']
        // ]);
        // if($validate){
        //     $update = ArsipJenisDokumen::findOrFail($id);
        //     $update->update([
        //         'nama_jenis_dokumen' => $request->nama_jenis_dokumen
        //     ]);
        //     if($update){
        //         return redirect()
        //         ->route('jenis_dokumen.index')
        //         ->with([
        //             'success' => 'Jenis Dokumen Has Been Update successfully'
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
        // $data = ArsipJenisDokumen::findOrFail($id);
        // $data->delete();
        // if($data){
        //     return redirect()
        //     ->route('jenis_dokumen.index')
        //     ->with([
        //         'success' => 'Jenis Dokumen Has Been Deleted successfully'
        //     ]);
        // }else{
        //     return redirect()
        //     ->back()
        //     ->with([
        //         'error' => 'Some problem has occurred, please try again'
        //     ]);
        // }
    }
}
