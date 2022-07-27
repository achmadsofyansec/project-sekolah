<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaturan;

class PengaturanController extends Controller
{
    public function index()
    {
        // $pengaturan = DB::table('pengaturans')->get();
 
        // return view('pengaturan.index',['pengaturan' => $pengaturan]);


        $pengaturan = pengaturan::get();
        // return view('sekolah.index', ['kelulusan' => $kelulusan]);
        return view('pengaturan.index', compact('pengaturan'));
 
    }
}
