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
    public function view_pendaftar(){
        return view('calon_pendaftar.index');
    }
    public function view_pengumuman(){
        return view('pengumuman.index');
    }
    public function view_portal(){
        return view('portal.index');
    }
    public function view_pengaturan(){
        return view('pengaturan.index');
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
