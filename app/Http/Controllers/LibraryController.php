<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Book;

class LibraryController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('items.book')->latest()->get();
        $books = $orders->flatMap(function($order) {
            return $order->items->pluck('book');
        })->unique('id');
        return view('library.index', compact('books'));
    }
}
