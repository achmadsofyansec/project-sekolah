<?php

namespace App\Http\Controllers;

use App\Models\akademik_pindah_kelas;
use App\Models\data_siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class PindahKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = akademik_pindah_kelas::join('data_siswas','akademik_pindah_kelas.kode_siswa','=','data_siswas.id')
                                    ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
                                    ->join("tahun_ajarans","aktivitas_belajars.kode_tahun_ajaran",'=','tahun_ajarans.kode_tahun_ajaran')
                                    ->join('kelas','aktivitas_belajars.kode_kelas','=','kelas.kode_kelas')
                                    ->where([['data_siswas.status_siswa','=','Aktif']])
                                     ->get(['akademik_pindah_kelas.*','akademik_pindah_kelas.id as id_pindah','data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*','tahun_ajarans.*','kelas.id as id_kelast','kelas.*']);
        
        return view('pindah_kelas.index',compact(['data']));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::latest()->get();
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
                            ->join("tahun_ajarans","aktivitas_belajars.kode_tahun_ajaran",'=','tahun_ajarans.kode_tahun_ajaran')
        ->where([['data_siswas.status_siswa','=','Aktif']])
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*','tahun_ajarans.*']);
        return view('pindah_kelas.create',compact(['kelas','siswa']));
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
            'tgl_pengajuan' => ['required'],
            'kode_siswa' => ['required'],
            'kelas_tujuan' => ['required'],
            'ket_pindah' => ['required']
        ]);
        if($validate){
            $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
                            ->join("tahun_ajarans","aktivitas_belajars.kode_tahun_ajaran",'=','tahun_ajarans.kode_tahun_ajaran')
                            ->join('kelas','aktivitas_belajars.kode_kelas','=','kelas.kode_kelas')
            ->where([['data_siswas.status_siswa','=','Aktif'],['data_siswas.id','=',$request->kode_siswa]])
            ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*','tahun_ajarans.*','kelas.id as id_kelast'])->first();
            $kode_kelas_siswa = $siswa->id_kelast;
            if($kode_kelas_siswa != $request->kelas_tujuan){
                $create = akademik_pindah_kelas::create([
                    'tgl_pengajuan' => $request->tgl_pengajuan,
                    'tgl_disetujui' => '-',
                    'kode_siswa' => $request->kode_siswa,
                    'kode_kelas_siswa' => $kode_kelas_siswa,
                    'kode_kelas_tujuan' => $request->kelas_tujuan,
                    'ket_pindah' => $request->ket_pindah,
                    'status_pindah' => '0'
                ]);
                if($create){
                    return redirect()
                    ->route('pindah_kelas.index')
                    ->with([
                        'success' => 'Pindah Kelas Has Been Created successfully'
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
                        'error' => 'Pindah Kelas Cannot Same '
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
        $data = akademik_pindah_kelas::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('pindah_kelas.index')
            ->with([
                'success' => 'Pindah Kelas Has Been Deleted successfully'
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
