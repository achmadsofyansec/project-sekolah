<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SarprasKebutuhanTambahan;

class KebutuhanTambahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kebutuhan = SarprasKebutuhanTambahan::latest()->get();
        return view('asset_tetap.kebutuhan_tambahan.index',compact('kebutuhan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset_tetap.kebutuhan_tambahan.create');
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
            'tahun_pengajuan' => ['required'],
            'jenis' => ['required'],
            'jumlah' => ['required'],
            'sifat' => ['required'],
            'rangking' => ['required'],
            'kategori_kondisi' => ['required'],
        ]);

        if($credential){
            $data = [];
            $foto = $request->file('foto');
            if($foto != null){
                $name = $request->file('foto')->getClientOriginalName();
                $foto->move(public_path('uploads'),$name);
                $data = [
                'tahun_pengajuan' => $request->tahun_pengajuan,
                'jenis' => $request->jenis,
                'jumlah' => $request->jumlah,
                'sifat' => $request->sifat,
                'rangking' => $request->rangking,
                'kategori_kondisi' => $request->kategori_kondisi,
                'foto' => $name
                ];
            } else {
                $data = [
                'tahun_pengajuan' => $request->tahun_pengajuan,
                'jenis' => $request->jenis,
                'jumlah' => $request->jumlah,
                'sifat' => $request->sifat,
                'rangking' => $request->rangking,
                'kategori_kondisi' => $request->kategori_kondisi,
                'foto' => '-'
                ];
            }
            $create = SarprasKebutuhanTambahan::create($data);

            if($create){
                return redirect()
                ->route('kebutuhan_tambahan.index')
                ->with([
                    'success' => 'Data kebutuhan Tambahan Has Been Added successfully'
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
        $data = SarprasKebutuhanTambahan::findOrFail($id);
        return view('asset_tetap.kebutuhan_tambahan.edit',compact('data'));
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
            'tahun_pengajuan' => ['required'],
            'jenis' => ['required'],
            'jumlah' => ['required'],
            'sifat' => ['required'],
            'rangking' => ['required'],
            'kategori_kondisi' => ['required'],
        ]);
        if($validate){
            $data = [];
            $foto = $request->file('foto');
            if($foto != null){
                $name = $request->file('foto')->getClientOriginalName();
                $foto->move(public_path('uploads'),$name);
                $data = [
                'tahun_pengajuan' => $request->tahun_pengajuan,
                'jenis' => $request->jenis,
                'jumlah' => $request->jumlah,
                'sifat' => $request->sifat,
                'rangking' => $request->rangking,
                'kategori_kondisi' => $request->kategori_kondisi,
                'foto' => $name
                ];
            } else {
                $data = [
                'tahun_pengajuan' => $request->tahun_pengajuan,
                'jenis' => $request->jenis,
                'jumlah' => $request->jumlah,
                'sifat' => $request->sifat,
                'rangking' => $request->rangking,
                'kategori_kondisi' => $request->kategori_kondisi,
                'foto' => '-'
                ];
            }


            $update = SarprasKebutuhanTambahan::findOrFail($id);
            $update->update($data);
            if($update){
                return redirect()
                ->route('kebutuhan_tambahan.index')
                ->with([
                    'success' => 'Jenis Kebutuhan Tambahan Has Been Update successfully'
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
        $data = SarprasKebutuhanTambahan::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('kebutuhan_tambahan.index')
            ->with([
                'success' => 'Jenis Kebutuhan Tambahan Has Been Deleted successfully'
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
