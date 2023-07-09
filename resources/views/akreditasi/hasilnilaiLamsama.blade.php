<?php 
use App\Models\Indikator;
use App\Models\Elemen;
?>
@extends('layouts.default')
@section('title', __( 'Hasil Akreditasi' ))
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
                    <h3 class="card-title">Penilaian Asemen kecukupan Akreditas Program Studi Program Sarjana</h3>
                    
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Indikator Penilaian</th>
                                <th>Catatan</th>
                                <th>Skor</th>
                                <th>Bobot</th>
                                <th>Nilai (Skor x Bobot)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sumA = 0; $sumBA = []; @endphp
                            @foreach($nilaiLamsama as $key => $value)
                            <?php $dataE = Elemen::join('indikator as i','i.id_elemen','elemen.id')->select('elemen.*','i.bobot')->where('elemen.id', $key)->first();
                            ?>
                            @if(is_array($value))
                            @php $sumB = 0;  @endphp
                                @foreach($value as $keys => $values)
                                <?php 
                                $dataI = Indikator::join('elemen as e','e.id','indikator.id_elemen')->select('indikator.*','e.elemen')->where('indikator.id', $keys)->first();
                                $sum1 = $values * $dataI->bobot;
                                $sumBA[] = $sum1;
                                $sumB += $sum1;?>
                            <tr>
                                <td><b>{{ $dataI->elemen }}</b><br>{!! $dataI->indikator !!}</td>
                                <td></td>
                                <td>{{ $values }}</td>
                                <td>{{ $dataI->bobot }}</td>
                                <td>{{ number_format($sum1,2) }}</td>
                            </tr>

                                @endforeach
                            @else
                            <?php $sum = $value*$dataE->bobot; ?>
                            <?php $sumA += $sum ; ?>
                            <tr>
                                <td>{{ $dataE->elemen }}</td>
                                <td></td>
                                <td>{{ $value }}</td>
                                <td>{{ $dataE->bobot }}</td>
                                <td>{{ number_format($sum,2) }}</td>
                            </tr>
                            @endif
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total</th>
                                <td colspan="2">{{ $sumA + array_sum($sumBA) }}</td>
                            </tr>
                            <tr>
                                <th colspan="3">Syarat Perlu Peringkat Unggul : </th>
                                <th colspan="2">
                                    <?php if($syarat[198] == 'Terpenuhi'){
                                        echo '<span style="background: greenyellow;padding: 5px;color: white;">Terpenuhi</span>';
                                    }else{
                                        echo '<span style="background: red;padding: 5px;color: white;">Tidak Terpenuhi</span>';
                                    } ?>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3">Syarat Perlu Peringkat Baik Sekali : </th>
                                <th colspan="2">
                                    <?php if($syarat2[217] == 'Terpenuhi' AND $syarat2[258] == 'Terpenuhi'){
                                        echo '<span style="background: greenyellow;padding: 5px;color: white;">Terpenuhi</span>';
                                    }else{
                                        echo '<span style="background: red;padding: 5px;color: white;">Tidak Terpenuhi</span>';
                                    } ?>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


