<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SarprasAsetLain;

class AsetLainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lain = SarprasAsetLain::latest()->get();
        return view('asset_tetap.lain_lain.index',compact('lain'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset_tetap.lain_lain.create');
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
            'unit' => ['required'],
            'fungsi' => ['required'],
        ]);

        if($credential){
            $data = [];
            $foto = $request->file('foto');
            if($foto != null){
                $name = $request->file('foto')->getClientOriginalName();
                $foto->move('../assets/upload',$name);
                $data = [
                'unit' => $request->unit,
                'fungsi' => $request->fungsi,
                'foto' => $name,
                ];
            } else {
                $data = [
                'unit' => $request->unit,
                'fungsi' => $request->fungsi,
                'foto' => '-',

                ];
            }
            $create = SarprasAsetLain::create($data);

            if($create){
                return redirect()
                ->route('aset_lain.index')
                ->with([
                    'success' => 'Data Aset Lain Has Been Added successfully'
                ]);
            }else{
                return redirect()
                ->back()
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
            }
        } else {
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
        $data = SarprasAsetLain::findOrFail($id);
        return view('asset_tetap.lain_lain.edit',compact('data'));
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
            'unit' => ['required'],
            'fungsi' => ['required'],
        ]);
        if($validate){
            $data = [];
            $foto = $request->file('foto');
            if($foto != null){
                $name = $request->file('foto')->getClientOriginalName();
                $foto->move('../assets/upload',$name);
                $data = [
                'unit' => $request->unit,
                'fungsi' => $request->fungsi,
                'foto' => $name,
                ];
            } else {
                $data = [
                'unit' => $request->unit,
                'fungsi' => $request->fungsi,
                'foto' => '-',
                ];
            }


            $update = SarprasAsetLain::findOrFail($id);
            $update->update($data);
            if($update){
                return redirect()
                ->route('aset_lain.index')
                ->with([
                    'success' => 'Data Aset Lain Has Been Update successfully'
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
        $data = SarprasAsetLain::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('aset_lain.index')
            ->with([
                'success' => 'Data Aset Lain Has Been Deleted successfully'
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
 