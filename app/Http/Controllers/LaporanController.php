<?php

namespace App\Http\Controllers;

use App\Models\ArsipBox;
use App\Models\ArsipDataUrut;
use App\Models\ArsipJenisDokumen;
use App\Models\ArsipLemari;
use App\Models\ArsipMap;
use App\Models\ArsipRak;
use App\Models\ArsipRuangan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //
    public function view_laporan(Request $request){

        $req = $request;
        $ruangan = ArsipRuangan::latest()->get();
        $lemari = ArsipLemari::latest()->get();
        $rak = ArsipRak::latest()->get();
        $box = ArsipBox::latest()->get();
        $map = ArsipMap::latest()->get();
        $jenis_dokumen = ArsipJenisDokumen::latest()->get();
        $urut = ArsipDataUrut::latest()->get();

        return view('laporan.index',compact(['req','ruangan','lemari','rak','box','map','jenis_dokumen','urut']));
    }
}
