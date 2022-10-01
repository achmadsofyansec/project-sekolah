<?php

namespace App\Http\Controllers;


use DateTime;
use App\Models\Buku;
use App\Models\Peminjaman_buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AjaxController extends Controller
{
    public function filter_buku(Request $request){
        $kode_buku = ['perpustakaan_data_bukus.kode_buku','!=','null'];
        if($request->kode_buku != null){
            $kode_buku = ['perpustakaan_data_bukus.kode_buku','=',$request->kode_buku];
        }
        $buku = Buku::where([$kode_buku])->get(['perpustakaan_data_bukus.*']);

        $data = "";
        $no = 1;

       return response()->json($buku);
    }

    public function filter_siswa(Request $request){
        $nisn = ['data_siswas.nisn','!=','null'];
        if($request->nisn != null){
            $nisn = ['data_siswas.nisn','=',$request->nisn];
        }
        $nis = ['perpustakaan_peminjaman_bukus.id_siswa','=',$request->nis];
        $siswa = DB::table('data_siswas')->where([$nisn])->get(['data_siswas.*']);


        $data = "";
        $no = 1;

       return response()->json($siswa);
    }

    public function filter_table(Request $request){
        $nis = ['perpustakaan_peminjaman_bukus.id_siswa','!=','null'];
        $data = DB::table('data_siswas')
                    ->join('perpustakaan_peminjaman_bukus', 'perpustakaan_peminjaman_bukus.id_siswa', '=', 'data_siswas.nisn')
                    ->get();
        $data_pinjam = "";    
        $no = 1;
       foreach($data as $item){
            $data_pinjam .= '<tr>
            <td>'.$no++.'</td>
            <td>'.$item->nama.'</td>
            <td>'.$item->nama.'</td>
            <td>'.$item->nama.'</td>
            <td>'.$item->nama.'</td>
            <td>'
            .$tujuh_hari = mktime(0,0,0, date('n'), date('j') + $item->durasi, date('Y'));
            $kembali = date('Y-m-d', $tujuh_hari);
            echo $kembali.
            '</td>
            <td class="text-center">
            '.$item->nama.
            '</td>
          </tr>'
            ;
       }
        return response()->json($data_pinjam);
    }
}