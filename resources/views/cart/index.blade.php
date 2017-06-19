@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @include ('error')
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>{{ trans('layout.cart.tb.name') }}</th>
                                <th>{{ trans('layout.cart.tb.image') }}</th>
                                <th>{{ trans('layout.cart.tb.price') }}</th>
                                <th>{{ trans('layout.cart.tb.quantity') }}</th>
                                <th>{{ trans('layout.cart.tb.total_per_item') }}</th>
                                <th>{{ trans('layout.cart.tb.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (Cart::content() as $product)
                                <tr row-id="{{ $product->rowId }}"
                                    data-href="{{ action('CartController@update', $product->rowId) }}">
                                    <td>
                                        <a href="{{ action('ProductController@show', $product->id) }}">
                                            {{ $product->name }}
                                        </a>
                                    </td>
                                    <td class="col-md-1">
                                        <div class="thumbnail img-cart">
                                            <img src="{{ $product->options->image }}" alt="">
                                        </div>
                                    </td>
                                    <td price="{{ $product->price }}">{{ number_format($product->price) }}</td>
                                    <td class="col-md-2">
                                        {{ Form::number('quantity', $product->qty, ['class' => 'form-control']) }}
                                    </td>
                                    <td class="total">{{ number_format($product->total) }}</td>
                                    <td class="col-md-1">
                                        <button class="btn btn-danger btn-xs remove-product"
                                                data-href="{{action('CartController@remove')}}">
                                            {{ trans('layout.cart.btn.remove') }}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pull-left">
                            <button class="btn btn-danger" id="delete-cart"
                                    data-href="{{ action('CartController@destroy', 'all') }}">
                                {{ trans('layout.cart.btn.delete') }}
                            </button>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-primary reload">{{ trans('layout.cart.btn.update') }}</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>{{ trans('layout.cart.title.info') }}</h4>
                    </div>
                    <div class="panel-body info">
                        @if (Auth::check())
                            <address>
                                <strong>{{ trans('layout.user.f-name') }}</strong><br>
                                {{ Auth::user()->name }}
                            </address>
                            <address>
                                <strong>{{ trans('layout.user.f-phone') }}</strong><br>
                                {{ Auth::user()->phone }}
                            </address>
                            <address>
                                <strong>{{ trans('layout.user.f-address') }}</strong><br>
                                {{ Auth::user()->address }}
                            </address>
                            <hr>
                        @endif
                        <div>
                            <span>{{ trans('layout.cart.title.total-qty') }}</span>
                            <div class="pull-right">
                                <span class="value"> {{ Cart::count() }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div>
                            <span>{{ trans('layout.cart.title.total-bill') }}</span>
                            <div class="pull-right">
                                <span class="value">{{ number_format(Cart::total()) }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <hr>
                        {{ Form::open(['action' => 'OrderController@store']) }}
                            {{ Form::submit(trans('layout.cart.btn.order'), ['class' => 'btn btn-primary btn-block']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
