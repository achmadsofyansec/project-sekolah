<?php

namespace App\Http\Controllers;

use App\Models\integrasi_outbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(Request $request){
        return view('dashboard');
    }
    public function view_app(Request $request){
        return view('app.index');
    }
    
    public function view_outbox(Request $request){
        $data = integrasi_outbox::latest()->get();
        return view('outbox.index',compact('data'));
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('../sekolahApp/');
       }
}
