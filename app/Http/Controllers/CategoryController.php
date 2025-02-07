<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::all();
            return view('admin.instructor.categories.index', compact('categories'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred while fetching categories: ' . $e->getMessage());
        }
    }
    public function JSONCategories()
    {
        try {
            $categories = Category::all();
            return $categories;
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred while fetching categories: ' . $e->getMessage());
        }
    }
    
    public function create()
    {
        try {
            return view('admin.instructor.categories.create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred while loading the create category page: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);

            Category::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('categories.index')->with('success', 'Category created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred while creating the category: ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            return view('admin.instructor.categories.show', compact('category'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred while fetching the category: ' . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            return view('admin.instructor.categories.edit', compact('category'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred while loading the edit category page: ' . $e->getMessage());
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);

            $category = Category::findOrFail($id);
            $category->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred while updating the category: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred while deleting the category: ' . $e->getMessage());
        }
    }
}
