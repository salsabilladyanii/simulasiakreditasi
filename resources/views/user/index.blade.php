@extends('layouts.default')
@section('title', __( 'User' ))
@section('content')
<div class="content-header">
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @include('layouts.partials.notification')
                    <h3 class="card-title">Data Pengguna</h3>
                    <a href="{{ URL::to('/tambah-user') }}" class="btn btn-primary" style="float: right;">Tambah Pengguna</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px;">No</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data AS $key => $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->nama }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->username }}</td>
                                    <td>{{ $value->role }}</td>
                                    <td>
                                        @if($value->id != 1)
                                        <a href="{{ URL::to('edit-user/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ URL::to('delete-user/'.$value->id) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


