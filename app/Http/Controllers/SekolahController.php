<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use App\Models\kelurahan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $data = DB::table('sekolahs')->select(['sekolahs.*','sekolahs.id as id_sekolah'])->first();
        $kecamatan = DB::table('kecamatan')->select(['kecamatan.*'])->get();
        $kelurahan = DB::table('kelurahan')->select(['kelurahan.*'])->get();
        return view('sekolah.index',compact(['data','kecamatan','kelurahan']));
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
        
     // Update Data Sekolah   
     $credential = $this->validate($request,[
            'kode_sekolah' => ['required'],
            'nsm' =>['required'],
            'npsn' => ['required'],
            'akreditasi' => ['required'],
            'nama_sekolah' => ['required'],
            'alamat_sekolah' => ['required'],
            'longtitude' => ['required'],
            'latitude' => ['required'],
            'kecamatan' => ['required'],
            'kelurahan' => ['required'],
            'kode_pos' => ['required'],
            'nomor_hp' => ['required'],
            'email' =>['required'],
            'website' => ['required'],
            
     ]);
     if($credential){
         $data = [];
         $file = $request->file('logo_sekolah');
         if($file != null){
            $name = $request->file('logo_sekolah')->getClientOriginalName();
            $file->move(public_path('uploads'),$name);
            $data = [
                'kode_sekolah' => $request->kode_sekolah,
                'nsm' =>  $request->nsm,
                'npsn' =>  $request->npsn,
                'akreditasi' =>  $request->akreditasi,
                'nama_sekolah' =>  $request->nama_sekolah,
                'alamat_sekolah' =>  $request->alamat_sekolah,
                'longtitude' =>  $request->longtitude,
                'latitude' =>  $request->latitude,
                'kode_kecamatan' =>  $request->kecamatan,
                'kode_kelurahan' =>  $request->kelurahan,
                'kode_pos' =>  $request->kode_pos,
                'nomor_hp' =>  $request->nomor_hp,
                'email' =>  $request->email,
                'website' =>  $request->website,
                'logo_sekolah' =>  $name,
            ];
         }else{
            $data = [
                'kode_sekolah' => $request->kode_sekolah,
                'nsm' =>  $request->nsm,
                'npsn' =>  $request->npsn,
                'akreditasi' =>  $request->akreditasi,
                'nama_sekolah' =>  $request->nama_sekolah,
                'alamat_sekolah' =>  $request->alamat_sekolah,
                'longtitude' =>  $request->longtitude,
                'latitude' =>  $request->latitude,
                'kode_kecamatan' =>  $request->kecamatan,
                'kode_kelurahan' =>  $request->kelurahan,
                'kode_pos' =>  $request->kode_pos,
                'nomor_hp' =>  $request->nomor_hp,
                'email' =>  $request->email,
                'website' =>  $request->website,
            ];
         }
         $update = DB::table('sekolahs')->where('sekolahs.id','=',$id)->update($data);
         if($update){
            return redirect()
            ->route('sekolah.index')
            ->with([
                'success' => 'Sekolah Has Been Edited'
            ]);
        }else{
            return redirect()
            ->route('sekolah.index')
            ->with([
                'error' => 'Some problem has occurred, please try again '
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
