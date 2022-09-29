<?php

namespace App\Exports;

use App\Models\data_siswa;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SiswaExport implements FromCollection{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return data_siswa::latest()->get();
    }
}
