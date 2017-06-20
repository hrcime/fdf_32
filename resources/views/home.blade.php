@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-defaut">
                <div class="panel-body">
                    @include('filter.form')
                </div>
            </div>
        </div>
    </div>
    <h2>{{ trans('layout.latest') }}</h2>
    @include('product.chunk')
</div>
@endsection
