<?php

namespace App\Http\Controllers;

use App\Models\keuangan_history;
use App\Models\keuangan_tabungan_siswa;
use App\Models\keuangan_tabungan_siswa_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TabunganDetailController extends Controller
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
            'kode_tabungan' => ['required'],
            'type' => ['required']
        ]);
        if($validate){
            $new_saldo = 0;
            if($request->type == '0'){
                $validate1 = $this->validate($request,[
                    'nominal_setor' => ['required'],
                    'keterangan_setor' => ['required'],
                ]);
                if($validate1){
                    $qode = Str::random(6);
                    $data = keuangan_tabungan_siswa_detail::latest()->get()->count();
                    $kode = 'TDS_'.$qode.$data;
                    $saldo = keuangan_tabungan_siswa::where([['id','=',$request->kode_tabungan]])->value('saldo_tabungan');
                    $data_tabungan = keuangan_tabungan_siswa::where([['id','=',$request->kode_tabungan]])->get()->first();
                    $saldo_akhir =(int) $saldo + $request->nominal_setor;
                    $new_saldo = $saldo_akhir;
                    $create = keuangan_tabungan_siswa_detail::create([
                        'kode_detail' => $kode,
                        'kode_tabungan' => $request->kode_tabungan,
                        'nominal_detail' => $request->nominal_setor,
                        'saldo_awal_detail' => $saldo,
                        'saldo_akhir_detail' => $saldo_akhir,
                        'type_detail' => $request->type,
                        'keterangan_detail' => $request->keterangan_setor
                    ]);
                    $update = keuangan_tabungan_siswa::findOrFail($request->kode_tabungan);
                    $update->update([
                        'saldo_tabungan' => $new_saldo,
                    ]);
                    if($create){
                        $tgl_history = date('Y-m-d');
                        keuangan_history::create([
                            'tgl_history' =>  $tgl_history,
                            'histori_type_pembayaran' => 'tabungan',
                            'kode_biaya' => '-',
                            'history_tagihan' => 'setoran',
                            'history_pembayaran' => $request->nominal_setor,
                            'kode_siswa' => $data_tabungan->kode_siswa,
                            'ket_history'=> "Setoran",
                        ]);
                        return redirect()
                        ->back()
                        ->with([
                            'success' => 'Tabungan Detail Detaiil Has Been Added successfully'
                        ]);
                    }else{
                        return redirect()
                        ->back()
                        ->with([
                            'error' => 'Some problem has occurred, please try again'
                        ]);
                    }
                }
            }else{
                $validate1 = $this->validate($request,[
                    'nominal_tarik' => ['required'],
                    'nominal_tarik' => ['required'],
                ]);
                if($validate1){
                    $qode = Str::random(6);
                    $data = keuangan_tabungan_siswa_detail::latest()->get()->count();
                    $kode = 'TDT_'.$qode.$data;
                    $saldo = keuangan_tabungan_siswa::where([['id','=',$request->kode_tabungan]])->value('saldo_tabungan');
                    $data_tabungan = keuangan_tabungan_siswa::where([['id','=',$request->kode_tabungan]])->get()->first();
                    $saldo_akhir =(int) $saldo - $request->nominal_tarik;
                    $new_saldo = $saldo_akhir;
                    $create = keuangan_tabungan_siswa_detail::create([
                        'kode_detail' => $kode,
                        'kode_tabungan' => $request->kode_tabungan,
                        'nominal_detail' => $request->nominal_tarik,
                        'saldo_awal_detail' => $saldo,
                        'saldo_akhir_detail' => $saldo_akhir,
                        'type_detail' => $request->type,
                        'keterangan_detail' => $request->keterangan_tarik
                    ]);
                    $update = keuangan_tabungan_siswa::findOrFail($request->kode_tabungan);
                    $update->update([
                        'saldo_tabungan' => $new_saldo,
                    ]);
                    if($create){
                        $tgl_history = date('Y-m-d');
                        keuangan_history::create([
                            'tgl_history' =>  $tgl_history,
                            'histori_type_pembayaran' => 'tabungan',
                            'kode_biaya' => '-',
                            'history_tagihan' => 'penarikan',
                            'history_pembayaran' => $request->nominal_tarik,
                            'kode_siswa' => $data_tabungan->kode_siswa,
                            'ket_history'=> "Penarikan",
                        ]);
                        return redirect()
                        ->back()
                        ->with([
                            'success' => 'Data Tabungan Detail Has Been Added successfully'
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
