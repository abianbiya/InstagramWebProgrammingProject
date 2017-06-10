@extends('/layouts/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>
                <a style="margin-top: 25px;margin-bottom: 25px;margin-left: 25px;" href="{{ route('menu.insert') }}" class="btn btn-primary"> Tambah Menu </a>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>ID Menu</th>
                            <th>Group Menu</th>
                            <th>Nama Menu</th>
                            <th>Route Name</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($menu as $row)
                            <tr>
                                <td>{{ $row->id_menu }}</td>
                                <td>{{ $row->nm_group_menu }}</td>
                                <td>{{ $row->nm_menu }}</td>
                                <td>{{ $row->route }}</td>
                                <td>
                                    <a href="{{ route('menu.kewenangan', ['id' => $row->id_menu]) }}" class="btn btn-primary"> Kewenangan </a>
                                    <a href="{{ route('menu.delete', ['id' => $row->id_menu]) }}" class="btn btn-danger"> Hapus Menu </a>
                                </td>
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
