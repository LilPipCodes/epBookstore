<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::latest()->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }
    public function create() {
        return view('admin.categories.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug',
        ]);
        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category added!');
    }
    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }
    public function update($id, Request $request) {
        $category = Category::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'slug' => 'required|unique:categories,slug,' . $category->id,
        ]);
        $category->update($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated!');
    }
    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted.');
    }
}
