<?php

namespace App\Http\Controllers;

use App\Models\keuangan_history;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    //
    public function view_riwayat_bayar(Request $request){
        $req = $request;
        $history_bulanan = "";
        $history_nonbulanan = "";
        $history_tabungan = "";
        $history_penerimaan_lain = "";
        $history_pengeluaran = "";
        if($request->filter_awal != null || $request->filter_akhir != null){
            $history_bulanan = keuangan_history::join('data_siswas','keuangan_histories.kode_siswa','=','data_siswas.id')
                                                ->join('biaya_siswas','keuangan_histories.kode_biaya','=','biaya_siswas.id')
                                                ->join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
                                                ->join('kelas','aktivitas_belajars.kode_kelas','=','kelas.kode_kelas')
                                                ->where([['keuangan_histories.histori_type_pembayaran','=','bulanan'],['keuangan_histories.tgl_history','>=',$request->filter_awal],['keuangan_histories.tgl_history','<=',$request->filter_akhir]])
                                                ->get(['keuangan_histories.id as id_histori','keuangan_histories.*','data_siswas.*','biaya_siswas.*','aktivitas_belajars.*','kelas.*']);
            $history_nonbulanan = keuangan_history::join('data_siswas','keuangan_histories.kode_siswa','=','data_siswas.id')
                                                ->join('biaya_siswas','keuangan_histories.kode_biaya','=','biaya_siswas.id')
                                                ->join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
                                                ->join('kelas','aktivitas_belajars.kode_kelas','=','kelas.kode_kelas')
                                                ->where([['keuangan_histories.histori_type_pembayaran','=','nonbulanan'],['keuangan_histories.tgl_history','>=',$request->filter_awal],['keuangan_histories.tgl_history','<=',$request->filter_akhir]])
                                                ->get(['keuangan_histories.id as id_histori','keuangan_histories.*','data_siswas.*','biaya_siswas.*','aktivitas_belajars.*','kelas.*']);
            $history_tabungan = keuangan_history::join('data_siswas','keuangan_histories.kode_siswa','=','data_siswas.id')
                                                ->join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
                                                ->join('kelas','aktivitas_belajars.kode_kelas','=','kelas.kode_kelas')
                                                ->where([['keuangan_histories.histori_type_pembayaran','=','tabungan'],['keuangan_histories.tgl_history','>=',$request->filter_awal],['keuangan_histories.tgl_history','<=',$request->filter_akhir]])
                                                ->get(['keuangan_histories.id as id_histori','keuangan_histories.*','data_siswas.*','aktivitas_belajars.*','kelas.*']);
            $history_penerimaan_lain = keuangan_history::join('data_siswas','keuangan_histories.kode_siswa','=','data_siswas.id')
                                                ->join('biaya_siswas','keuangan_histories.kode_biaya','=','biaya_siswas.id')
                                                ->where([['keuangan_histories.histori_type_pembayaran','=','bulanan'],['keuangan_histories.tgl_history','>=',$request->filter_awal],['keuangan_histories.tgl_history','<=',$request->filter_akhir]])
                                                ->get(['keuangan_histories.id as id_histori','keuangan_histories.*','data_siswas.*','biaya_siswas.*']);
            $history_pengeluaran = keuangan_history::join('data_siswas','keuangan_histories.kode_siswa','=','data_siswas.id')
                                                ->join('biaya_siswas','keuangan_histories.kode_biaya','=','biaya_siswas.id')
                                                ->where([['keuangan_histories.histori_type_pembayaran','=','bulanan'],['keuangan_histories.tgl_history','>=',$request->filter_awal],['keuangan_histories.tgl_history','<=',$request->filter_akhir]])
                                                ->get(['keuangan_histories.id as id_histori','keuangan_histories.*','data_siswas.*','biaya_siswas.*']);
        }
        return view('riwayat_pembayaran.index',compact(['history_nonbulanan','history_tabungan','history_penerimaan_lain','history_pengeluaran','req','history_bulanan']));
    }

}
