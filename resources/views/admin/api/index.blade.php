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

            <table id="admin-api-index-example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>名称</th>
                    <th>版本</th>
                    <th>类型</th>
                    <th>请求地址</th>
                    <th>检查token</th>
                    <th>创建时间</th>
                    <th>更新时间</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @if(count($api_list) > 0)
                    @foreach ($api_list as $api)
                        <tr>
                            <td>{{$api->id}}</td>
                            <td>{{$api->name}}</td>
                            <td>{{$api->version}}</td>
                            <td>{{$api->request_method}}</td>
                            <td>
                                <button class="btn clipboard_btn btn-default" data-clipboard-text="{{$api->url}}">
                                    {{$api->url}}
                                </button>
                            </td>
                            <td>
                                @if ($api->check_token == 1)
                                    <span class="label label-success">yes</span>
                                @else
                                    <span class="label label-danger">no</span>
                                @endif
                            </td>
                            <td>{{$api->updated_at}}</td>
                            <td>{{$api->updated_at}}</td>
                            <td>
                                <a href="{{ route('apis.edit',[$api->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                {!! Form::open(array(
                                    'style' => 'display: inline-block;',
                                    'method' => 'DELETE',
                                    'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                    'route' => ['users.destroy', $api->id])) !!}
                                {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <th>序号</th>
                    <th>名称</th>
                    <th>版本</th>
                    <th>类型</th>
                    <th>请求地址</th>
                    <th>检查token</th>
                    <th>创建时间</th>
                    <th>更新时间</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>

        </div>

    </div>
@stop

@section('js')

@endsection
