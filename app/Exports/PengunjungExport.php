<?php

namespace App\Exports;

use App\Models\Pengunjung_perpus;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\DB;

class PengunjungExport implements FromCollection,WithHeadings,ShouldAutoSize,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return[
            'id',
            'Nama Siswa',
            'Kelas',
            'Keperluan',
            'Tanggal Kunjungan'
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
        return DB::table('perpustakaan_pengunjung_perpuses')
        ->join('data_siswas','data_siswas.nisn','=','perpustakaan_pengunjung_perpuses.nis')
        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->get([
            'perpustakaan_pengunjung_perpuses.id',
            'nama',
            'kode_kelas',
            'keperluan',
            'perpustakaan_pengunjung_perpuses.created_at'
        ]);
    }
}
