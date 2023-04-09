<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="Abdul Majid">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $setting = App\Models\Setting::find(1);
    @endphp
    @if ($setting)
        <link rel="shortcut icon" href="{{ asset('uploads/settings/' . $setting->favicon) }}" type="image/x-icon">
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="stylesheet" href="{{ asset('public/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/custom.css') }}">

    <link rel="stylesheet" href="{{ asset('/public/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/assets/css/owl.theme.default.min.css') }}">


</head>

<body>
    <div id="app">

        @include('layouts.inc.frontend-navbar')

        <main class="">
            @yield('content')
        </main>

        @include('layouts.inc.frontend-footer')

    </div>

    <!-- Scripts -->
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->

    <script src="{{ asset('/public/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/public/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/public/assets/js/owl.carousel.min.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}


    <script>
        $('.owl-carousel').owlCarousel({
            stagePadding: 50,
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
    @yield('scripts')
</body>

</html>
