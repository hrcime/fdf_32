<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRateRequest;
use App\Models\Product;
use App\Models\Rate;
use Auth;
use DB;

class RateController extends Controller
{
    public function update(UpdateRateRequest $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 1, 'msg' => trans('layout.required-login')]);
        }

        if ($request->ajax()) {
            DB::beginTransaction();
            try {
                Rate::updateOrCreate([
                    'user_id' => Auth::user()->id,
                    'product_id' => $request->product_id,
                ], [
                    'point' => $request->point,
                ]);

                $product = Product::with('rates')->find($request->product_id);
                $point = $product->rates->avg('point');
                $product->avg_point = $point;
                $product->save();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();

                return reponse()->json(['error' => 1, 'msg' => trans('layout.try-again')]);
            }

            return response()->json(['avg' => $point]);
        }

        return response()->json(['error' => 1, 'msg' => trans('layout.support-ajax')]);
    }
}
