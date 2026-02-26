<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Subcategory;

class BookController extends Controller
{
    public function index() {
        $books = Book::with('category')->latest()->paginate(15);
        return view('admin.books.index', compact('books'));
    }
    public function create() {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.books.create', compact('categories', 'subcategories'));
    }
    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'cover_url' => 'nullable|url',
            'rating' => 'nullable|numeric|min:0|max:5',
            'format' => 'required',
            'price' => 'required|numeric|min:0',
            'year' => 'nullable|integer',
        ]);
        Book::create($data);
        return redirect()->route('admin.books.index')->with('success', 'Book added!');
    }
    public function edit($id) {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.books.edit', compact('book', 'categories', 'subcategories'));
    }
    public function update($id, Request $request) {
        $book = Book::findOrFail($id);
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'cover_url' => 'nullable|url',
            'rating' => 'nullable|numeric|min:0|max:5',
            'format' => 'required',
            'price' => 'required|numeric|min:0',
            'year' => 'nullable|integer',
        ]);
        $book->update($data);
        return redirect()->route('admin.books.index')->with('success', 'Book updated!');
    }
    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book deleted.');
    }
}
