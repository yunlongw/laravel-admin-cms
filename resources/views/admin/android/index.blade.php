@extends('adminlte::page')

@section('title', 'DashBoard')

@section('content_header')
    <h3 class="page-title">
        Api 管理
        <small>Control panel</small>
    </h3>
@stop

@section('content')
    <p>
        <a href="{{ route('apis.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            list
        </div>

        <div class="panel-body table-responsive">

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>更新内容</th>
                    <th>内部版本号</th>
                    <th>客户端版本</th>
                    <th>是否强制更新</th>
                    <th>下载地址</th>
                    <th>创建时间</th>
                    <th>更新时间</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @if(count($apis) > 0)
                    @foreach ($apis as $api)
                        <tr>
                            <td>{{$api->name}}</td>
                            <td>{{$api->guard_name}}</td>
                            <td>{{$api->created_at}}</td>
                            <td>{{$api->updated_at}}</td>
                            <td>{{$api->updated_at}}</td>
                            <td>{{$api->updated_at}}</td>
                            <td>{{$api->updated_at}}</td>
                            <td>{{$api->updated_at}}</td>
                            <td></td>
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
                    <th>序号</th>
                    <th>更新内容</th>
                    <th>内部版本号</th>
                    <th>客户端版本</th>
                    <th>是否强制更新</th>
                    <th>下载地址</th>
                    <th>创建时间</th>
                    <th>更新时间</th>
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