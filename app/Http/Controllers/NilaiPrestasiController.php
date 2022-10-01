<?php

namespace App\Http\Controllers;

use App\Models\akademik_nilai_prestasi;
use App\Models\data_siswa;
use Illuminate\Http\Request;

class NilaiPrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = akademik_nilai_prestasi::join('data_siswas','akademik_nilai_prestasis.kode_siswa','=','data_siswas.id')
            ->get(['akademik_nilai_prestasis.id as id_prestasi','akademik_nilai_prestasis.*','data_siswas.*']);
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
            ->join("tahun_ajarans","aktivitas_belajars.kode_tahun_ajaran",'=','tahun_ajarans.kode_tahun_ajaran')
            ->where([['data_siswas.status_siswa','=','Aktif']])
            ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*','tahun_ajarans.*']);
        return view('nilai.input_nilai.prestasi.index',compact(['data','siswa']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
        $validate = $this->validate($request,[
            'kode_siswa' => ['required'],
            'nama_lomba' => ['required'],
            'nama_penyelenggara' => ['required'],
            'tahun_lomba' => ['required'],
            'tingkat_lomba' => ['required'],
            'peringkat' => ['required'],
            'ket_lomba' => ['required'],
        ]);
        if($validate){
            $create = akademik_nilai_prestasi::create([
            'kode_siswa' => $request->kode_siswa,
            'nama_lomba' => $request->nama_lomba,
            'nama_penyelenggara' => $request->nama_penyelenggara,
            'tahun_lomba' => $request->tahun_lomba,
            'tingkat_lomba' => $request->tingkat_lomba,
            'peringkat_lomba' => $request->peringkat,
            'keterangan_lomba' => $request->ket_lomba,
            ]);
            if($create){
                return redirect()
                ->route('input_prestasi.index')
                ->with([
                    'success' => 'Prestasi Has Been Created successfully'
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
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->join("tahun_ajarans","aktivitas_belajars.kode_tahun_ajaran",'=','tahun_ajarans.kode_tahun_ajaran')
        ->where([['data_siswas.status_siswa','=','Aktif']])
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*','tahun_ajarans.*']);
        $data = akademik_nilai_prestasi::findOrFail($id);
        return view('nilai.input_nilai.prestasi.edit',compact(['data','siswa']));
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
            'nama_lomba' => ['required'],
            'nama_penyelenggara' => ['required'],
            'tahun_lomba' => ['required'],
            'tingkat_lomba' => ['required'],
            'peringkat' => ['required'],
            'ket_lomba' => ['required'],
        ]);
        if($validate){
            $data = akademik_nilai_prestasi::findOrFail($id);
            $data->update([
                'nama_lomba' => $request->nama_lomba,
                'nama_penyelenggara' => $request->nama_penyelenggara,
                'tahun_lomba' => $request->tahun_lomba,
                'tingkat_lomba' => $request->tingkat_lomba,
                'peringkat_lomba' => $request->peringkat,
                'keterangan_lomba' => $request->ket_lomba,
            ]);
            if($data){
                return redirect()
                ->route('input_prestasi.index')
                ->with([
                    'success' => 'Prestasi Has Been Updated successfully'
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
        $data = akademik_nilai_prestasi::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('input_prestasi.index')
            ->with([
                'success' => 'Prestasi Has Been Deleted successfully'
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
