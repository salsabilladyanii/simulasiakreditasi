@extends('layouts.default')
@section('title', __( 'Penugasan' ))
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
                    <h3 class="card-title">Data Penugasan</h3>
                    
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px;">No</th>
                                <th>Nama Program Studi</th>
                                <th>Lembaga</th>
                                <th>Unit Pengelola</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Reviewer</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data AS $key => $value)
                            <?php $old_date_timestamp = strtotime($value->created_at); ?>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->nama_prodi }}</td>
                                    <td>
                                        @if($value->lembaga_akreditasi == 1)
                                            BAN-PT
                                        @elseif($value->lembaga_akreditasi == 2)
                                            LAMTEKNIK
                                        @elseif($value->lembaga_akreditasi == 3)
                                            LAMINFOKOM
                                        @elseif($value->lembaga_akreditasi == 4)
                                            LAMPTKES
                                        @else
                                            LAMSAMA
                                        @endif
                                    </td>
                                    <td>{{ $value->unit_pengelola }}</td>
                                    <td>{{ date('Y-m-d', $old_date_timestamp) }}</td>
                                    <td>{{ $value->nama }}</td>
                                    <td>
                                       
                                        <a href="{{ URL::to('edit-penugasan/'.$value->id) }}" class="btn btn-primary">Detail</a>
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


