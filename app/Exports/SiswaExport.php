<?php

namespace App\Exports;

use App\Models\data_siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SiswaExport implements FromCollection,WithHeadings,ShouldAutoSize,WithStyles{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $kelas;
    private $jurusan;
    public function __construct($kelas = null,$jurusan = null)
    {
        $this->kelas = $kelas;
        $this->jurusan = $jurusan;
    }
    //First Row Heading
    public function headings(): array
    {
        return[
            'id',
            'NIK',
            'NISN',
            'Nama',
            'kip',
            'Tempat Lahir',
            'tgl_lahir',
            'Jenis Kelamin',
            'Alamat',
            'Agama',
            'No Hp',
            'Email',
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
        $result = [];
        $wherekelas = $this->kelas != null ? ['kelas.kode_kelas','=',$this->kelas] : ['kelas.kode_kelas','!=','null'];
        $wherejurusan = $this->jurusan != null ?['jurusans.kode_jurusan','=',$this->jurusan] : ['jurusans.kode_jurusan','!=','null'];
        $datasiswa = data_siswa::join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
        ->join('kelas','aktivitas_belajars.kode_kelas','=','kelas.kode_kelas')
        ->join('jurusans','aktivitas_belajars.kode_jurusan','=','jurusans.kode_jurusan')
        ->where([$wherejurusan,$wherekelas])
        ->get([
            'data_siswas.id',
            'nik',
            'nisn',
            'nama',
            'kip',
            'tmp_lahir',
            'tgl_lhr',
            'jns_kelamin',
            'alamat',
            'agama',
            'no_hp',
            'email',
        ]);
        return $datasiswa;
    }
}
