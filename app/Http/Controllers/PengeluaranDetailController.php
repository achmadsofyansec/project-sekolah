<?php

namespace App\Http\Controllers;

use App\Models\keuangan_history;
use App\Models\keuangan_pengeluaran_detail;
use Illuminate\Http\Request;

class PengeluaranDetailController extends Controller
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
            'kode_pengeluaran' => ['required'],
            'pos_sumber' => ['required'],
            'pos_keluar' => ['required'],
            'detail_jumlah' => ['required'],
            'detail_keterangan' => ['required'],
        ]);
        if($validate){
            $create = keuangan_pengeluaran_detail::create([
                'kode_pengeluaran' => $request->kode_pengeluaran,
                'pos_sumber' => $request->pos_sumber,
                'pos_keluar' => $request->pos_keluar,
                'detail_jumlah' => $request->detail_jumlah,
                'detail_keterangan' => $request->detail_keterangan,
            ]);
            if($create){
                $date = date('Y-m-d');
                keuangan_history::create([
                    'tgl_history' =>  $date,
                    'histori_type_pembayaran' => 'pengeluaran',
                    'kode_biaya' => $request->kode_pengeluaran,
                    'history_tagihan' => '0',
                    'history_pembayaran' => $request->detail_jumlah,
                    'kode_siswa' => '-',
                    'ket_history'=>"-",
                ]);
                return redirect()
                ->back()
                ->with([
                    'success' => 'Detail Pengeluaran Lain Has Been Added successfully'
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
        $data = keuangan_pengeluaran_detail::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->back()
            ->with([
                'success' => 'Detail Pengeluaran Lain Has Been Deleted successfully'
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
