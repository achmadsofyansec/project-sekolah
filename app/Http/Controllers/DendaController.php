<?php

namespace App\Http\Controllers;

use App\Models\data_siswa;
use App\Models\SarprasDataAset;
use Illuminate\Http\Request;
use App\Models\SarprasDenda;
use Illuminate\Support\Str;

class DendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $denda = SarprasDenda::latest()->get();
        $kategori = SarprasDataAset::latest()->get();
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        $data = SarprasDenda::join('data_siswas','sarpras_dendas.kode_siswa','=','data_siswas.id')
                                        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
                                        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*'
                                            ,'sarpras_dendas.*','sarpras_dendas.id as id_denda']);
        return view('denda.index', compact('data', 'kategori', 'siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('denda.create');
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
            'kode_siswa' => ['required'],
            'unit' => ['required'],
            'pelanggaran' => ['required'],
            'total_denda' => ['required'],
            'status' => ['required'],
        ]);
        if($credential){
            $create = SarprasDenda::create([
                'kode_siswa' => $request->kode_siswa,
                'unit' => $request->unit,
                'pelanggaran' => $request->pelanggaran,
                'total_denda' => $request->total_denda,
                'status' => $request->status,
            ]);
            if($create){
                return redirect()
                ->route('denda.index')
                ->with([
                    'success' => 'Data Denda Has Been Added successfully'
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
        $data = SarprasDenda::findOrFail($id);
        $kategori = SarprasDataAset::latest()->get();
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        $denda= SarprasDenda::join('data_siswas','sarpras_dendas.kode_siswa','=','data_siswas.id')
                                        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
                                        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*'
                                            ,'sarpras_dendas.*','sarpras_dendas.id as id_denda']);
        return view('denda.edit', compact('data', 'kategori', 'siswa', 'denda'));
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
            'pelanggaran' => ['required'],
            'total_denda' => ['required'],
            'status' => ['required'],
        ]);
        if($validate){
            $update = SarprasDenda::findOrFail($id);
            $update->update([
                'unit' => $request->unit,
                'pelanggaran' => $request->pelanggaran,
                'total_denda' => $request->total_denda,
                'status' => $request->status,
            ]);
            if($update){
                return redirect()
                ->route('denda.index')
                ->with([
                    'success' => 'Denda Has Been Update successfully'
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
        $data = SarprasDenda::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('denda.index')
            ->with([
                'success' => 'Data Denda Has Been Deleted successfully'
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
