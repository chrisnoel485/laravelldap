@extends('layouts.master')

@section('title')
    <title>Manajemen Merek</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manajemen Merek</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Merek</li>
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
                                <h3 class="card-title">Add Merek</h3>
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
                                        <form action="{{ route('merek.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                            <label for="nama">Nama Merek</label>
                                                            <input type="text" name="nama" placeholder="Masukkan Nama Merek" class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="deskripsi">Deskripsi</label>
                                                            <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" placeholder="Masukkan Deskripsi Merek" class="form-control"></textarea>
                                                        </div>
                                            <div class="card-footer">
                                                <a href="{{ URL::to('merek') }}" class="btn btn-outline-info">Kembali</a>
                                                <input type="submit" value="Proses" class="btn btn-primary pull-right">
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