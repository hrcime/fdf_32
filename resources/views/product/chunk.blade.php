@foreach ($chunk as $products)
    <div class="row">
        @each('product.row', $products, 'product', 'Error')
    </div>
@endforeach
