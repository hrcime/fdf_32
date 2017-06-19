@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('layout.order.t-orders') }}
                    </div>
                    <div class="panel-body">
                        @include('error')
                        <table class="table table-hover table-bordered">
                            <thead align="center">
                            <tr>
                                <th>{{ trans('layout.order.tb-id') }}</th>
                                <th>{{ trans('layout.order.tb-user') }}</th>
                                <th>{{ trans('layout.order.tb-price') }}</th>
                                <th>{{ trans('layout.order.tb-created') }}</th>
                                <th>{{ trans('layout.order.tb-status') }}</th>
                                <th colspan="2">{{ trans('layout.order.tb-action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ number_format($order->total_price) }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ trans('layout.order.status.' . $order->status) }}</td>
                                    <td class="col-md-1">
                                        <a href="{{ action('OrderController@show', $order->id) }}"
                                           class="btn btn-info btn-xs">{{ trans('layout.order.b-detail') }}</a>
                                    </td>
                                    <td class="col-md-1">
                                        @if ($order->status == 0)
                                            {{ Form::open([
                                                'id' => 'cancel',
                                                'data-id' => $order->id,
                                                'data-msg' => trans('layout.order.msg-cancel'),
                                                'action' => ['OrderController@destroy', $order->id],
                                                'method' => 'delete']) }}
                                                {{ Form::submit(trans('layout.order.b-cancel'), [
                                                    'class' => 'btn btn-xs btn-danger']) }}
                                            {{ Form::close() }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $links }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
