@extends('layouts.master')
​
@section('title')
    <title>Add New Users</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add New Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
                            <li class="breadcrumb-item active">Add New</li>
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
                                <h3 class="card-title">Add Users</h3>
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
                                        <form action="{{ route('users.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" required>
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" required>
                                                <p class="text-danger">{{ $errors->first('password') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Role</label>
                                                <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid':'' }}" required>
                                                    <option value="">Pilih</option>
                                                    @foreach ($role as $row)
                                                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                                <p class="text-danger">{{ $errors->first('role') }}</p>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="">Status</label>
                                                <select name="status" class="form-control {{ $errors->has('status') ? 'is-invalid':'' }}" required>
                                                    <option value="">Pilih</option>
                                                    <option value="0">Suspend</option>
                                                    <option value="1">Aktif</option>
                                                </select>
                                                <p class="text-danger">{{ $errors->first('role') }}</p>
                                            </div> -->
                                            <div class="card-footer">
                                                <a href="{{ URL::to('users') }}" class="btn btn-outline-info">Kembali</a>
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