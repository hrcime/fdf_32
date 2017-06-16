<?php

namespace App\Http\Controllers;

use App\Models\Order;
use DB;
use Cart;

class OrderController extends Controller
{
    public function index()
    {
        $paginate = Order::where('user_id', auth()->id())->orderBy('status', 'asc')
            ->paginate(config('settings.product_per_page'));
        $orders = $paginate->all();
        $links = $paginate->links();

        return view('order.index', compact(['orders', 'links']));
    }

    public function show($id)
    {
        try {
            $order = Order::with('orderItems')->where('user_id', auth()->id())->findOrFail($id);
        } catch (\Exception $e) {
            return back()->with(['success' => trans('layout.order.msg-notfound')]);
        }

        return view('order.show', compact('order'));
    }

    public function store()
    {
        if (empty(auth()->user()->address) || empty(auth()->user()->phone)) {
            return redirect()->action('User\HomeController@show')
                ->with(['warning' => trans('layout.order.msg-missing')]);
        }

        if (Cart::content()->isEmpty()) {
            return back()->with(['warning' => trans('layout.order.msg-empty')]);
        }

        DB::beginTransaction();
        try {
            $order = new Order;
            $order->user_id = auth()->id();
            $order->total_price = Cart::total();
            $order->status = 0;
            $order->save();

            foreach (Cart::content() as $item) {
                $data[] = [
                    'product_id' => $item->id,
                    'quantity' => $item->qty,
                    'price' => $item->price,
                ];
            }
            $order->orderItems()->createMany($data);
            Cart::destroy();
            DB::commit();

            return redirect()->action('OrderController@index')->with(['success' => trans('layout.order.msg-success')]);
        } catch (\Exception $e) {
            DB::rollback();
        }

        return back()->with(['warning' => trans('layout.order.msg-fail')]);
    }

    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
        } catch (\Exception $e) {
            return back()->with(['success' => trans('layout.order.msg-notfound')]);
        }
        $order->update(['status' => config('settings.default_order_cancel')]);

        return back()->with(['success' => trans('layout.order.msg-cancelled')]);
    }
}
