@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{--filler--}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('product.chunk')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    {{ $links }}
                </div>
            </div>
        </div>
    </div>
@endsection
