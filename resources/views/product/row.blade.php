<div class="col-md-3">
    <div class="thumbnail">
        <a href="{{ action('ProductController@show', $product->id) }}">
            <img src="{{ $product->image }}" alt="">
        </a>
        <div class="caption">
            <h3>{{ $product->name }}</h3>
            <p class="price">{{ number_format($product->price) }}</p>
            <p>
                {{ trans('layout.info.quantity') }}
                <input name="quantity" type="number" value="1" class="form-control" product-id="{{ $product->id }}"
                    data-href="{{ action('CartController@store') }}">
            </p>
            <p>
                <button class="btn btn-primary add-cart" role="button" product-id="{{ $product->id }}">
                    {{ trans('layout.add-cart') }}
                </button>
                <a href="{{ action('ProductController@show', $product->id) }}" class="btn btn-default" role="button">
                    {{ trans('layout.detail') }}
                </a>
            </p>
        </div>
    </div>
</div>
