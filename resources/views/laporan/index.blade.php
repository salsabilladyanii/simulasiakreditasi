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

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px;" rowspan="3">No</th>
                                <th rowspan="3">Jurusan</th>
                                <th rowspan="3">Prodi</th>
                                <th rowspan="3">Jml Dosen</th>
                                <th colspan="6">Syarat Dokter dan Lektor</th>
                                <th rowspan="3">Target Akreditasi</th>
                                <th rowspan="3">Tahun Reakreditasi</th>
                                <th rowspan="3">Tgl Akreditasi</th>
                                <th rowspan="3">Tgl Kadaluarsa</th>
                                <th rowspan="3">Lembaga</th>
                                <th rowspan="3">Nilai</th>
                            </tr>
                            <tr>
                                <th colspan="3">Jumlah Dosen</th>
                                <th colspan="3">Jumlah Dosen</th>
                            </tr>
                            <tr>
                                <th>Sekarang</th>
                                <th>Target</th>
                                <th>Kekurangan</th>
                                <th>Sekarang</th>
                                <th>Target</th>
                                <th>Kekurangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data AS $key => $value)
                            <?php $old_date_timestamp = strtotime($value->created_at); ?>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->jurusan }}</td>
                                <td>{{ $value->nama_prodi }}</td>
                                <td>{{ $value->jml_dosen }}</td>
                                <td>{{ $value->jml_doktor_sekarang }}</td>
                                <td>{{ $value->jm_doktor_target }}</td>
                                <td>{{ $value->jml_doktor_kekurangan }}</td>
                                <td>{{ $value->jml_lektor_sekarang }}</td>
                                <td>{{ $value->jml_lektor_target }}</td>
                                <td>{{ $value->jml_lektor_kekurangan }}</td>
                                <td>{{ $value->target_akreditasi }}</td>
                                <td>{{ $value->thn_reakreditasi }}</td>
                                <td>{{ $value->tgl_akreditasi }}</td>
                                <td>{{ $value->tgl_kadaluarsa }}</td>
                                <td>
                                    @if($value->lembaga_akreditasi == 1)
                                    BAN-PT
                                    @elseif($value->lembaga_akreditasi == 2)
                                    LAMTEKNIK
                                    @elseif($value->lembaga_akreditasi == 3)
                                    LAMINFOKOM
                                    @elseif($value->lembaga_akreditasi == 4)
                                    LAMPTKES
                                    @else
                                    LAMSAMA
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($value->jurusan))
                                    <a href="{{ URL::to('hasil-penilaian-akreditasi/'.$value->nilai_id) }}" class="btn btn-success">Lihat</a>
                                    @else
                                    <a href="{{ URL::to('tambah-laporan/'.$value->nilai_id) }}" class="btn btn-success">Lihat</a>
                                    @endif
                                    <a href="{{ URL::to('delete-laporan-penilaian/'.$value->nilai_id) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
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

@endsection