@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-form">
        <h2>
            {{-- Display the role-based title --}}
            @if(request()->query('role') === 'instructor')
                Instructor Login
            @else
                Student Login
            @endif
        </h2>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="role" value="{{ request()->query('role') }}">

            <div class="input-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-login">Login</button>

            <div class="options">
                {{-- Role-based registration link --}}
                <p>Don't have an account? 
                    <a href="{{ route('register', ['role' => request()->query('role')]) }}">
                        Register as @if(request()->query('role') === 'instructor') Instructor @else Student @endif
                    </a>
                </p>
                
                {{-- Link to toggle between Student and Instructor login --}}
                <p>
                    <a href="{{ route('login', ['role' => request()->query('role') === 'instructor' ? 'student' : 'instructor']) }}">
                        Login as {{ request()->query('role') === 'instructor' ? 'Student' : 'Instructor' }}
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: linear-gradient(to right, #6a11cb, #2575fc);
    }

    .login-form {
        background-color: #fff;
        padding: 3rem;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    .login-form h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        font-size: 2rem;
        color: #333;
    }

    .input-group {
        margin-bottom: 1.5rem;
    }

    .input-group label {
        font-size: 0.9rem;
        color: #555;
        margin-bottom: 0.5rem;
        display: block;
    }

    .input-group input {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
        color: #333;
        transition: border-color 0.3s;
    }

    .input-group input:focus {
        border-color: #2575fc;
        outline: none;
    }

    .error {
        color: #e74c3c;
        font-size: 0.9rem;
    }

    .btn-login {
        width: 100%;
        padding: 1rem;
        background-color: #2575fc;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 1.1rem;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-login:hover {
        background-color: #6a11cb;
    }

    .options {
        text-align: center;
        margin-top: 1rem;
    }

    .options a {
        color: #2575fc;
        text-decoration: none;
    }

    .options p {
        font-size: 0.9rem;
        margin-top: 1rem;
    }
</style>
@endsection
