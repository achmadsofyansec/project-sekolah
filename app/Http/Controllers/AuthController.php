<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function authenticate(Request $request){
       $credential = $request->validate([
           'email' => ['required','email'],
           'password' =>['required']
       ]);
       if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->intended('/');   
       }
       return back()->withErrors([
           'error'=> 'Email / Password Not Correct or Not Registered.',
       ])->onlyInput('email');
   }
   public function logout(Request $request){
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/login');
   }
}
