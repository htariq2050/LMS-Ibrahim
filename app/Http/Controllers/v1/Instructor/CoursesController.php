<?php

namespace App\Http\Controllers\v1\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    public function index(Request $request)
    {   
        $courses = Course::filter('instructor_id', $request->user_id)->get();
        return view('admin.instructor.courses', ['courses' => $courses]);
    }
    

    public function create()
    {
         return view('admin.instructor.add_course');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'subcategory_id' => 'required',
                'status' => 'boolean',
                'price' => 'integer',
                'cover_image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            $validatedData['slug_url'] = Str::slug($validatedData['title']) . '-' . uniqid();
            $validatedData['instructor_id'] = auth()->id();
    
     
            if ($request->hasFile('cover_image')) {
                $image = $request->file('cover_image');
                $filename = 'course_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/courses_cover_images'), $filename);
                $validatedData['cover_image'] = $filename;
            }
    
            Course::create($validatedData);
    
            return redirect()->route('instructor.courses.index')->with('success', 'Course created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to create course. Please try again.'.$e])->withInput();
        }
    }
    

    public function edit($id)
    {
        // Find the course by ID and load related subcategories and categories
        $course = Course::with('subcategory', 'category')->findOrFail($id);
        
        // Fetch all categories for the category dropdown
        $categories = Category::all();
    
        // Fetch subcategories based on the selected category (if available)
        $subcategories = SubCategory::where('category_id', $course->category_id)->get();
    
        return view('admin.instructor.edit_course', compact('course', 'categories', 'subcategories'));
    }
    
    

    public function update(Request $request, Course $course)
    {

        $request->merge(['instructor_id' => auth()->id()]);
        $validated = $request->validate([
            'instructor_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        if ($request->title !== $course->title) {
            $validated['slug_url'] = $this->generateUniqueSlug($request->title);
        }

        if ($request->hasFile('cover_image')) {
            if ($course->cover_image) {
                Storage::delete($course->cover_image);
            }
            $validated['cover_image'] = $this->uploadImage($request->file('cover_image'));
        }

        $validated['updated_by'] = auth()->id();

        $course->update($validated);

        return redirect()->route('instructor.courses.index')->with('success', 'Course updated successfully.');
    }

    private function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $count = Course::where('slug_url', 'like', "{$slug}%")->count();
        
        return $count ? "{$slug}-{$count}" : $slug;
    }

    private function uploadImage($image)
    {
        return $image->store('course_images', 'public'); 
    }

    public function destroy(Course $course)
    {
        if ($course->cover_image) {
            Storage::delete($course->cover_image);
        }

        $course->deleted_by = auth()->id();
        $course->save();
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
    
}
