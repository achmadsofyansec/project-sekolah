<?php

namespace App\Http\Controllers;

use App\Models\data_ortu;
use App\Models\data_siswa;
use App\Models\jurusan;
use App\Models\Kelas;
use App\Models\tahun_ajaran;
use App\Models\aktivitas_belajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $kelas = Kelas::latest()->get();        
        $tahun_ajaran = tahun_ajaran::latest()->get();
        $jurusan = jurusan::latest()->get();
        return view('siswa.create',compact(['kelas','jurusan','tahun_ajaran']));
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
            if($request->nik_ayah != null){
                $data_ayah = [
                    'nik' => $request->nik_ayah,
                    'id_siswa' => $request->nik,
                    'nama_ortu' => $request->nama_ayah,
                    'tmp_lahir_ortu' => $request->tempat_lahir_ayah,
                    'tgl_lhr_ortu' => $request->tanggal_lahir_ayah,
                    'status_ortu' => $request->status_ayah,
                    'pendidikan_terakhir_ortu' => $request->status_pendidikan_ayah,
                    'pekerjaan_terakhir_ortu' => $request->pekerjaan_ayah,
                    'domisili_ortu' => $request->domisili_ayah,
                    'no_tlp_ortu' => $request->no_telp_ayah,
                    'penghasilan_ortu' => $request->penghasilan_ayah,
                    'alamat_ortu' => $request->alamat_ayah,
                    'tmp_tinggal_ortu' => $request->status_tmp_ayah,
                    'jns_ortu' => 'ayah',
                ];
                $create_ayah = data_ortu::create($data_ayah);
            }
            if($request->nik_ibu != null){
                $data_ibu = [
                    'nik' => $request->nik_ibu,
                    'id_siswa' => $request->nik,
                    'nama_ortu' => $request->nama_ibu,
                    'tmp_lahir_ortu' => $request->tempat_lahir_ibu,
                    'tgl_lhr_ortu' => $request->tanggal_lahir_ibu,
                    'status_ortu' => $request->status_ibu,
                    'pendidikan_terakhir_ortu' => $request->status_pendidikan_ibu,
                    'pekerjaan_terakhir_ortu' => $request->pekerjaan_ibu,
                    'domisili_ortu' => $request->domisili_ibu,
                    'no_tlp_ortu' => $request->no_telp_ibu,
                    'penghasilan_ortu' => $request->penghasilan_ibu,
                    'alamat_ortu' => $request->alamat_ibu,
                    'tmp_tinggal_ortu' => $request->status_tmp_ibu,
                    'jns_ortu' => 'ibu',
                ];
                $create_ibu = data_ortu::create($data_ibu);
            }
            if($request->nik_wali != null){
                $data_wali = [
                    'nik' => $request->nik_wali,
                    'id_siswa' => $request->nik,
                    'nama_ortu' => $request->nama_wali,
                    'tmp_lahir_ortu' => $request->tempat_lahir_wali,
                    'tgl_lhr_ortu' => $request->tanggal_lahir_wali,
                    'status_ortu' => $request->status_wali,
                    'pendidikan_terakhir_ortu' => $request->status_pendidikan_wali,
                    'pekerjaan_terakhir_ortu' => $request->pekerjaan_wali,
                    'domisili_ortu' => $request->domisili_wali,
                    'no_tlp_ortu' => $request->no_telp_wali,
                    'penghasilan_ortu' => $request->penghasilan_wali,
                    'alamat_ortu' => $request->alamat_wali,
                    'tmp_tinggal_ortu' => $request->status_tmp_wali,
                    'jns_ortu' => 'wali',
                ];
                $create_wali = data_ortu::create($data_wali);
            }
            if($request->kelas != null){
                $data_aktivitas = [
                    'kode_siswa' => $request->nik,
                    'kode_kelas' => $request->kelas,
                    'kode_tahun_ajaran' => $request->tahun_ajaran,
                    'kode_jurusan' => $request->jurusan,
                ];
                $create_activity = aktivitas_belajar::create($data_aktivitas);
            }
            if($create){
                    return redirect()
                    ->route('siswa.index')
                    ->with([
                        'success' => 'Siswa Has Been Updated successfully'
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
        $data_ayah = data_ortu::where([['id_siswa','=',$data->nik],['jns_ortu','=','ayah']])->get()->first();
        $data_ibu = data_ortu::where([['id_siswa','=',$data->nik],['jns_ortu','=','ibu']])->get()->first();
        $data_wali = data_ortu::where([['id_siswa','=',$data->nik],['jns_ortu','=','wali']])->get()->first();
        $kelas = Kelas::latest()->get();
        $aktivitas = aktivitas_belajar::where([['kode_siswa','=',$data->nik]])->get()->first();
        $tahun_ajaran = tahun_ajaran::latest()->get();
        $jurusan = jurusan::latest()->get();
        return view('siswa.edit',compact(['data','img','data_ayah','data_wali','data_ibu'
                                        ,'kelas','aktivitas','tahun_ajaran','jurusan']));
        
    }
    public function update(Request $request, $id)
    {
        //
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
               ];
           }
           $update = data_siswa::findOrFail($id);
           $update->update($data);
           if($request->nik_ayah != null){
            $data_ayah = [
                'nik' => $request->nik_ayah,
                'id_siswa' => $request->nik,
                'nama_ortu' => $request->nama_ayah,
                'tmp_lahir_ortu' => $request->tempat_lahir_ayah,
                'tgl_lhr_ortu' => $request->tanggal_lahir_ayah,
                'status_ortu' => $request->status_ayah,
                'pendidikan_terakhir_ortu' => $request->status_pendidikan_ayah,
                'pekerjaan_terakhir_ortu' => $request->pekerjaan_ayah,
                'domisili_ortu' => $request->domisili_ayah,
                'no_tlp_ortu' => $request->no_telp_ayah,
                'penghasilan_ortu' => $request->penghasilan_ayah,
                'alamat_ortu' => $request->alamat_ayah,
                'tmp_tinggal_ortu' => $request->status_tmp_ayah,
                'jns_ortu' => 'ayah',
            ];
            $update_ayah = data_ortu::where([['id_siswa','=',$request->nik],['jns_ortu','=','ayah']])->get()->first();
            if($update_ayah != null){
                $update_ayah->update($data_ayah);
            }else{
             $create_ayah = data_ortu::create($data_ayah);
            }
        }
        if($request->nik_ibu != null){
            $data_ibu = [
                'nik' => $request->nik_ibu,
                'id_siswa' => $request->nik,
                'nama_ortu' => $request->nama_ibu,
                'tmp_lahir_ortu' => $request->tempat_lahir_ibu,
                'tgl_lhr_ortu' => $request->tanggal_lahir_ibu,
                'status_ortu' => $request->status_ibu,
                'pendidikan_terakhir_ortu' => $request->status_pendidikan_ibu,
                'pekerjaan_terakhir_ortu' => $request->pekerjaan_ibu,
                'domisili_ortu' => $request->domisili_ibu,
                'no_tlp_ortu' => $request->no_telp_ibu,
                'penghasilan_ortu' => $request->penghasilan_ibu,
                'alamat_ortu' => $request->alamat_ibu,
                'tmp_tinggal_ortu' => $request->status_tmp_ibu,
                'jns_ortu' => 'ibu',
            ];
            $update_ibu = data_ortu::where([['id_siswa','=',$request->nik],['jns_ortu','=','ibu']])->get()->first();
            if($update_ibu != null){
                $update_ibu->update($data_ibu);
            }else{
             $create_ibu = data_ortu::create($data_ibu);
            }
        }
        if($request->nik_wali != null){
            $data_wali = [
                'nik' => $request->nik_wali,
                'id_siswa' => $request->nik,
                'nama_ortu' => $request->nama_wali,
                'tmp_lahir_ortu' => $request->tempat_lahir_wali,
                'tgl_lhr_ortu' => $request->tanggal_lahir_wali,
                'status_ortu' => $request->status_wali,
                'pendidikan_terakhir_ortu' => $request->status_pendidikan_wali,
                'pekerjaan_terakhir_ortu' => $request->pekerjaan_wali,
                'domisili_ortu' => $request->domisili_wali,
                'no_tlp_ortu' => $request->no_telp_wali,
                'penghasilan_ortu' => $request->penghasilan_wali,
                'alamat_ortu' => $request->alamat_wali,
                'tmp_tinggal_ortu' => $request->status_tmp_wali,
                'jns_ortu' => 'wali',
            ];
            $update_wali = data_ortu::where([['id_siswa','=',$request->nik],['jns_ortu','=','wali']])->get()->first();
            if($update_wali != null){
                $update_wali->update($data_wali);
            }else{
             $create_wali = data_ortu::create($data_wali);
            }
        }
        if($request->kelas != null){
            $data_aktivitas = [
                'kode_siswa' => $request->nik,
                'kode_kelas' => $request->kelas,
                'kode_tahun_ajaran' => $request->tahun_ajaran,
                'kode_jurusan' => $request->jurusan,
            ];
            $update_activity = aktivitas_belajar::where([['kode_siswa','=',$request->nik]])->get()->first();
            if($update_activity != null){
                $update_activity->update($data_aktivitas);
            }else{
                $create_activity = aktivitas_belajar::create($data_aktivitas);
            }
        }
           if($update){
                   return redirect()
                   ->route('siswa.index')
                   ->with([
                       'success' => 'Siswa Has Been Updated successfully'
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

    public function destroy($id)
    {
        //
        $data = data_siswa::findOrFail($id);
        $data_aktivitas = DB::table('aktivitas_belajars')->where([['kode_siswa','=',$data->nik]])->delete();
        $data_ortu = DB::table('data_ortus')->where([['id_siswa','=',$data->nik]])->delete();
        $data->delete();
        if($data){
            return redirect()
            ->route('siswa.index')
            ->with([
                'success' => 'Siswa Has Been Deleted successfully'
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
