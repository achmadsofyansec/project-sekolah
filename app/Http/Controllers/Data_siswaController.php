<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data_siswa;

class Data_siswaController extends Controller
{
    public function index()
    {
        $siswa = data_siswa::get();
        // return view('sekolah.index', ['kelulusan' => $kelulusan]);
        return view('kelulusan.datasiswa', compact('siswa'));
    }
}
