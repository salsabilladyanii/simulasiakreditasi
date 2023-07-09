@extends('layouts.default')
@section('title', __( 'Tambah Penilaian' ))
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
                        <h3 class="card-title">Tambah Penilaian</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ URL::to('/do-add-penilaian') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label class="form-label" for="default-01">Nama Perguruan Tinggi</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="nama_pt" id="default-01" placeholder="Input Nama Perguruan Tinggi" value="Institut Teknologi Sumatera" readonly>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="form-label" for="default-02">Nama Unit Pengelola</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="unit_pengelola" id="default-02" placeholder="Input Nama Unit Pengelola">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-02">Nama Program Studi</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="nama_prodi" id="default-02" placeholder="Input Nama Program Studi" value="{{ $detailData->nama }}" readonly>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="form-label" for="default-04">Lembaga Akreditasi</label>
                                <div class="form-control-wrap">
                                    <select class="form-control" name="lembaga_akreditasi" required>
                                        <option value="" selected disabled>-- Pilih Lembaga Akreditasi --</option>
                                        <option value="1">BAN-PT</option>
                                        <option value="2">LAMTEKNIK</option>
                                        <option value="3">LAMINFOKOM</option>
                                        <option value="4">LAMPTKES</option>
                                        <option value="5">LAMSAMA</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-04">TS</label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" name="ts" id="default-04" placeholder="Input TS" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label" for="default-01">Kegiatan</label>
                                <div class="form-control-wrap">
                                    <select class="form-control" name="kegiatan" required>
                                        <option value="" selected disabled>-- Pilih Kegiatan --</option>
                                        <option value="1">Pengajuan Dokumen</option>
                                        <option value="2">Revisi Dokumen</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
            <!-- /.card -->
@endsection