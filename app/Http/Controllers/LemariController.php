<?php

namespace App\Http\Controllers;


use App\Models\Dokumen;
use Illuminate\Http\Request;

class LemariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lemari = Dokumen::latest()->get();
        return view('lemari.index',compact('lemari'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('lemari.create');

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
            'lemari' => ['required']
        ]);
        if($credential){
            $create = Dokumen::create([
                'lemari' => $request->lemari
            ]);
            if($create){
                return redirect()
                ->route('lemari.index')
                ->with([
                    'success' => 'Data Lemari Has Been Added successfully'
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
     * Show the form for edi ting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = Dokumen::findOrFail($id);
        return view('lemari.edit',compact('data'));

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
            'lemari' => ['required']
        ]);
        if($validate){
            $update = Dokumen::findOrFail($id);
            $update->update([
                'lemari' => $request->lemari
            ]);
            if($update){
                return redirect()
                ->route('lemari.index')
                ->with([
                    'success' => 'Lemari Has Been Update successfully'
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
