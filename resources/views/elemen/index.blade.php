@extends('layouts.default')
@section('title', __( 'Elemen Indikator Penilaian' ))
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
                    <h3 class="card-title">Data Elemen Indikator Penilaian</h3>
                    <a href="#modalAddElemen" data-toggle="modal" class="btn btn-success" style="float: right;">Tambah Elemen</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px;">No</th>
                                <th>Lembaga</th>
                                <th>Elemen</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data AS $key => $value)
                            <?php $old_date_timestamp = strtotime($value->created_at); ?>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($value->id_lembaga == 1)
                                            BAN-PT
                                        @elseif($value->id_lembaga == 2)
                                            LAMTEKNIK
                                        @elseif($value->id_lembaga == 3)
                                            LAMINFOKOM
                                        @elseif($value->id_lembaga == 4)
                                            LAMPTKES
                                        @else
                                            LAMSAMA
                                        @endif
                                    </td>
                                    <td>{{ $value->elemen }}</td>
                                    <td>
                                        <a href="#modalEditElemen_{{ $value->id }}" data-toggle="modal" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="{{ URL::to('delete-elemen-indikator/'.$value->id.'/'.$id_lembaga) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin.?')" title="Delete"><i class="fa fa-trash"></i></a>

                                        <a href="{{ URL::to('do-add-indikator/'.$value->id) }}" class="btn btn-success" title="Detail"><i class="fa fa-book"></i></a>
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

<!-- Modal -->
<div id="modalAddElemen" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form method="post" action="{{ URL::to('do-add-elemen') }}">
                @csrf
                <input type="hidden" name="id_lembaga" value="{{ $id_lembaga }}">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Elemen Penilaian</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="default-01">Nama Elemen</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="elemen" id="default-01" placeholder="Input Nama Elemen">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" >Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
            
        </div>

    </div>
</div>
@foreach($data AS $keys => $values)
<!-- Modal -->
<div id="modalEditElemen_{{ $values->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form method="post" action="{{ URL::to('do-update-elemen/'.$values->id) }}">
                @csrf
                <input type="hidden" name="id_lembaga" value="{{ $id_lembaga }}">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Elemen Penilaian</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="default-01">Nama Elemen</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="elemen" id="default-01" value="{{ $values->elemen }}" placeholder="Input Nama Elemen">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" >Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
            
        </div>

    </div>
</div>
@endforeach
@endsection


