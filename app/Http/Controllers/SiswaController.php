<?php

namespace App\Http\Controllers;

use App\Models\data_siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = data_siswa::latest()->get();
        return view('siswa.index',compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }
    public function store(Request $request)
    {
        $credential = $this->validate($request,[
             'status_siswa' => ['required'],
             'nik' => ['required'],
             'nisn' => ['required'],
             'nama_siswa' => ['required'],
             'tmp_lahir' => ['required'],
             'tgl_lhr' => ['required'],
             'jns_kelamin' => ['required'],
             'agama' => ['required'],
             'alamat' => ['required'],
             'anak_ke' => ['required'],
             'jml_saudara' => ['required'],
             'no_hp' => ['required'],
             'email' => ['required'],
             'biaya_sekolah' => ['required'],
             'status_tempat_tinggal' => ['required'],
             'jarak_tinggal' => ['required'],
             'waktu_tempuh' => ['required'],
             'transportasi' => ['required'],
        ]);   
        if($credential){
            $data = [];
            $data_ibu = [];
            $data_ayah = [];
            $data_wali = [];    
            $file = $request->file('foto_siswa');
            if($file != null){
                $name = $request->file('foto_siswa')->getClientOriginalName();
                $file->move('../assets/uploads',$name);
                $data = [
                    'status_siswa' =>$request->status_siswa,
                    'nik' => $request->nik,
                    'nisn' => $request->nisn,
                    'kip' => $request->kip,
                    'nama' => $request->nama_siswa,
                    'tmp_lahir' => $request->tmp_lahir,
                    'tgl_lhr' => $request->tgl_lhr,
                    'jns_kelamin' => $request->jns_kelamin,
                    'hobi' => $request->hobi,
                    'cita_cita' => $request->cita_cita,
                    'agama' => $request->agama,
                    'alamat' => $request->alamat,
                    'anak' => $request->anak_ke,
                    'jml_saudara' => $request->jml_saudara,
                    'no_hp' => $request->no_hp,
                    'email' => $request->email,
                    'biaya_sekolah' => $request->biaya_sekolah,
                    'kebutuhan_disabilitas' => $request->kebutuhan_disabilitas,
                    'kebutuhan_khusus' => $request->kebutuhan_khusus,
                    'tmp_tinggal' => $request->status_tempat_tinggal,
                    'jarak_tinggal' => $request->jarak_tinggal,
                    'waktu_tempuh' => $request->waktu_tempuh,
                    'antar_jemput' => $request->transportasi,
                    'foto_siswa' => $name,
                ];
            }else{
                $data = [
                    'status_siswa' =>$request->status_siswa,
                    'nik' => $request->nik,
                    'nisn' => $request->nisn,
                    'kip' => $request->kip,
                    'nama' => $request->nama_siswa,
                    'tmp_lahir' => $request->tmp_lahir,
                    'tgl_lhr' => $request->tgl_lhr,
                    'jns_kelamin' => $request->jns_kelamin,
                    'hobi' => $request->hobi,
                    'cita_cita' => $request->cita_cita,
                    'agama' => $request->agama,
                    'alamat' => $request->alamat,
                    'anak' => $request->anak_ke,
                    'jml_saudara' => $request->jml_saudara,
                    'no_hp' => $request->no_hp,
                    'email' => $request->email,
                    'biaya_sekolah' => $request->biaya_sekolah,
                    'kebutuhan_disabilitas' => $request->kebutuhan_disabilitas,
                    'kebutuhan_khusus' => $request->kebutuhan_khusus,
                    'tmp_tinggal' => $request->status_tempat_tinggal,
                    'jarak_tinggal' => $request->jarak_tinggal,
                    'waktu_tempuh' => $request->waktu_tempuh,
                    'antar_jemput' => $request->transportasi,
                    'foto_siswa' => '-',
                ];
            }
            $create = data_siswa::create($data);
            if($create){
                    return redirect()
                    ->route('siswa.index')
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

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $data = data_siswa::findOrFail($id);
        $img = config('app.url').'/assets/uploads/'.$data->foto_siswa;
        return view('siswa.edit',compact(['data','img']));
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
        $data = data_siswa::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('siswa.index')
            ->with([
                'success' => 'Kelas Has Been Deleted successfully'
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
