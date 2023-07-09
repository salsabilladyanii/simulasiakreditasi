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
                    <h5><b>Bobot Bagian / Kriteria</b></h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kriteria</th>
                                <th>Jumlah Butir</th>
                                <th>Bobot dari 400</th>
                                <th>Bobot %</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A</td>
                                <td>Kondisi Internal</td>
                                <td>1</td>
                                <td>6</td>
                                <td>1.5 %</td>
                            </tr>
                            <tr>
                                <td>B</td>
                                <td>Profil Unit Pengelola Program Studi</td>
                                <td>1</td>
                                <td>6</td>
                                <td>1.5 %</td>
                            </tr>
                            <tr>
                                <td>C.1</td>
                                <td>Visi, Misi, Tujuan dan Strategi</td>
                                <td>9</td>
                                <td>4</td>
                                <td>1.0 %</td>
                            </tr>
                            <tr>
                                <td>C.2</td>
                                <td>Tata Pamong, Tata Kelola, dan Kerjasama</td>
                                <td>11</td>
                                <td>20</td>
                                <td>5.0 %</td>
                            </tr>
                            <tr>
                                <td>C.3</td>
                                <td>Mahasiswa</td>
                                <td>9</td>
                                <td>14</td>
                                <td>3.5 %</td>
                            </tr>
                            <tr>
                                <td>C.4</td>
                                <td>Sumber Daya Manusia</td>
                                <td>11</td>
                                <td>30</td>
                                <td>7.5 %</td>
                            </tr>
                            <tr>
                                <td>C.5</td>
                                <td>Keuangan, Sarana dan Prasarana</td>
                                <td>7</td>
                                <td>22</td>
                                <td>5.5 %</td>
                            </tr>
                            <tr>
                                <td>C.6</td>
                                <td>Pendidikan</td>
                                <td>15</td>
                                <td>30</td>
                                <td>7.5 %</td>
                            </tr>
                            <tr>
                                <td>C.7</td>
                                <td>Penelitian</td>
                                <td>11</td>
                                <td>16</td>
                                <td>4.0 %</td>
                            </tr>
                            <tr>
                                <td>C.8</td>
                                <td>Pengabdian kepada Masyarakat </td>
                                <td>11</td>
                                <td>12</td>
                                <td>3.0 %</td>
                            </tr>
                            <tr>
                                <td>C.9</td>
                                <td>Luaran dan Capaian</td>
                                <td>17</td>
                                <td>208</td>
                                <td>52.0 %</td>
                            </tr>
                            <tr>
                                <td>D</td>
                                <td>Suplemen Program Studi</td>
                                <td>5</td>
                                <td>20</td>
                                <td>5.0 %</td>
                            </tr>
                            <tr>
                                <td>E</td>
                                <td>Analisis dan penetapan program pengembangan</td>
                                <td>4</td>
                                <td>12</td>
                                <td>3.0 %</td>
                            </tr>

                        </tbody>
                    </table>
                    <hr>
                    <h5><b>Persentase Input, Proses, Output</b></h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Jenis</th>
                                <th>Jumlah Butir</th>
                                <th>Jumlah Bobot</th>
                                <th>Presentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Input</td>
                                <td>42</td>
                                <td>64</td>
                                <td>16.0 %</td>
                            </tr>
                            <tr>
                                <td>Proses</td>
                                <td>63</td>
                                <td>162</td>
                                <td>40.5 %</td>
                            </tr>
                            <tr>
                                <td>Output</td>
                                <td>7</td>
                                <td>174</td>
                                <td>43.5 %</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
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
                    if ($sumAll >= 361) {
                        $syarat = 'Unggul';
                    } elseif ($sumAll >= 301 and $sumAll < 361) {
                        $syarat = 'Baik Sekali';
                    } elseif ($sumAll >= 200 and $sumAll < 301) {
                        $syarat = 'Baik';
                    } else {
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