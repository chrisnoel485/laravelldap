<?php

namespace App\Exports;

use App\Server;
use App\Kategori;
use App\Lokasi;
use App\Merek;
use Maatwebsite\Excel\Concerns\FromCollection;

class ServerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Server::all();
        return Server::with('kategori','lokasi','merek')->orderBy('created_at', 'DESC')->paginate(10);
        //return view('server.index', compact('server'));
    }
}
