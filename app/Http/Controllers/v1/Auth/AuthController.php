<?php

namespace App\Http\Controllers\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm(Request $request)
    {
        
        return view('auth.register',['noHeaderFooter' => true]);
    }

    public function showLoginForm()
    {
        return view('auth.login', ['noHeaderFooter' => true]);
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'country' => 'nullable|string|max:255',
            'newsletter_subscription' => 'nullable|boolean',
            'role' => 'required',
            'description' => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'x_url' => 'nullable|url', 
            'instagram_url' => 'nullable|url',
        ]);
    
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country' => $request->country,
            'role' => $request->role,
            'newsletter_subscription' => $request->newsletter_subscription ?? false,
            'description' => $request->description,
            'facebook_url' => $request->facebook_url,
            'x_url' => $request->x_url,
            'instagram_url' => $request->instagram_url,
        ]);
    
        Auth::login($user);
    
        return redirect()->route('login')->with('success', 'Registration successful');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'role' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password','role'))) {
            $user = Auth::user();

            
            if ($user->role == 'student') 
                return redirect()->route('student_dashboard')->with('success', 'Login successful');
            
    
            if ($user->role == 'instructor') 
                return redirect()->route('instructor.dashboard')->with('success', 'Login successful');
            
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }

}
