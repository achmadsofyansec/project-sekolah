<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\data_siswa;
use DateTime;
use Illuminate\Http\Request;

class PerizinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $perizinan = Absensi::join("data_siswas","absensis.kode_siswa","=",'data_siswas.id')->where([['data_siswas.status_siswa','=','Aktif'],['absensis.keterangan','!=','Masuk']])->get(["data_siswas.*","absensis.*","absensis.id as id_absen"]);
        return view('absensi.perizinan.index',compact('perizinan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')->where([['data_siswas.status_siswa','=','Aktif']])->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        return view('absensi.perizinan.create',compact('siswa'));
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
        $validation = $this->validate($request,[
            'tgl_izin' => ['required'],
            'kode_siswa' => ['required'],
            'izin' => ['required'],
            'keterangan_izin' => ['required'],
        ]);
        if($validation){
            $data = Absensi::where([['kode_siswa','=',$request->kode_siswa],['tgl_absensi','>=',$request->tgl_izin.' 00:00:00']])->get(['absensis.*','absensis.id as id_absen'])->first();
            $datas = "";
            if($data != null){
            $datas = Absensi::findOrFail($data->id_absen);
             $datas->update([
                    'tgl_absensi' => $request->tgl_izin,
                    'jenis_absen' => $request->izin,
                    'keterangan' => $request->izin,
                    'alasan' => $request->keterangan_izin,
                    'created_by' => $request->tgl_izin,
                ]);
            }else{
                $datas = Absensi::create([
                    'tgl_absensi' => $request->tgl_izin,
                    'kode_siswa' => $request->kode_siswa,
                    'jenis_absen' => $request->izin,
                    'keterangan' => $request->izin,
                    'alasan' => $request->keterangan_izin,
                    'created_by' => $request->tgl_izin,
                ]);
            }
            if($datas){
                return redirect()
                ->route('perizinan.index')
                ->with([
                    'success' => 'Perizinan Has Been Created successfully'
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
        $data = Absensi::join('data_siswas','absensis.kode_siswa','=','data_siswas.id')
        ->join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
        ->where([['absensis.id','=',$id]])
        ->get(['absensis.*','absensis.id as id_absen','data_siswas.id as id_siswa'])->first();
        $tanggal = new DateTime($data->tgl_absensi);
        $tanggal = $tanggal->format('Y-m-d');
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->where([['data_siswas.status_siswa','=','Aktif']])
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        return view('absensi.perizinan.edit',compact(['data','siswa','tanggal']));
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
        $validation = $this->validate($request,[
            'tgl_izin' => ['required'],
            'kode_siswa' => ['required'],
            'izin' => ['required'],
            'keterangan_izin' => ['required'],
        ]);
        if($validation){
            $datas = Absensi::findOrFail($id);
             $datas->update([
                    'tgl_absensi' => $request->tgl_izin,
                    'jenis_absen' => $request->izin,
                    'keterangan' => $request->izin,
                    'alasan' => $request->keterangan_izin,
                    'created_by' => $request->tgl_izin,
                ]);
            if($datas){
                    return redirect()
                    ->route('perizinan.index')
                    ->with([
                        'success' => 'Perizinan Has Been Created successfully'
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
    }
}
