<?php

namespace App\Exports;

use App\Server;
use Maatwebsite\Excel\Concerns\FromCollection;

class ServerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Server::all();
    }
}
