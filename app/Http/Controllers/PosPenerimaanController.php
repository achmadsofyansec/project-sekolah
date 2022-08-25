<?php

namespace App\Http\Controllers;

use App\Models\pos_penerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PosPenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = pos_penerimaan::latest()->get();
        return view('pos.penerimaan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pos.penerimaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $this->validate($request,[
            'nama_pos' => ['required'],
            'desc_pos' => ['required']
        ]);
        if($validate){
            $qode = Str::random(6);
            $data = pos_penerimaan::latest()->get()->count();
            $kode = 'PP_'.$qode.$data;
            $create = pos_penerimaan::create([
                'kode_pos' => $kode,
                'nama_pos' => $request->nama_pos,
                'desc_pos' => $request->desc_pos,
            ]);
            if($create){
                return redirect()
                ->route('pos_terima.index')
                ->with([
                    'success' => 'Pos Penerimaan Has Been Added successfully'
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
        //
        $data = pos_penerimaan::findOrFail($id);
        if($data){
            return view('pos.penerimaan.edit',compact('data'));
        }
        
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
        //
        $validate = $this->validate($request,[
            'nama_pos' => ['required'],
            'desc_pos' => ['required']
        ]);
        if($validate){
            $update = pos_penerimaan::findOrFail($id);
            $update->update([
                'nama_pos' => $request->nama_pos,
                'desc_pos' => $request->desc_pos,
            ]);
            if($update){
                return redirect()
                ->route('pos_terima.index')
                ->with([
                    'success' => 'Pos Penerimaan Has Been Updated successfully'
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
        //
        $data = pos_penerimaan::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('pos_terima.index')
            ->with([
                'success' => 'Pos Penerimaan Has Been Deleted successfully'
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
