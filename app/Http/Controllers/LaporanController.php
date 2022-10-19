<?php

namespace App\Http\Controllers;

use App\Models\akademik_nilai;
use App\Models\akademik_nilai_prestasi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function view_lap_absensi(Request $request){
        $req = $request;
        return view('laporan.absensi.index',compact('req'));
    }
    public function view_lap_nilai(Request $request){
        $req = $request;
        $harian = "";
        $ujian = "";
        $prestasi = "";
        $rapor = "";
        if($req->filter_awal != null && $req->filter_akhir != null){
            $harian = akademik_nilai::join('kelas','akademik_nilais.kode_kelas','=','kelas.kode_kelas')
            ->join('jurusans','akademik_nilais.kode_jurusan','=','jurusans.kode_jurusan')
            ->join('mata_pelajarans','akademik_nilais.kode_mapel','=','mata_pelajarans.kode_mapel')
            ->join('akademik_kategori_nilais','akademik_nilais.kode_kategori','=','akademik_kategori_nilais.id')
            ->join('tahun_ajarans','akademik_nilais.kode_tahun_ajaran','=','tahun_ajarans.kode_tahun_ajaran')
            ->where([['type_nilai','=','harian'],['tgl_input','>=',$req->filter_awal],['tgl_input','<=',$req->filter_akhir]])
            ->get(['akademik_nilais.*','akademik_nilais.id as id_nilai','kelas.*','jurusans.*','tahun_ajarans.*','mata_pelajarans.*','akademik_kategori_nilais.id as id_kategori_nilai','akademik_kategori_nilais.*']);
            $ujian = akademik_nilai::join('kelas','akademik_nilais.kode_kelas','=','kelas.kode_kelas')
            ->join('jurusans','akademik_nilais.kode_jurusan','=','jurusans.kode_jurusan')
            ->join('mata_pelajarans','akademik_nilais.kode_mapel','=','mata_pelajarans.kode_mapel')
            ->join('akademik_kategori_nilais','akademik_nilais.kode_kategori','=','akademik_kategori_nilais.id')
            ->join('tahun_ajarans','akademik_nilais.kode_tahun_ajaran','=','tahun_ajarans.kode_tahun_ajaran')
            ->where([['type_nilai','=','ujian'],['tgl_input','>=',$req->filter_awal],['tgl_input','<=',$req->filter_akhir]])
            ->get(['akademik_nilais.*','akademik_nilais.id as id_nilai','kelas.*','jurusans.*','tahun_ajarans.*','mata_pelajarans.*','akademik_kategori_nilais.id as id_kategori_nilai','akademik_kategori_nilais.*']);
            $rapor = akademik_nilai::join('kelas','akademik_nilais.kode_kelas','=','kelas.kode_kelas')
            ->join('jurusans','akademik_nilais.kode_jurusan','=','jurusans.kode_jurusan')
            ->join('mata_pelajarans','akademik_nilais.kode_mapel','=','mata_pelajarans.kode_mapel')
            ->join('akademik_kategori_nilais','akademik_nilais.kode_kategori','=','akademik_kategori_nilais.id')
            ->join('tahun_ajarans','akademik_nilais.kode_tahun_ajaran','=','tahun_ajarans.kode_tahun_ajaran')
            ->where([['type_nilai','=','rapor'],['tgl_input','>=',$req->filter_awal],['tgl_input','<=',$req->filter_akhir]])
            ->get(['akademik_nilais.*','akademik_nilais.id as id_nilai','kelas.*','jurusans.*','tahun_ajarans.*','mata_pelajarans.*','akademik_kategori_nilais.id as id_kategori_nilai','akademik_kategori_nilais.*']);
            $prestasi = akademik_nilai_prestasi::join('data_siswas','akademik_nilai_prestasis.kode_siswa','=','data_siswas.id')
            ->where([['akademik_nilai_prestasis.created_at','>=',$req->filter_awal." 00:00:00"],['akademik_nilai_prestasis.created_at','<=',$req->filter_akhir." 00:00:00"]])
            ->get(['akademik_nilai_prestasis.id as id_prestasi','akademik_nilai_prestasis.*','data_siswas.*']);
        }
        return view('laporan.nilai.index',compact(['req','harian','ujian','prestasi','rapor']));
    }
}
