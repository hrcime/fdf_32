@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('layout.product.t-products') }}
                        <div class="pull-right">
                            <a href="{{ action('Admin\ProductController@create') }}" class="btn-primary btn btn-xs">{{ trans('layout.product.b-create') }}</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        @include ('error')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ trans('layout.product.f-id') }}</th>
                                    <th>{{ trans('layout.product.f-name') }}</th>
                                    <th>{{ trans('layout.product.f-image') }}</th>
                                    <th>{{ trans('layout.product.f-price') }}</th>
                                    <th>{{ trans('layout.product.f-quantity') }}</th>
                                    <th>{{ trans('layout.product.f-category') }}</th>
                                    <th colspan="2">{{ trans('layout.product.f-action') }}</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td class="col-md-2">
                                            <img src="{{ $product->image }}" class="img-responsive img-thumbnail" alt="">
                                        </td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>
                                            <a href="{{ action('Admin\ProductController@edit', $product->id) }}" class="btn btn-primary btn-xs">{{ trans('layout.product.b-edit') }}</a>
                                        </td>
                                        <td>
                                            {{ Form::open(['id' => 'delete', 'action' => ['Admin\ProductController@destroy', $product->id], 'method' => 'delete']) }}
                                                {{ Form::submit(trans('layout.product.b-delete'), ['data-id' => $product->id, 'class' => 'btn btn-xs btn-danger']) }}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
