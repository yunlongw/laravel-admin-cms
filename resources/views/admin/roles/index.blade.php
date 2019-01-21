@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
    <p>
        <a href="{{ route('roles.create') }}" class="btn btn-success">Add</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            list
        </div>

        <div class="panel-body table-responsive">

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>guard_name</th>
                    <th>permissions</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @if(count($roles) > 0)
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->name}}</td>
                            <td>{{$role->guard_name}}</td>
                            <td>
                                @foreach ($role->permissions()->pluck('name') as $permission)
                                    <span class="label label-info label-many">{{ $permission }}</span>
                                @endforeach
                            </td>
                            <td>{{$role->created_at}}</td>
                            <td>{{$role->updated_at}}</td>
                            <td>
                                <a href="{{ route('roles.edit',[$role->id]) }}" class="btn btn-xs btn-info">edit</a>

                                {!! Form::open(array(
                                    'style' => 'display: inline-block;',
                                    'method' => 'DELETE',
                                    'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                    'route' => ['roles.destroy', $role->id])) !!}
                                {!! Form::submit(trans('delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>guard_name</th>
                    <th>permissions</th>
                    <th>created_at</th>
                    <th>updated_at</th>
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
