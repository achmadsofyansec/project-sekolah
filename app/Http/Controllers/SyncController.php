<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SyncController extends Controller
{
    //
    public function index (){
        $roles = Role::where([['roles.id_roles','=',auth()->user()->id_role]])->get(['roles.*'])->first();
        return view('singkronisasi.index',compact(['roles']));
    }

}
