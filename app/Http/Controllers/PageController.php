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
    public function view_pemeliharaan(){
        return view('pemeliharaan.index');
    }
    
}
