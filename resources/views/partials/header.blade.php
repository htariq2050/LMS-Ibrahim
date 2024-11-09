<!-- resources/views/partials/header.blade.php -->

<nav>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        {{-- <li><a href="{{ route('about') }}">About Us</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li> --}}
        @auth
            {{-- <li><a href="{{ route('dashboard') }}">Dashboard</a></li> --}}
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        @else
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endauth
    </ul>
</nav>
