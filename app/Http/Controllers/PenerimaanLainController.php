<?php

namespace App\Http\Controllers;

use App\Models\keuangan_penerimaan_lain;
use App\Models\keuangan_penerimaan_lain_detail;
use App\Models\methode_pembayaran;
use App\Models\pos_penerimaan;
use Illuminate\Http\Request;

class PenerimaanLainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = keuangan_penerimaan_lain::join("methode_pembayarans","keuangan_penerimaan_lains.methode_bayar","=","methode_pembayarans.kode_methode")
                                        ->get(["methode_pembayarans.*","keuangan_penerimaan_lains.*","keuangan_penerimaan_lains.id as id_terima"]);
        $metode_bayar = methode_pembayaran::latest()->get();
        return view('lain_lain.penerimaan.index',compact(['data','metode_bayar']));
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
            'tgl_penerimaan' => ['required'],
            'methode_bayar' => ['required'],
            'penerimaan_dari' => ['required'],
            'desc_penerimaan' => ['required'],
        ]);
        if($validate){
            $create = keuangan_penerimaan_lain::create([
                'tgl_penerimaan' => $request->tgl_penerimaan,
                'methode_bayar' => $request->methode_bayar,
                'penerimaan_dari' => $request->penerimaan_dari,
                'desc_penerimaan' => $request->desc_penerimaan,
            ]);
            if($create){
                return redirect()
                ->route('terima_lain.index')
                ->with([
                    'success' => 'Penerimaan Lain Has Been Added successfully'
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
        $data = keuangan_penerimaan_lain::join("methode_pembayarans","keuangan_penerimaan_lains.methode_bayar","=","methode_pembayarans.kode_methode")
                                        ->where([['keuangan_penerimaan_lains.id','=',$id]])
                                        ->get(["methode_pembayarans.*","keuangan_penerimaan_lains.*","keuangan_penerimaan_lains.id as id_terima"])->first();        
        $pos_terima = pos_penerimaan::latest()->get();
        $metode_bayar = methode_pembayaran::latest()->get();
        $detail = keuangan_penerimaan_lain_detail::join("pos_penerimaans","keuangan_penerimaan_lain_details.pos_terima","=","pos_penerimaans.kode_pos")
                                                ->where([['kode_penerimaan','=',$id]])->get(['keuangan_penerimaan_lain_details.*','pos_penerimaans.*','keuangan_penerimaan_lain_details.id as id_detail']);
        return view('lain_lain.penerimaan.edit',compact(['data','detail','pos_terima','metode_bayar']));
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
            'tgl_penerimaan' => ['required'],
            'methode_bayar' => ['required'],
            'penerimaan_dari' => ['required'],
            'desc_penerimaan' => ['required'],
        ]);
        if($validate){
            $update = keuangan_penerimaan_lain::findOrFail($id);
            $update->update([
                'tgl_penerimaan' => $request->tgl_penerimaan,
                'methode_bayar' => $request->methode_bayar,
                'penerimaan_dari' => $request->penerimaan_dari,
                'desc_penerimaan' => $request->desc_penerimaan,
            ]);
            if($update){
                return redirect()
                ->route('terima_lain.index')
                ->with([
                    'success' => 'Penerimaan Lain Has Been Added successfully'
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
        $data = keuangan_penerimaan_lain::findOrFail($id);
        $data1 = keuangan_penerimaan_lain_detail::where([['kode_penerimaan','=',$id]])->delete();
        $data->delete();
        if($data){
            return redirect()
            ->route('terima_lain.index')
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
