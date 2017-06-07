@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('layout.user.t-pwd-change') }}</div>
                    <div class="panel-body">
                        @if (session('success'))
                            <p class="bg-success">
                                {{ session('success') }}
                            </p>
                        @elseif (session('warning'))
                            <p class="bg-warning">
                                {{ session('warning') }}
                            </p>
                        @endif

                        {{ Form::open(['class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'route' => 'user.password']) }}

                        @if (Auth::user()->password)
                            <div class="form-group{{ $errors->has('currentPassword') ? ' has-error' : '' }}">
                                {{ Form::label('current_password', trans('layout.user.f-current-password'), ['class' => 'col-md-4 control-label']) }}
                                <div class="col-md-6">
                                    {{ Form::password('currentPassword', ['class' => 'form-control', 'required']) }}
                                    @if ($errors->has('currentPassword'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('currentPassword') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                            {{ Form::label('new_password', trans('layout.user.f-new-password'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::password('new_password', ['class' => 'form-control', 'required']) }}
                                @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('new_password_confirmation', trans('layout.user.f-confirm-password'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::password('new_password_confirmation', ['class' => 'form-control', 'required']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::submit(trans('layout.user.b-change-password'), ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
