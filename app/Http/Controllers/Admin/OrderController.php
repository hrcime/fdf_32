<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\UpdateRequest;

class OrderController extends Controller
{
    public function index()
    {
        $paginate = Order::latest()->paginate(config('settings.product_per_page'));
        $orders = $paginate->all();
        $links = $paginate->links();

        return view('admin.order.index', compact(['orders', 'links']));
    }

    public function show($id)
    {
        try {
            $order = Order::with('orderItems.product', 'user')->findOrFail($id);
        } catch (\Exception $e) {
            return back()->with(['warning' => trans('layout.order.msg-notfound')]);
        }

        return view('admin.order.show', compact('order'));
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $order = Order::findOrFail($id);
        } catch (\Exception $e) {
            return back()->with(['warning' => trans('layout.order.msg-exist')]);
        }

        $order->status = $request->status;
        $order->save();

        return back()->with(['success' => trans('layout.order.msg-updated')]);
    }

    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
        } catch (\Exception $e) {
            return back()->with(['warning' => trans('layout.order.msg-notfound')]);
        }
        $order->delete();

        return back()->with(['success' => trans('layout.order.msg-deleted')]);
    }
}
