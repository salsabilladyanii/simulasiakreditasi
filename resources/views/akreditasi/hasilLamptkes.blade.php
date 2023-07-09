<?php 
use App\Models\Indikator;
use App\Models\Elemen;
?>
@extends('layouts.default')
@section('title', __( 'Hasil Akreditasi' ))
@section('content')

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
                    <h5><b>Nilai Akreditasi, dan Peringkat Akreditasi</b></h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nilai Akreditasi (NA)</th>
                                <th>Peringkat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>NA >= 361</td>
                                <td>Unggul</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>301 <= NA < 361</td>
                                <td>Baik Sekali</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>200 <= NA < 301</td>
                                <td>Baik</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>NA < 200 </td>
                                <td>Tidak memenuhi syarat peringkat</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <?php
                    if($sumAll >= 361){
                        $syarat = 'Unggul';
                    }elseif($sumAll >= 301 AND $sumAll < 361){
                        $syarat = 'Baik Sekali';
                    }elseif($sumAll >= 200 AND $sumAll < 301){
                        $syarat = 'Baik';
                    }else{
                        $syarat = 'Tidak memenuhi syarat peringkat';
                    }
                    ?>
                    Dikarenakan Nilai Akhir {{ round($sumAll,0) }} Maka Peringkat Akreditasi <b>{{ $syarat }}</b>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection