@extends('/layouts/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Insert Peran</div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('peran.insert.process') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">ID Peran</label>
                            <div class="col-sm-1">
                                <input type="number" class="form-control" placeholder="ID" name="id_peran">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Nama Peran</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="Inputkan Nama Peran" name="nm_peran">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection