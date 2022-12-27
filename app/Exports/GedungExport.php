<?php

namespace App\Exports;

use App\Models\SarprasGedung;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GedungExport implements FromCollection,WithHeadings,ShouldAutoSize,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
   public function headings(): array
    {
        return[
        'nama_gedung',
        'nama_lahan',
        'jml_lantai',
        'kepemilikan',
        'kondisi_kerusakan',
        'kategori_kondisi',
        'tahun_dibangun',
        'luas_gedung',
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
        return SarprasGedung::latest()->get([
        'nama_gedung',
        'nama_lahan',
        'jml_lantai',
        'kepemilikan',
        'kondisi_kerusakan',
        'kategori_kondisi',
        'tahun_dibangun',
        'luas_gedung',
        ]);
    }
}
