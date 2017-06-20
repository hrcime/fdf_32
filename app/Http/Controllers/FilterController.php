<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->only([
            'name',
            'from',
            'to',
            'category',
            'avg_point',
        ]);

        $paginate = Product::latest()->filter($input)->paginate(config('settings.product_per_page'));
        $chunk = $paginate->chunk(config('settings.product_per_row'));
        $links = $paginate->appends($input)->links();

        return view('filter.index', compact(['chunk', 'links']));
    }
}
