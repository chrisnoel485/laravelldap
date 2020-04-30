<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;
use App\Kategori;
use App\Lokasi;
use App\Merek;
use Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$produk = Produk::orderBy('created_at', 'DESC')->paginate(10);
        //return view('produk.index', compact('produk'));
        $produk = Produk::with('kategori','lokasi','merek')->orderBy('created_at', 'DESC')->paginate(10);
        return view('produk.index', compact('produk'));
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
        return view('produk.create', compact('kategori','lokasi','merek'));
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
            'nama.required'=>'Nama Produk Tidak Boleh Kosong',
            'sn.required'=>'Serial Number Tidak Boleh Kosong',
            'deskripsi.required'=>'Deskripsi Tidak Boleh Kosong',
            'kategori_id.required'=>'Kategori Produk Tidak Boleh Kosong',
            'lokasi_id.required'=>'Lokasi Produk Tidak Boleh Kosong',
            'merek_id.required'=>'Merek Produk Tidak Boleh Kosong',
            'tahun.required'=>'Tahun Produk Tidak Boleh Kosong',
            'expired.required'=>'Expired Produk Tidak Boleh Kosong',
        ]);
        if ($validator->fails()) {
 
            //refresh halaman
            return Redirect::to('produk/create')
            ->withErrors($validator);
 
        }else{

            DB::table('produks')->insert([
                'nama' => $request->nama,
                'sn' => $request->sn,
                'deskripsi' => $request->deskripsi,
                'kategori_id' => $request->kategori_id,
                'lokasi_id' => $request->lokasi_id,
                'merek_id' => $request->merek_id,
                'tahun' => $request->tahun,
                'expired' => $request->expired,
            ]);
            
 
            Session::flash('message','Succes Add Produk');
 
            return redirect('/produk');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::orderBy('nama', 'ASC')->get();
        $lokasi = Lokasi::orderBy('nama', 'ASC')->get();
        $merek = Merek::orderBy('nama', 'ASC')->get();
        return view('produk.edit', compact('produk', 'kategori','lokasi','merek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
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
            'nama.required'=>'Nama Produk Tidak Boleh Kosong',
            'sn.required'=>'Serial Number Tidak Boleh Kosong',
            'deskripsi.required'=>'Deskripsi Tidak Boleh Kosong',
            'kategori_id.required'=>'Kategori Produk Tidak Boleh Kosong',
            'lokasi_id.required'=>'Lokasi Produk Tidak Boleh Kosong',
            'merek_id.required'=>'Merek Produk Tidak Boleh Kosong',
            'tahun.required'=>'Tahun Produk Tidak Boleh Kosong',
            'expired.required'=>'Expired Produk Tidak Boleh Kosong',
        ]);
        if ($validator->fails()) {
 
            //refresh halaman
            return Redirect::to('produk.edit')
            ->withErrors($validator);
 
        }else{
            $produk = Produk::findOrFail($id);
            $produk->update([
                'nama' => $request->nama,
                'sn' => $request->sn,
                'deskripsi' => $request->deskripsi,
                'kategori_id' => $request->kategori_id,
                'lokasi_id' => $request->lokasi_id,
                'merek_id' => $request->merek_id,
                'tahun' => $request->tahun,
                'expired' => $request->expired,
            ]);
            
 
            Session::flash('message','Succes Edit Produk');
 
            return redirect('/produk');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $produk = Produk::findOrFail($id);
        $produk->delete();

        Session::flash('message','Succes Delete Produk');
	    return redirect('/produk');
    }
}