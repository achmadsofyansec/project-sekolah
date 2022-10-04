<?php

namespace App\Http\Controllers;

use App\Models\akademik_kategori_nilai;
use Illuminate\Http\Request;
use App\Models\akademik_nilai;
use App\Models\akademik_nilai_details;
use App\Models\akademik_nilai_rapor;
use App\Models\data_siswa;
use App\Models\jurusan;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\tahun_ajaran;
use Illuminate\Support\Str;
class NilaiController extends Controller
{
    
    public function view_input_harian(){
        $kelas = Kelas::where([['status_kelas','=','Aktif']])->get();
        $jurusan = jurusan::where([['status_jurusan','=','Aktif']])->get();
        $tahun_ajaran = tahun_ajaran::latest()->get();
        $mapel = MataPelajaran::latest()->get();
        $kategori = akademik_kategori_nilai::latest()->get();
        $data = akademik_nilai::join('kelas','akademik_nilais.kode_kelas','=','kelas.kode_kelas')
        ->join('jurusans','akademik_nilais.kode_jurusan','=','jurusans.kode_jurusan')
        ->join('mata_pelajarans','akademik_nilais.kode_mapel','=','mata_pelajarans.kode_mapel')
        ->join('akademik_kategori_nilais','akademik_nilais.kode_kategori','=','akademik_kategori_nilais.id')
        ->join('tahun_ajarans','akademik_nilais.kode_tahun_ajaran','=','tahun_ajarans.kode_tahun_ajaran')
        ->where([['type_nilai','=','harian']])->get(['akademik_nilais.*','akademik_nilais.id as id_nilai','kelas.*','jurusans.*','tahun_ajarans.*','mata_pelajarans.*','akademik_kategori_nilais.id as id_kategori_nilai','akademik_kategori_nilais.*']);
        return view('nilai.input_nilai.harian.index',compact(['data','kelas','jurusan','tahun_ajaran','mapel','kategori']));
    }
    public function view_input_rapor(){
        $kelas = Kelas::where([['status_kelas','=','Aktif']])->get();
        $jurusan = jurusan::where([['status_jurusan','=','Aktif']])->get();
        $tahun_ajaran = tahun_ajaran::latest()->get();
        $mapel = MataPelajaran::latest()->get();
        $kategori = akademik_kategori_nilai::latest()->get();
        $data = akademik_nilai::join('kelas','akademik_nilais.kode_kelas','=','kelas.kode_kelas')
        ->join('jurusans','akademik_nilais.kode_jurusan','=','jurusans.kode_jurusan')
        ->join('mata_pelajarans','akademik_nilais.kode_mapel','=','mata_pelajarans.kode_mapel')
        ->join('akademik_kategori_nilais','akademik_nilais.kode_kategori','=','akademik_kategori_nilais.id')
        ->join('tahun_ajarans','akademik_nilais.kode_tahun_ajaran','=','tahun_ajarans.kode_tahun_ajaran')
        ->where([['type_nilai','=','rapor']])->get(['akademik_nilais.*','akademik_nilais.id as id_nilai','kelas.*','jurusans.*','tahun_ajarans.*','mata_pelajarans.*','akademik_kategori_nilais.id as id_kategori_nilai','akademik_kategori_nilais.*']);
        return view('nilai.input_nilai.rapor.index',compact(['data','kelas','jurusan','tahun_ajaran','mapel','kategori']));
    }
    public function view_input_ujian(){
        $kelas = Kelas::where([['status_kelas','=','Aktif']])->get();
        $jurusan = jurusan::where([['status_jurusan','=','Aktif']])->get();
        $tahun_ajaran = tahun_ajaran::latest()->get();
        $mapel = MataPelajaran::latest()->get();
        $kategori = akademik_kategori_nilai::latest()->get();
        $data = akademik_nilai::join('kelas','akademik_nilais.kode_kelas','=','kelas.kode_kelas')
        ->join('jurusans','akademik_nilais.kode_jurusan','=','jurusans.kode_jurusan')
        ->join('mata_pelajarans','akademik_nilais.kode_mapel','=','mata_pelajarans.kode_mapel')
        ->join('akademik_kategori_nilais','akademik_nilais.kode_kategori','=','akademik_kategori_nilais.id')
        ->join('tahun_ajarans','akademik_nilais.kode_tahun_ajaran','=','tahun_ajarans.kode_tahun_ajaran')
        ->where([['type_nilai','=','ujian']])->get(['akademik_nilais.*','akademik_nilais.id as id_nilai','kelas.*','jurusans.*','tahun_ajarans.*','mata_pelajarans.*','akademik_kategori_nilais.id as id_kategori_nilai','akademik_kategori_nilais.*']);
        return view('nilai.input_nilai.ujian.index',compact(['data','kelas','jurusan','tahun_ajaran','mapel','kategori']));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validate = $this->validate($request,[
            'type_nilai' => ['required'],
            'tgl_input' => ['required'],
            'kode_kelas' => ['required'],
            'kode_mapel' => ['required'],
            'kode_kategori' => ['required'],
            'jurusan' => ['required'],
            'tahun_ajaran' => ['required']
        ]);
        if($validate){
            $cek = akademik_nilai::where([['type_nilai','=',$request->type_nilai]
            ,['kode_kelas','=',$request->kode_kelas]
            ,['kode_jurusan','=',$request->jurusan]
            ,['kode_tahun_ajaran','=',$request->tahun_ajaran]
            ,['tgl_input','=',$request->tgl_input]
            ,['kode_mapel','=',$request->kode_mapel]
            ,['kode_kategori','=',$request->kode_kategori]
            ])->get()->count();
            if($cek < 1){
                $qode = Str::random(6);
                $data = akademik_nilai::latest()->get()->count();
                $kode_nilai = "AN_".$qode.$data;
                $create = akademik_nilai::create([
                    'kode_nilai' => $kode_nilai,
                    'tgl_input' => $request->tgl_input,
                    'kode_kelas' => $request->kode_kelas,
                    'kode_jurusan' => $request->jurusan,
                    'kode_tahun_ajaran' => $request->tahun_ajaran,
                    'kode_mapel' => $request->kode_mapel,
                    'kode_kategori' => $request->kode_kategori,
                    'type_nilai' => $request->type_nilai,
                    'status_input' => '0',
                    'desc_input' => $request->desc_input
                ]);
                if($create){
                    return redirect()
                    ->back()
                    ->with([
                        'success' => "Mata Pelajaran Has Been Added successfully"
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
                        'error' => 'Some Problem has occurred,You Already input in Same Data !'
                    ]);
            }
        }else{
            return redirect()
            ->back()
            ->with([
                'error' => 'Some problem has occurred, please try again'
            ]);
        }
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
        $data = akademik_nilai::join('kelas','akademik_nilais.kode_kelas','=','kelas.kode_kelas')
        ->join('jurusans','akademik_nilais.kode_jurusan','=','jurusans.kode_jurusan')
        ->join('mata_pelajarans','akademik_nilais.kode_mapel','=','mata_pelajarans.kode_mapel')
        ->join('akademik_kategori_nilais','akademik_nilais.kode_kategori','=','akademik_kategori_nilais.id')
        ->join('tahun_ajarans','akademik_nilais.kode_tahun_ajaran','=','tahun_ajarans.kode_tahun_ajaran')
        ->where([['akademik_nilais.id','=',$id]])->get(['akademik_nilais.*','akademik_nilais.id as id_nilai','kelas.*','jurusans.*','tahun_ajarans.*','mata_pelajarans.*','akademik_kategori_nilais.id as id_kategori_nilai','akademik_kategori_nilais.*'])->first();
        $mapel = MataPelajaran::latest()->get();
        $kategori = akademik_kategori_nilai::latest()->get();
        $data_nilai = data_siswa::join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa') 
                                ->where([['kode_kelas','=',$data->kode_kelas],['kode_jurusan','=',$data->kode_jurusan],['status_siswa','=','Aktif']])
                                ->get(['data_siswas.id as id_siswa','data_siswas.*','aktivitas_belajars.*']);
        $detail = akademik_nilai_details::where([['akademik_nilai_details.kode_nilai','=',$id]])
                                ->get();
        switch($data->type_nilai){
            case 'harian':
                return view('nilai.input_nilai.harian.edit',compact(['data','mapel','kategori','data_nilai','detail']));    
            break;
            case 'ujian':
                return view('nilai.input_nilai.ujian.edit',compact(['data','mapel','kategori','data_nilai','detail']));    
            break;
            case 'rapor':
                return view('nilai.input_nilai.rapor.edit',compact(['data','mapel','kategori','data_nilai','detail']));    
            break;
        }
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
            'desc_input' => ['required'],
        ]);
        if($validate){
            $update = akademik_nilai::findOrFail($id);
            $update->update([
                'desc_input' => $request->desc_input
            ]);
            if($update){
                switch($update->type_nilai){
                    case 'harian':
                        return redirect()
                        ->route('input_harian')
                        ->with([
                            'success' => 'Nilai Harian Has Been Updated successfully'
                        ]);
                    break;
                    case 'ujian':
                        return redirect()
                        ->route('input_ujian')
                        ->with([
                            'success' => 'Nilai Ujian Has Been Updated successfully'
                        ]);   
                    break;
                    case 'rapor':
                        return redirect()
                        ->route('input_rapor')
                        ->with([
                            'success' => 'Nilai Rapor Has Been Updated successfully'
                        ]);   
                    break;
                }
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = akademik_nilai::findOrFail($id);
        $data1 = akademik_nilai_details::where([['kode_nilai','=',$id]])->delete();
        $data->delete();
        if($data){
            return redirect()
            ->back()
            ->with([
                'success' => 'Delete Data Successfully'
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
