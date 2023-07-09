@extends('layouts.default')
@section('title', __( 'Edit Penilaian' ))
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
                        <h3 class="card-title">Edit Penilaian</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ URL::to('/do-update-penilaian/'.$data->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label class="form-label" for="default-01">Nama Perguruan Tinggi</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="nama_pt" id="default-01" placeholder="Input Nama Perguruan Tinggi" value="{{ $data->nama_pt }}">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="form-label" for="default-02">Nama Unit Pengelola</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="unit_pengelola" id="default-02" placeholder="Input Nama Unit Pengelola" value="{{ $data->unit_pengelola }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-02">Nama Program Studi</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="nama_prodi" id="default-02" placeholder="Input Nama Program Studi" value="{{ $data->nama_prodi }}">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="form-label" for="default-04">Lembaga Akreditasi</label>
                                <div class="form-control-wrap">
                                    <select class="form-control" name="lembaga_akreditasi" required>
                                        <option value="" selected disabled>-- Pilih Lembaga Akreditasi --</option>
                                        <option value="1" <?php if($data->lembaga_akreditasi == 1){echo 'selected';} ?>>BAN-PT</option>
                                        <option value="2" <?php if($data->lembaga_akreditasi == 2){echo 'selected';} ?>>LAMTEKNIK</option>
                                        <option value="3" <?php if($data->lembaga_akreditasi == 3){echo 'selected';} ?>>LAMINFOKOM</option>
                                        <option value="4" <?php if($data->lembaga_akreditasi == 4){echo 'selected';} ?>>LAMPTKES</option>
                                        <option value="5" <?php if($data->lembaga_akreditasi == 5){echo 'selected';} ?>>LAMSAMA</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-04">TS</label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" name="ts" id="default-04" placeholder="Input TS" required value="{{ $data->ts }}">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label" for="default-01">Kegiatan</label>
                                <div class="form-control-wrap">
                                    <select class="form-control" name="kegiatan" required>
                                        <option value="" selected disabled>-- Pilih Kegiatan --</option>
                                        <option value="1" <?php if($data->kegiatan == 1){echo 'selected';} ?>>Pengajuan Dokumen</option>
                                        <option value="2" <?php if($data->kegiatan == 2){echo 'selected';} ?>>Revisi Dokumen</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
            <!-- /.card -->
@endsection