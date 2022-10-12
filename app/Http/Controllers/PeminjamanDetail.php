<?php

namespace App\Http\Controllers;

use App\Models\SarprasKategoriAset;
use App\Models\SarprasPeminjamanDetail;
use Illuminate\Http\Request;

class PeminjamanDetail extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('peminjaman.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = SarprasPeminjamanDetail::latest()->get();
        $kategori = SarprasKategoriAset::latest()->get();
        $data = SarprasPeminjamanDetail::join('sarpras_peminjamans.kode_peminjaman', '=', 'sarpras_peminjaman_details.kode_peminjaman')->get();
        return view('peminjaman.peminjaman_detail', compact(['data', 'kategori']));
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
            'kode_peminjaman' => ['required'],
            'unit' => ['required'],
            'jumlah' => ['required'],
        ]);
        if($credential){
            $create = SarprasPeminjamanDetail::create([
                'kode_peminjaman' => $request->kode_peminjaman,
                'unit' => $request->unit,
                'jumlah' => $request->jumlah,
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
        $data = SarprasPeminjamanDetail::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('peminjaman.index')
            ->with([
                'success' => 'peminjaman Has Been Deleted successfully'
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
