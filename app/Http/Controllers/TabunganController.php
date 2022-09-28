<?php

namespace App\Http\Controllers;

use App\Models\data_siswa;
use App\Models\keuangan_tabungan_siswa;
use App\Models\keuangan_tabungan_siswa_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        $data = keuangan_tabungan_siswa::join('data_siswas','keuangan_tabungan_siswas.kode_siswa','=','data_siswas.id')
                                        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
                                        ->where([['data_siswas.status_siswa','=','Aktif']])
                                        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*'
                                            ,'keuangan_tabungan_siswas.kode_tabungan as kode_tabungan'
                                            ,'keuangan_tabungan_siswas.*','keuangan_tabungan_siswas.id as id_tabungan']);
        return view('tabungan.index',compact(['siswa','data']));
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
            'status_tabungan' => ['required'],
            'desc_tabungan' => ['required'],
        ]);
        if($validate){
            $cek = keuangan_tabungan_siswa::where([['kode_siswa','=',$request->kode_siswa]])->get()->first();
            if(!$cek){
                $qode = Str::random(6);
                $length = keuangan_tabungan_siswa::latest()->get()->count();
                $kode = 'TS_'.$qode.$length;
                $create= keuangan_tabungan_siswa::create([
                    'kode_tabungan' => $kode,
                    'kode_siswa' => $request->kode_siswa,
                    'saldo_tabungan' => '0',
                    'status_tabungan' => $request->status_tabungan,
                    'desc_tabungan' => $request->desc_tabungan,
                ]);
                if($create){
                    return redirect()
                    ->route('tabungan.index')
                    ->with([
                        'success' => 'Tabungan Has Been Added successfully'
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
                    ->route('tabungan.index')
                    ->with([
                        'success' => 'Tabungan Has Been Already Added'
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
        $data = keuangan_tabungan_siswa::join('data_siswas','keuangan_tabungan_siswas.kode_siswa','=','data_siswas.id')
        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->where([['keuangan_tabungan_siswas.id','=',$id]])
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*'
            ,'keuangan_tabungan_siswas.kode_tabungan as kode_tabungan'
            ,'keuangan_tabungan_siswas.*','keuangan_tabungan_siswas.id as id_tabungan'])->first();
        $detail = keuangan_tabungan_siswa_detail::where([['kode_tabungan','=',$id]])->get();
        return view('tabungan.edit',compact(['data','detail']));
        
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
            'status_tabungan' => ['required'],
            'desc_tabungan' => ['required']
        ]);
        if($validate){
            $update = keuangan_tabungan_siswa::findOrFail($id);
            $update->update([
                'status_tabungan' => $request->status_tabungan,
                'desc_tabungan' => $request->desc_tabungan
            ]);
            if($update){
                return redirect()
                ->route('tabungan.index')
                ->with([
                    'success' => 'Tabungan Has Been Updated successfully'
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
        $data = keuangan_tabungan_siswa::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('tabungan.index')
            ->with([
                'success' => 'Tabungan Has Been Deleted successfully'
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
