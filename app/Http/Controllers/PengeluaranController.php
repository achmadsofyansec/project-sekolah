<?php

namespace App\Http\Controllers;

use App\Models\keuangan_history;
use App\Models\keuangan_pengeluaran;
use App\Models\keuangan_pengeluaran_detail;
use App\Models\methode_pembayaran;
use App\Models\pos_penerimaan;
use App\Models\pos_pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = keuangan_pengeluaran::join("methode_pembayarans","keuangan_pengeluarans.methode_bayar","=","methode_pembayarans.kode_methode")
                                    ->get(["methode_pembayarans.*","keuangan_pengeluarans.*","keuangan_pengeluarans.id as id_keluar"]);
        $metode_bayar = methode_pembayaran::latest()->get();
        return view('lain_lain.pengeluaran.index',compact(['data','metode_bayar']));
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
            'tgl_pengeluaran' => ['required'],
            'methode_bayar' => ['required'],
            'desc_pengeluaran' => ['required']
        ]);
        if($validate){
            $create = keuangan_pengeluaran::create([
                'tgl_pengeluaran' => $request->tgl_pengeluaran,
                'methode_bayar' => $request->methode_bayar,
                'desc_pengeluaran' => $request->desc_pengeluaran
            ]);
            if($create){
                
                return redirect()
                ->back()
                ->with([
                    'success' => 'Pengeluaran Lain Has Been Added successfully'
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
        $data = keuangan_pengeluaran::join('methode_pembayarans','keuangan_pengeluarans.methode_bayar','=','methode_pembayarans.kode_methode')->where([['keuangan_pengeluarans.id','=',$id]])->get(['methode_pembayarans.*','keuangan_pengeluarans.id as id_keluar','keuangan_pengeluarans.*'])->first();
        $metode_bayar = methode_pembayaran::latest()->get();
        $pos_sumber = pos_penerimaan::latest()->get();
        $pos_keluar = pos_pengeluaran::latest()->get();
        $detail = keuangan_pengeluaran_detail::join('pos_penerimaans','keuangan_pengeluaran_details.pos_sumber','=','pos_penerimaans.kode_pos')
                                             ->join('pos_pengeluarans','keuangan_pengeluaran_details.pos_keluar','=','pos_pengeluarans.kode_pos')
                                             ->where([['kode_pengeluaran','=',$id]])
                                             ->get(['keuangan_pengeluaran_details.id as id_detail','keuangan_pengeluaran_details.*','pos_penerimaans.nama_pos as nama_pos_sumber','pos_pengeluarans.nama_pos as nama_pos_keluar']);
        return view('lain_lain.pengeluaran.edit',compact(['data','pos_keluar','pos_sumber','detail','metode_bayar']));
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
            'tgl_pengeluaran' => ['required'],
            'methode_bayar' => ['required'],
            'desc_pengeluaran' => ['required']
        ]);
        if($validate){
            $update = keuangan_pengeluaran::findOrFail($id);
            $update->update([
                'tgl_pengeluaran' => $request->tgl_pengeluaran,
                'methode_bayar' => $request->methode_bayar,
                'desc_pengeluaran' => $request->desc_pengeluaran
            ]);
            if($update){
                return redirect()
                ->route('keluar_lain.index')
                ->with([
                    'success' => 'Pengeluaran Lain Has Been Added successfully'
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
        //
        $data = keuangan_pengeluaran::findOrFail($id);
        $data1 =keuangan_pengeluaran_detail::where([['kode_pengeluaran','=',$id]])->delete();
        $data->delete();
        if($data){
            return redirect()
            ->route('keluar_lain.index')
            ->with([
                'success' => 'Pengeluaran Has Been Deleted successfully'
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
