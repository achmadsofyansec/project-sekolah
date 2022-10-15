<?php

namespace App\Http\Controllers;

use App\Models\keuangan_history;
use App\Models\keuangan_penerimaan_lain;
use App\Models\keuangan_penerimaan_lain_detail;
use Illuminate\Http\Request;

class PenerimaanLainDetailController extends Controller
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
            'kode_penerimaan' => ['required'],
            'pos_terima' => ['required'],
            'detail_jumlah' => ['required'],
            'desc_penerimaan' => ['required'],
        ]);
        if($validate){
            $datas = keuangan_penerimaan_lain::findOrFail($request->kode_penerimaan);
            $create = keuangan_penerimaan_lain_detail::create([
                'kode_penerimaan' => $request->kode_penerimaan,
                'pos_terima' =>  $request->pos_terima,
                'detail_jumlah' => $request->detail_jumlah,
                'detail_keterangan' => $request->desc_penerimaan,
            ]);
            if($create){
                $tgl_history = date('Y-m-d');
                keuangan_history::create([
                    'tgl_history' =>  $tgl_history,
                    'histori_type_pembayaran' => 'penerimaan_lain',
                    'kode_biaya' => $request->kode_penerimaan,
                    'history_tagihan' => '0',
                    'history_pembayaran' => $request->detail_jumlah,
                    'kode_siswa' => '-',
                    'ket_history'=>"Penerimaan Dari : ".$datas->penerimaan_dari,
                ]);
                return redirect()
                ->back()
                ->with([
                    'success' => 'Penerimaan Lain Has Been Add Successfully'
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
        $data = keuangan_penerimaan_lain_detail::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->back()
            ->with([
                'success' => 'Penerimaan Lain Has Been Deleted successfully'
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
