<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\DaftarPeminjaman;
use Illuminate\Http\Request;

class transaksiController extends Controller
{

    public function daftar_peminjaman()
    {
        $daftar_peminjaman=DaftarPeminjaman::all();
        return view('transaksi.daftar_peminjaman',compact('daftar_peminjaman'));
    }

    public function peminjaman()
    {
        $transaksi_peminjaman=Peminjaman::all();
        return view('transaksi.peminjaman',compact('transaksi_peminjaman'));
    }

    public function data_denda()
    {
        $transaksi_denda=Denda::all();
        return view('master.data_denda',compact('transaksi_denda'));
    }

}