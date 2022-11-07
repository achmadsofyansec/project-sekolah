<?php

namespace App\Http\Controllers;

use App\Models\data_siswa;
use App\Models\jurusan;
use App\Models\Kelas;
use App\Models\pelanggaran;
use App\Models\sanksi_pelanggaran;
use App\Models\tahun_ajaran;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function view_lap_pelanggaran(Request $request){
        $req = $request;
        $data = "";
        if($req != null){
            $data_pelanggaran = pelanggaran::join('data_siswas','pelanggarans.id_siswa','=','data_siswas.id')
                                ->join("aktivitas_belajars","aktivitas_belajars.kode_siswa","=",'data_siswas.nik')
                                ->join("point_pelanggarans","pelanggarans.id_poin_pelanggaran","=",'point_pelanggarans.id')
                                ->where([['data_siswas.status_siswa','=','Aktif'],['pelanggarans.created_at','>=',$req->filter_awal." 00:00:00"],['pelanggarans.created_at','<=',$req->filter_akhir." 23:59:59"]])
                                ->get(['point_pelanggarans.*','pelanggarans.id as id_pelanggaran','pelanggarans.*','pelanggarans.created_at as tgl_pelanggaran','data_siswas.*','aktivitas_belajars.*']);
            $no = 1;
            foreach ($data_pelanggaran as $item) {
                $data_sanksi = sanksi_pelanggaran::where([['dari_poin','<',$item->poin],['sampai_poin','>',$item->poin]])->get()->first();
                $sanksi = $data_sanksi != null ? $data_sanksi->sanksi : '-';
                $data .= '<tr>
                <td>'.$no++.'</td>
                <td>'.$item->tgl_pelanggaran.'</td>
                <td>'.$item->nisn.'</td>
                <td>'.$item->nama.'</td>
                <td>'.$item->kode_kelas.' / '.$item->kode_jurusan.'</td>
                <td>'.$item->nama_poin_pelanggaran.'</td>
                <td>'.$sanksi.'</td>
                <td>'.$item->poin.'</td>
                </tr>';
            }
        }
        return view('laporan.pelanggaran.index',compact(['req','data']));
    }
    public function view_lap_sitaan(Request $request){
        $req = $request;
        if($req != null){
            
        }
        return view('laporan.barang_sitaan.index',compact(['req']));
        
    }
    public function view_lap_point_siswa(Request $request){
        $req = $request;
        $jurusan = jurusan::latest()->get();
        $kelas = Kelas::latest()->get();
        $req = $request;
        $data = "";
        if($req != null){
            $kelas1 = ['aktivitas_belajars.kode_kelas','!=','null'];
            $jurusan1 = ['aktivitas_belajars.kode_jurusan','!=','null'];

            if($req->filter_poin_kelas != null){
                $kelas1 = ['aktivitas_belajars.kode_kelas','=',$req->filter_poin_kelas];
            }
            if($req->filter_poin_jurusan != null){
                $jurusan1 = ['aktivitas_belajars.kode_jurusan','=',$req->filter_poin_jurusan];
            }
            $data_siswas = data_siswa::join("aktivitas_belajars","aktivitas_belajars.kode_siswa","=",'data_siswas.nik')
                    ->where([['data_siswas.status_siswa','=','Aktif'],$kelas1,$jurusan1])
                    ->get(["data_siswas.*",'aktivitas_belajars.*',"data_siswas.id as id_siswas"]);
            $no = 1;
            foreach($data_siswas as $item){
                    $poin = pelanggaran::where([['id_siswa','=',$item->id_siswas]])->get();
                    $last_point = 0;
                    foreach ($poin as $point) {
                       $last_point += $point->poin_minus;
                    }
                    $data .= '<tr>
                    <td>'.$no++.'</td>
                    <td>'.$item->nik.'</td>
                    <td>'.$item->nisn.'</td>
                    <td>'.$item->nama.'</td>
                    <td>'.$item->kode_kelas.'/ '.$item->kode_jurusan.'</td>
                    <td>'.$last_point.'</td>
                    </tr>';
            }
        }
        return view('laporan.point_siswa.index',compact(['req','data','jurusan','kelas']));
        
    }
}
