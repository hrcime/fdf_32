@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('layout.sugg.t-detail') }}
                        <div class="pull-right">
                            <button onclick="$('form').submit()" class="btn btn-xs btn-primary">{{ trans('layout.sugg.b-update') }}</button>
                            <a href="{{ route('admin.suggest.index') }}" class="btn btn-xs btn-default">{{ trans('layout.sugg.b-back') }}</a>
                        </div>
                        <div class="clear-float"></div>
                    </div>
                    <div class="panel-body">
                        @include ('error')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('layout.sugg.tb-status') }}</label>
                                        <div class="col-md-8">
                                            {{ Form::open(['method' => 'PUT', 'route' => ['admin.suggest.update', $suggest->id]]) }}
                                                {{ Form::select('status', config('settings.status'), old('status', $suggest->status), ['class' => 'form-control']) }}
                                            {{ Form::close() }}
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('layout.sugg.tb-title') }}</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{ $suggest->title }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('layout.sugg.tb-user') }}</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{ $suggest->user->name }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('layout.sugg.tb-category') }}</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{ $suggest->category->name }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('layout.sugg.tb-daysend') }}</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{ $suggest->created_at }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @if ($suggest->image)
                                            <img class="col-md-12" src="{{ $suggest->image }}" alt=""/>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h4>{{ trans('layout.sugg.t-content') }}</h4>
                                <pre class="pre-scrollable">{{ $suggest->content }}</pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
