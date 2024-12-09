<?php

namespace App\Http\Controllers\v1\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the instructor's profile.
     */
    public function index(Request $request)
    {
        $instructor = auth()->user();
        

        $courses = Course::where('instructor_id', $instructor->id)->get();

        return view('admin.instructor.profile.index', compact('instructor', 'courses'));
    }


    public function edit()
    {
        $instructor = auth()->user();
        return view('admin.instructor.profile.edit', compact('instructor'));
    }

    /**
     * Update the instructor's profile in storage.
     */
    public function update(Request $request)
    {
        $instructor = auth()->user();

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $instructor->id,
            'country' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'x_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the profile image
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
