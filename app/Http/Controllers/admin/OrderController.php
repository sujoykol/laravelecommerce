<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::with('user')->latest()->paginate(20);
        return view('admin.orders.list', compact('orders'));
    }

    public function show($id) {
        $order = Order::with('user', 'items.product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id) {
        $order = Order::findOrFail($id);
        $order->order_status = $request->status;
        $order->save();
        return back()->with('success', 'Order status updated');
    }

}
