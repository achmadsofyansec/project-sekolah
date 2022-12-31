<?php

namespace App\Http\Controllers;

use App\Exports\PeminjamanExport;
use App\Exports\LahanExport;
use App\Exports\AssetLainExport;
use App\Exports\DataAssetExport;
use App\Exports\GedungExport;
use App\Exports\KategoriExport;
use App\Exports\KebutuhanTambahanExport;
use App\Exports\LaboratoriumExport;
use App\Exports\LapanganExport;
use App\Exports\MebelExport;
use App\Exports\OlahragaSeniExport;
use App\Exports\PeneranganInternetExport;
use App\Exports\RuanganExport;
use App\Exports\SanitasiExport;
use App\Exports\SaranaAdministrasiExport;
use App\Exports\SaranaBelajarExport;
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
    public function export_peminjaman_all(Request $request)
	{
		return Excel::download(new PeminjamanExport, 'peminjaman_all.xlsx');
	}

    public function exp_lahan(Request $request)
    {
        return Excel::download(new LahanExport, 'lahan.xlsx');
    }

     public function exp_gedung(Request $request)
    {
        return Excel::download(new GedungExport, 'gedung.xlsx');
    }

     public function exp_ruagan(Request $request)
    {
        return Excel::download(new RuanganExport, 'RuanganExport.xlsx');
    }

     public function exp_lapangan(Request $request)
    {
        return Excel::download(new LapanganExport, 'lapangan.xlsx');
    }

     public function exp_sarana_belajar(Request $request)
    {
        return Excel::download(new SaranaBelajarExport, 'SaranaBelajar.xlsx');
    }

     public function exp_asset_lain(Request $request)
    {
        return Excel::download(new AssetLainExport, 'assetLain.xlsx');
    }

     public function exp_asset_tt(Request $request)
    {
        return Excel::download(new DataAssetExport, 'dataAsset.xlsx');
    }

     public function exp_kategori_tt(Request $request)
    {
        return Excel::download(new KategoriExport, 'kategori.xlsx');
    }

     public function exp_kebutuhan_tambahan(Request $request)
    {
        return Excel::download(new KebutuhanTambahanExport, 'kebutuhan_tambahan.xlsx');
    }

     public function exp_laboratorium(Request $request)
    {
        return Excel::download(new LaboratoriumExport, 'laboratorium.xlsx');
    }

     public function exp_mebel(Request $request)
    {
        return Excel::download(new MebelExport, 'mebel.xlsx');
    }

     public function exp_olahraga_seni(Request $request)
    {
        return Excel::download(new OlahragaSeniExport, 'olahraga_seni.xlsx');
    }

     public function exp_penerangan_internet(Request $request)
    {
        return Excel::download(new PeneranganInternetExport, 'penerangan_internet.xlsx');
    }

     public function exp_sanitasi(Request $request)
    {
        return Excel::download(new SanitasiExport, 'sanitasi.xlsx');
    }

    public function exp_sarana_administrasi(Request $request)
    {
        return Excel::download(new SaranaAdministrasiExport, 'SaranaAdministrasi.xlsx');
    }

    
	public function tes()
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
        $peminjaman = SarprasPeminjamans::latest()->get();
        if($req != null){

            
            $dari_tanggal = $req->filter_dari_tanggal != null ? ['sarpras_peminjamans.created_at','>=',$req->filter_dari_tanggal." 00:00:00"] : ['sarpras_peminjamans.created_at','!=',null];
            $sampai_tanggal = $req->filter_sampai_tanggal != null ? ['sarpras_peminjamans.created_at','<=',$req->filter_sampai_tanggal." 23:59:59"] : ['sarpras_peminjamans.created_at','!=',null];
           
                                         
           
           
            $laporandokumen = SarprasPeminjamans::join('data_siswas','sarpras_peminjamans.kode_siswa','=','data_siswas.id')
                                        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')->where([$dari_tanggal,$sampai_tanggal])->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*'
                                            ,'sarpras_peminjamans.kode_peminjaman as kode_peminjaman'
                                            ,'sarpras_peminjamans.*','sarpras_peminjamans.id as id_peminjaman']);;
            
            $no = 1;
            foreach ($laporandokumen as $item) {
               
                $data .='<tr>
                <td>'.$no++.'</td>
                <td>'.$item->nama.'</td>
                <td>'.$item->kode_kelas. ' / ' .$item->kode_jurusan.'</td>
                <td>'.$item->tgl_peminjaman.'</td>
                <td>'.$item->tgl_pengembalian.'</td>
                <td>'.$item->created_at.'</td>
                
                
                </tr>';
            }
        }

        return view('laporan.peminjaman.index',compact(['data','req','peminjaman']));
    }




    // public function print_laporan(Request $req){

    //     $isi = "";

    //     if($req != null){
    //         $isi .= '<center><div style="text-transform:uppercase;"><h4> LAPORAN '.$req->type.' '.$req->nama.'</h4></div></center><br>';
    //         $isi .= 'Periode : '.$req->filter_dari_tanggal.' - '.$req->filter_sampai_tanggal.'<br>';

    //         $dari_tanggal = $req->filter_dari_tanggal != null ? ['sarpras_peminjamans.created_at','>=',$req->filter_dari_tanggal." 00:00:00"] : ['sarpras_peminjamans.created_at','!=',null];
    //         $sampai_tanggal = $req->filter_sampai_tanggal != null ? ['sarpras_peminjamans.created_at','<=',$req->filter_sampai_tanggal." 23:59:59"] : ['sarpras_peminjamans.created_at','!=',null];
           
                                         
           
           
    //         $laporandokumen = SarprasPeminjamans::join('data_siswas','sarpras_peminjamans.kode_siswa','=','data_siswas.id')
    //                                     ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')->where([$dari_tanggal,$sampai_tanggal])->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*'
    //                                         ,'sarpras_peminjamans.kode_peminjaman as kode_peminjaman'
    //                                         ,'sarpras_peminjamans.*','sarpras_peminjamans.id as id_peminjaman']);;

    //         $isi .= '<table border="1" align="center" width="100%"><thead>
    //                                   <th>No</th>
    //                                   <th>Nama Siswa</th>
    //                                   <th>Kelas / Jurusan</th>
    //                                   <th>Waktu Peminjaman</th>
    //                                   <th>Waktu Pengembalian</th>
    //                                   <th>Tanggal Input</th>
    //                                   <th>Status</th>
    //     </thead>
    //     <tbody>';
    //     $no = 1;
    //     if($laporandokumen != null){
    //         foreach ($laporandokumen as $item) {
    //             $isi .='<tr>
    //              <td>'.$no++.'</td>
    //             <td>'.$item->nama.'</td>
    //             <td>'.$item->kode_kelas. ' / ' .$item->kode_jurusan.'</td>
    //             <td>'.$item->tgl_peminjaman.'</td>
    //             <td>'.$item->tgl_pengembalian.'</td>
    //             <td>'.$item->created_at.'</td>
    //             <td>'.$item->status_peminjaman.'</td>
    //             </tr>';
    //         }
    //     }else{
    //         $isi ='<tr>
    //         <td class="text-muted text-center" colspan="100%">Tidak Ada Data </td>
    //       </tr>';
    //     }
    //         $isi .= '</tbody>
    //         </table>';
    //     }
        
    //     return $this->print_pdf($isi,'TESTEST');
    // }
}
