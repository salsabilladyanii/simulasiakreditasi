@extends('layouts.default')
@section('title', __( 'indikator Indikator Penilaian' ))
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
                    <h3 class="card-title">Data indikator Indikator Penilaian</h3>
                    <a href="#modalAddIndikator" data-toggle="modal" class="btn btn-success" style="float: right;">Tambah Indikator Penilaian</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th>Nama Indikator</th>
                                    <th>Indikator Penilaian</th>
                                    <th>Skor</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data AS $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! $value->indikator !!}</td>
                                        <td>{!! $value->indikator_penilaian !!}</td>
                                        <td>{{ $value->skor }}</td>
                                        <td>
                                            <a href="#modalEditIndikator_{{ $value->id }}" data-toggle="modal" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="{{ URL::to('penilaian-delete-indikator-penilaian/'.$value->id.'/'.$id_indikator) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin.?')" title="Delete"><i class="fa fa-trash"></i></a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div id="modalAddIndikator" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form method="post" action="{{ URL::to('penilaian-do-add-indikator-penilaian') }}">
                @csrf
                <input type="hidden" name="id_indikator" value="{{ $id_indikator }}">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Indikator Penilaian</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="default-01">Nama Indikator Penialian</label>
                        <div class="form-control-wrap">
                            <textarea class="textarea" name="indikator_penilaian" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="default-01">Skor Indikator Penialian</label>
                        <div class="form-control-wrap">
                            <input type="number" name="skor" class="form-control" required>
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
<div id="modalEditIndikator_{{ $values->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form method="post" action="{{ URL::to('penilaian-do-update-indikator-penilaian/'.$values->id) }}">
                @csrf
                <input type="hidden" name="id_indikator" value="{{ $id_indikator }}">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Indikator Penilaian</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="default-01">Nama Indikator Penilaian</label>
                        <div class="form-control-wrap">
                            <textarea class="textarea" name="indikator_penilaian" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $values->indikator_penilaian }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="default-01">Skor Indikator Penialian</label>
                        <div class="form-control-wrap">
                            <input type="number" name="skor" class="form-control" value="{{ $values->skor }}" required>
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

