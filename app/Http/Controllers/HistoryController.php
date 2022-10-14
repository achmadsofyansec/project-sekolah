<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    //
    public function view_riwayat_bayar(Request $request){
        $req = $request;
        return view('riwayat_pembayaran.index',compact(['req']));
    }

}
