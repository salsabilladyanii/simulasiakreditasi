@extends('layouts.default')
@section('title', __( 'Penilaian' ))
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
                    <h3 class="card-title">Data Penilaian</h3>
                    <a href="{{ URL::to('/tambah-penilaian') }}" class="btn btn-primary" style="float: right;">Tambah Penilaian</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px;">No</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Reviewer</th>
                                <th>Jenis Kegiatan</th>
                                <th>TS</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data AS $key => $value)
                            <?php $old_date_timestamp = strtotime($value->created_at); ?>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date('Y-m-d', $old_date_timestamp) }}</td>
                                    <td>{{ $value->nama }}</td>
                                    <td>
                                        @if($value->kegiatan == 1)
                                            Pengajuan Dokumen
                                        @else
                                            Revisi Dokumen
                                        @endif
                                    </td>
                                    <td>{{ $value->ts }}</td>
                                    <td>
                                        @if($value->status == 0)
                                            Proses Pengajuan Dokumen
                                        @elseif($value->status == 1)
                                            Dalam Penilaian Akreditasi
                                        @else
                                            Selesai
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::to('dokumen/'.$value->lembaga_akreditasi.'/'.$value->id) }}" class="btn btn-success" title="Upload Dokumen"><i class="fa fa-book"></i></a>
                                        <a href="{{ URL::to('edit-penilaian/'.$value->id) }}" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="{{ URL::to('delete-penilaian/'.$value->id) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin.?')" title="Hapus"><i class="fa fa-trash"></i></a>
                                        @if($value->status != 2)
                                        <a href="#modalNilai" data-toggle="modal" title="Lihat hasil Penilaian" class="btn btn-warning"><i class="fa fa-check-square"></i></a>
                                        @else
                                        <a href="{{ URL::to('hasil-penilaian-akreditasi/'.$value->id) }}" title="Lihat hasil Penilaian" class="btn btn-warning"><i class="fa fa-check-square"></i></a>
                                        @endif
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
<div id="modalNilai" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="text-align: center;">
                <p>Sedang dalam proses penilaian akreditasi</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@endsection


