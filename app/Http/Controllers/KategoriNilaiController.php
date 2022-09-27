<?php

namespace App\Http\Controllers;

use App\Models\akademik_kategori_nilai;
use Illuminate\Http\Request;

class KategoriNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = akademik_kategori_nilai::latest()->get();
        return view('nilai.kategori_nilai.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('nilai.kategori_nilai.create');
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
            'nama_kategori' => ['required']
        ]);
        if($validate){
            $create = akademik_kategori_nilai::create([
                'kategori_nilai' => $request->nama_kategori
            ]);
            if($create){
                return redirect()
                ->route('kategori_nilai.index')
                ->with([
                    'success' => 'Kategori Nilai Has Been Created successfully'
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
        $data = akademik_kategori_nilai::findOrFail($id);
        return view('nilai.kategori_nilai.edit',compact('data'));
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
            'nama_kategori' => ['required']
        ]);
        if($validate){
            $update = akademik_kategori_nilai::findOrFail($id);
            $update->update([
                'kategori_nilai' => $request->nama_kategori
            ]);
            if($update){
                return redirect()
                ->route('kategori_nilai.index')
                ->with([
                    'success' => 'Kategori Nilai Has Been Updated successfully'
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
        $data = akademik_kategori_nilai::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('kategori_nilai.index')
            ->with([
                'success' => 'Kategori Nilai Has Been Delete successfully'
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
