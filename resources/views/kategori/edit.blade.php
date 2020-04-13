@extends('layouts.master')

@section('title')
    <title>Manajemen Kategori</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manajemen Kategori</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Kategori</li>
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
                                <h3 class="card-title">Edit Kategori</h3>
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
                                        <form action="{{ route('kategori.update', $kategori->id) }}" method="PUT">
                                            {{ csrf_field() }}
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6"> 
                                                    <input type="hidden" name="id" value="{{ $kategori->id }}"> 
                                                        <div class="form-group">
                                                            <label for="nama">Nama Kategori</label>
                                                            <input type="text" value="{{ $kategori->nama }}" name="nama" placeholder="Masukkan Nama Kategori" class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="deskripsi">Deskripsi</label>
                                                            <input type="text" value="{{ $kategori->deskripsi }}" name="deskripsi" placeholder="Masukkan Deskripsi Kategori" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <a href="{{ URL::to('kategori') }}" class="btn btn-outline-info">Kembali</a>
                                                <input type="submit" value="Update" class="btn btn-primary pull-right">
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