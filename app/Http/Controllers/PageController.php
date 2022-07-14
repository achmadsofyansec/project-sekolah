<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(){
        return view('dashboard');
    }
    public function view_sekolah(){
        return view('sekolah.index');
    }
    public function view_jabatan(){
        return view('jabatan.index');
    }
    public function view_users(){
        return view('users.index');
    }
    public function view_pengumuman(){
        return view('pengumuman.index');
    }
    public function view_pemeliharaan(){
        return view('pemeliharaan.index');
    }
    public function view_singkronisasi(){
        return view('singkronisasi.index');
    }
    public function view_login(){
        return view('auth.signin');
    }
}
