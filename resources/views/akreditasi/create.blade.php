@extends('layouts.default')
@section('title', __( 'Tambah Akreditasi' ))
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
                        <h3 class="card-title">Tambah Akreditasi</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ URL::to('/do-add-akreditasi') }}">
                        @csrf
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label class="form-label" for="default-01">Nama Perguruan Tinggi</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="nama_pt" id="default-01" placeholder="Input Nama Perguruan Tinggi">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="form-label" for="default-02">Nama Unit Pengelola</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="unit_pengelola" id="default-02" placeholder="Input Nama Unit Pengelola">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="form-label" for="default-03">Nama Program Studi</label>
                                <div class="form-control-wrap">
                                    <select class="form-control" name="id_prodi" required>
                                        <option value="" selected disabled>-- Pilih Program Studi --</option>
                                        @foreach($dataProdi as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->prodi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="form-label" for="default-04">Lembaga Akreditasi</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="lembaga_akreditasi" id="default-04" placeholder="Input Lembaga Akreditasi">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-04">TS</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="ts" id="default-04" placeholder="Input TS" required>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="form-label" for="default-01">Dokumen</label>
                                <div class="form-control-wrap">
                                    <select class="form-control" name="dokumen" required>
                                        <option value="" selected disabled>-- Pilih Dokumen --</option>
                                        <option value="LED">LED</option>
                                        <option value="LKPS">LKPS</option>
                                        <option value="Kertas Kerja">Kertas Kerja</option>
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