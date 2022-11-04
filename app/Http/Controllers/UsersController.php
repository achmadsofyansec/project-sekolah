<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = DB::table('users')->join('roles','users.id_role','=','roles.id_roles')->select(['users.*','roles.*','users.id as userid'])->get();
       $roles = Role::where([['roles.id_roles','=',auth()->user()->id_role]])->get(['roles.*'])->first();
       return view('users.index',compact(['data','roles']));
    }

    public function create()
    {
        $data = Role::latest()->get();
        $roles = Role::where([['roles.id_roles','=',auth()->user()->id_role]])->get(['roles.*'])->first();
        return view('users.create',compact(['data','roles']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credensial = $this->validate($request,[
            'name' => ['required'],
            'email' => ['required','email'],
            'password' =>['required'],
            'id_role' =>['required']
        ]);
        if($credensial){
           $create = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password) ,
                'id_role' => $request->id_role,
            ]);
            if($create){
                History::create([
                    'IP' => $request->ip(),
                    'user' => auth()->user()->id,
                    'activity' =>"Create User: ".$request->name,
                ]);
                return redirect()
                    ->route('user.index')
                    ->with([
                        'success' => 'User has been Insert successfully'
                    ]);
            }
            return redirect()->back()->with('error',"Internal Server Error, Please Try Again");
        }
        
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        $jabatan = Role::latest()->get();
        $roles = Role::where([['roles.id_roles','=',auth()->user()->id_role]])->get(['roles.*'])->first();
        return view('users.edit',compact(['data','jabatan','roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $credensial = $this->validate($request,[
            'name' => ['required'],
            'email' => ['required','email'],
            'id_role' =>['required']
        ]);
        if($credensial){
            $data = [];
            if($request->password != null){
                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password) ,
                    'id_role' => $request->id_role,
                ];
            }else{
                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'id_role' => $request->id_role,
                ];
            }
            $update = User::findOrFail($id);
            $update->update($data);
            if($update){
                History::create([
                    'IP' => $request->ip(),
                    'user' => auth()->user()->id,
                    'activity' =>"Update User: ".$request->name,
                ]);
                return redirect()
                    ->route('user.index')
                    ->with([
                        'success' => 'User has been Insert successfully'
                    ]);
            }
            return redirect()->back()->with('error',"Internal Server Error, Please Try Again");
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
                ->route('user.index')
                ->with([
                    'success' => 'User has been deleted successfully'
                ]);
        }else{
            return redirect()
                ->route('user.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
        //
    }
}
