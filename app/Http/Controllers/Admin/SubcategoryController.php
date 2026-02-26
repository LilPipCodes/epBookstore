<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategoryController extends Controller
{
    public function index() {
        $subcategories = Subcategory::with('category')->latest()->paginate(15);
        return view('admin.subcategories.index', compact('subcategories'));
    }
    public function create() {
        $categories = Category::all();
        return view('admin.subcategories.create', compact('categories'));
    }
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|unique:subcategories,name',
            'category_id' => 'required|exists:categories,id',
        ]);
        Subcategory::create($data);
        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory added!');
    }
    public function edit($id) {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }
    public function update($id, Request $request) {
        $subcategory = Subcategory::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|unique:subcategories,name,' . $subcategory->id,
            'category_id' => 'required|exists:categories,id',
        ]);
        $subcategory->update($data);
        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory updated!');
    }
    public function destroy($id) {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();
        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory deleted.');
    }
}
