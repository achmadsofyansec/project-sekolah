<?php

namespace App\Http\Controllers;


use App\Models\Dokumen;
use App\Models\ArsipJenisDokumen;
use Illuminate\Http\Request;

class JenisDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dokumen = ArsipJenisDokumen::latest()->get();
        return view('dokumen.jenis.index',compact('dokumen'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokumen.jenis.create');
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
            'nama_jenis_dokumen' => ['required']
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
        $data = ArsipJenisDokumen::findOrFail($id);
        return view('dokumen.jenis.edit',compact('data'));

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
            'nama_jenis_dokumen' => ['required']
        ]);
        if($validate){
            $update = ArsipJenisDokumen::findOrFail($id);
            $update->update([
                'nama_jenis_dokumen' => $request->nama_jenis_dokumen
            ]);
            if($update){
                return redirect()
                ->route('jenis_dokumen.index')
                ->with([
                    'success' => 'Jenis Dokumen Has Been Update successfully'
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
        $data = ArsipJenisDokumen::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('jenis_dokumen.index')
            ->with([
                'success' => 'Jenis Dokumen Has Been Deleted successfully'
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
