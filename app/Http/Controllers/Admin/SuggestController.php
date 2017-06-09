<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suggest;
use App\Http\Requests\UpdateSuggestRequest;

class SuggestController extends Controller
{
    public function index()
    {
        $suggests = Suggest::info()->paginate(config('settings.product_per_page'));

        return view('admin.suggest.index', compact('suggests'));
    }

    public function show($id)
    {
        $suggest = Suggest::info()->findOrFail($id);

        return view('admin.suggest.detail', compact('suggest'));
    }

    public function update(UpdateSuggestRequest $request, $id)
    {
        $suggest = Suggest::findOrFail($id);
        $suggest->status = $request->status;
        $suggest->save();

        return back()->with(['success' => trans('layout.sugg.msg-success')]);
    }

    public function destroy($id)
    {
        $suggest = Suggest::findOrFail($id);
        $suggest->delete();

        return back()->with(['success' => trans('layout.sugg.msg-deteled')]);
    }
}
