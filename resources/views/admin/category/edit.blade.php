@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('layout.category.t-update') }}
                    </div>
                    <div class="panel-body">
                        @include('error')
                        {{ Form::open(['class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT', 'route' => ['admin.category.update', $category->id]]) }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('name', trans('layout.category.f-name'), ['class' => 'col-md-2 control-label']) }}
                            <div class="col-md-10">
                                {{ Form::text('name', old('name', $category->name), ['class' => 'form-control', 'required']) }}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                            {{ Form::label('parent_id', trans('layout.category.f-parent'), ['class' => 'col-md-2 control-label']) }}
                            <div class="col-md-10">
                                {{ Form::select('parent_id', $categories->put(0, trans('layout.category.v-parent')), old('parent_id', $category->parent_id), ['class' => 'form-control']) }}
                                @if ($errors->has('parent_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('parent_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                {{ Form::submit(trans('layout.category.b-update'), ['class' => 'btn btn-primary']) }}
                                <a href="{{ route('admin.category.index') }}" class="btn btn-default">{{ trans('layout.category.b-back') }}</a>
                            </div>
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
