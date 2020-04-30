@extends('layouts.master')
​
@section('title')
    <title>Set Role</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
                            <li class="breadcrumb-item active">Set Role</li>
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
                                <h3 class="card-title">Set Role</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('users.set_role', $user->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <td>:</td>
                                                            <td>{{ $user->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Email</th>
                                                            <td>:</td>
                                                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Role</th>
                                                            <td>:</td>
                                                            <td>
                                                                @foreach ($roles as $row)
                                                                <input type="radio" name="role" 
                                                                    {{ $user->hasRole($row) ? 'checked':'' }}
                                                                    value="{{ $row }}"> {{  $row }} <br>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
        </section>
    </div>
@endsection