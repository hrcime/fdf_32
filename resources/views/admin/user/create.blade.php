@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('layout.user.t-create') }}</div>
                    <div class="panel-body">
                        @include('error')
                        {{ Form::open(['class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'role' => 'form', 'method' => 'POST', 'route' => 'admin.user.store']) }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('name', trans('layout.user.f-name'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::text('name', old('name'), ['class' => 'form-control', 'required']) }}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{ Form::label('email', trans('layout.user.f-email'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::email('email', old('email'), ['class' => 'form-control']) }}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{ Form::label('password', trans('layout.user.f-password'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::password('password', ['class' => 'form-control', 'required']) }}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('password_confirmation', trans('layout.user.f-confirm-password'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'required']) }}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            {{ Form::label('phone', trans('layout.user.f-phone'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::text('phone', old('phone'), ['class' => 'form-control']) }}
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            {{ Form::label('address', trans('layout.user.f-address'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('address', old('address'), ['class' => 'form-control']) }}
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            {{ Form::label('avatar', trans('layout.user.f-avatar'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-8">
                                {{ Form::file('avatar') }}
                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('is_admin') ? ' has-error' : '' }}">
                            {{ Form::label('is_admin', trans('layout.user.f-admin'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                    {{ Form::select('is_admin', ['0' => trans('layout.user.member'), '1' => trans('layout.user.admin')], old('is_admin', '0'), ['class' => 'form-control']) }}
                                @if ($errors->has('is_admin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('is_admin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::submit(trans('layout.user.b-create'), ['class' => 'btn btn-primary']) }}
                                <a href="{{ route('admin.user.index') }}" class="btn bg-info">{{ trans('layout.user.b-back') }}</a>
                            </div>
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
