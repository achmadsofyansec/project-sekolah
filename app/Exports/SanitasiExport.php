<?php

namespace App\Exports;

use App\Models\SarprasSanitasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SanitasiExport implements FromCollection,WithHeadings,ShouldAutoSize,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return[
            'sumber_air_bersih',
            'sumber_air_minum',
            'kecukupan_air_bersih',
            'fasilitas_jamban_khusus',
            'tipe_toilet',
            'pembalut_cadangan',
            'cuci_tangan',
            'jumlah_cuci_tangan_kb',
            'jumlah_cuci_tangan_kr',
            'jumlah_sabun_cuci_tangan',
            'pembuangan_limbah',
            'waktu_pembuagan_limbah',
            'selokan_air',
            'tempat_sampah_kelas',
            'tempat_sampah_tertutup',            
            'cermin',
            'tps',
            'pengangkatan_sampah',          
            'anggaran_pemeliharaan',
            'kegiatan_rutin',
            'kemitraan_sekolah',
            'pemisahan_jamban',
            'jumlah_jamban_baik_lk',
            'jumlah_jamban_baik_pr',
            'jumlah_jamban_baik_br',
            'jumlah_jamban_rusak_lk',
            'jumlah_jamban_rusak_pr',
            'jumlah_jamban_rusak_br',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return[
            1  => [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType'   => Fill::FILL_SOLID,
                    'startColor' => ['argb' => Color::COLOR_YELLOW],
                ],
            ],
        ];
    }

    public function collection()
    {
        //
        return SarprasSanitasi::latest()->get([
            'sumber_air_bersih',
            'sumber_air_minum',
            'kecukupan_air_bersih',
            'fasilitas_jamban_khusus',
            'tipe_toilet',
            'pembalut_cadangan',
            'cuci_tangan',
            'jumlah_cuci_tangan_kb',
            'jumlah_cuci_tangan_kr',
            'jumlah_sabun_cuci_tangan',
            'pembuangan_limbah',
            'waktu_pembuagan_limbah',
            'selokan_air',
            'tempat_sampah_kelas',
            'tempat_sampah_tertutup',            
            'cermin',
            'tps',
            'pengangkatan_sampah',          
            'anggaran_pemeliharaan',
            'kegiatan_rutin',
            'kemitraan_sekolah',
            'pemisahan_jamban',
            'jumlah_jamban_baik_lk',
            'jumlah_jamban_baik_pr',
            'jumlah_jamban_baik_br',
            'jumlah_jamban_rusak_lk',
            'jumlah_jamban_rusak_pr',
            'jumlah_jamban_rusak_br',
        ]);
    }
}
