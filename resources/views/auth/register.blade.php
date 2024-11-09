@extends('layouts.app')

@section('content')
<div class="register-container">
    <div class="register-form">
        <h2>Create an Account</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <!-- Basic Information -->
            <div class="input-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
                @error('first_name') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="input-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
                @error('last_name') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" required>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="input-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            </div>

            <!-- Additional Information -->
            <div class="input-group">
                <label for="country">Country</label>
                <input type="text" name="country" placeholder="Country" value="{{ old('country') }}">
            </div>

            {{-- <div class="input-group">
                <label for="description">Description</label>
                <textarea name="description" placeholder="Tell us a bit about yourself">{{ old('description') }}</textarea>
            </div> --}}

            <!-- Social Media Links -->
            {{-- <div class="input-group">
                <label for="facebook_url">Facebook URL</label>
                <input type="url" name="facebook_url" placeholder="Facebook URL" value="{{ old('facebook_url') }}">
            </div> --}}

            {{-- <div class="input-group">
                <label for="x_url">X (Twitter) URL</label>
                <input type="url" name="x_url" placeholder="X (Twitter) URL" value="{{ old('x_url') }}">
            </div> --}}

            {{-- <div class="input-group">
                <label for="instagram_url">Instagram URL</label>
                <input type="url" name="instagram_url" placeholder="Instagram URL" value="{{ old('instagram_url') }}">
            </div> --}}

            <!-- Newsletter Subscription -->
            {{-- <div class="input-group">
                <label>
                    <input type="checkbox" name="newsletter_subscription"> Subscribe to Newsletter
                </label>
            </div> --}}

            <button type="submit" class="btn-register">Register</button>
        </form>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f7f8fc;
        margin: 0;
        padding: 0;
    }

    .register-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: linear-gradient(to right, #6a11cb, #2575fc);
    }

    .register-form {
        background-color: #fff;
        padding: 3rem;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
    }

    .register-form h2 {
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

    .input-group input,
    .input-group textarea {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
        color: #333;
        transition: border-color 0.3s;
    }

    .input-group input:focus,
    .input-group textarea:focus {
        border-color: #2575fc;
        outline: none;
    }

    .input-group textarea {
        height: 120px;
    }

    .error {
        color: #e74c3c;
        font-size: 0.9rem;
    }

    .btn-register {
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

    .btn-register:hover {
        background-color: #6a11cb;
    }

    @media screen and (max-width: 600px) {
        .register-form {
            padding: 2rem;
        }

        .register-form h2 {
            font-size: 1.6rem;
        }

        .input-group input,
        .input-group textarea {
            font-size: 0.9rem;
        }

        .btn-register {
            font-size: 1rem;
        }
    }
</style>
@endsection
