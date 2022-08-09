<?php

namespace App\Http\Controllers;


use App\Models\ArsipDataUrut;
use Illuminate\Http\Request;

class UrutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $urut = ArsipDataUrut::latest()->get();
        return view('dataurut.index',compact('urut'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dataurut.create');
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
            'nama_urut' => ['required']
        ]);
        if($credential){
            $create = ArsipDataUrut::create([
                'nama_urut' => $request->nama_urut
            ]);
            if($create){
                return redirect()
                ->route('urut.index')
                ->with([
                    'success' => 'Data Urut Has Been Added successfully'
                ]);
            }else{
                return redirect()
                ->back()
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
            }
        }else{
            return redirect()
            ->back()
            ->with([
                'error' => 'Some problem has occurred, please try again'
            ]);
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
        $data = ArsipDataUrut::findOrFail($id);
        return view('dataurut.edit',compact('data'));

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
        $validate = $this->validate($request,[
            'nama_urut' => ['required']
        ]);
        if($validate){
            $update = ArsipDataUrut::findOrFail($id);
            $update->update([
                'nama_urut' => $request->nama_urut
            ]);
            if($update){
                return redirect()
                ->route('urut.index')
                ->with([
                    'success' => 'Jenis Data Urut Has Been Update successfully'
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ArsipDataUrut::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('urut.index')
            ->with([
                'success' => 'Data Ruangan Has Been Deleted successfully'
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
