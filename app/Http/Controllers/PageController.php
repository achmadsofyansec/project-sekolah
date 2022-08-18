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
    public function view_alumni(){
        return view('alumni.index');
    }
    public function view_lowongan(){
        return view('lowongan.index');
    }
    public function view_konfirmasi(){
        return view('konfirmasi.index');
    }
    public function view_pengumuman(){
        return view('pengumuman.index');
    }
    public function view_laporan(){
        return view('laporan.index');
    }
    public function view_manual(){
        return view('manual.index');
    }
    public function login(){
        return redirect('../sekolahApp/');
       }
    public function logout(Request $request){
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('../sekolahApp/');
    }
    
}
