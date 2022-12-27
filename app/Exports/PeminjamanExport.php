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
            'Kode Buku',
            'Jumlah',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Status',
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
        return DB::table('perpustakaan_peminjaman_buku_dts')
        ->join('data_siswas','data_siswas.nisn','=','perpustakaan_peminjaman_buku_dts.id_siswa')->get([
            'perpustakaan_peminjaman_buku_dts.id',
            'nama',
            'kode_buku',
            'jumlah',
            'tanggal_pinjam',
            'tanggal_kembali',
        ]);
        
    }
}
