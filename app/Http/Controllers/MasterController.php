<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Sumber;
use App\Models\Siswa;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function buku()
    {
        return view('master.buku');
    }

    public function kategori()
    {
        return view('master.kategori');
    }

    public function sumber()
    {
        return view('master.sumber');
    }

    public function siswa()
    {
        return view('siswa.siswa');
    }

    public function buku_save()
    {
    		return view();
    }

}
