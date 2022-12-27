<?php

namespace App\Exports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BukuExport implements FromCollection,WithHeadings,ShouldAutoSize,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return[
            'id',
            'kode_buku',
            'total_halaman',
            'judul_buku',
            'pengarang',
            'penerbit',
            'tahun_terbit',
            'tempat_terbit',
            'tinggi_buku',
            'ddc',
            'isbn',
            'jumlah_buku',
            'tanggal_masuk',
            'no_inventaris',
            'lokasi',
            'deskripsi_buku',
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
          //
          return Buku::latest()->get([
            'id',
            'kode_buku',
            'total_halaman',
            'judul_buku',
            'pengarang',
            'penerbit',
            'tahun_terbit',
            'tempat_terbit',
            'tinggi_buku',
            'ddc',
            'isbn',
            'jumlah_buku',
            'tanggal_masuk',
            'no_inventaris',
            'lokasi',
            'deskripsi_buku',
        ]);
    }
}
