<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\data_siswa;
use App\Models\jurusan;
use App\Models\Kelas;
use App\Models\tahun_ajaran;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $kelas = Kelas::latest()->get();
            $jurusan = jurusan::latest()->get();
            $req = $request;
            $data = "";
            
            //dd($request);
            if($req != null){
                    $kelas1 = ['aktivitas_belajars.kode_kelas','!=','null'];
                    $jurusan1 = ['aktivitas_belajars.kode_jurusan','!=','null'];
                    $tanggals = new DateTime('now');
                    if($request->filter_absensi_tanggal != null){
                        $tanggals = new DateTime($request->filter_absensi_tanggal);
                    }
                    $tanggals->format("Y-m-d");
                    if($request->filter_absensi_kelas != null){
                        $kelas1 = ['aktivitas_belajars.kode_kelas','=',$request->filter_absensi_kelas];
                    }
                    if($request->filter_absensi_jurusan!= null){
                        $jurusan1 = ['aktivitas_belajars.kode_jurusan','=',$request->filter_absensi_jurusan];
                    }
                    $tanggal = $tanggals->format('Y-m-d');
                    $tanggal1 = $tanggals->modify('+1 day')->format('Y-m-d');
                    $data_siswas = data_siswa::join("aktivitas_belajars","aktivitas_belajars.kode_siswa","=",'data_siswas.nik')
                                ->where([['data_siswas.status_siswa','=','Aktif'],$kelas1,$jurusan1])
                                ->get(["data_siswas.*",'aktivitas_belajars.*',"data_siswas.id as id_siswas"]);
                $no = 1;
                foreach($data_siswas as $item){
                    $absensi = Absensi::where([['absensis.tgl_absensi','>=', $tanggal.' 00:00:00'],['absensis.tgl_absensi','<=', $tanggal.' 23:59:59'],['absensis.kode_siswa','=', $item->id_siswas]])
                    ->value('jenis_absen');
                    $absen = !empty($absensi) ? $absensi : "Belum Absen";
                        $data .= '<tr>
                        <td>'.$no++.'</td>
                        <td>'.$item->nama.'</td>
                        <td>'.$item->kode_kelas.'</td>
                        <td>'.$item->kode_jurusan.'</td>
                        <td>'.$absen.'</td>';
                }
            }
            return view('absensi.absen.index',compact(['kelas','jurusan','req','data']));
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
        //
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
