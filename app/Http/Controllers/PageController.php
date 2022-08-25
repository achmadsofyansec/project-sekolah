<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\data_tamu;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(Request $request){
        $agenda = Agenda::latest()->get();
        $tamu = data_tamu::latest()->get();
        return view('dashboard',compact(['agenda','tamu']));
    }
    public function view_portal(){
        return view('tamu.portal_tamu.index');
    }
    public function view_book(){
        return view('manual_book.index');
    }
    public function logout(Request $request){
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('../sekolahApp/');
       }
    
}
