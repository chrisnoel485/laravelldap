<?php

namespace App\Http\Controllers;

use App\Merek;
use Illuminate\Http\Request;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $merek = Merek::orderBy('created_at', 'DESC')->paginate(10);
        return view('merek.index', compact('merek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('merek/create');
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
            'nama.required'=>'Nama Merek Tidak Boleh Kosong',
        ]);
        if ($validator->fails()) {
 
            //refresh halaman
            return Redirect::to('merek/create')
            ->withErrors($validator);
 
        }else{

            DB::table('mereks')->insert([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
            ]);
            
 
            Session::flash('message','Succes Add Merek');
 
            return redirect('/merek');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function show(Merek $merek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $merek = Merek::findOrFail($id);
        return view('merek.edit', compact('merek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules =[
            'nama'=>'required',
        ];
 
        $validator = Validator::make($rules, [
            'nama.required'=>'Nama Merek Tidak Boleh Kosong',
        ]);
        if ($validator->fails()) {
 
            //refresh halaman
            return Redirect::to('merek.edit')
            ->withErrors($validator);
 
        }else{
            $merek = Merek::findOrFail($id);
            $merek->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
            ]);
            
 
            Session::flash('message','Succes Edit Merek');
 
            return redirect('/merek');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $merek = Merek::findOrFail($id);
        $merek->delete();

        Session::flash('message','Succes Delete Merek');
	    return redirect('/merek');
    }
}
