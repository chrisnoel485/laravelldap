<?php

namespace App\Http\Controllers;

use App\Server;
use Illuminate\Http\Request;
use App\Kategori;
use App\Lokasi;
use App\Merek;
use Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Exports\MerekExport;
use Maatwebsite\Excel\Facades\Excel;


class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$server = Server::orderBy('created_at', 'DESC')->paginate(10);
        //return view('server.index', compact('server'));
        $server = Server::with('kategori','lokasi','merek')->orderBy('created_at', 'DESC')->paginate(10);
        return view('server.index', compact('server'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::orderBy('nama', 'ASC')->get();
        $lokasi = Lokasi::orderBy('nama', 'ASC')->get();
        $merek = Merek::orderBy('nama', 'ASC')->get();
        return view('server.create', compact('kategori','lokasi','merek'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules =[
            'nama'=>'required',
            'sn'=>'required',
            'deskripsi'=>'required',
            'kategori_id'=>'required',
            'lokasi_id'=>'required',
            'merek_id'=>'required',
            'tahun'=>'required',
            'expired'=>'required',


        ];
 
        $validator = Validator::make($rules, [
            'nama.required'=>'Nama Server Tidak Boleh Kosong',
            'sn.required'=>'Serial Number Tidak Boleh Kosong',
            'deskripsi.required'=>'Deskripsi Tidak Boleh Kosong',
            'kategori_id.required'=>'Kategori Server Tidak Boleh Kosong',
            'lokasi_id.required'=>'Lokasi Server Tidak Boleh Kosong',
            'merek_id.required'=>'Merek Server Tidak Boleh Kosong',
            'tahun.required'=>'Tahun Server Tidak Boleh Kosong',
            'expired.required'=>'Expired Server Tidak Boleh Kosong',
        ]);
        if ($validator->fails()) {
 
            //refresh halaman
            return Redirect::to('server/create')
            ->withErrors($validator);
 
        }else{

            DB::table('servers')->insert([
                'nama' => $request->nama,
                'sn' => $request->sn,
                'deskripsi' => $request->deskripsi,
                'kategori_id' => $request->kategori_id,
                'lokasi_id' => $request->lokasi_id,
                'merek_id' => $request->merek_id,
                'tahun' => $request->tahun,
                'expired' => $request->expired,
            ]);
            
 
            Session::flash('message','Succes Add Server');
 
            return redirect('/server');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function show(Server $server)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $server = Server::findOrFail($id);
        $kategori = Kategori::orderBy('nama', 'ASC')->get();
        $lokasi = Lokasi::orderBy('nama', 'ASC')->get();
        $merek = Merek::orderBy('nama', 'ASC')->get();
        return view('server.edit', compact('server', 'kategori','lokasi','merek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $rules =[
            'nama'=>'required',
            'sn'=>'required',
            'deskripsi'=>'required',
            'kategori_id'=>'required',
            'lokasi_id'=>'required',
            'merek_id'=>'required',
            'tahun'=>'required',
            'expired'=>'required',


        ];
 
        $validator = Validator::make($rules, [
            'nama.required'=>'Nama Server Tidak Boleh Kosong',
            'sn.required'=>'Serial Number Tidak Boleh Kosong',
            'deskripsi.required'=>'Deskripsi Tidak Boleh Kosong',
            'kategori_id.required'=>'Kategori Server Tidak Boleh Kosong',
            'lokasi_id.required'=>'Lokasi Server Tidak Boleh Kosong',
            'merek_id.required'=>'Merek Server Tidak Boleh Kosong',
            'tahun.required'=>'Tahun Server Tidak Boleh Kosong',
            'expired.required'=>'Expired Server Tidak Boleh Kosong',
        ]);
        if ($validator->fails()) {
 
            //refresh halaman
            return Redirect::to('server.edit')
            ->withErrors($validator);
 
        }else{
            $server = Server::findOrFail($id);
            $server->update([
                'nama' => $request->nama,
                'sn' => $request->sn,
                'deskripsi' => $request->deskripsi,
                'kategori_id' => $request->kategori_id,
                'lokasi_id' => $request->lokasi_id,
                'merek_id' => $request->merek_id,
                'tahun' => $request->tahun,
                'expired' => $request->expired,
            ]);
            
 
            Session::flash('message','Succes Edit Server');
 
            return redirect('/server');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $server = Server::findOrFail($id);
        $server->delete();

        Session::flash('message','Succes Delete Server');
	    return redirect('/server');
    }
}
