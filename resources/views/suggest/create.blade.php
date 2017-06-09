@extends('layouts.app')
@section('content')
    <div class="contrainer">
        <div class="row">
            @if (session('thankyou'))
                <div class="col-md-4 col-md-offset-4">
                    <div class="alert alert-success" role="alert">{{ session('thankyou') }}</div>
                </div>
            @else
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('layout.suggest.t-create') }}</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::open(['class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'role' => 'form', 'action' => 'SuggestController@create']) }}

                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    {{ Form::label('title', trans('layout.suggest.f-title'), ['class' => 'col-md-2 control-label']) }}
                                    <div class="col-md-10">
                                        {{ Form::text('title', old('title'), ['class' => 'form-control', 'required']) }}
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    {{ Form::label('image', trans('layout.suggest.f-image'), ['class' => 'col-md-2 control-label']) }}
                                    <div class="col-md-10">
                                        {{ Form::file('image') }}
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                    {{ Form::label('category_id', trans('layout.suggest.f-category'), ['class' => 'col-md-2 control-label']) }}
                                    <div class="col-md-10">
                                        {{ Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control']) }}
                                        @if ($errors->has('category_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('category_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                    {{ Form::label('content', trans('layout.suggest.f-content'), ['class' => 'col-md-2 control-label']) }}
                                    <div class="col-md-10">
                                        {{ Form::textarea('content', old('content'), ['class' => 'form-control', 'required']) }}
                                        @if ($errors->has('content'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('content') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        {{ Form::submit(trans('layout.suggest.b-send'), ['class' => 'btn btn-primary btn-block']) }}
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
