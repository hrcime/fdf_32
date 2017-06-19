@extends('layouts.app')
@section('content')
    <div class="contrainer">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('layout.user.t-profile') }}</div>
                    <div class="panel-body">
                        @include ('error')
                        <div class="row">
                            <div class="col-md-9">
                                {{ Form::open(['class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'role' => 'form', 'method' => 'POST', 'route' => 'user.show']) }}

                                <div class="form-group">
                                    {{ Form::label('email', trans('layout.user.f-email'), ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        <p class="form-control-static">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    {{ Form::label('name', trans('layout.user.f-name'), ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::text('name', old('name', Auth::user()->name), ['class' => 'form-control', 'required']) }}
                                    @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    {{ Form::label('phone', trans('layout.user.f-phone'), ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::text('phone', old('phone', Auth::user()->phone), ['class' => 'form-control', 'required']) }}
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    {{ Form::label('address', trans('layout.user.f-address'), ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::textarea('address', old('address', Auth::user()->address), ['class' => 'form-control', 'required']) }}
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                    {{ Form::label('avatar', trans('layout.user.f-avatar'), ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::file('avatar') }}
                                        @if ($errors->has('avatar'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        {{ Form::submit(trans('layout.user.b-update'), ['class' => 'btn btn-primary btn-block']) }}
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>

                            <div class="col-md-3">
                                @if (!empty(Auth::user()->avatar))
                                    <img src="{{ Auth::user()->avatar }}" class="img-rounded img-responsive">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
