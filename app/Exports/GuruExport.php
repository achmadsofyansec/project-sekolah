<?php

namespace App\Exports;

use App\Models\data_guru;
use Maatwebsite\Excel\Concerns\FromCollection;

class GuruExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return data_guru::latest()->get();
    }
}
