<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\DaftarPeminjaman;
use App\Models\Denda;
use Illuminate\Http\Request;

class transaksiController extends Controller
{

    public function daftar_peminjaman()
    {
        return view('transaksi.daftar_peminjaman');
    }

    public function peminjaman()
    {
        return view('transaksi.peminjaman');
    }

    public function data_denda()
    {
        return view('master.data_denda');
    }

}