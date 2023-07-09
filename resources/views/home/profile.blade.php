@extends('layouts.default')
@section('title', __( 'Update Profile' ))
@section('content')
<div class="content-header">
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        @include('layouts.partials.notification')
                        <h3 class="card-title">Update Profile</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ URL::to('/update-profile/'.$data->id) }}">
                        @csrf
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label class="form-label" for="default-01">Nama</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="nama" id="default-01" placeholder="Input Nama" value="{{ $data->nama }}">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="form-label" for="default-02">Email</label>
                                <div class="form-control-wrap">
                                    <input type="email" class="form-control" name="email" id="default-02" placeholder="Input Email" value="{{ $data->email }}">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="form-label" for="default-03">Username</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="username" id="default-03" placeholder="Input Username" value="{{ $data->username }}">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="form-label" for="default-04">Password</label> <span style="font-size:10px;color: red;">Isi untuk merubah password</span>
                                <div class="form-control-wrap">
                                    <input type="password" class="form-control" name="password" id="default-04" placeholder="Input Password">
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
            <!-- /.card -->
@endsection