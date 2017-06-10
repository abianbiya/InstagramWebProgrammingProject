@extends('/layouts/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Peran</div>
                <a style="margin-top: 25px;margin-bottom: 25px;" href="{{ route('peran.insert') }}" class="btn btn-danger"> Tambah Peran </a>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>ID Peran</th>
                            <th>Nama Peran</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($peran as $row)
                            <tr>
                                <td>{{ $row->id_peran }}</td>
                                <td>{{ $row->nm_peran }}</td>
                                <td> <a href="{{ route('peran.delete', ['id' => $row->id_peran]) }}" class="btn btn-danger"> Hapus Peran </a> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
