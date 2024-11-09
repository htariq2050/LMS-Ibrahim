<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Add your stylesheets -->
    {{-- @include('admin.partials.styles') --}}
</head>
<body>
    <div class="mdk-header-layout js-mdk-header-layout">
        
        @include('admin.partials.header')
        
        @include('admin.partials.sidebar')

       
         
            
            @yield('content')
   
    </div>

   
</body>
</html>
