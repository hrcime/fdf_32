<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\SuggestRequest;
use App\Models\Category;
use App\Models\Suggest;
use Auth;

class SuggestController extends Controller
{
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('suggest.create', compact(['categories']));
    }

    public function store(SuggestRequest $request)
    {
        $input = $request->only([
            'title',
            'category_id',
            'content',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $input['image'] = Helper::upload($file, 'suggest');
        }
        $input['user_id'] = Auth::user()->id;
        Suggest::create($input);

        return redirect()->action('SuggestController@create')->with(['thankyou' => trans('layout.suggest.msg-thankyou')]);
    }
}
