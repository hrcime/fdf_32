@extends('layouts.app')
@section('content')
    <div class="container">
        <div id="filter" class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('filter.form')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $links }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include ('product.chunk')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $links }}
            </div>
        </div>
    </div>
@endsection
