<?php

namespace App\Http\Controllers;

use App\Models\data_tamu;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tamu = data_tamu::latest()->get();
        return view('tamu.data_tamu.index',compact('tamu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tamu.data_tamu.create');
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
            'nama_tamu'=> ['required'],
            'asal_tamu'=> ['required'],
            'alamat_tamu'=> ['required'],
            'keperluan'=> ['required'],
            'no_telp'=> ['required'],
        ]);
        if($validate){
            $create = data_tamu::create([
                'nama_tamu'=> $request->nama_tamu,
                'asal_tamu'=> $request->asal_tamu,
                'alamat_tamu'=> $request->alamat_tamu,
                'keperluan'=> $request->keperluan,
                'no_telp'=> $request->no_telp,
            ]);
            if($create){
                return redirect()
                ->route('tamu.index')
                ->with([
                    'success' => 'Tamu Has Been Added successfully'
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
        $data = data_tamu::findOrFail($id);
        return view('tamu.data_tamu.edit',compact('data'));
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
            'nama_tamu'=> ['required'],
            'asal_tamu'=> ['required'],
            'alamat_tamu'=> ['required'],
            'keperluan'=> ['required'],
            'no_telp'=> ['required'],
        ]);
        if($validate){
            $update = data_tamu::findOrFail($id);
            $update->update([
                'nama_tamu'=> $request->nama_tamu,
                'asal_tamu'=> $request->asal_tamu,
                'alamat_tamu'=> $request->alamat_tamu,
                'keperluan'=> $request->keperluan,
                'no_telp'=> $request->no_telp,
            ]);
            if($update){
                return redirect()
                ->route('tamu.index')
                ->with([
                    'success' => 'Tamu Has Been Updated successfully'
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
        $data = data_tamu::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('tamu.index')
            ->with([
                'success' => 'Tamu Has Been Deleted successfully'
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
