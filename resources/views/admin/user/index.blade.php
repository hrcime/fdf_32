@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>{{ trans('layout.user.t-list') }}</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-md-6">
                                <div class="pull-left">
                                    @include('error')
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pull-right">
                                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary">{{ trans('layout.user.b-create') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>{{ trans('layout.user.tb-id') }}</th>
                                        <th>{{ trans('layout.user.tb-name') }}</th>
                                        <th>{{ trans('layout.user.tb-email') }}</th>
                                        <th>{{ trans('layout.user.tb-phone') }}</th>
                                        <th>{{ trans('layout.user.tb-address') }}</th>
                                        <th>{{ trans('layout.user.f-admin') }}</th>
                                        <th colspan="2">{{ trans('layout.user.tb-action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>
                                                @if ($user->isAdmin())
                                                    {{ trans('layout.user.admin') }}
                                                @else
                                                    {{ trans('layout.user.member') }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}" class="btn btn-xs btn-primary">{{ trans('layout.user.b-edit') }}</a>
                                            </td>
                                            <td>
                                                @if ($user->id !== Auth::user()->id)
                                                {{ Form::open(['id' => 'delete', 'route' => ['admin.user.destroy', $user->id], 'method' => 'delete']) }}
                                                    {{ Form::submit('Delete', ['data-id' => $user->id, 'class' => 'btn btn-xs btn-danger']) }}
                                                {{ Form::close() }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pull-right">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
