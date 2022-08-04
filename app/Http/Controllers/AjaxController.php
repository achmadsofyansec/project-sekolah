<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\data_siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AjaxController extends Controller
{
    public function filter_absensi(Request $request){
        $kelas = ['aktivitas_belajars.kode_kelas','!=','null'];
        $jurusan = ['aktivitas_belajars.kode_jurusan','!=','null'];
        if($request->kelas != null){
            $kelas = ['aktivitas_belajars.kode_kelas','=',$request->kelas];
        }
        if($request->jurusan!= null){
            $jurusan = ['aktivitas_belajars.kode_jurusan','=',$request->jurusan];
        }
        $absensi = Absensi::join("data_siswas","data_siswas.id","=",'absensis.kode_siswa')
            ->join("aktivitas_belajars","aktivitas_belajars.kode_siswa","=",'data_siswas.nik')
            ->where([['data_siswas.status_siswa','=','Aktif'],['absensis.tgl_absensi','>=', date('Y-m-d').' 00:00:00'],$kelas,$jurusan])
            ->get(["data_siswas.*","absensis.*","absensis.id as id_absen",'aktivitas_belajars.*']);
            $data = "";
            $no = 1;
       foreach($absensi as $item){
            $data .= '<tr>
            <td>'.$no++.'</td>
            <td>'.$item->tgl_absensi.'</td>
            <td>'.$item->nama.'</td>
            <td>'.$item->kode_kelas.'</td>
            <td>'.$item->kode_jurusan.'</td>
            <td><span class="badge badge-primary">'.$item->keterangan.'</span> </td>';
       }
        return response()->json($data);
    }
}
