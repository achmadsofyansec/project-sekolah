<?php

namespace App\Exports;

use App\Models\SarprasPeminjamans;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class PeminjamanExport implements FromCollection,WithHeadings,ShouldAutoSize,WithStyles
 
{
    /**
    * @return \Illuminate\Support\Collection
    */
     public function headings(): array
    {
        return[
        'kode_peminjaman',
        'kode_siswa',
        'tgl_peminjaman',
        'tgl_pengembalian',
        'status_peminjaman',
        'desc_peminjaman',
        'penerima',
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
        return SarprasPeminjamans::latest()->get([
        'kode_peminjaman',
        'kode_siswa',
        'tgl_peminjaman',
        'tgl_pengembalian',
        'status_peminjaman',
        'desc_peminjaman',
        'penerima',
        ]);
    }
}
