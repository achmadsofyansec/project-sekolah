<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KelulusanNilai;
use Illuminate\Http\Request;

class CariController extends Controller
{
    public function cari(Request $request){
        $name = $request->name;
        $categories = KelulusanNilai::where('kode_ujian','like',"%".$name."%")->paginate(1);
        return view('cari',compact('categories'));
    }

}
