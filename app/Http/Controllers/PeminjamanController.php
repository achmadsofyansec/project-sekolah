<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SarprasPeminjaman;
use App\Models\SarprasDataAset;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = DB::table('data_siswas')->select(['data_siswas.*'])->get();
        $peminjaman = SarprasPeminjaman::latest()->get();
        $unit = SarprasDataAset::latest()->get();
        return view('peminjaman.index',compact (['siswa','peminjaman', 'unit']));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = DB::table('data_siswas')->select(['data_siswas.*'])->get();
        $peminjaman = SarprasPeminjaman::latest()->get();
        $unit = SarprasDataAset::latest()->get();
        return view('peminjaman.create',compact (['siswa','peminjaman', 'unit']));
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
            'unit' => ['required'],
            'jumlah' => ['required'],
            'status' => ['required'],
        ]);
        if($credential){
            $create = SarprasPeminjaman::create([
                'nama' => $request->nama,
                'unit' => $request->unit,
                'jumlah' => $request->jumlah,
                'status' => $request->status,
            ]);
            if($create){
                return redirect()
                ->route('peminjaman.index')
                ->with([
                    'success' => 'Data Peminjaman Has Been Added successfully'
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
        //
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
