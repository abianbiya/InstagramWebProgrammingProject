@extends('/layouts/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Group Menu</div>
                <a style="margin-top: 25px;margin-bottom: 25px;" href="{{ route('grup-menu.insert') }}" class="btn btn-primary"> Tambah Grup Menu </a>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>ID Group Menu</th>
                            <th>Nama Group Menu</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($menu as $row)
                            <tr>
                                <td>{{ $row->id_group_menu }}</td>
                                <td>{{ $row->nm_group_menu }}</td>
                                <td>
                                    <a href="{{ route('grup-menu.delete', ['id' => $row->id_group_menu]) }}" class="btn btn-danger"> Hapus Menu </a>
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
