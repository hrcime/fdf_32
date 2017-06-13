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
                                    <div class="col-md-6">
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
                                            <span class="value">{{ $product->avg_point }}</span>
                                            <div class="stars">
                                                <form action="">
                                                    <input checked class="star star-5" id="star-5" type="radio" value="5" name="star"/>
                                                    <label class="star star-5" for="star-5"></label>
                                                    <input class="star star-4" id="star-4" type="radio" value="4" name="star"/>
                                                    <label class="star star-4" for="star-4"></label>
                                                    <input class="star star-3" id="star-3" type="radio" value="3" name="star"/>
                                                    <label class="star star-3" for="star-3"></label>
                                                    <input class="star star-2" id="star-2" type="radio" value="2" name="star"/>
                                                    <label class="star star-2" for="star-2"></label>
                                                    <input class="star star-1" id="star-1" type="radio" value="1" name="star"/>
                                                    <label class="star star-1" for="star-1"></label>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info">
                                            <p class="key">{{ trans('layout.quantity') }}</p>
                                            <p><input name="quantity" type="number" value="1" class="form-control"></p>
                                            <button class="btn btn-primary add-cart btn-block" role="button">{{ trans('layout.add-cart') }}</button>
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
