<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Add any CSS links here -->
    @yield('styles')
</head>
<body>
    <header>
        @if(!isset($noHeaderFooter))
        @include('partials.header') 
    @endif
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @if(!isset($noHeaderFooter))
        @include('partials.footer') 
    @endif
    </footer>

    
</body>
</html>
