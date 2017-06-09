@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('layout.category.t-category') }}
                        <div class="pull-right" >
                            <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-xs">{{ trans('layout.category.b-create') }}</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        @include('error')
                        <table class="table table-hover table-bordered">
                            <thead align="center">
                                <tr>
                                    <th>{{ trans('layout.category.tb-id') }}</th>
                                    <th>{{ trans('layout.category.tb-name') }}</th>
                                    <th>{{ trans('layout.category.tb-parent') }}</th>
                                    <th colspan="2">{{ trans('layout.category.tb-action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th class="col-md-1">{{ $category->id }}</th>
                                        <td class="col-md-5">{{ $category->name }}</td>
                                        <td class="col-md-4">
                                            @if ($category->parent)
                                                {{ $category->parent->name }}
                                            @endif
                                        </td>
                                        <td class="col-md-1">
                                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-info btn-xs">{{ trans('layout.category.b-edit') }}</a>
                                        </td>
                                        <td class="col-md-1">
                                            {{ Form::open(['id' => 'delete', 'route' => ['admin.category.destroy', $category->id], 'method' => 'delete']) }}
                                                {{ Form::submit(trans('layout.category.b-delete'), ['data-id' => $category->id, 'class' => 'btn btn-xs btn-danger']) }}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories['links'] }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
