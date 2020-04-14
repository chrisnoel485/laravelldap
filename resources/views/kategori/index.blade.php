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
                                <h3 class="card-title">List Kategori</h3>
                                <div class="card-tools">
                                    <a href="{{ URL::to('/kategori/create')}}" class="btn btn-tool">
                                        <i class="fa fa-plus"></i>
                                        &nbsp; Tambah
                                    </a>
                                </div>
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
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">No</td>
                                                    <td>Kategori</td>
                                                    <td>Deskripsi</td>
                                                    <td class="text-center">Aksi</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @forelse ($kategori as $row)
                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td>{{ $row->nama }}</td>
                                                    <td>{{ $row->deskripsi }}</td>
                                                    <td class="text-center">
                                                        <form action="{{ route('kategori.destroy', $row->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a href="{{ route('kategori.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">Tidak ada data</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
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