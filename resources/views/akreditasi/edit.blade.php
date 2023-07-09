@extends('layouts.default')
@section('title', __( 'Edit Akreditasi' ))
@section('content')
<style type="text/css">
    .haha {
        text-decoration: none;
        color: black;
    }
</style>
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
                        <h3 class="card-title">BADAN AKREDITASI NASIONAL - PERGURUAN TINGGI AKREDITASI DI PROGRAM STUDI</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ URL::to('/do-update-akreditasi/'.$data->id) }}">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label class="form-label" for="default-01">Nama Perguruan Tinggi</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="nama_pt" id="default-01" placeholder="Input Nama Perguruan Tinggi" value="{{ $data->nama_pt }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-02">Nama Unit Pengelola</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="unit_pengelola" id="default-02" placeholder="Input Nama Unit Pengelola" value="{{ $data->unit_pengelola }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-03">Nama Program Studi</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="nama_prodi" id="default-02" placeholder="Input Nama Program Studi" value="{{ $data->nama_prodi }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-04">Lembaga Akreditasi</label>
                                <div class="form-control-wrap">
                                    @if($data->lembaga_akreditasi == 1)
                                    <input type="text" class="form-control" name="lembaga_akreditasi" id="default-02" placeholder="Input Nama Program Studi" value="BAN-PT" readonly>
                                    @elseif($data->lembaga_akreditasi == 2)
                                    <input type="text" class="form-control" name="lembaga_akreditasi" id="default-02" placeholder="Input Nama Program Studi" value="LAMTEKNIK" readonly>
                                    @elseif($data->lembaga_akreditasi == 3)
                                    <input type="text" class="form-control" name="lembaga_akreditasi" id="default-02" placeholder="Input Nama Program Studi" value="LAMINFOKOM" readonly>
                                    @elseif($data->lembaga_akreditasi == 4)
                                    <input type="text" class="form-control" name="lembaga_akreditasi" id="default-02" placeholder="Input Nama Program Studi" value="LAMPTKES" readonly>
                                    @else
                                    <input type="text" class="form-control" name="lembaga_akreditasi" id="default-02" placeholder="Input Nama Program Studi" value="LAMSAMA" readonly>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-04">TS</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="ts" id="default-04" placeholder="Input TS" required value="{{ $data->ts }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-01">Dokumen</label>
                                <div class="form-control-wrap">
                                    @if(!empty($detailDokumen))
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th>Dokumen LED</th>
                                                    <td><a href="{{ asset($detailDokumen->led) }}" class="btn btn-primary">Lihat Dokumen</a></td>
                                                </tr>
                                                <tr>
                                                    <th>Dokumen LKPS</th>
                                                    <td><a href="{{ asset($detailDokumen->lkps) }}" class="btn btn-primary">Lihat Dokumen</a></td>
                                                </tr>
                                                <tr>
                                                    <th>Dokumen Isian LKPS</th>
                                                    <td><a href="{{ asset($detailDokumen->lkps_isian) }}" class="btn btn-primary">Lihat Dokumen</a></td>
                                                </tr>
                                                <tr>
                                                    <th>Dokumen Rekomendasi Hasil Assesmen Lapangan</th>
                                                    <td><a href="{{ asset($detailDokumen->dokumen) }}" class="btn btn-primary">Lihat Dokumen</a></td>
                                                </tr>
                                                <?php $json = json_decode($detailDokumen->lampiran); ?>
                                                @foreach($json as $key => $value)
                                                <tr>
                                                    <th>Lampiran Dokumen</th>
                                                    <td><a href="{{ asset($value) }}" class="btn btn-primary">Lihat Dokumen</a></td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card card-success collapsed-card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Kertas Kerja</h3>

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                                            </button>
                                                        </div>
                                                        <!-- /.card-tools -->
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <a href="{{ URL::to('penilaian-akreditasi/'.$data->id.'/'.$data->lembaga_akreditasi) }}" class="haha">Penilaian</a>
                                                        <hr>
                                                        <a href="{{ URL::to('penilaian-nilai-rendah/'.$data->id) }}" class="haha">Nilai Rendah</a>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- / -->
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.card -->
@endsection