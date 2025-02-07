<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')- Dashboard</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">


    <link type="text/css" rel="stylesheet" href="{{ asset('assets/home/css/style.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/home/css/header.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/home/css/home.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>

        
        @include('home.partials.header')
        @yield('homecontent')
        @include('home.partials.footer')

</body>
</html>
