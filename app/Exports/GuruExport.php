<?php

namespace App\Exports;

use App\Models\data_guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GuruExport implements FromCollection,WithHeadings,ShouldAutoSize,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return[
            'id',
            'niptk',
            'nuptk',
            'nik',
            'nama',
            'jns_kelamin',
            'tmp_lahir',
            'tgl_lhr',
            'alamat',
            'no_hp',
            'no_telp',
            'email',
            'agama',
            'kewarganegaraan',
            'jabatan'
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
        return data_guru::latest()->get([
            'id',
            'niptk',
            'nuptk',
            'nik',
            'nama',
            'jns_kelamin',
            'tmp_lahir',
            'tgl_lhr',
            'alamat',
            'no_hp',
            'no_telp',
            'email',
            'agama',
            'kewarganegaraan',
            'jabatan'
        ]);
    }
}
