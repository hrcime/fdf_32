<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(config('settings.product_per_page'));

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.product.create', compact('categories'));
    }

    public function store(CreateProductRequest $request)
    {
        $input = $request->only([
            'name',
            'price',
            'quantity',
            'information',
            'category_id',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $input['image'] = Helper::upload($file, 'product');
        }

        Product::create($input);

        return redirect()->action('Admin\ProductController@index')
            ->with(['success' => trans('layout.product.msg-created')]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::pluck('name', 'id');

        return view('admin.product.update', compact(['categories', 'product']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $input = $request->only([
            'name',
            'price',
            'quantity',
            'information',
            'category_id',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $input['image'] = Helper::upload($file, 'product');
        }

        Product::whereId($id)->update($input);

        return redirect()->action('Admin\ProductController@edit', $id)
            ->with(['success' => trans('layout.product.msg-updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return back()->with(['success' => trans('layout.product.msg-deleted')]);
    }
}
