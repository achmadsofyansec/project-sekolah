<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use App\Models\PeminjamanBukuDt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hari_ini = date('Y-m-d'); 
        $denda = DB::table('perpustakaan_peminjaman_buku_dts')
                ->join('data_siswas','data_siswas.nisn','=','perpustakaan_peminjaman_buku_dts.id_siswa')
                ->join('perpustakaan_data_bukus','perpustakaan_data_bukus.kode_buku','=','perpustakaan_peminjaman_buku_dts.kode_buku')
                ->where('tanggal_kembali','<',$hari_ini)
                ->get();
        $denda1 = DB::table('perpustakaan_dendas')->get();
        return view('master.denda.index',compact('denda','denda1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.denda.tambah_denda');
        
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function show(Denda $denda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function edit(Denda $denda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Denda $denda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denda $denda)
    {
        $data = Denda::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('denda.index')
            ->with([
                'success' => 'Denda Has Been Deleted successfully'
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
