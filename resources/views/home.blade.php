@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="jumbotron">
            <div class="container">
            </div>
        </div>
    </div>
    <h2>{{ trans('layout.latest') }}</h2>
    @include('product.chunk')
</div>
@endsection
