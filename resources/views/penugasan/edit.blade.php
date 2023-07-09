@extends('layouts.default')
@section('title', __( 'Update Penugasan' ))
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
                        <h3 class="card-title">Update Penugasan</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ URL::to('/do-update-penugasan/') }}">
                        @csrf
                        <input type="hidden" name="id_penilaian" value="{{ $data->id }}">
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
                                <label class="form-label" for="default-01">Reviewer</label>
                                <div class="form-control-wrap">
                                    <select class="form-control" name="id_reviewer" required>
                                        <option value="" selected disabled>-- Pilih Reviewer --</option>
                                        @foreach($dataReviewer as $keys => $datas)
                                        <option value="{{ $datas->id }}" 
                                            <?php 
                                            if(!empty($dataPenugasan)){ 
                                                if($dataPenugasan->id_reviewer == $datas->id){echo 'selected';}
                                            } ?>>{{ $datas->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tugaskan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
            <!-- /.card -->
@endsection