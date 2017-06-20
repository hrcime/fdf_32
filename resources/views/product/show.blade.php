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
                                <div class="share-social">
                                    <div id="facebook">
                                        <p>
                                            <iframe width="68" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                                allowTransparency="true"
                                                src="https://www.facebook.com/plugins/share_button.php?href={{ urlencode(url()->current()) }}&layout=button">
                                            </iframe>
                                        </p>
                                    </div>
                                    <div id="twitter">
                                        <p>
                                            <a href="https://twitter.com/share" class="twitter-share-button"
                                                data-show-count="false">{{ trans('layout.twitter') }}</a>
                                            {{ Html::style('//platform.twitter.com/widgets.js', ['async']) }}
                                        </p>
                                    </div>
                                    <div id="google">
                                        <p>
                                            <a id="share-google"
                                                href="https://plus.google.com/share?url={{ urlencode(url()->current()) }}">
                                                <img src="https://www.gstatic.com/images/icons/gplus-32.png"
                                                    alt="{{ trans('layout.google') }}"/>
                                            </a>
                                        </p>
                                    </div>
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
                                            <span class="key">{{ trans('layout.info.category') }}</span>
                                            <span class="value">{{ $product->category->name }}</span>
                                        </div>
                                        <div class="info">
                                            <span class="key">{{ trans('layout.info.price') }}</span>
                                            <span class="value">{{ number_format($product->price) }}</span>
                                        </div>
                                        <div class="info">
                                            <span class="key">{{ trans('layout.info.rate') }}</span>
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
                                            <p class="key">{{ trans('layout.info.quantity') }}</p>
                                            <p>
                                                {{ Form::number('quantity', 1, [
                                                    'class' => 'form-control',
                                                    'product-id' => $product->id,
                                                    'data-href' => action('CartController@store'),
                                                    ]) }}
                                            </p>
                                            <button class="btn btn-primary add-cart btn-block" role="button"
                                                product-id="{{ $product->id }}">
                                                {{ trans('layout.add-cart') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h2>{{ trans('layout.info.information') }}</h2>
                                {{ $product->information }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
