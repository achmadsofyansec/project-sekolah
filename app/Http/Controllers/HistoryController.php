<?php

namespace App\Http\Controllers;

use App\Models\keuangan_history;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    //
    public function view_riwayat_bayar(Request $request){
        $req = $request;
        $history = "";
        if($request->filter_awal != null || $request->filter_akhir != null){
            $history = keuangan_history::latest()->get();
        }
        return view('riwayat_pembayaran.index',compact(['req','history']));
    }

}
