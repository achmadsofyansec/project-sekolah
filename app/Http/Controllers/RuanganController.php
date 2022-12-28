<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SarprasRuangan;
use App\Models\SarprasGedung;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangan = SarprasRuangan::latest()->get();
        return view('asset_tetap.ruangan.index',compact('ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $ruangan = SarprasRuangan::latest()->get();
        $gedung = SarprasGedung::latest()->get();

        return view('asset_tetap.ruangan.create',compact(['gedung', 'ruangan']));
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
            'nama_gedung' => ['required'],
            'jenis_ruangan' => ['required'],
            'nama' => ['required'],
            'kondisi' => ['required'],
            'tahun_dibangun' => ['required'],
            'panjang' => ['required'],
            'lebar' => ['required'],
        ]);

        if($credential){
            $data = [];
            $foto = $request->file('foto');
            if($foto != null){
                $name = $request->file('foto')->getClientOriginalName();
                $foto->move('../assets/uploads/sarpras/ruangan',$name);
                $data = [
                'nama_gedung' => $request->nama_gedung,
                'jenis_ruangan' => $request->jenis_ruangan,
                'nama' => $request->nama,
                'kondisi' => $request->kondisi,
                'tahun_dibangun' => $request->tahun_dibangun,
                'panjang' => $request->panjang,
                'lebar' => $request->lebar,
                'foto' => $name,
                ];
            } else {
                $data = [
                'nama_gedung' => $request->nama_gedung,
                'jenis_ruangan' => $request->jenis_ruangan,
                'nama' => $request->nama,
                'kondisi' => $request->kondisi,
                'tahun_dibangun' => $request->tahun_dibangun,
                'panjang' => $request->panjang,
                'lebar' => $request->lebar,
                'foto' => '-',

                ];
            }
            $create = SarprasRuangan::create($data);

            if($create){
                return redirect()
                ->route('ruangan.index')
                ->with([
                    'success' => 'Data Ruangan Has Been Added successfully'
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
        $data = SarprasRuangan::findOrFail($id);
        $gedung = SarprasGedung::latest()->get();

        return view('asset_tetap.ruangan.edit',compact(['data', 'gedung']));

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
            'nama_gedung' => ['required'],
            'jenis_ruangan' => ['required'],
            'nama' => ['required'],
            'kondisi' => ['required'],
            'tahun_dibangun' => ['required'],
            'panjang' => ['required'],
            'lebar' => ['required'],
        ]);
        if($validate){
            $data = [];
            $foto = $request->file('foto');
            if($foto != null){
                $name = $request->file('foto')->getClientOriginalName();
                $foto->move('../assets/uploads/sarpras/ruangan',$name);
                $data = [
                'nama_gedung' => $request->nama_gedung,
                'jenis_ruangan' => $request->jenis_ruangan,
                'nama' => $request->nama,
                'kondisi' => $request->kondisi,
                'tahun_dibangun' => $request->tahun_dibangun,
                'panjang' => $request->panjang,
                'lebar' => $request->lebar,
                'foto' => $name,
                ];
            } else {
                $data = [
                'nama_gedung' => $request->nama_gedung,
                'jenis_ruangan' => $request->jenis_ruangan,
                'nama' => $request->nama,
                'kondisi' => $request->kondisi,
                'tahun_dibangun' => $request->tahun_dibangun,
                'panjang' => $request->panjang,
                'lebar' => $request->lebar,
                
                ];
            }


            $update = SarprasRuangan::findOrFail($id);
            $update->update($data);
            
            if($update){
                return redirect()
                ->route('ruangan.index')
                ->with([
                    'success' => 'Data Ruangan & Internet Has Been Update successfully'
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
        $data = SarprasRuangan::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('ruangan.index')
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
