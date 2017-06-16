<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Product;
use App\Http\Requests\Cart\AddCartRequest;
use App\Http\Requests\Cart\UpdateCartRequest;
use App\Http\Requests\Cart\RemoveCartRequest;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function store(AddCartRequest $request)
    {
        if ($request->ajax()) {
            try {
                $product = Product::findOrFail($request->product_id);
            } catch (\Exception $e) {
                return response()->json(['error' => '1', 'msg' => trans('layout.cart.msg.notfound')]);
            }

            $input = [
                'id' => $request->product_id,
                'qty' => $request->qty,
                'name' => $product->name,
                'price' => $product->price,
                'options' => [
                    'image' => $product->image,
                ],
            ];

            $cart = Cart::add($input);

            return response()->json([
                'msg' => trans('layout.cart.msg.added'),
                'rowId' => $cart->rowId,
            ]);
        }

        return response()->json(['error' => 1, 'msg' => trans('layout.cart.msg.ajax')]);
    }

    public function update(UpdateCartRequest $request)
    {
        if ($request->ajax()) {
            $rowId = $request->cart;
            $input['qty'] = $request->input('qty');
            Cart::update($rowId, $input);

            return response()->json(['msg' => trans('layout.cart.msg.updated')]);
        }

        return response()->json(['error' => 1, 'msg' => trans('layout.cart.msg.ajax')]);
    }

    public function remove(RemoveCartRequest $request)
    {
        if ($request->ajax()) {
            $rowId = $request->input('rowId');
            Cart::remove($rowId);

            return response()->json(['msg' => trans('layout.cart.msg.removed')]);
        }

        return response()->json(['error' => 1, 'msg' => trans('layout.cart.msg.ajax')]);
    }

    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            Cart::destroy();

            return response()->json(['msg' => trans('layout.cart.msg.ajax')]);
        }

        return response()->json(['error' => 1, 'msg' => trans('layout.cart.msg.ajax')]);
    }
}
