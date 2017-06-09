@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('layout.sugg.t-suggests') }}
                    </div>
                    <div class="panel-body">
                        @include('error')
                        <table class="table table-hover table-bordered">
                            <thead align="center">
                            <tr>
                                <th>{{ trans('layout.sugg.tb-id') }}</th>
                                <th>{{ trans('layout.sugg.tb-title') }}</th>
                                <th>{{ trans('layout.sugg.tb-category') }}</th>
                                <th>{{ trans('layout.sugg.tb-user') }}</th>
                                <th>{{ trans('layout.sugg.tb-status') }}</th>
                                <th colspan="2">{{ trans('layout.sugg.tb-action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($suggests as $suggest)
                                    <tr>
                                        <td>{{ $suggest->id }}</td>
                                        <td>{{ $suggest->title }}</td>
                                        <td>{{ $suggest->category->name }}</td>
                                        <td>{{ $suggest->user->name }}</td>
                                        <td>{{ trans('layout.sugg.status.' . $suggest->status) }}</td>
                                        <td class="col-md-1">
                                            <a href="{{ route('admin.suggest.show', $suggest->id) }}" class="btn btn-info btn-xs">{{ trans('layout.sugg.b-detail') }}</a>
                                        </td>
                                        <td class="col-md-1">
                                            {{ Form::open(['id' => 'delete', 'route' => ['admin.suggest.destroy', $suggest->id], 'method' => 'delete']) }}
                                                {{ Form::submit(trans('layout.sugg.b-delete'), ['data-id' => $suggest->id, 'class' => 'btn btn-xs btn-danger']) }}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $suggests->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
