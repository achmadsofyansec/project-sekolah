<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tamu = Tamu::latest()->get();
        return view('datatamu.index',compact('tamu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datatamu.create');
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
            'nama' => ['required'],
            'asal' => ['required'],
            'alamat' => ['required'],
            'keperluan' => ['required'],
            'telepon' => ['required'],
        ]);
        if($credential){
            $create = Tamu::create([
                'nama' => $request->nama,
                'asal' => $request->asal,
                'alamat' => $request->alamat,
                'keperluan' => $request->keperluan,
                'telepon' => $request->telepon,
            ]);
            if($create){
                return redirect()
                ->route('datatamu.index')
                ->with([
                    'success' => 'Data Tamu Has Been Added successfully'
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
        $data = Tamu::findOrFail($id);
        return view('datatamu.edit',compact('data'));
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
            'nama' => ['required'],
            'asal' => ['required'],
            'alamat' => ['required'],
            'keperluan' => ['required'],
            'telepon' => ['required'],
        ]);
        if($validate){
            $update = Tamu::findOrFail($id);
            $update->update([
                'nama' => $request->nama,
                'asal' => $request->asal,
                'alamat' => $request->alamat,
                'keperluan' => $request->keperluan,
                'telepon' => $request->telepon,
            ]);
            if($update){
                return redirect()
                ->route('datatamu.index')
                ->with([
                    'success' => 'Data Tamu Has Been Update successfully'
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
        $data = Tamu::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('datatamu.index')
            ->with([
                'success' => 'Data Tamu Has Been Deleted successfully'
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
