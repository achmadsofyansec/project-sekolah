<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintPDFController extends Controller
{
    //
    public function print_pdf($isi,$nama){
        $tgl = date('Ymdhis');
        $data = DB::table('sekolahs')
        ->join('kelurahan','sekolahs.kode_kelurahan','=','kelurahan.kode_kelurahan')
        ->join('kecamatan','sekolahs.kode_kecamatan','=','kecamatan.kode_kecamatan')
        ->select(['sekolahs.*','sekolahs.id as id_sekolah','kelurahan.*','kecamatan.*'])->first();
        $img = config('app.url').'/assets/uploads/'.$data->logo_sekolah;
        $name = $tgl.'_'.$nama;
        $pdf = Pdf::loadview('layouts.laporan_print',[
            'data' => $data,
            'name' => $name,
            'img' => $img,
            'isi' => $isi
            ]);
        return $pdf->stream();
    }
    public function print_laporan(Request $req){

        $isi = "";

        if($req != null){
            $isi .= '<center><div style="text-transform:uppercase;"><h4> LAPORAN '.$req->type.' '.$req->nama.'</h4></div></center><br>';
            $isi .= 'Periode : '.$req->filter_dari_tanggal.' - '.$req->filter_sampai_tanggal.'<br>';

            $dari_tanggal = $req->filter_dari_tanggal != null ? ['dokumens.created_at','>=',$req->filter_dari_tanggal." 00:00:00"] : ['dokumens.created_at','!=',null];
            $sampai_tanggal = $req->filter_sampai_tanggal != null ? ['dokumens.created_at','<=',$req->filter_sampai_tanggal." 23:59:59"] : ['dokumens.created_at','!=',null];
            $nama_ruangan = $req->nama_ruangan != null ? ['dokumens.ruangan','=',$req->nama_ruangan] : ['dokumens.ruangan','!=','null'];
            $nama_lemari = $req->nama_lemari != null ? ['dokumens.lemari','=',$req->nama_lemari] :['dokumens.lemari','!=','null'];
            $nama_rak = $req->nama_rak != null ? ['dokumens.rak','=',$req->nama_rak] :['dokumens.rak','!=','null'];
            $nama_box = $req->nama_box != null ? ['dokumens.box','=',$req->nama_box] :['dokumens.box','!=','null'];
            $nama_map = $req->nama_map != null ? ['dokumens.map','=',$req->nama_map] :['dokumens.map','!=','null'];
            $nama_jenis_dokumen = $req->nama_jenis_dokumen != null ? ['dokumens.ruangan','=',$req->nama_jenis_dokumen] :['dokumens.jenis_dokumen','!=','null'];
            $nama_urut = $req->nama_urut != null ? ['dokumens.urut','=',$req->nama_urut] :['dokumens.urut','!=','null'];
            $laporandokumen = Dokumen::where([$dari_tanggal,$sampai_tanggal,$nama_ruangan,$nama_lemari,$nama_rak,$nama_box,$nama_map,$nama_jenis_dokumen,$nama_urut])->get();

            $isi .= '<table border="1" align="center" width="100%"><thead>
            <th>No</th>
            <th>Tanggal</th>
            <th>Upload</th>
            <th>Nomor Dok</th>
            <th>Nama Dok</th>
            <th>Jenis Dokumen</th>
            <th>Lokasi</th>
        </thead>
        <tbody>';
        $no = 1;
        if($laporandokumen != null){
            foreach ($laporandokumen as $item) {
                $isi .='<tr>
                <td>'.$no++.'</td>
                <td>'.$item->tanggal_dokumen.'</td>
                <td>'.$item->created_at.'</td>
                <td>'.$item->nomor_dokumen.'</td>
                <td>'.$item->nama_dokumen.'</td>
                <td>'.$item->jenis_dokumen.'</td>
                <td>'. $item->ruangan.' / '.$item->lemari.' / '.$item->rak.' / '.$item->box.' / '.$item->urut .'</td>
                </tr>';
            }
        }else{
            $isi ='<tr>
            <td class="text-muted text-center" colspan="100%">Tidak Ada Data </td>
          </tr>';
        }
            $isi .= '</tbody>
            </table>';
        }
        
        return $this->print_pdf($isi,'TESTEST');
    }
}
