@extends('/layouts/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Update Kewenangan</div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('menu.kewenangan.update.process') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_menu" value="{{ $menu->id_menu }}">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Peran User</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="id_peran">
                                    @foreach ($peran as $row)
                                    <option value="{{ $row->id_peran }}"> {{ $row->nm_peran }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <legend>Priviledges</legend>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label"> Create </label>
                            <div class="col-sm-7 input-group">
                                <input type="radio" name="create" value="0" checked=""> No
                                <input type="radio" name="create" value="1"> Yes
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label"> Read </label>
                            <div class="col-sm-7 input-group">
                                <input type="radio" name="read" value="0" checked=""> No
                                <input type="radio" name="read" value="1"> Yes
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label"> Update </label>
                            <div class="col-sm-7 input-group">
                                <input type="radio" name="update" value="0" checked=""> No
                                <input type="radio" name="update" value="1"> Yes
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label"> Delete </label>
                            <div class="col-sm-7 input-group">
                                <input type="radio" name="delete" value="0" checked=""> No
                                <input type="radio" name="delete" value="1"> Yes
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