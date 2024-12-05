<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->category_id)->get();
        return response()->json($subCategories);
    }

    public function create()
    {
        return view('subcategories.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'description' => 'nullable|string',
            ]);

            SubCategory::create($request->only(['name', 'category_id', 'description']));

            return redirect()->route('subcategories.index')->with('success', 'Subcategory created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred while creating the subcategory: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        return view('subcategories.show', compact('subCategory'));
    }

    public function edit($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        return view('subcategories.edit', compact('subCategory'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'description' => 'nullable|string',
            ]);

            $subCategory = SubCategory::findOrFail($id);
            $subCategory->update($request->only(['name', 'category_id', 'description']));

            return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred while updating the subcategory: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $subCategory = SubCategory::findOrFail($id);
            $subCategory->delete();

            return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred while deleting the subcategory: ' . $e->getMessage());
        }
    }
}
