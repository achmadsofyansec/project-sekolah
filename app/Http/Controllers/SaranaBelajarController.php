<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SarprasSaranaBelajar; 

class SaranaBelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $belajar = SarprasSaranaBelajar::latest()->get();
        return view('asset_tetap.sarana_belajar.index',compact('belajar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset_tetap.sarana_belajar.create');
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
            'sarana_pembelajaran' => ['required'],
            'deskripsi' => ['required'],
            'fungsi' => ['required'],
        ]);

        if($credential){
            $data = [];
            $foto = $request->file('foto');
            if($foto != null){
                $name = $request->file('foto')->getClientOriginalName();
                $foto->move('../assets/uploads/sarpras/sarana_belajar',$name);
                $data = [
                'sarana_pembelajaran' => $request->sarana_pembelajaran,
                'deskripsi' => $request->deskripsi,
                'fungsi' => $request->fungsi,
                'foto' => $name,
                ];
            } else {
                $data = [
                'sarana_pembelajaran' => $request->sarana_pembelajaran,
                'deskripsi' => $request->deskripsi,
                'fungsi' => $request->fungsi,
                'foto' => '-',
                ];
            }
            $create = SarprasSaranaBelajar::create($data);

            if($create){
                return redirect()
                ->route('sarana_belajar.index')
                ->with([
                    'success' => 'Data Sarana Belajar Has Been Added successfully'
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
        $data = SarprasSaranaBelajar::findOrFail($id);
        return view('asset_tetap.sarana_belajar.edit',compact('data'));
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
            'sarana_pembelajaran' => ['required'],
            'deskripsi' => ['required'],
            'fungsi' => ['required'],
        ]);
        if($validate){
            $data = [];
            $foto = $request->file('foto');
            if($foto != null){
                $name = $request->file('foto')->getClientOriginalName();
                $foto->move('../assets/uploads/sarpras/sarana_belajar',$name);
                $data = [
                'sarana_pembelajaran' => $request->sarana_pembelajaran,
                'deskripsi' => $request->deskripsi,
                'fungsi' => $request->fungsi,
                'foto' => $name,
                ];
            } else {
                $data = [
                'sarana_pembelajaran' => $request->sarana_pembelajaran,
                'deskripsi' => $request->deskripsi,
                'fungsi' => $request->fungsi,
                
                ];
            }


            $update = SarprasSaranaBelajar::findOrFail($id);
            $update->update($data);
            if($update){
                return redirect()
                ->route('sarana_belajar.index')
                ->with([
                    'success' => 'Data Sarana Pembelajaran Has Been Update successfully'
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
        $data = SarprasSaranaBelajar::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('sarana_belajar.index')
            ->with([
                'success' => 'Data Sarana Belajar Has Been Deleted successfully'
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
