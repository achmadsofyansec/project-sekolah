<?php

namespace App\Http\Controllers;

use App\Models\keuangan_detail_nonbulanan;
use App\Models\keuangan_pembayaran_nonbulanan;
use Illuminate\Http\Request;

class NonBulananController extends Controller
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
        $validate = $this->validate($request,[
            'kode_siswa' =>['required'],
            'tarif_biaya' =>['required'],
            'kode_biaya_siswa' => ['required']
        ]);
        if($validate){
            $cek = keuangan_pembayaran_nonbulanan::where([['kode_siswa','=',$request->kode_siswa]
                                                ,['kode_biaya_siswa','=',$request->kode_biaya_siswa]
                                                ,['kode_kelas','=',$request->kode_kelas]
                                                ])->get()
                                                ->count();
            if($cek < 1){
                $create = keuangan_pembayaran_nonbulanan::create([
                    'kode_siswa' =>$request->kode_siswa,
                    'kode_kelas' =>$request->kode_kelas,
                    'kode_biaya_siswa' =>$request->kode_biaya_siswa,
                    'tagihan_pembayaran' =>$request->tarif_biaya,
                    'nominal_pembayaran' =>'0',
                    'tgl_bayar' =>'-',
                    'status_pembayaran' =>'0',
                    'ket_pembayaran' =>$request->ket_biaya,
                ]);
                if($create){
                    
                    return redirect()
                    ->back()
                    ->with([
                        'success' => 'Data Non Bulanan Has Been Added successfully'
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
                        'error' => 'Data Non Bulanan Already Added'
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
        $data = keuangan_pembayaran_nonbulanan::findOrFail($id);
        $detail = keuangan_detail_nonbulanan::where([['kode_non_bulanan','=',$id]])->delete();
        $data->delete();
        if($data){
            return redirect()
            ->back()
            ->with([
                'success' => 'Pembayaran Non Bulanan Has Been Deleted successfully'
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
