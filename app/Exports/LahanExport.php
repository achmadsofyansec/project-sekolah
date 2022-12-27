<?php

namespace App\Exports;

use App\Models\SarprasLahan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LahanExport implements FromCollection,WithHeadings,ShouldAutoSize,WithStyles 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return[
            'nama_lahan',
            'alamat',
            'luas',
            'luas_digunakan',
            'status_lahan', 
            'kelurahan',
            'kecamatan',
            'kabupaten',
            'provinsi',
            'kode_pos',
            'kategori_geografis',
            'wilayah',
            'jarak_provinsi',
            'jarak_kabupaten',
            'jarak_kecamatan',
            'jarak_kemenag',
            'jarak_ra',
            'jarak_mi',
            'jarak_mts',
            'jarak_sd',
            'jarak_smp',
            'jarak_sma',
            'jarak_pontren',
            'jarak_ptki',
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
        return SarprasLahan::latest()->get([
            'nama_lahan',
            'alamat',
            'luas',
            'luas_digunakan',
            'status_lahan', 
            'kelurahan',
            'kecamatan',
            'kabupaten',
            'provinsi',
            'kode_pos',
            'kategori_geografis',
            'wilayah',
            'jarak_provinsi',
            'jarak_kabupaten',
            'jarak_kecamatan',
            'jarak_kemenag',
            'jarak_ra',
            'jarak_mi',
            'jarak_mts',
            'jarak_sd',
            'jarak_smp',
            'jarak_sma',
            'jarak_pontren',
            'jarak_ptki',
        ]);
    }
}
