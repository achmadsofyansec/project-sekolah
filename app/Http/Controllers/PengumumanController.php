<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Notif;
use App\Models\Role;
use App\Models\Upload;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Notif::latest()->get();
        $roles = Role::where([['roles.id_roles','=',auth()->user()->id_role]])->get(['roles.*'])->first();
        return view('pengumuman.index',compact(['data','roles']));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where([['roles.id_roles','=',auth()->user()->id_role]])->get(['roles.*'])->first();
        return view('pengumuman.create',compact(['roles']));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credential = $this->validate($request,[
            'nama_pengumuman' => ['required'],
            'isi_pengumuman' => ['required'],
        ]);
        if($credential){
            $data = [];
            $file = $request->file('file_pengumuman');
            $name = $request->file('file_pengumuman')->getClientOriginalName();
            $file->move(public_path('uploads'),$name);
            $create = Notif::create([
                'nama_pengumuman' => $request->nama_pengumuman,
                'isi_pengumuman' => $request->isi_pengumuman,
                'file_pengumuman' => $name,
                'status_pengumuman'=> '0',
            ]);
            if($create){
                Upload::create([
                    'name' => $name,
                    'path' => public_path('uploads')."/".$name
                ]);
                History::create([
                    'IP' => $request->ip(),
                    'user' => auth()->user()->id,
                    'activity' =>"Create Pengumuman :".$request->nama_pengumuman,
                ]);
                return redirect()
                ->route('pengumuman.index')
                ->with([
                    'success' => 'Pengumuman Has Been Added successfully'
                ]);
            }else{
                return redirect()
                ->route('pengumuman.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
            }
        }
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
        $data = Notif::findOrFail($id);
        $roles = Role::where([['roles.id_roles','=',auth()->user()->id_role]])->get(['roles.*'])->first();
        return view('pengumuman.edit',compact(['data','roles']));
        //
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
       $update = Notif::findOrFail($id);
       $credential = $this->validate($request,[
        'nama_pengumuman' => ['required'],
        'isi_pengumuman' => ['required'],
        ]);
        if($credential){
            $data = [];
            $file = $request->file('file_pengumuman');
            if($file != null){
                $name = $request->file('file_pengumuman')->getClientOriginalName();
                $file->move(public_path('uploads'),$name);
                $data = [
                    'nama_pengumuman' => $request->nama_pengumuman,
                    'isi_pengumuman' => $request->isi_pengumuman,
                    'file_pengumuman' => $name,
                    'status_pengumuman'=> '0',
                ];
                Upload::create([
                    'name' => $name,
                    'path' => public_path('uploads')."/".$name
                ]);
            }else{
                $data = [
                    'nama_pengumuman' => $request->nama_pengumuman,
                    'isi_pengumuman' => $request->isi_pengumuman,
                    'status_pengumuman'=> '0',
                ];
            }
            $update->update($data);
            if($update){
                History::create([
                    'IP' => $request->ip(),
                    'user' => auth()->user()->id,
                    'activity' =>"Update Pengumuman :".$request->nama_pengumuman,
                ]);
                return redirect()
                ->route('pengumuman.index')
                ->with([
                    'success' => 'Pengumuman Has Been Edited'
                ]);
            }else{
                return redirect()
                ->route('pengumuman.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Notif::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
                ->route('pengumuman.index')
                ->with([
                    'success' => 'Pengumuman has been deleted successfully'
                ]);
        }else{
            return redirect()
                ->route('pengumuman.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
