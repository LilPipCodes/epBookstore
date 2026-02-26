<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $books = Book::whereIn('id', array_keys($cart))->get();
        return view('cart.index', compact('books', 'cart'));
    }

    public function add($bookId, Request $request)
    {
        $cart = session('cart', []);
        $cart[$bookId] = 1;
        session(['cart' => $cart]);
        return redirect()->route('cart.index')->with('success', 'Book added to cart!');
    }

    public function remove($bookId)
    {
        $cart = session('cart', []);
        unset($cart[$bookId]);
        session(['cart' => $cart]);
        return redirect()->route('cart.index')->with('success', 'Book removed from cart.');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Cart cleared.');
    }
}
