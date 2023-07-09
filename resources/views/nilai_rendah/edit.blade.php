@extends('layouts.default')
@section('title', __( 'Edit Nilai Rendah' ))
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
                        <h3 class="card-title">Edit Nilai Rendah</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ URL::to('/do-update-nilai-rendah/'.$data->id) }}">
                        @csrf
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label class="form-label" for="default-01">Indikator</label>
                                <div class="form-control-wrap">
                                    <textarea class="textarea" name="indikator" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $data->indikator }}</textarea>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="form-label" for="default-02">Skor</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="skor" id="default-02" placeholder="Input Skor" value="{{ $data->skor }}" required>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="form-label" for="default-03">Catatan</label>
                                <div class="form-control-wrap">
                                     <textarea class="textarea" name="catatan" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $data->catatan }}</textarea>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection