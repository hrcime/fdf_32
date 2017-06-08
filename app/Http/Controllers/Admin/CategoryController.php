<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->paginate(15);

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.category.create', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $input = $request->only(['name', 'parent_id']);
        Category::create($input);

        return redirect()->route('admin.category.index')->with(['success' => trans('layout.msg.created')]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::pluck('name', 'id');

        return view('admin.category.edit', compact(['categories', 'category']));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();

        return redirect()->route('admin.category.edit', $id)->with(['success' => trans('layout.category.msg-updated')]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category->childrens->isNotEmpty()) {
            return redirect()->route('admin.category.index')
                ->with(['warning' => trans('layout.category.msg-hasChildrens')]);
        }
        $category->delete();

        return redirect()->route('admin.category.index')->with(['success' => trans('layout.category.msg-deleted')]);
    }
}
