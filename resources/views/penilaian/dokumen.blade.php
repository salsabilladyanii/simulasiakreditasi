<?php

use App\Models\Dokumen_indikator;
?>
@extends('layouts.default')
@section('title', __( 'Upload Dokumen' ))
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
                    <h3 class="card-title">Upload Dokumen</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="{{ URL::to('upload-dokumen') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_lembaga" value="{{ $id_lembaga }}">
                        <input type="hidden" name="id_penilaian" value="{{ $id_penilaian }}">
                        <div class="form-group">
                            <label class="form-label" for="default-01">LED</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" name="led" id="default-01" required accept="application/pdf">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="default-02">Tabel Isian LKPS</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" name="lkps" id="default-02" required accept=" application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="default-02">LKPS</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" name="lkps_isian" id="default-02" required accept="application/pdf">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-02">Dokumen Rekomendasi Hasil Assesmen Lapangan</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" name="dokumen" id="default-02">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="default-02">Lampiran</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" name="lampiran[]" id="default-02">
                            </div>
                        </div>
                        <div id="form-jadwal"></div>
                        <br>
                        <button type="submit" class="btn btn-primary">Upload</button>
                        <button type="button" class="btn btn-primary" onclick="add_form()">Tambah Lampiran File</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    var nongol = 0;

    function add_form() {
        nongol++;

        selection_form = '<div class="col-md-12">' +
            '<label>Lampiran</label>' +
            '<div class="form-group">' +
            '<div class="form-line">' +
            '<input type="file" id="form-field-1" class="form-control" name="lampiran[]"/>' +
            '</div>' +
            '</div>' +
            '</div>'
        $('#form-jadwal').append(selection_form);
    }
</script>
@endsection