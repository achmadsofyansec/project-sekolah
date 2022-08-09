<?php

namespace App\Http\Controllers;

use App\Models\barang_sitaan;
use App\Models\data_siswa;
use DateTime;
use Illuminate\Http\Request;

class BarangSitaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang_sita = barang_sitaan::join('data_siswas','barang_sitaans.id_siswa','=','data_siswas.id')
        ->join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
        ->get(['data_siswas.*','aktivitas_belajars.*','barang_sitaans.*','barang_sitaans.id as id_barang_sitaan']);
        return view('barang_sitaan.index',compact('barang_sita'));
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
        return view('barang_sitaan.create',compact('siswa'));
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
            'tgl_sita'=> ['required'],
            'kode_siswa'=> ['required'],
            'barang_sitaan'=> ['required'],
        ]);   
        if($validate){
            $create = barang_sitaan::create([
                'id_siswa' => $request->kode_siswa,
                'tanggal_sita' => $request->tgl_sita,
                'keterangan_sita' => $request->barang_sitaan,
                'created_by' => '-',
            ]);
            if($create){
                return redirect()
                ->route('barang_sitaan.index')
                ->with([
                    'success' => 'Barang Sitaan Has Been Created successfully'
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
        $data = barang_sitaan::findOrFail($id);
        $tanggal = new DateTime($data->tanggal_sita);
        $tanggal = $tanggal->format('Y-m-d');
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')->where([['data_siswas.status_siswa','=','Aktif']])->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        return view('barang_sitaan.edit',compact(['data','siswa','tanggal']));
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
            'tgl_sita'=> ['required'],
            'kode_siswa'=> ['required'],
            'barang_sitaan'=> ['required'],
        ]);
        if($validate){
            $update = barang_sitaan::findOrFail($id);
            $update->update([
                'id_siswa' => $request->kode_siswa,
                'tanggal_sita' => $request->tgl_sita,
                'keterangan_sita' => $request->barang_sitaan,
            ]);
            if($update){
                return redirect()
                ->route('barang_sitaan.index')
                ->with([
                    'success' => 'Barang Sitaan Has Been Updated successfully'
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
        $data = barang_sitaan::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('barang_sitaan.index')
            ->with([
                'success' => 'Barang Sitaan Has Been Deleted successfully'
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
