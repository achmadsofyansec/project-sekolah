<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AuthSignIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$role)
    {
        if(!Auth::check()){
            return route('login');
        }
        $user = DB::table('users')->join('roles','users.id_role','=','roles.id')->select('*')->where('roles.roles_access','=',$role)->get();
        if($user){
            return $next($request);
        }
        
       return redirect('login')->with('error',"Username Or Password Not Correct");
    }
}
