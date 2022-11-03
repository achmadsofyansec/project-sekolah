<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    
    //VIEW Pages
    public function index(){
        switch(auth()->user()->id_role){
            default:
                    $roles = Role::where([['roles.id_roles','=',auth()->user()->id_role]])->get(['roles.*'])->first();
                    $users = User::join('roles','users.id_role','=','roles.id_roles')->get(['users.id as id_users','users.*','roles.*']);
                    $history = History::join('users','histories.user','=','users.id')->where([['histories.created_at','>=',date('Y-m-d').' 00:00:00'],['histories.created_at','>=',date('Y-m-d').' 23:59:59']])->get(['histories.id as id_history','users.*','histories.*']);
                    return view('dashboard',compact(['roles','users','history']));
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
