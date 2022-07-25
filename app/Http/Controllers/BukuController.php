<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function buku()
    {
        $data_buku=Buku::all();
        return view('master.buku',compact('data_buku'));
    }

    public function buku_save()
    {
    		return view();
    }
}
