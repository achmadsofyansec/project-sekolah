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
    public function uamnu(Request $request){
        return view('uamnu.data.index');
    }
    public function history_uamnu(Request $request){
        return view('uamnu.history.index');
    }
    public function bantuan(Request $request){
        return view('bantuan.index');
    }
    public function sarankritik(Request $request){
        return view('saranKritik.index');
    }
    public function logout(Request $request){
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('../sekolahApp/');
       }
    
}
