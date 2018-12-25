@extends('adminlte::page')

@section('title', 'Permissions')

@section('content_header')
    <h1>Permissions</h1>
@stop

@section('content')
    <p>
        <a href="#" class="btn btn-success">Add User</a>
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
                            <td></td>
                        </tr>
                    @endforeach
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