<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanBukuDt;
use App\Models\Pengunjung_perpus;
use Illuminate\Http\Request;

class PeminjamanBukuDtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'kode_buku' => ['required'],
            'id_siswa' => ['required'],
            'tanggal_pinjam' => ['required'],
            'keperluan' => ['required'],
            'status' => ['required'],
            'jumlah' => ['required'],
            'tanggal_kembali' => ['required'],
            'desc_pinjam' => ['required'],
            'kondisi' => ['required'],
        ]);
        if($credential){
            $create = PeminjamanBukuDt::create([
                'id_siswa' => $request->id_siswa,
                'kode_buku' => $request->kode_buku,
                'jumlah' => $request->jumlah,
                'status' => $request->status,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_kembali' => $request->tanggal_kembali,
                'desc_pinjam' => $request->desc_pinjam,
                'kondisi' => $request->kondisi,
            ]);
            
            $create1 = Pengunjung_perpus::create([
                'nis' => $request->id_siswa,
                'kode_buku' => $request->kode_buku,
                'keperluan' => $request->keperluan
            ]);
            if($create){
                return redirect()
                ->back()
                ->with([
                    'success' => 'Pinjam Buku Has Been Added successfully'
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
     * @param  \App\Models\PeminjamanBukuDt  $peminjamanBukuDt
     * @return \Illuminate\Http\Response
     */
    public function show(PeminjamanBukuDt $peminjamanBukuDt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeminjamanBukuDt  $peminjamanBukuDt
     * @return \Illuminate\Http\Response
     */
    public function edit(PeminjamanBukuDt $peminjamanBukuDt, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PeminjamanBukuDt  $peminjamanBukuDt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
        
            $validate = $this->validate($request,[
                'status' => ['required'],
                'nis_siswa' => ['required'],
                'keperluan' => ['required'],
                'kode_buku' => ['required'],
                
            ]);
            if($validate){
                $update = PeminjamanBukuDt::findOrFail($id);
                $update->update([
                    'status' => $request->status,
                ]);
                $create = Pengunjung_perpus::create([
                    'nis' => $request->nis_siswa,
                    'kode_buku' => $request->kode_buku,
                    'keperluan' => $request->keperluan,
                ]);
                if($update){
                    return redirect()
                    ->back()
                    ->with([
                        'success' => 'peminjaman Has Been Update successfully'
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeminjamanBukuDt  $peminjamanBukuDt
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeminjamanBukuDt $peminjamanBukuDt, $id)
    {
        //
        $data = PeminjamanBukuDt::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->back()
            ->with([
                'success' => 'Transaksi Has Been Deleted successfully'
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
