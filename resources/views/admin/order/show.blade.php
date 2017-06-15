@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('layout.order.t-detail') }}
                        <div class="pull-right">
                            <button id="orderStatus"
                                    class="btn btn-xs btn-primary">{{ trans('layout.order.b-update') }}</button>
                            <a href="{{ action('Admin\\OrderController@index') }}"
                               class="btn btn-xs btn-default">{{ trans('layout.order.b-back') }}</a>
                        </div>
                        <div class="clear-float"></div>
                    </div>
                    <div class="panel-body">
                        @include ('error')
                        <div class="row info">
                            <div class="col-md-2">
                                <span class="key">{{ trans('layout.order.tb-order-id') }}</span>
                                <span class="value"><strong>{{ $order->id }}</strong></span>
                            </div>
                            <div class="col-md-2">
                                <p>
                                    <span class="key">{{ trans('layout.order.tb-name') }}</span>
                                    <span class="value"><strong>{{ $order->user->name }}</strong></span>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p>
                                    <span class="key">{{ trans('layout.order.tb-created') }}</span>
                                    <span class="value"><strong>{{ $order->created_at }}</strong></span>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p>
                                    <span class="key">{{ trans('layout.order.tb-updated') }}</span>
                                    <span class="value"><strong>{{ $order->updated_at }}</strong></span>
                                </p>
                            </div>
                            <div class="col-md-2">
                                {{ Form::open(['id' => 'order-status', 'method' => 'PUT', 'route' => ['admin.order.update', $order->id]]) }}
                                {{ Form::select('status', config('settings.order_status'),
                                    old('status', $order->status), ['class' => 'form-control']) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>{{ trans('layout.order.tb-id') }}</th>
                                        <th>{{ trans('layout.order.tb-name') }}</th>
                                        <th>{{ trans('layout.order.tb-qty') }}</th>
                                        <th>{{ trans('layout.order.tb-price') }}</th>
                                        <th>{{ trans('layout.order.tb-total') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($order->orderItems as $item)
                                        <tr>
                                            <td>{{ $item->product->id }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->price) }}</td>
                                            <td>{{ number_format($item->quantity * $item->price) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="4">{{ trans('layout.order.tb-total') }}</th>
                                        <th>{{ number_format($order->total_price) }}</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
