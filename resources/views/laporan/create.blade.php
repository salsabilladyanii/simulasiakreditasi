@extends('layouts.default')
@section('title', __( 'Laporan' ))
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
                    <h3 class="card-title">Data Laporan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="{{ URL::to('do-add-laporan') }}">
                        @csrf
                        <input type="hidden" name="penilaian_id" value="{{ $id_nilai }}">
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label class="form-label" for="default-01">Jurusan</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="jurusan" id="default-01" placeholder="Input Jurusan">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="form-label" for="default-02">Prodi</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="prodi_id" id="default-02" placeholder="Input Prodi" value="{{ $data->nama_prodi }}" readonly>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="form-label" for="default-03">Jumlah Dosen</label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" name="jml_dosen" id="default-03" placeholder="Input Jumlah Dosen">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5>Syarat Doktor</h5>
                                    <hr>
                                    <div class="form-group">
                                        <label class="form-label" for="default-03">Jumlah Sekarang</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="jml_doktor_sekarang" id="default-03" placeholder="Input Jumlah Sekarang">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="default-03">Jumlah Target</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="jm_doktor_target" id="default-03" placeholder="Input Jumlah Target">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="default-03">Jumlah Kekurangan</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="jml_doktor_kekurangan" id="default-03" placeholder="Input Jumlah Kekurangan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h5>Syarat Lektor</h5>
                                    <hr>
                                    <div class="form-group">
                                        <label class="form-label" for="default-03">Jumlah Sekarang</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="jml_lektor_sekarang" id="default-03" placeholder="Input Jumlah Sekarang">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="default-03">Jumlah Target</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="jml_lektor_target" id="default-03" placeholder="Input Jumlah Target">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="default-03">Jumlah Kekurangan</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="jml_lektor_kekurangan" id="default-03" placeholder="Input Jumlah Kekurangan">
                                        </div>
                                    </div>
                                </div>
                            
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-03">Target Akreditasi</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="target_akreditasi" id="default-03" placeholder="Input Target Akreditasi">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-03">Tahun Reakreditasi</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="thn_reakreditasi" id="default-03" placeholder="Input Tahun Reakreditasi">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-03">Tanggal Akreditasi</label>
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control" name="tgl_akreditasi" id="default-03" placeholder="Input Tanggal Akreditasi">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-03">Tanggal Kadaluarsa</label>
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control" name="tgl_kadaluarsa" id="default-03" placeholder="Input Tanggal Kadaluarsa">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        @if($data->lembaga_akreditasi == 1)
                            <input type="hidden" name="lembaga_id" value="1">
                        @elseif($data->lembaga_akreditasi == 2)
                            <input type="hidden" name="lembaga_id" value="2">
                        @elseif($data->lembaga_akreditasi == 3)
                            <input type="hidden" name="lembaga_id" value="3">
                        @elseif($data->lembaga_akreditasi == 4)
                            <input type="hidden" name="lembaga_id" value="4">
                        @else
                            <input type="hidden" name="lembaga_id" value="5">
                        @endif
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Selesai</button>
                        </div>
                    </form>
                                
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


