<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chunk = Product::latest()->paginate(config('settings.product_per_page'))
            ->chunk(config('settings.product_per_row'));

        return view('home', compact('chunk'));
    }
}
