<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Sumber;
use App\Models\Denda;

class MasterController extends Controller
{

    public function sumber()
    {
        
    }

        public function tambah_buku()
    {
    }

    //export bermasalah
    public function export()
    {
        return view('master.buku.export');
    }


    public function kategori_tambah()
    {
        return view('master.kategori.kategori_tambah');
    }

    public function sumber_tambah()
    {
    }


    public function data_denda()
    {
        $denda = Denda::latest()->get();
        return view('master.denda.index',compact('denda'));
    }


}
