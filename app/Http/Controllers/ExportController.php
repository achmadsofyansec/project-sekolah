<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SarprasDataAset;
use App\Models\data_siswa;
use App\Models\SarprasKategoriAset;
use App\Models\SarprasPeminjamanDetail;
use App\Models\SarprasPeminjamans;

class ExportController extends Controller
{
    public function export_lahan(Request $request)
	{
		return Excel::download(new SiswaExport, 'siswa.xlsx');
	}

	public function laporan_view()
	{
		$siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        $kategori = SarprasDataAset::latest()->get();
        $data = SarprasPeminjamans::join('data_siswas','sarpras_peminjamans.kode_siswa','=','data_siswas.id')
                                        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
                                        ->where([['data_siswas.status_siswa','=','Aktif']])
                                        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*'
                                            ,'sarpras_peminjamans.kode_peminjaman as kode_peminjaman'
                                            ,'sarpras_peminjamans.*','sarpras_peminjamans.id as id_peminjaman']);
        
        $detail = SarprasPeminjamanDetail::join('data_siswas', 'data_siswas.id', '=', 'sarpras_peminjaman_details.kode.siswa')
                                            ->join('sarpras_peminjamans', 'sarpras_peminjamans.kode_peminjaman', '=', 'sarpras_peminjaman_details.kode_siswa');
        return view('laporan.peminjaman.index',compact(['data','siswa', 'kategori', 'detail']));
	}

    public function laporan_cari(Request $request)
    {

        $req = $request;
        $data = "";
        $peminjaman = SarprasPeminjaman::latest()->get();
        if($req != null){

            
            $dari_tanggal = $req->filter_dari_tanggal != null ? ['dokumens.created_at','>=',$req->filter_dari_tanggal." 00:00:00"] : ['dokumens.created_at','!=',null];
            $sampai_tanggal = $req->filter_sampai_tanggal != null ? ['dokumens.created_at','<=',$req->filter_sampai_tanggal." 23:59:59"] : ['dokumens.created_at','!=',null];
            $nama_ruangan = $req->nama_ruangan != null ? ['dokumens.ruangan','=',$req->nama_ruangan] : ['dokumens.ruangan','!=','null'];
           
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
