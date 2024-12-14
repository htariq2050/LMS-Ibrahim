<?php

namespace App\Http\Controllers\v1\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $instructor = Auth::user();
        

        $courses = Course::where('instructor_id', $instructor->id)->get();

        return view('admin.instructor.profile.index', compact('instructor', 'courses'));
    }

    public function edit()
    {
        $instructor = Auth::user();
        return view('admin.instructor.profile.edit', compact('instructor'));
    }

    public function update(Request $request)
    {
        $instructor = Auth::user();

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $instructor->id,
            'country' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'x_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        if ($request->hasFile('profile')) {
            // Delete the old profile image if exists
            if ($instructor->profile) {
                Storage::delete('instructors/profile/' . $instructor->profile);
            }

            // Save the new profile image
            $image = $request->file('profile');
            $filename = 'profile_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/instructors/profile'), $filename);

            $validatedData['profile'] = $filename;
        }

        $instructor->update($validatedData);

        return redirect()->route('instructor.profile.index')->with('success', 'Profile updated successfully.');
    }
}
