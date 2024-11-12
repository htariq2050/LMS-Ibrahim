<?php

namespace App\Http\Controllers\v1\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
        
        public function index()
        {
            // Fetch all categories
            $categories = Category::all();
            return response()->json($categories);
        }
    
        
        public function store(Request $request)
        {
            
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);
    
            
            $category = Category::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
    
            return response()->json(['message' => 'Category added successfully', 'category' => $category], 201);
        }
    
        
        public function update(Request $request, $id)
        {
            
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);
    
            
            $category = Category::find($id);
    
            if (!$category) {
                return response()->json(['message' => 'Category not found'], 404);
            }
    
            
            $category->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
    
            return response()->json(['message' => 'Category updated successfully', 'category' => $category], 200);
        }
    
        
        public function show($id)
        {
            
            $category = Category::find($id);
    
            if (!$category) {
                return response()->json(['message' => 'Category not found'], 404);
            }
    
            return response()->json($category);
        }
}
