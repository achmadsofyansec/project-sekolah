<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Sumber;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function buku()
    {
        $data_buku=Buku::all();
        return view('master.buku',compact('data_buku'));
    }

    public function kategori()
    {
    	$kategori_buku=Kategori::all();
        return view('master.kategori',compact('kategori_buku'));
    }

    public function sumber()
    {
    	$sumber_buku=Sumber::all();
        return view('master.sumber',compact('sumber_buku'));
    }

    public function buku_save()
    {
    		return view();
    }
}
