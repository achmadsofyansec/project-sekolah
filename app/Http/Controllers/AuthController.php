<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        if(!Auth::check()){
            return view('auth.signin');
        }
        return redirect('/');
    }
   public function authenticate(Request $request){
       $credential = $request->validate([
           'email' => ['required','email'],
           'password' =>['required']
       ]);
       if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->intended('/');   
       }
       
       return redirect('login')->with('error',"Email Or Password Incorrect")->onlyInput('email');
   }
   public function logout(Request $request){
    Auth::logout();
 
    $request->session()->invalidate();
    $request->session()->regenerateToken();
 
    return redirect('/login');
   }
}
