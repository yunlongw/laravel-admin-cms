@extends('adminlte::page')

@section('title', 'Permissions')

@section('content_header')
    <h1>@lang('global.api_list.title')</h1>
@stop

@section('content')
    {!! Form::open(['method' => 'POST', 'route' => ['apis.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('request_method', 'request_method *', ['class' => 'control-label']) !!}
                    {!! Form::radio('request_method', 'POST', ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    {!! Form::label('request_method', 'POST', ['class' => 'control-label']) !!}
                    {!! Form::radio('request_method', 'GET', ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    {!! Form::label('request_method', 'GET', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('request_method'))
                        <p class="help-block">
                            {{ $errors->first('request_method') }}
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
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('url', 'url*', ['class' => 'control-label']) !!}
                    {!! Form::text('url', old('url'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('url'))
                        <p class="help-block">
                            {{ $errors->first('url') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::label('version', 'version*', ['class' => 'control-label']) !!}
                    {!! Form::text('version', old('version'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::label('headers', 'Headers*', ['class' => 'control-label']) !!}
                    {!! Form::text('headers', old('headers'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::label('request', 'request *', ['class' => 'control-label']) !!}
                    {!! Form::text('request', old('request'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('request'))
                        <p class="help-block">
                            {{ $errors->first('request') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('response', 'response *', ['class' => 'control-label']) !!}
                    {!! Form::text('response', old('response'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('response'))
                        <p class="help-block">
                            {{ $errors->first('response') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>

    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop
