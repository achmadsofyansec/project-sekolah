<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(){
        switch(auth()->user()->id_role){
            default:
                    $roles = Role::where([['roles.id_roles','=',auth()->user()->id_role]])->get(['roles.*'])->first();
                    return view('dashboard',compact('roles'));
            break;
            case "2":
                return redirect("../akademik");
            break;
            case "3":
                return redirect("../keuangan");
            break;
            case "4":
                return redirect("../kesiswaan");
            break;
        }
       
    }
    public function view_sekolah(){
        return view('sekolah.index');
    }
    public function view_pemeliharaan(){
        $roles = Role::where([['roles.id_roles','=',auth()->user()->id_role]])->get(['roles.*'])->first();
        return view('pemeliharaan.index',compact(['roles']));
    }
    
}
