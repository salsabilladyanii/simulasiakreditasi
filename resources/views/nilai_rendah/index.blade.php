@extends('layouts.default')
@section('title', __( 'Nilai Rendah' ))
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
                    <h3 class="card-title">List Indikator Bernilai Rendah</h3>
                    
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead style="background: #0714af !important;color: white;">
                            <tr>
                                <th style="width: 10px;">No</th>
                                <th>Elemen</th>
                                <th>Indikator</th>
                                <th>Sor</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data AS $key => $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{!! $value->elemen !!}</td>
                                    <td>{!! $value->indikator !!}</td>
                                    <td>{{ $value->skor }}</td>
                                    <td>{!! $value->catatan !!}</td>
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



