<?php

namespace App\Http\Controllers;

use App\Models\tahun_ajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = tahun_ajaran::latest()->get();
        return view('tahun_ajaran.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tahun_ajaran.create');
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
            'kode_tahun_ajaran' => ['required'],
            'tahun_ajaran_awal' => ['required'],
            'tahun_ajaran_akhir' => ['required'],
            'status_tahun_ajaran' => ['required'],
        ]);
        if($validate){
            $create = tahun_ajaran::create([
                'kode_tahun_ajaran' => $request->kode_tahun_ajaran,
                'tahun_ajaran' => $request->tahun_ajaran_awal.'/'.$request->tahun_ajaran_akhir,
                'status_tahun_ajaran' => $request->status_tahun_ajaran,
            ]);
            if($create){
                if($request->status_tahun_ajaran == "Aktif"){
                    $old_data = tahun_ajaran::where([['status_tahun_ajaran','=','Aktif'],['id','!=',$create->id]])->get()->first();
                    if($old_data != null){
                        $old_data->update([
                            'status_tahun_ajaran' => 'Nonaktif'
                        ]);
                    }
                }
                
                return redirect()
                ->route('tahun_ajaran.index')
                ->with([
                    'success' => 'Tahun Ajaran Has Been Added successfully'
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
        $data = tahun_ajaran::findOrFail($id);
        $tahun_awal = explode('/', $data->tahun_ajaran)[0];
        $tahun_akhir = explode('/', $data->tahun_ajaran)[1];
        return view('tahun_ajaran.edit',compact(['data','tahun_awal','tahun_akhir']));
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
            'kode_tahun_ajaran' => ['required'],
            'tahun_ajaran_awal' => ['required'],
            'tahun_ajaran_akhir' => ['required'],
            'status_tahun_ajaran' => ['required'],
        ]);
        if($validate){
            $update = tahun_ajaran::findOrFail($id);
            $update->update([
                'kode_tahun_ajaran' => $request->kode_tahun_ajaran,
                'tahun_ajaran' => $request->tahun_ajaran_awal.'/'.$request->tahun_ajaran_akhir,
                'status_tahun_ajaran' => $request->status_tahun_ajaran,
            ]);
            if($request->status_tahun_ajaran == "Aktif"){
                $old_data = tahun_ajaran::where([['status_tahun_ajaran','=','Aktif'],['id','!=',$id]])->get()->first();
                if($old_data != null){
                    $old_data->update([
                        'status_tahun_ajaran' => 'Nonaktif'
                    ]);
                }
            }
            if($update){
                return redirect()
                ->route('tahun_ajaran.index')
                ->with([
                    'success' => 'Tahun Ajaran Has Been Update successfully'
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
        $data = tahun_ajaran::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('tahun_ajaran.index')
            ->with([
                'success' => 'Tahun Ajaran Has Been Deleted successfully'
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
