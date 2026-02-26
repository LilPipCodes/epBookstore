<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // Home page: show featured/popular books
    public function index()
    {
        // TODO: Fetch featured/popular books
        return view('books.index');
    }

    // List all books with filters/sorting
    public function list(Request $request)
    {
        // TODO: Implement filtering, sorting, pagination
        return view('books.list');
    }

    // Show a single book's details
    public function show($id)
    {
        $book = \App\Models\Book::with('category', 'subcategory')->findOrFail($id);
        $reviews = $book->reviews()->latest()->get();
        return view('books.show', compact('book', 'reviews'));
    }
}
