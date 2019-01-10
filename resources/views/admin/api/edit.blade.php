@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
    <h3 class="page-title">User List</h3>
@stop
@section('content')
    <h3 class="page-title">@lang('global.users.title')</h3>

    {!! Form::model($info, ['method' => 'PUT', 'route' => ['users.update', $info->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('headers', 'Headers*', ['class' => 'control-label']) !!}
                    {!! Form::text('headers', old('headers'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('headers'))
                        <p class="help-block">
                            {{ $errors->first('headers') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('version', 'version*', ['class' => 'control-label']) !!}
                    {!! Form::text('version', old('version'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('version'))
                        <p class="help-block">
                            {{ $errors->first('version') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('check_token', 'check_token *', ['class' => 'control-label']) !!}
                    {!! Form::radio('check_token', 1, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    {!! Form::label('check_token', 'yes', ['class' => 'control-label']) !!}
                    {!! Form::radio('check_token', 0, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    {!! Form::label('check_token', 'no', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('check_token'))
                        <p class="help-block">
                            {{ $errors->first('check_token') }}
                        </p>
                    @endif
                </div>
            </div>


        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

