@extends('layouts.master')

@section('title')
    <title>Manajemen Server</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manajemen Server</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Server</li>
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
                                <h3 class="card-title">Edit Server</h3>
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
                                        <form role="form" action="{{ route('server.update', $server->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-group">
                                                <label for="nama">Nama Server</label>
                                                <input type="text" 
                                                    name="nama"
                                                    value="{{ $server->nama }}"
                                                    class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}" id="nama" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="sn">Serial Number Server</label>
                                                <input type="text" 
                                                    name="sn"
                                                    value="{{ $server->sn }}"
                                                    class="form-control {{ $errors->has('sn') ? 'is-invalid':'' }}" id="sn" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}">{{ $server->deskripsi }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Kategori Server</label>
                                                <select name="kategori_id" id="kategori_id" 
                                                    required class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}">
                                                    <option value="">Pilih</option>
                                                    @foreach ($kategori as $row)
                                                        <option value="{{ $row->id }}" {{ $row->id == $server->kategori_id ? 'selected':'' }}>
                                                            {{ ucfirst($row->nama) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <p class="text-danger">{{ $errors->first('kategori_id') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Lokasi Server</label>
                                                <select name="lokasi_id" id="lokasi_id" 
                                                    required class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}">
                                                    <option value="">Pilih</option>
                                                    @foreach ($lokasi as $row)
                                                        <option value="{{ $row->id }}" {{ $row->id == $server->lokasi_id ? 'selected':'' }}>
                                                            {{ ucfirst($row->nama) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <p class="text-danger">{{ $errors->first('lokasi_id') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Merek Server</label>
                                                <select name="merek_id" id="merek_id" 
                                                    required class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}">
                                                    <option value="">Pilih</option>
                                                    @foreach ($merek as $row)
                                                        <option value="{{ $row->id }}" {{ $row->id == $server->merek_id ? 'selected':'' }}>
                                                            {{ ucfirst($row->nama) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <p class="text-danger">{{ $errors->first('merek_id') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="tahun">Tahun Server</label>
                                                <input type="text" 
                                                    name="tahun"
                                                    value="{{ $server->tahun }}"
                                                    class="form-control {{ $errors->has('tahun') ? 'is-invalid':'' }}" id="tahun" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="expired">Expired Warranty</label>
                                                <input type="date" id="expired" name="expired"
                                                    value="{{ $server->expired }}"
                                                    min="2018-01-01" max="2018-12-31"
                                                    class="form-control" >
                                            </div>
                                            <div class="card-footer">
                                                <a href="{{ URL::to('server') }}" class="btn btn-outline-info">Kembali</a>
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