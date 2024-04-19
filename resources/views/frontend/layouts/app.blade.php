<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ setting()->app_name }} | @yield('title')</title>
    <meta name="description" content="Author: AxilTheme, Template: HTML, Category: Blog, Price: $13.00, Length: 23 pages">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/frontend/media/favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fonts/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/vendor/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/vendor/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/vendor/bootstrap.min.css') }}">
    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/app.css') }}">
    <link href="{{ asset('assets/admin') }}/css/toastr.min.css" rel="stylesheet" type="text/css">
    @stack('styles')
</head>

<body class="mobilemenu-active">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  	<![endif]-->
    <div id="preloader" class="preloader">
        <div class="loader-wrap">
            <div class="single-box">
                <div class="circle-holder"></div>
                <div class="shadow-holder"></div>
            </div>
            <div class="single-box">
                <div class="circle-holder"></div>
                <div class="shadow-holder"></div>
            </div>
            <div class="single-box">
                <div class="circle-holder"></div>
                <div class="shadow-holder"></div>
            </div>
            <div class="single-box">
                <div class="circle-holder"></div>
                <div class="shadow-holder"></div>
            </div>
        </div>
    </div>

    <a href="#main-wrapper" id="backto-top" class="back-to-top" aria-label="Back To Top">
        <i class="regular-direction-up"></i>
    </a>

    <div id="main-wrapper" class="main-wrapper">
        <!---- header ---->
        @include('frontend.layouts.header')

        <!---- Main content ----->
        @yield('mainContent')

        <!---- Footer ---->
        @include('frontend.layouts.footer')

    </div>
    <!-- Search Start -->
    <div id="search-trigger" class="search-input-wrap">
        <div class="container">
            <button type="button" class="close">×</button>
            <form class="search-form">
                <input type="search" value="" placeholder="Search" />
                <button type="submit" class="search-btn">
                    <i class="regular-search-02"></i>
                </button>
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Jquery Js -->
    <script src="{{ asset('assets/frontend/js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/jquery.style.switcher.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/jquery.mb.YTPlayer.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/theia-sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/resize-sensor.min.js') }}"></script>
    <!-- Site Scripts -->
    <script src="{{ asset('assets/frontend/js/app.js') }}"></script>
    <script src="{{ asset('assets/admin') }}/js/toastr.min.js"></script>
    @stack('scripts')
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
</body>
</html>