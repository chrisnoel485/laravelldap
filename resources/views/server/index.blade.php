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
                                <h3 class="card-title">List Server</h3>
                                <div class="card-tools">
                                    <a href="/server/export_excel" class="btn btn-success my-3" target="_blank">Export Data</a>
                                    <a href="{{ URL::to('/server/export_excel')}}" class="btn btn-tool" target="_blank">
                                        <i class="fa fa-plus"></i>
                                        &nbsp; Export Data
                                    </a>
                                    <a href="{{ URL::to('/server/create')}}" class="btn btn-tool">
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
                                                    <td>Nama Server</td>
                                                    <td>Serial Number</td>
                                                    <td>Deskripsi</td>
                                                    <td>Kategori Server</td>
                                                    <td>Lokasi Server</td>
                                                    <td>Merek Server</td>
                                                    <td>Tahun Server</td>
                                                    <td>Expired Warranty</td>
                                                    <td class="text-center">Aksi</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @forelse ($server as $row)
                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td>{{ $row->nama }}</td>
                                                    <td>{{ $row->sn }}</td>
                                                    <td>{{ $row->deskripsi }}</td>
                                                    <td>{{ $row->kategori->nama }}</td>
                                                    <td>{{ $row->lokasi->nama }}</td>
                                                    <td>{{ $row->merek->nama }}</td>
                                                    <td>{{ $row->tahun }}</td>
                                                    <td>{{ $row->expired }}</td>
                                                    <td class="text-center">
                                                        <form action="{{ route('server.destroy', $row->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a href="{{ route('server.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="10" class="text-center">Tidak ada data</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <div>
                                            {{ $server->links() }}
                                        </div>
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