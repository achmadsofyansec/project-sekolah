<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu_agenda;
use App\Models\BukuTamu_tamu;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(Request $request){
        $agenda = BukuTamu_agenda::latest()->get();
        $tamu = BukuTamu_tamu::latest()->get();
        return view('dashboard',compact(['agenda','tamu']));
    }
    public function view_portal(){
        $date = date('Y-m-d');
        $agenda = BukuTamu_agenda::latest()->get();
        return view('tamu.portal_tamu.index',compact(['agenda']));
    }
    public function store_portal(Request $request ){
        //
          //
          $validate = $this->validate($request,[
            'nama_tamu'=> ['required'],
            'asal_tamu'=> ['required'],
            'alamat_tamu'=> ['required'],
            'keperluan'=> ['required'],
            'no_telp'=> ['required'],
        ]);
        if($validate){
            $create = BukuTamu_tamu::create([
                'nama_tamu'=> $request->nama_tamu,
                'asal_tamu'=> $request->asal_tamu,
                'alamat_tamu'=> $request->alamat_tamu,
                'keperluan'=> $request->keperluan,
                'no_telp'=> $request->no_telp,
            ]);
            if($create){
                return redirect()
                ->back()
                ->with([
                    'success' => 'Tamu Has Been Added successfully'
                ]);
            }else{
                return redirect()
                ->back()
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
            }
        }
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
