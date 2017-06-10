@extends('/layouts/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User Peran</div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('user.peran.update.process') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_user" value="{{ $user->id }}">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Nama User</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" disabled="" name="namauser" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Peran</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="peran">
                                    @foreach ($peran as $row)
                                        <option value="{{ $row->id_peran }}">
                                            {{ $row->nm_peran }}
                                        </option>
                                    @endforeach
                                </select>
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