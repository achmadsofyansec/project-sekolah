<?php

namespace App\Http\Controllers;

use App\Models\data_guru;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = data_guru::latest()->get();
        return view('guru.index',compact('guru'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = DB::table('kecamatan')->select(['kecamatan.*'])->get();
        $kelurahan = DB::table('kelurahan')->select(['kelurahan.*'])->get();
        return view('guru.create',compact(['kecamatan','kelurahan']));
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
        $credential = $this->validate($request,[
            'status_guru' => ['required'],
            'nik' => ['required'],
            'niptk' => ['required'],
            'nuptk' => ['required'],
            'nama_guru' => ['required'],
            'tmp_lahir' => ['required'],
            'tgl_lhr' => ['required'],
            'jns_kelamin' => ['required'],
            'agama' => ['required'],
            'kewarganegaraan' => ['required'],
            'alamat' => ['required'],
            'kecamatan' => ['required'],
            'kelurahan' => ['required'],
            'jabatan_guru' => ['required'],
            'no_hp' => ['required'],
            'no_telp' => ['required'],
            'email' => ['required'],
        ]);
        if($credential){
            $data = [];
            $file = $request->file('foto_guru');
            if($file != null){
                $name = $request->file('foto_guru')->getClientOriginalName();
                $file->move('../assets/uploads',$name);
                $data = [
                    'status' => $request->status_guru,
                    'nik' => $request->nik,
                    'niptk' => $request->niptk,
                    'nuptk' => $request->nuptk,
                    'nama' => $request->nama_guru,
                    'tmp_lahir' => $request->tmp_lahir,
                    'tgl_lhr' => $request->tgl_lhr,
                    'jns_kelamin' => $request->jns_kelamin,
                    'agama' => $request->agama,
                    'kewarganegaraan' => $request->kewarganegaraan,
                    'alamat' => $request->alamat,
                    'kecamatan' => $request->kecamatan,
                    'kelurahan' => $request->kelurahan,
                    'jabatan' => $request->jabatan_guru,
                    'no_hp' => $request->no_hp,
                    'no_telp' => $request->no_telp,
                    'email' => $request->email,
                    'jenis_guru' => '-',
                    'foto_guru' => $name,
                ];
            }else{
                $data = [
                    'status' => $request->status_guru,
                    'nik' => $request->nik,
                    'niptk' => $request->niptk,
                    'nuptk' => $request->nuptk,
                    'nama' => $request->nama_guru,
                    'tmp_lahir' => $request->tmp_lahir,
                    'tgl_lhr' => $request->tgl_lhr,
                    'jns_kelamin' => $request->jns_kelamin,
                    'agama' => $request->agama,
                    'kewarganegaraan' => $request->kewarganegaraan,
                    'alamat' => $request->alamat,
                    'kecamatan' => $request->kecamatan,
                    'kelurahan' => $request->kelurahan,
                    'jabatan' => $request->jabatan_guru,
                    'no_hp' => $request->no_hp,
                    'no_telp' => $request->no_telp,
                    'email' => $request->email,
                    'jenis_guru' => '-',
                    'foto_guru' => '-',
                ];
            }
            $create = data_guru::create($data);
            if($create){
                return redirect()
                ->route('guru.index')
                ->with([
                    'success' => 'Guru Has Been Added successfully'
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
        $data = data_guru::findOrFail($id);
        $img = config('app.url').'/assets/uploads/'.$data->foto_guru;
        $kecamatan = DB::table('kecamatan')->select(['kecamatan.*'])->get();
        $kelurahan = DB::table('kelurahan')->select(['kelurahan.*'])->get();
        return view('guru.edit',compact(['img','data','kecamatan','kelurahan']));
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
        $credential = $this->validate($request,[
            'status_guru' => ['required'],
            'nik' => ['required'],
            'niptk' => ['required'],
            'nuptk' => ['required'],
            'nama_guru' => ['required'],
            'tmp_lahir' => ['required'],
            'tgl_lhr' => ['required'],
            'jns_kelamin' => ['required'],
            'agama' => ['required'],
            'kewarganegaraan' => ['required'],
            'alamat' => ['required'],
            'kecamatan' => ['required'],
            'kelurahan' => ['required'],
            'jabatan_guru' => ['required'],
            'no_hp' => ['required'],
            'no_telp' => ['required'],
            'email' => ['required'],
        ]);
        if($credential){
            $data = [];
            $file = $request->file('foto_guru');
            if($file != null){
                $name = $request->file('foto_guru')->getClientOriginalName();
                $file->move('../assets/uploads',$name);
                $data = [
                    'status' => $request->status_guru,
                    'nik' => $request->nik,
                    'niptk' => $request->niptk,
                    'nuptk' => $request->nuptk,
                    'nama' => $request->nama_guru,
                    'tmp_lahir' => $request->tmp_lahir,
                    'tgl_lhr' => $request->tgl_lhr,
                    'jns_kelamin' => $request->jns_kelamin,
                    'agama' => $request->agama,
                    'kewarganegaraan' => $request->kewarganegaraan,
                    'alamat' => $request->alamat,
                    'kecamatan' => $request->kecamatan,
                    'kelurahan' => $request->kelurahan,
                    'jabatan' => $request->jabatan_guru,
                    'no_hp' => $request->no_hp,
                    'no_telp' => $request->no_telp,
                    'email' => $request->email,
                    'jenis_guru' => '-',
                    'foto_guru' => $name,
                ];
            }else{
                $data = [
                    'status' => $request->status_guru,
                    'nik' => $request->nik,
                    'niptk' => $request->niptk,
                    'nuptk' => $request->nuptk,
                    'nama' => $request->nama_guru,
                    'tmp_lahir' => $request->tmp_lahir,
                    'tgl_lhr' => $request->tgl_lhr,
                    'jns_kelamin' => $request->jns_kelamin,
                    'agama' => $request->agama,
                    'kewarganegaraan' => $request->kewarganegaraan,
                    'alamat' => $request->alamat,
                    'kecamatan' => $request->kecamatan,
                    'kelurahan' => $request->kelurahan,
                    'jabatan' => $request->jabatan_guru,
                    'no_hp' => $request->no_hp,
                    'no_telp' => $request->no_telp,
                    'email' => $request->email,
                    'jenis_guru' => '-',
                ];
            }
            $update = data_guru::findOrFail($id);
            $update->update($data);
            if($update){
                return redirect()
                ->route('guru.index')
                ->with([
                    'success' => 'Guru Has Been Updated successfully'
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
        $data = data_guru::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('guru.index')
            ->with([
                'success' => 'Guru Has Been Deleted successfully'
            ]);
        }else{
            return redirect()
            ->back()
            ->with([
                'error' => 'Some problem has occurred, please try again'
            ]);
        }
    }

    public function import(){

    }
    public function export(){
        
    }

}
