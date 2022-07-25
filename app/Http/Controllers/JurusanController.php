<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = jurusan::latest()->get();
        return view('jurusan.index',compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurusan.create');
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
            'kode_jurusan' => ['required'],
            'nama_jurusan' => ['required'],
            'status_jurusan' => ['required'],
        ]);
        if($credential){
            $create = jurusan::create([
                'kode_jurusan' => $request->kode_jurusan,
                'nama_jurusan' => $request->nama_jurusan,
                'status_jurusan' => $request->status_jurusan,
            ]);
            if($create){
                return redirect()
                ->route('jurusan.index')
                ->with([
                    'success' => 'Jurusan Has Been Added successfully'
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
        $data = jurusan::findOrFail($id);
        return view('jurusan.edit',compact('data'));
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
        $credential = $this->validate($request,[
            'kode_jurusan' => ['required'],
            'nama_jurusan' => ['required'],
            'status_jurusan' => ['required'],
        ]);
        if($credential){
            $update = jurusan::findOrFail($id);
            $update->update([
                'kode_jurusan' => $request->kode_jurusan,
                'nama_jurusan' => $request->nama_jurusan,
                'status_jurusan' => $request->status_jurusan,
            ]);
            if($update){
                return redirect()
                ->route('jurusan.index')
                ->with([
                    'success' => 'Jurusan Has Been Updated successfully'
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
        $data = jurusan::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('jurusan.index')
            ->with([
                'success' => 'Jurusan Has Been Deleted successfully'
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
