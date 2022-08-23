<?php

namespace App\Http\Controllers;

use App\Models\ArsipBox;
use App\Models\ArsipDataUrut;
use App\Models\ArsipJenisDokumen;
use App\Models\ArsipLemari;
use App\Models\ArsipMap;
use App\Models\ArsipRak;
use App\Models\ArsipRuangan;
use App\Models\Dokumen;
use App\Models\JenisDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(){
        $jenis_dokumen = ArsipJenisDokumen::latest()->get();
        $ruangan = ArsipRuangan::latest()->get();
        $lemari = ArsipLemari::latest()->get();
        $box = ArsipBox::latest()->get();
        $map = ArsipMap::latest()->get();
        $urut = ArsipDataUrut::latest()->get();
        $rak = ArsipRak::latest()->get();
        $dokumen = Dokumen::latest()->get();
        return view('dashboard',compact(['jenis_dokumen','ruangan','lemari','box','dokumen','map','urut','rak']));
    }
    public function view_laporan(){
        return view('laporan.index');
    }
    public function view_manual_book(){
        return view('manual_book.index');
    }
    public function logout(Request $request){
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('../sekolahApp/');
       }
    
}
