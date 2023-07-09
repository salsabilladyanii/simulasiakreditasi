<?php 
use App\Models\Indikator_penilaian;
use App\Models\Penilaian_akreditasi;
use App\Models\Dokumen_indikator; 
use App\Models\NilaiRendah; 
?>
@extends('layouts.default')
@section('title', __( 'Akreditasi' ))
@section('content')
<style type="text/css">
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.0);
    }
</style>
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
                    <h3 class="card-title">Penilaian Akreditasi</h3>
                    
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="{{ URL::to('simpan-nilai-akreditasi') }}">
                        @csrf
                        <input type="hidden" name="id_lembaga" value="{{ $lembaga_id }}">
                        <input type="hidden" name="id_penilaian" value="{{ $id_penilaian }}">
                        
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th>ELEMEN</th>
                                    <th>INDIKATOR</th>
                                    <th style="width:465px;">PENILAIAN & SKOR</th>
                                    <th>DESKRIPSI PENILAIAN ASESOR BERDASARKAN DATA DAN INFORMASI DARI DOKUMEN LED DAN LKPS</th>
                                    <th>NILAI MINIMAL</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($data_indikator AS $key => $value)
                                    <?php
                                    $dataInd = Indikator_penilaian::where('id_indikator', $value->id)->get();
                                    $count = count($dataInd);
                                    $cekDokumen = Dokumen_indikator::where('penilaian_id', $id_penilaian)->where('indikator_id', $value->id)->first();
                                    $nr = NilaiRendah::Where('id_elemen', $value->id_elemen)->where('id_indikator', $value->id)->first();
                                    ?>
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->elemen }}</td>
                                        <td>{!! $value->indikator !!} 
                                            @if(!empty($cekDokumen))
                                            <br>
                                            <a href="{{ asset($cekDokumen->dokumen) }}" target="_blank" style="color:red;">Lihat Dokumen</a>
                                            @endif
                                        </td>
                                        <td>
                                            <table class="table">
                                                @foreach($dataInd as $keys => $values)
                                                <?php 
                                                $dataNilai = Penilaian_akreditasi::where('id_element', $value->id_elemen)->where('id_indikator', $value->id)->first();
                                                ?>
                                                <tr>
                                                    <td>@if($values->skor <= 4 )<b>Skor {{ $values->skor }}</b> <br> @endif {!! $values->indikator_penilaian !!}</td>
                                                    
                                                        
                                                    @if($values->skor <= 4)
                                                        @if($keys == 0)
                                                        <td style="width:100px;" rowspan="{{ count($dataInd) }}">
                                                            <input type="number" name="skor[{{ $value->id_elemen.','.$values->id_indikator }}]" min="0" max="4" class="form-control" value="<?php if(!empty($dataNilai)){echo $dataNilai->nilai;} ?>" >
                                                        </td>
                                                        @endif
                                                    @else
                                                    <td style="width:100px;">
                                                        <input type="text" name="skor[{{ $value->id_elemen.','.$values->id_indikator.','.$values->id }}]"  class="form-control"  value="<?php if(!empty($dataNilai)){echo $dataNilai->nilai;} ?>">
                                                    </td>
                                                    @endif
                                                        
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                        <td>
                                            <textarea class="form-control" name="deskripsi[{{ $value->id_elemen.','.$value->id }}]" placeholder="Place some text here" style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php if(!empty($nr)){echo $nr->catatan; } ?></textarea>
                                        </td>
                                        <td>
                                            <input type="number" name="nilai_min[{{ $value->id_elemen.','.$value->id }}]" class="form-control" placeholder="Nilai Minimal">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($hitungData == $hitungData2)
                        <input type="hidden" name="selesai" value="1">
                            <button type="submit" class="btnb btn-primary">Hitung Nilai</button>
                        @else
                            <input type="hidden" name="selesai" value="2">
                            <button type="submit" class="btnb btn-primary">Simpan Nilai</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $('#id_lembaga').change(function(){
        var id_lembaga = $('#id_lembaga').val();
        $.ajax({
            url:"{{ URL::to('/detail-penilaian') }}",
            method:"GET",
            data:{id_lembaga:id_lembaga},
            success:function(data)
            {
             $('#detail-penilaian').html(data);
            }
        });
    
    });    
</script>
--}}
@endsection

