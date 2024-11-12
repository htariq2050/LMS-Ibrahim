<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')- Dashboard</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('assets/vendor/perfect-scrollbar.css') }}" rel="stylesheet">

<!-- App CSS -->
<link type="text/css" href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('assets/css/app.rtl.css') }}" rel="stylesheet">

<!-- Material Design Icons -->
<link type="text/css" href="{{ asset('assets/css/vendor-material-icons.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('assets/css/vendor-material-icons.rtl.css') }}" rel="stylesheet">

<!-- Font Awesome FREE Icons -->
<link type="text/css" href="{{ asset('assets/css/vendor-fontawesome-free.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('assets/css/vendor-fontawesome-free.rtl.css') }}" rel="stylesheet">

<!-- ion Range Slider -->
<link type="text/css" href="{{ asset('assets/css/vendor-ion-rangeslider.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('assets/css/vendor-ion-rangeslider.rtl.css') }}" rel="stylesheet">



<!-- Dropzone -->
<link type="text/css" href="{{ asset('assets/css/vendor-dropzone.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('assets/css/vendor-dropzone.rtl.css') }}" rel="stylesheet">


</head>
<body>
    <div class="mdk-header-layout js-mdk-header-layout">
        
        @include('admin.partials.header')
        <div class="mdk-header-layout__content">

            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">   
            
                @yield('dashboardcontent')
                
                @include('admin.partials.sidebar')

            </div>
        </div>
   
    </div>
    @include('admin.partials.footer')
</body>
</html>
