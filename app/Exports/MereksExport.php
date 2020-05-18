<?php

namespace App\Exports;

use App\Merek;
use Maatwebsite\Excel\Concerns\FromCollection;

class MereksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Merek::all();
    }
}
