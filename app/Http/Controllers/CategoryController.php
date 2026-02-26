<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // List all categories
    public function index()
    {
        $categories = \App\Models\Category::all();
        return view('categories.index', compact('categories'));
    }

    // Show books in a category
    public function show($slug, Request $request)
    {
        $category = \App\Models\Category::where('slug', $slug)->firstOrFail();
        $subcategories = $category->subcategories;

        $booksQuery = $category->books()->with('subcategory');

        if ($request->filled('subcategory')) {
            $booksQuery->where('subcategory_id', $request->subcategory);
        }
        if ($request->filled('rating')) {
            $booksQuery->where('rating', '>=', $request->rating);
        }
        if ($request->filled('format')) {
            $booksQuery->where('format', $request->format);
        }
        if ($request->filled('price')) {
            if ($request->price === 'free') {
                $booksQuery->where('price', 0);
            } elseif ($request->price === 'paid') {
                $booksQuery->where('price', '>', 0);
            }
        }
        if ($request->filled('author')) {
            $booksQuery->where('author', 'like', '%' . $request->author . '%');
        }
        if ($request->filled('year')) {
            $booksQuery->where('year', $request->year);
        }

        $books = $booksQuery->paginate(12);

        return view('categories.show', compact('category', 'subcategories', 'books'));
    }
}
