<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\alumni_lowongan_kerja;
use App\Models\alumni_pengumuman;
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
    public function portal(){
        $alumni_lowongan_kerja = alumni_lowongan_kerja::orderBy('id','DESC')->paginate(4);
        return view('portal.index',compact('alumni_lowongan_kerja'));
    }
    public function detail($id){
        $data = alumni_lowongan_kerja::latest()->where('id','=',$id)->get();
        return view('portal.detail',compact('data'));
    }
    public function portal_pengumuman(){
        $data = alumni_pengumuman::orderBy('id','DESC')->paginate(4);
        return view('portal.pengumuman', compact('data'));
    }
    public function detail_pengumuman($id){
        $data = alumni_pengumuman::latest()->where('id','=',$id)->get();
        return view('portal.pengumuman_detail', compact('data'));
    }
    public function portal_login(){
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
