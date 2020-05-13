<?php

namespace App\Imports;

use App\Server;
use Maatwebsite\Excel\Concerns\ToModel;

class ServerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Server([
            //
        ]);
    }
}
