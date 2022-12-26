<?php

namespace App\Http\Controllers;

use App\Models\ArsipBox;
use App\Models\ArsipDataUrut;
use App\Models\ArsipJenisDokumen;
use App\Models\ArsipLemari;
use App\Models\ArsipMap;
use App\Models\ArsipRak;
use App\Models\ArsipRuangan;
use App\Models\Dokumen;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //
    public function view_laporan(Request $request)
    {

        $req = $request;
        $data = "";
        $ruangan = ArsipRuangan::latest()->get();
        $lemari = ArsipLemari::latest()->get();
        $rak = ArsipRak::latest()->get();
        $box = ArsipBox::latest()->get();
        $map = ArsipMap::latest()->get();
        $jenis_dokumen = ArsipJenisDokumen::latest()->get();
        $urut = ArsipDataUrut::latest()->get();
        if($req != null){

            
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
            $no = 1;
            foreach ($laporandokumen as $item) {
                $data .='<tr>
                <td>'.$no++.'</td>
                <td>'.$item->tanggal_dokumen.'</td>
                <td>'.$item->created_at.'</td>
                <td>'.$item->nomor_dokumen.'</td>
                <td>'.$item->nama_dokumen.'</td>
                <td>'.$item->jenis_dokumen.'</td>
                <td>'. $item->ruangan.' / '.$item->lemari.' / '.$item->rak.' / '.$item->box.' / '.$item->urut .'</td>
                </tr>';
            }
        }

        return view('laporan.index',compact(['data','req','ruangan','lemari','rak','box','map','jenis_dokumen','urut']));
    }
}
