<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Add your stylesheets -->
    @include('admin.partials.styles')
</head>
<body>
    <div class="admin-container">
        <!-- Include Sidebar or Navbar -->
        @include('admin.partials.sidebar')

        <div class="main-content">
            <!-- Include Header -->
            @include('admin.partials.header')

            <!-- Dynamic content goes here -->
            @yield('content')
        </div>
    </div>

    <!-- Include Scripts -->
    @include('admin.partials.scripts')
</body>
</html>
