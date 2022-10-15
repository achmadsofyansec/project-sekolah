<?php

namespace App\Http\Controllers;

use App\Models\keuangan_detail_nonbulanan;
use App\Models\keuangan_history;
use App\Models\keuangan_pembayaran_nonbulanan;
use Illuminate\Http\Request;

class NonBulananDetailController extends Controller
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
        //
        $validate = $this->validate($request,[
            'kode_non_bulanan' => ['required'],
            'tgl_input_detail' => ['required'],
            'jenis_pembayaran_detail' => ['required'],
            'nominal_detail' => ['required'],
        ]);
        if($validate){
           $create =  keuangan_detail_nonbulanan::create(
                [
                    'kode_non_bulanan' => $request->kode_non_bulanan,
                    'tgl_input_detail' => $request->tgl_input_detail,
                    'jenis_pembayaran_detail' => $request->jenis_pembayaran_detail,
                    'nominal_detail' => $request->nominal_detail,
                ]       
            );

            if($create){
                $update = keuangan_pembayaran_nonbulanan::findOrFail($request->kode_non_bulanan);
                $newbayar = $update->nominal_pembayaran + $request->nominal_detail;
                $status = '0';
                if($newbayar >= $update->tagihan_pembayaran){
                    $status = '1';
                }
                $update->update([
                    'nominal_pembayaran' => $newbayar,
                    'tgl_bayar' => $request->tgl_input_detail,
                    'status_pembayaran' => $status,
                ]);
                keuangan_history::create([
                    'tgl_history' =>  $request->tgl_input_detail,
                    'histori_type_pembayaran' => 'nonbulanan',
                    'kode_biaya' => $update->kode_biaya_siswa,
                    'history_tagihan' => $update->tagihan_pembayaran,
                    'history_pembayaran' => $request->nominal_detail,
                    'kode_siswa' => $update->kode_siswa,
                ]);
                return redirect()
                ->back()
                ->with([
                    'success' => 'Pembayaran Non Bulanan successfully'
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
        $data = keuangan_detail_nonbulanan::findOrFail($id);
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
