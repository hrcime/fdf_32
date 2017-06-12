@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('layout.product.t-create') }}
                        <div class="pull-right">
                            <a href="{{ action('Admin\ProductController@index') }}" class="btn btn-xs btn-primary">{{ trans('layout.product.b-back') }}</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('error')
                        {{ Form::open(['action' => 'Admin\ProductController@store', 'enctype' => 'multipart/form-data', 'role' => 'form']) }}
                        <div class="row form-horizontal">
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    {{ Form::label('name', trans('layout.product.f-name'), ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::text('name', old('name'), ['class' => 'form-control', 'required']) }}
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    {{ Form::label('price', trans('layout.product.f-price'), ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::number('price', old('price'), ['class' => 'form-control', 'required']) }}
                                        @if ($errors->has('price'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                                    {{ Form::label('quantity', trans('layout.product.f-quantity'), ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::number('quantity', old('quantity'), ['class' => 'form-control', 'required']) }}
                                        @if ($errors->has('quantity'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('quantity') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                    {{ Form::label('category_id', trans('layout.product.f-category'), ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::select('category_id', $categories, old('category_id', null), ['placeholder' => '','class' => 'form-control']) }}
                                        @if ($errors->has('category_id'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('category_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    {{ Form::label('image', trans('layout.product.f-image'), ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::file('image') }}
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        {{ Form::submit(trans('layout.product.b-create'), ['class' => 'btn btn-primary btn-block']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group{{ $errors->has('information') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        {{ Form::textarea('information', old('information'), ['class' => 'form-control', 'required']) }}
                                        @if ($errors->has('information'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('information') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
