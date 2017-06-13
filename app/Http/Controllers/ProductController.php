<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
    }

    public function showProductByCategory(Request $request, $id)
    {
        $paginate = Product::where('category_id', $id)->paginate(config('settings.product_per_page'));
        $links = $paginate->links();
        $chunk = $paginate->chunk(config('settings.product_per_row'));

        return view('product.category', compact(['chunk', 'links']));
    }
}
