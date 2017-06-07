@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('layout.user.t-login') }}</div>
                <div class="panel-body">
                    @if(session('fail'))
                        <p class="bg-danger">{{session('fail')}}</p>
                    @endif
                    {{ Form::open(['class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'route' => 'login']) }}
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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('remember', old('remember') ? 'checked' : '') }} {{trans('layout.user.b-remember')}}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                {{ Form::submit(trans('layout.user.b-login'), ['class' => 'btn btn-primary']) }}
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ trans('layout.user.b-forgot') }}
                                </a>
                            </div>
                        </div>
                    {{ Form::close() }}

                    <hr>
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">

                        <div class="btn-group" role="group">
                            <a href="{{ route('auth.social', 'facebook') }}" class="btn btn-default">{{ trans('layout.user.b-facebook') }}</a>
                        </div>

                        <div class="btn-group" role="group">
                            <a href="{{ route('auth.social', 'google') }}" class="btn btn-default">{{ trans('layout.user.b-google') }}</a>
                        </div>

                        <div class="btn-group" role="group">
                            <a href="{{ route('auth.social', 'twitter') }}" class="btn btn-default">{{ trans('layout.user.b-twitter') }}</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
