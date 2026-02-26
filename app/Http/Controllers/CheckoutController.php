<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = session('cart', []);
        $books = Book::whereIn('id', array_keys($cart))->get();
        return view('checkout.show', compact('books', 'cart'));
    }

    public function process(Request $request)
    {
        $cart = session('cart', []);
        $books = Book::whereIn('id', array_keys($cart))->get();
        if ($books->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty.');
        }
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $books->sum('price'),
            'status' => 'paid', // For demo, mark as paid
        ]);
        foreach ($books as $book) {
            OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $book->id,
                'price' => $book->price,
            ]);
        }
        session()->forget('cart');
        return redirect()->route('library.index')->with('success', 'Order placed! Books added to your library.');
    }
}
