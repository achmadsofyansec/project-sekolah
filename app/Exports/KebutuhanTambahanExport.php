<?php

namespace App\Exports;

use App\Models\SarprasKebutuhanTambahan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KebutuhanTambahanExport implements FromCollection,WithHeadings,ShouldAutoSize,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return[
         'tahun_pengajuan',
        'jenis',
        'jumlah',
        'sifat',
        'rangking',
        'kategori_kondisi',
        'foto'
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
        return SarprasKebutuhanTambahan::latest()->get([
        'tahun_pengajuan',
        'jenis',
        'jumlah',
        'sifat',
        'rangking',
        'kategori_kondisi',
        'foto'
        ]);
    }
}
