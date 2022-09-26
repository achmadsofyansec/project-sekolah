<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SarprasLahan;
use App\Models\SarprasKepemilikanLahan;
use App\Models\SarprasPenggunaanLahan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;


class LahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        // $lahan = SarprasLahan::latest()->get();
        $lahan = DB::table('sarpras_lahans')->select(['sarpras_lahans.*'])->get();
        return view('asset_tetap.lahan.index',compact ('lahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('asset_tetap.lahan.create');
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
            'nama_lahan' => ['required'],
            'alamat' => ['required'],
            'luas' => ['required'],
            'luas_digunakan' => ['required'],
            'status_lahan' => ['required'], 
            'kelurahan' => ['required'],
            'kecamatan' => ['required'],
            'kabupaten' => ['required'],
            'provinsi' => ['required'],
            'kode_pos' => ['required'],
            'kategori_geografis' => ['required'],
            'wilayah' => ['required'],
            'jarak_provinsi' => ['required'],
            'jarak_kabupaten' => ['required'],
            'jarak_kecamatan' => ['required'],
            'jarak_kemenag' => ['required'],
            'jarak_ra' => ['required'],
            'jarak_mi' => ['required'],
            'jarak_mts' => ['required'],
            'jarak_sd' => ['required'],
            'jarak_smp' => ['required'],
            'jarak_sma' => ['required'],
            'jarak_pontren' => ['required'],
            'jarak_ptki' => ['required'],
        ]);
        if($credential){
            $create = SarprasLahan::create([
                'nama_lahan' => $request->nama_lahan, 
                'alamat' => $request->alamat,
                'luas' => $request->luas,
                'luas_digunakan' => $request->luas_digunakan,
                'status_lahan' =>  $request->status_lahan,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kecamatan,
                'provinsi' => $request->provinsi,
                'kode_pos' => $request->kode_pos,
                'kategori_geografis' => $request->kategori_geografis,
                'wilayah' => $request->wilayah,
                'jarak_provinsi' => $request->jarak_provinsi,
                'jarak_kabupaten' => $request->jarak_kabupaten,
                'jarak_kecamatan' => $request->jarak_kecamatan,
                'jarak_kemenag' => $request->jarak_kemenag,
                'jarak_ra' => $request->jarak_ra,
                'jarak_mi' => $request->jarak_mi,
                'jarak_mts' => $request->jarak_mts,
                'jarak_sd' => $request->jarak_sd,
                'jarak_smp' => $request->jarak_smp,
                'jarak_sma' => $request->jarak_sma,
                'jarak_pontren' => $request->jarak_pontren,
                'jarak_ptki' => $request->jarak_ptki,
            ]);
            if($create){
                return redirect()
                ->route('lahan.index')
                ->with([
                    'success' => 'Data Lahan Has Been Added successfully'
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
        $data = SarprasLahan::findOrFail($id);
        $lahan = DB::table('sarpras_lahans')->select(['sarpras_lahans.*'])->get();
        $kepemilikan = DB::table('sarpras_kepemilikan_lahans')->select(['sarpras_kepemilikan_lahans.*'])->get();
        $pengguna = DB::table('sarpras_penggunaan_lahans')->select(['sarpras_penggunaan_lahans.*'])->get();
        // $kepemilikan = SarprasKepemilikanLahan::latest()->get();
        $pemggunaan = SarprasPenggunaanLahan::latest()->get();
        $data_kepemilikan = DB::table('sarpras_lahans')
                    ->join('sarpras_kepemilikan_lahans', 'sarpras_lahans.nama_lahan', '=', 'sarpras_kepemilikan_lahans.nama_lahan')
                    ->get();
        $data_pengguna = DB::table('sarpras_lahans')
                    ->join('sarpras_penggunaan_lahans', 'sarpras_lahans.nama_lahan', '=', 'sarpras_penggunaan_lahans.nama_lahan')
                    ->get();            
        return view('asset_tetap.lahan.tampil',compact (['lahan', 'data_kepemilikan', 'data_pengguna']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SarprasLahan::findOrFail($id);
        $lahan = DB::table('sarpras_lahans')->select(['sarpras_lahans.*'])->get();
        $kepemilikan = DB::table('sarpras_kepemilikan_lahans')->select(['sarpras_kepemilikan_lahans.*'])->get();
        $pengguna = DB::table('sarpras_penggunaan_lahans')->select(['sarpras_penggunaan_lahans.*'])->get();
        // $kepemilikan = SarprasKepemilikanLahan::latest()->get();
        $pemggunaan = SarprasPenggunaanLahan::latest()->get();
        $data_kepemilikan = DB::table('sarpras_lahans')
                    ->join('sarpras_kepemilikan_lahans', 'sarpras_lahans.nama_lahan', '=', 'sarpras_kepemilikan_lahans.nama_lahan')
                    ->get();
        $data_pengguna = DB::table('sarpras_lahans')
                    ->join('sarpras_penggunaan_lahans', 'sarpras_lahans.nama_lahan', '=', 'sarpras_penggunaan_lahans.nama_lahan')
                    ->get();            
        return view('asset_tetap.lahan.edit',compact (['lahan', 'data_kepemilikan', 'data_pengguna', 'data']));
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
            'nama_lahan' => ['required'],
            'alamat' => ['required'],
            'luas' => ['required'],
            'luas_digunakan' => ['required'],
            'status_lahan' => ['required'], 
            'kelurahan' => ['required'],
            'kecamatan' => ['required'],
            'kabupaten' => ['required'],
            'provinsi' => ['required'],
            'kode_pos' => ['required'],
            'kategori_geografis' => ['required'],
            'wilayah' => ['required'],
            'jarak_provinsi' => ['required'],
            'jarak_kabupaten' => ['required'],
            'jarak_kecamatan' => ['required'],
            'jarak_kemenag' => ['required'],
            'jarak_ra' => ['required'],
            'jarak_mi' => ['required'],
            'jarak_mts' => ['required'],
            'jarak_sd' => ['required'],
            'jarak_smp' => ['required'],
            'jarak_sma' => ['required'],
            'jarak_pontren' => ['required'],
            'jarak_ptki' => ['required'],
        ]);
        if($validate){
            $update = SarprasLahan::findOrFail($id);
            $update->update([
                'nama_lahan' => $request->nama_lahan, 
                'alamat' => $request->alamat,
                'luas' => $request->luas,
                'luas_digunakan' => $request->luas_digunakan,
                'status_lahan' =>  $request->status_lahan,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kecamatan,
                'provinsi' => $request->provinsi,
                'kode_pos' => $request->kode_pos,
                'kategori_geografis' => $request->kategori_geografis,
                'wilayah' => $request->wilayah,
                'jarak_provinsi' => $request->jarak_provinsi,
                'jarak_kabupaten' => $request->jarak_kabupaten,
                'jarak_kecamatan' => $request->jarak_kecamatan,
                'jarak_kemenag' => $request->jarak_kemenag,
                'jarak_ra' => $request->jarak_ra,
                'jarak_mi' => $request->jarak_mi,
                'jarak_mts' => $request->jarak_mts,
                'jarak_sd' => $request->jarak_sd,
                'jarak_smp' => $request->jarak_smp,
                'jarak_sma' => $request->jarak_sma,
                'jarak_pontren' => $request->jarak_pontren,
                'jarak_ptki' => $request->jarak_ptki,
            ]);
            if($update){
                return redirect()
                ->route('lahan.index')
                ->with([
                    'success' => 'Data Lahan Has Been Update successfully'
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
        $data = SarprasLahan::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('lahan.index')
            ->with([
                'success' => 'Data Lahan Has Been Deleted successfully'
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
