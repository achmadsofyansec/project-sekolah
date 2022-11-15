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
    public function view_app(Request $request){
        return view('app.index');
    }
    public function view_devices_wa(Request $request){
        return view('wa.devices.index');
    }
    public function view_message_wa(Request $request){
        return view('wa.message.index');
    }
    public function view_outbox_wa(Request $request){
        return view('wa.outbox.index');
    }
    public function logout(Request $request){
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('../sekolahApp/');
       }
}
