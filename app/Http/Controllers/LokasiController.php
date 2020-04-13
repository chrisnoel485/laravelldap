<?php

namespace App\Http\Controllers;

use App\Lokasi;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lokasi = Lokasi::orderBy('created_at', 'DESC')->paginate(10);
        return view('lokasi.index', compact('lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('lokasi/create');
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
        ];
 
        $validator = Validator::make($rules, [
            'nama.required'=>'Nama Lokasi Tidak Boleh Kosong',
        ]);
        if ($validator->fails()) {
 
            //refresh halaman
            return Redirect::to('lokasi/create')
            ->withErrors($validator);
 
        }else{

            DB::table('lokasis')->insert([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
            ]);
            
 
            Session::flash('message','Succes Add Lokasi');
 
            return redirect('/lokasi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(Lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $lokasi = Lokasi::findOrFail($id);
        return view('lokasi.edit', compact('lokasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules =[
            'nama'=>'required',
        ];
 
        $validator = Validator::make($rules, [
            'nama.required'=>'Nama Lokasi Tidak Boleh Kosong',
        ]);
        if ($validator->fails()) {
 
            //refresh halaman
            return Redirect::to('lokasi.edit')
            ->withErrors($validator);
 
        }else{
            $lokasi = Lokasi::findOrFail($id);
            $lokasi->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
            ]);
            
 
            Session::flash('message','Succes Edit Lokasi');
 
            return redirect('/lokasi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $lokasi)
    {
        //
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();

        Session::flash('message','Succes Delete Lokasi');
	    return redirect('/lokasi');
    }

}
