<?php use App\Models\Indikator_penilaian; ?>
<input type="hidden" name="id_lembaga" value="{{ $id_lembaga }}">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 10px;">No</th>
            <th>ELEMEN</th>
            <th>INDIKATOR</th>
            <th>PENILAIAN</th>
            <th>SKOR</th>
            <th>DESKRIPSI PENILAIAN ASESOR BERDASARKAN DATA DAN INFORMASI DARI DOKUMEN LED DAN LKPS</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data AS $key => $value)
            <?php
            $dataInd = Indikator_penilaian::where('id_indikator', $value->id)->get();
            $count = count($dataInd);
            ?>
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->elemen }}</td>
                <td>{!! $value->indikator !!}</td>
                <td>
                    <ul>
                        @foreach($dataInd as $keys => $values)
                        <li><b>Skor {{ $values->skor }}</b> <br> {!! $values->indikator_penilaian !!}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <input type="number" name="skor[{{ $value->id_elemen }}]" min="0" max="4" class="form-control" required>
                </td>
                <td>
                     <textarea class="textarea" name="deskripsi[{{ $value->id_elemen }}]" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>