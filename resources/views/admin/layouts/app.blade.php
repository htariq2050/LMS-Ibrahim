<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')- Dashboard</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Preload and load CSS -->
    <link type="text/css" href="{{ asset('assets/vendor/perfect-scrollbar.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/app.rtl.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-material-icons.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-material-icons.rtl.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-fontawesome-free.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-fontawesome-free.rtl.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-ion-rangeslider.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-ion-rangeslider.rtl.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-dropzone.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-dropzone.rtl.css') }}" rel="stylesheet">
</head>

<body>
    <style>
        /* Loader styling */
        #loader {
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 1);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(0, 0, 0, 0.1);
            border-top: 5px solid #007bff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <!-- Loader -->
    <div id="loader">
        <div class="spinner"></div>
    </div>

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

    @yield('model')

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const loader = document.getElementById("loader");

        // Function to hide the loader
        const hideLoader = () => {
            loader.style.display = "none";
        };

        // Function to show the loader
        const showLoader = () => {
            loader.style.display = "flex";
        };

        // Hide loader on page load
        window.addEventListener("load", hideLoader);

        // Show loader on link click (excluding certain cases)
        document.querySelectorAll("a").forEach((link) => {
            link.addEventListener("click", function (e) {
                const href = this.getAttribute("href");
                if (href && !href.startsWith("#") && !href.startsWith("javascript") && href !== window.location.href) {
                    showLoader();
                }
            });
        });

        // Handle back and forward navigation
        window.addEventListener("popstate", () => {
            setTimeout(hideLoader, 100); // Hide loader after a brief delay
        });
    });
    </script>

</body>

</html>
