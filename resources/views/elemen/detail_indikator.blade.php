<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover dataTable">
        <thead>
            <tr>
                <th style="width: 10px;">No</th>
                <th>Nama Elemen</th>
                <th>Indikator</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($data AS $key => $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->elemen }}</td>
                    <td>{{ $value->indikator }}</td>
                    <td>
                        <a href="{{ URL::to('edit-indikator/'.$value->id_indikator) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ URL::to('delete-indikator/'.$value->id_indikator) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>