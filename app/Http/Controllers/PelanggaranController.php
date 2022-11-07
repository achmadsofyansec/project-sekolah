<?php

namespace App\Http\Controllers;

use App\Models\data_siswa;
use App\Models\pelanggaran;
use App\Models\point_pelanggaran;
use App\Models\tahun_ajaran;
use DateTime;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pelanggaran = pelanggaran::join('data_siswas','pelanggarans.id_siswa','=','data_siswas.id')
        ->join('point_pelanggarans','pelanggarans.id_poin_pelanggaran','=','point_pelanggarans.id')
        ->join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
        ->join('kelas','aktivitas_belajars.kode_kelas','=','kelas.kode_kelas')
        ->get(['data_siswas.*','aktivitas_belajars.*','kelas.*','pelanggarans.*','pelanggarans.id as id_pelanggaran','point_pelanggarans.*']);
        return view('pelanggaran.pelanggaran.index',compact('pelanggaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $siswa = data_siswa::join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
        ->get(['aktivitas_belajars.*','data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.id as id_activity']);
        $poin = point_pelanggaran::latest()->get();
        return view('pelanggaran.pelanggaran.create',compact(['siswa','poin']));
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
            'tgl_pelanggaran' => ['required'],
            'siswa' => ['required'],
            'pelanggaran' => ['required'],
        ]);
        if($validation){
            $siswas = data_siswa::join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
            ->where([['data_siswas.id','=',$request->siswa]])
            ->get(['aktivitas_belajars.*','data_siswas.*'])->first();    
            $data_poin = point_pelanggaran::findOrFail($request->pelanggaran);
            if($data_poin){
                $create = pelanggaran::create([
                    'id_siswa'  => $request->siswa,
                    'id_kelas' => $siswas->kode_kelas,
                    'tahun_ajaran' => $siswas->kode_tahun_ajaran,
                    'id_poin_pelanggaran' => $request->pelanggaran,
                    'tanggal_pelanggaran' => $request->tgl_pelanggaran,
                    'poin_minus' => $data_poin->poin,
                    'created_by' => '-'
                ]);
                if($create){
                    return redirect()
                    ->route('pelanggaran.index')
                    ->with([
                        'success' => 'Pelanggaran Has Been Created successfully'
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
        $siswa = data_siswa::join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
        ->get(['aktivitas_belajars.*','data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.id as id_activity']);
        $poin = point_pelanggaran::latest()->get();
        $pelanggaran = pelanggaran::findOrFail($id);
        $tanggal = new DateTime($pelanggaran->tanggal_pelanggaran);
        $tanggal = date_format($tanggal,'Y-m-d');
        return view('pelanggaran.pelanggaran.edit',compact(['siswa','poin','pelanggaran','tanggal']));
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
            'tgl_pelanggaran' => ['required'],
            'siswa' => ['required'],
            'pelanggaran' => ['required'],
        ]);
        if($validation){
            $update = pelanggaran::findOrFail($id);
            $update->update([
                'id_siswa' => $request->siswa,
                'id_poin_pelanggaran' => $request->pelanggaran,
                'tanggal_pelanggaran' => $request->tgl_pelanggaran,
            ]);
            if($update){
                return redirect()
                ->route('pelanggaran.index')
                ->with([
                    'success' => 'Pelanggaran Has Been Updated successfully'
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
        $data = pelanggaran::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('pelanggaran.index')
            ->with([
                'success' => 'Pelanggaran Has Been Deleted successfully'
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
