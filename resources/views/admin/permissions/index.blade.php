@extends('adminlte::page')

@section('content_header')
    <h1>@lang('global.permissions.title')</h1>
@stop

@section('content')
    <p>
        <a href="{{ route('permissions.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
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
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @if(count($permissions) > 0)
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->guard_name}}</td>
                            <td>{{$permission->created_at}}</td>
                            <td>{{$permission->updated_at}}</td>
                            <td>
                                <a href="{{ route('permissions.edit',[$permission->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                {!! Form::open(array(
                                    'style' => 'display: inline-block',
                                    'method' => 'DELETE',
                                    'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."')",
                                    'route' => ['permissions.destroy', $permission->id],
                                )) !!}
                                {!! Form::submit(trans("global.app_delete"), array('class'=> 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">@lang('global.app_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>guard_name</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>

        </div>

    </div>
@stop

@section('adminlte_js')
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection