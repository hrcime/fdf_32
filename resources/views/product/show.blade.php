@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{ $product->image }}" class="img-responsive" alt="">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="name">
                                            <h3>{{ $product->name }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" product-id="{{ $product->id }}">
                                        <div class="info">
                                            <span class="key">{{ trans('layout.category') }}</span>
                                            <span class="value">{{ $product->category->name }}</span>
                                        </div>
                                        <div class="info">
                                            <span class="key">{{ trans('layout.price') }}</span>
                                            <span class="value">{{ number_format($product->price) }}</span>
                                        </div>
                                        <div class="info">
                                            <span class="key">{{ trans('layout.rate') }}</span>
                                            <span class="value" id="point">{{ $product->avg_point }}</span>
                                            <div class="stars" data-href="{{ action('RateController@update') }}">
                                                @for ($i = 5; $i > 0; $i--)
                                                    {{ Form::radio('star', $i,
                                                    ($product->rates->isNotEmpty() && $product->rates[0]->point == $i) ? true : false,
                                                    ['class' => "star star-$i", 'id' => "star-$i"]) }}

                                                    {{ Form::label("star-$i", ' ', ['class' => "star star-$i"]) }}
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info">
                                            <p class="key">{{ trans('layout.quantity') }}</p>
                                            <p>
                                                {{ Form::number('quantity', 1, [
                                                    'class' => 'form-control',
                                                    'product-id' => $product->id,
                                                    'data-href' => action('CartController@store'),
                                                    ]) }}
                                            </p>
                                            <button class="btn btn-primary add-cart btn-block"
                                                    product-id="{{ $product->id }}"
                                                    role="button">{{ trans('layout.add-cart') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h2>{{ trans('layout.information') }}</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        {{ $product->information }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
