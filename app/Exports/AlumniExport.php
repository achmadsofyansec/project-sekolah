<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\DB;

class AlumniExport implements FromCollection,WithHeadings,ShouldAutoSize,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return[
            'id',
            'NIK',
            'Nama',
            'NISN',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Kode Ujian'
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
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        {   
        return DB::table('data_siswas')
        ->join('kelulusan_nilais','kelulusan_nilais.kode_siswa','=','data_siswas.id')
        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->where('kelulusan_nilais.status','=','lulus')->get([
            'kelulusan_nilais.id',
            'nik',
            'nama',
            'nisn',
            'jns_kelamin',
            'tmp_lahir',
            'tgl_lhr',
            'kode_ujian'
        ]);
        }
    }
}
