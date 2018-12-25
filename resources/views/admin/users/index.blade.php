@extends('adminlte::page')

@section('title', 'UserList')

@section('content_header')
    <h3 class="page-title">User List</h3>
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
                            <td>{{$user->token}}</td>
                            <td></td>
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

@section('adminlte_js')
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection