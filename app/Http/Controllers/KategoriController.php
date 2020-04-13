<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = Kategori::orderBy('created_at', 'DESC')->paginate(10);
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('kategori/create');
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
            'nama.required'=>'Nama Kategori Tidak Boleh Kosong',
        ]);
        if ($validator->fails()) {
 
            //refresh halaman
            return Redirect::to('kategori/create')
            ->withErrors($validator);
 
        }else{

            DB::table('kategoris')->insert([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
            ]);
            
 
            Session::flash('message','Succes Add Kategori');
 
            return redirect('/kategori');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules =[
            'nama'=>'required',
        ];
 
        $validator = Validator::make($rules, [
            'nama.required'=>'Nama Kategori Tidak Boleh Kosong',
        ]);
        if ($validator->fails()) {
 
            //refresh halaman
            return Redirect::to('kategori.edit')
            ->withErrors($validator);
 
        }else{
            $kategori = Kategori::findOrFail($id);
            $kategori->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
            ]);
            
 
            Session::flash('message','Succes Edit Kategori');
 
            return redirect('/kategori');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        Session::flash('message','Succes Delete Kategori');
	    return redirect('/kategori');
    }
}
