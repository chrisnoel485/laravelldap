<?php

namespace App\Imports;

use App\Merek;
use Maatwebsite\Excel\Concerns\ToModel;

class MerekImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Merek([
            //
        ]);
    }
}
