<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::with('items.book', 'user')->latest()->paginate(20);
        return view('admin.orders.index', compact('orders'));
    }
    public function show($id) {
        $order = Order::with('items.book', 'user')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }
    public function updateStatus($id, Request $request) {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->route('admin.orders.index')->with('success', 'Order status updated!');
    }
    public function destroy($id) {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted.');
    }
}
