<?php

namespace App\Http\Controllers;

use App\Models\Sumber;
use Illuminate\Http\Request;

class SumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sumber = Sumber::latest()->get();
        return view('master.sumber.index',compact ('sumber'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sumber = Sumber::latest()->get();
         return view('master.sumber.create',compact('sumber'));
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
            'nama_sumber' => ['required']
        ]);
        if($credential){
            $create = Sumber::create([
                'nama_sumber' => $request->nama_sumber
            ]);
            if($create){
                return redirect()
                ->route('sumber.index')
                ->with([
                    'success' => 'sumber Has Been Added successfully'
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
        $sumber = Sumber::findOrFail($id);
        return view('master.sumber.edit',compact('sumber'));
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
            'nama_sumber' => ['required']
        ]);
        if($validate){
            $update = Sumber::findOrFail($id);
            $update->update([
                'nama_sumber' => $request->nama_sumber
            ]);
            if($update){
                return redirect()
                ->route('sumber.index')
                ->with([
                    'success' => 'sumber Has Been Update successfully'
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
        $data = Sumber::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('sumber.index')
            ->with([
                'success' => 'Sumber Has Been Deleted successfully'
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
