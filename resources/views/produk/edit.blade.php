@extends('layouts.master')

@section('title')
    <title>Manajemen Produk</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manajemen Produk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Produk</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Produk</h3>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                <div id="alert-msg" class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{ Session::get('message') }}
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <form role="form" action="{{ route('produk.update', $produk->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-group">
                                                <label for="nama">Nama Produk</label>
                                                <input type="text" 
                                                    name="nama"
                                                    value="{{ $produk->nama }}"
                                                    class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}" id="nama" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="sn">Serial Number Produk</label>
                                                <input type="text" 
                                                    name="sn"
                                                    value="{{ $produk->sn }}"
                                                    class="form-control {{ $errors->has('sn') ? 'is-invalid':'' }}" id="sn" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}">{{ $produk->deskripsi }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Kategori Produk</label>
                                                <select name="kategori_id" id="kategori_id" 
                                                    required class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}">
                                                    <option value="">Pilih</option>
                                                    @foreach ($kategori as $row)
                                                        <option value="{{ $row->id }}" {{ $row->id == $produk->kategori_id ? 'selected':'' }}>
                                                            {{ ucfirst($row->nama) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <p class="text-danger">{{ $errors->first('kategori_id') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Lokasi Produk</label>
                                                <select name="lokasi_id" id="lokasi_id" 
                                                    required class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}">
                                                    <option value="">Pilih</option>
                                                    @foreach ($lokasi as $row)
                                                        <option value="{{ $row->id }}" {{ $row->id == $produk->lokasi_id ? 'selected':'' }}>
                                                            {{ ucfirst($row->nama) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <p class="text-danger">{{ $errors->first('lokasi_id') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Merek Produk</label>
                                                <select name="merek_id" id="merek_id" 
                                                    required class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}">
                                                    <option value="">Pilih</option>
                                                    @foreach ($merek as $row)
                                                        <option value="{{ $row->id }}" {{ $row->id == $produk->merek_id ? 'selected':'' }}>
                                                            {{ ucfirst($row->nama) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <p class="text-danger">{{ $errors->first('merek_id') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="tahun">Tahun Produk</label>
                                                <input type="text" 
                                                    name="tahun"
                                                    value="{{ $produk->tahun }}"
                                                    class="form-control {{ $errors->has('tahun') ? 'is-invalid':'' }}" id="tahun" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="expired">Serial Number Produk</label>
                                                <input type="text" 
                                                    name="expired"
                                                    value="{{ $produk->expired }}"
                                                    class="form-control {{ $errors->has('sn') ? 'is-invalid':'' }}" id="expired" required>
                                            </div>
                                            <div class="card-footer">
                                                <a href="{{ URL::to('produk') }}" class="btn btn-outline-info">Kembali</a>
                                                <button class="btn btn-info">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection