<?php

namespace App\Exports;

use App\Models\Peminjaman_buku;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\DB;


class PeminjamanExport implements FromCollection,WithHeadings,ShouldAutoSize,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return[
            'id',
            'Nama Siswa',   
            'Kode Buku',
            'Jumlah',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Status'
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return[
            1  => [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType'   => Fill::FILL_SOLID,
                    'startColor' => ['argb' => Color::COLOR_GREEN],
                ],
            ],
        ];
    }
    public function collection()
    {   
        $laporanpeminjaman = DB::table('perpustakaan_peminjaman_buku_dts')->join('data_siswas','data_siswas.nisn','=','perpustakaan_peminjaman_buku_dts.id_siswa')
            ->get();
        $denda = DB::table('perpustakaan_dendas')->get();
        foreach ($laporanpeminjaman as $item) {
            if($item->status == 1){$dipinjam = "Dipinjam";}else{$dipinjam = "Dikembalikan";};
        foreach ($denda as $item1)
            $dendabuku = $item1->tarif_denda;
            $tgl_sekarang = date("Y-m-d");
            $tgl_kembali = $item->tanggal_kembali;
            $sel1 = explode('-',$tgl_kembali);
            $sel1_pecah = $sel1[0].'-'.$sel1[1].'-'.$sel1[2];
            $sel2 = explode('-',$tgl_sekarang);
            $sel2_pecah = $sel2[0].'-'.$sel2[1].'-'.$sel2[2];
            $selisih = strtotime($sel2_pecah) - strtotime($sel1_pecah);
            $selisih = $selisih/86400;
            if($selisih <= 0){
                $selisihasli = "Tidak";
            }else{
                $selisihasli = $selisih. "hari";
            }
              $data123 = $dendabuku * $selisih;
             if($data123 <= 0){
                $dataasli = "Tidak Ada Denda";
              }else{
                $dataasli = "(Rp.".number_format($data123).")";
              }
        return DB::table('perpustakaan_peminjaman_buku_dts')
        ->join('data_siswas','data_siswas.nisn','=','perpustakaan_peminjaman_buku_dts.id_siswa')->get([
            'perpustakaan_peminjaman_buku_dts.id',
            'nama',
            'kode_buku',
            'jumlah',
            'tanggal_pinjam',
            'tanggal_kembali',
            'status'
        ]);
    }
        
    }
}
