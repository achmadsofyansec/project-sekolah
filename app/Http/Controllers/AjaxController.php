<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\data_siswa;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AjaxController extends Controller
{
    public function filter_absensi(Request $request){
        $kelas = ['aktivitas_belajars.kode_kelas','!=','null'];
        $jurusan = ['aktivitas_belajars.kode_jurusan','!=','null'];
        $tanggals = new DateTime('now');
        if($request->tanggal != null){
            $tanggals = new DateTime($request->tanggal);
        }
        $tanggals->format("Y-m-d");
        if($request->kelas != null){
            $kelas = ['aktivitas_belajars.kode_kelas','=',$request->kelas];
        }
        if($request->jurusan!= null){
            $jurusan = ['aktivitas_belajars.kode_jurusan','=',$request->jurusan];
        }
        $tanggal = $tanggals->format('Y-m-d');
        $tanggal1 = $tanggals->modify('+1 day')->format('Y-m-d');
        $absensi = Absensi::join("data_siswas","data_siswas.id","=",'absensis.kode_siswa')
            ->join("aktivitas_belajars","aktivitas_belajars.kode_siswa","=",'data_siswas.nik')
            ->where([['data_siswas.status_siswa','=','Aktif'],['absensis.tgl_absensi','>=', $tanggal.' 00:00:00'],['absensis.tgl_absensi','<=', $tanggal.' 23:59:59'],$kelas,$jurusan])
            ->get(["data_siswas.*","absensis.*","absensis.id as id_absen",'aktivitas_belajars.*']);
            $data = "";
            $no = 1;
       foreach($absensi as $item){
            $data .= '<tr>
            <td>'.$no++.'</td>
            <td>'.$item->tgl_absensi.'</td>
            <td>'.$item->nama.'</td>
            <td>'.$item->kode_kelas.'</td>
            <td>'.$item->kode_jurusan.'</td>';
            if($item->keterangan == "Masuk"){
                $data .= '<td><span class="badge badge-success">'.$item->keterangan.'</span> </td>';
            }
            if($item->keterangan == "Tanpa Keterangan"){
                $data .= '<td><span class="badge badge-danger">'.$item->keterangan.'</span> </td>';
            }
            if($item->keterangan == "Izin"){
                $data .= '<td><span class="badge badge-warning">'.$item->keterangan.'</span> </td>';
            }
            if($item->keterangan == "Sakit"){
                $data .= '<td><span class="badge badge-info">'.$item->keterangan.'</span> </td>';
            }
           
       }
        return response()->json($data);
    }
}
