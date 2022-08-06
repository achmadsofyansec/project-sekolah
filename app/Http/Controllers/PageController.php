<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(Request $request){
        return view('dashboard');
    }
    public function view_jenis(){
        return view('dokumen.jenis.index');
    }
    public function view_ruangan(){
        return view('ruangan.index');
    }
    public function view_lemari(){
        return view('lemari.index');
    }
    public function view_rak(){
        return view('rak.index');
    }
    public function view_rak(){
        return view('rak.index');
    }
    public function dokumen_edit(){
        return view('dokumen.edit');
    }
    public function view_map(){
        return view('map.index');
    }
    public function view_input_dokumen(){
        return view('dokumen.input.index');
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
