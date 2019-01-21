@extends('adminlte::page')

@section('title', 'UserList')

@section('content_header')
    <h3 class="page-title">User List</h3>
@stop

@section('content')
    <p>
        <a href="{{ route("users.create") }}" class="btn btn-success">Add User</a>
    </p>

    @if($errors->has('message'))
        <div class="alert alert-error">
            <a class="close" data-dismiss="alert">×</a>
            <strong>Error!</strong> {{ $errors->first('message') }}
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            <p class="help-block">
                List
            </p>
        </div>
        <div class="panel-body table-responsive">

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Token</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @if(count($users) > 0)
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach ($user->roles()->pluck('name') as $role)
                                    <span class="label label-info label-many">{{ $role }}</span>
                                @endforeach
                            </td>
                            <td>

                                <a href="{{ route('users.edit',[$user->id]) }}"
                                   class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                @if($user->id != 1)
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['users.destroy', $user->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Token</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>

        </div>

    </div>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection
