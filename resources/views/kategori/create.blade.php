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
                <form action="{{ route('kategori.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">  
                                <div class="form-group">
                                    <label for="nama">Nama Kategori</label>
                                    <input type="text" name="hostname" placeholder="Masukkan Hostname Server" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" name="sn" placeholder="Masukkan Serial Number Server" class="form-control" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ URL::to('kategori') }}" class="btn btn-outline-info">Kembali</a>
                        <input type="submit" value="Proses" class="btn btn-primary pull-right">
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection