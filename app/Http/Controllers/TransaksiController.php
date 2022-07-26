<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function peminjaman()
    {   
        $peminjaman_transaksi = Peminjaman::all();
        return view('transaksi.peminjaman',compact('peminjaman_transaksi'));

    }
}