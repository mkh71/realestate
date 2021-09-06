<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="ABAR Real Estate">
    @yield('meta')
    <title>{{ config('app.name') }} @yield('title')</title>
    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
          rel="stylesheet">
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('website/style/vendors/fontawesome-pro-5/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('website/style/vendors/bootstrap-select/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/style/vendors/slick/slick.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/style/vendors/magnific-popup/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/style/vendors/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/style/vendors/chartjs/Chart.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/style/vendors/dropzone/css/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/style/vendors/animate.css')}}">
    <link href="{{url('admin/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('website/style/vendors/timepicker/bootstrap-timepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/style/vendors/mapbox-gl/mapbox-gl.css')}}">
    <!-- Themes core CSS -->
    <link rel="stylesheet" href="{{asset('website/style/themes.css')}}">
    <!-- Favicons -->
    <link rel="icon" href="{{asset('website/images/favicon.ico')}}">
    <link rel="stylesheet" href="{{url('admin/css/sweetalert.css')}}">

    {{--<!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Home 01">
    <meta name="twitter:description" content="Real Estate Html Template">
    <meta name="twitter:image" content="images/homeid-social-logo.png">
    <!-- Facebook -->
    <meta property="og:url" content="home-01.html">
    <meta property="og:title" content="Home 01">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="images/homeid-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">--}}
    @yield('css')
</head>
<body>
    @include('layouts.includes.header')
    <main id="content">
        <!-- Navbar -->
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
         @yield('content')
        <!-- /.content-wrapper -->

        {{--<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
--}}
    </main>
    <div class="">
        @include('layouts.includes.footer')
    </div>
    {{--Scripts--}}
    <script src="{{asset('website/style/vendors/jquery.min.js')}}"></script>
    <script src="{{asset('website/style/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('website/style/vendors/bootstrap/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('website/style/vendors/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('website/style/vendors/slick/slick.min.js')}}"></script>
    <script src="{{asset('website/style/vendors/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('website/style/vendors/counter/countUp.js')}}"></script>
    <script src="{{asset('website/style/vendors/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('website/style/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('website/style/vendors/dropzone/js/dropzone.min.js')}}"></script>
    <script src="{{url('admin/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('website/style/vendors/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('website/style/vendors/hc-sticky/hc-sticky.min.js')}}"></script>
    <script src="{{asset('website/style/vendors/jparallax/TweenMax.min.js')}}"></script>
    <script src="{{asset('website/style/vendors/mapbox-gl/mapbox-gl.js')}}"></script>
    <script src="{{url('admin/js/sweetalert.min.js')}}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    {{--
        pk.eyJ1IjoiYWdiZW5sYSIsImEiOiJja3NuNjQyMDMwbGhrMnZwZXM2eXBiNWFuIn0.a9kQ4CbLbPefJ_pLR3C_yw
        sk.eyJ1IjoiYWdiZW5sYSIsImEiOiJja3NuNjJjenUwYTh4MnhvNnBkZnNmMXRnIn0.biqSEUJd9jJOEEXPM4cvlA
    --}}
    <!-- Theme scripts -->
    <script src="{{asset('website/style/theme.js')}}"></script>
    <script src="{{asset('js/customJS.js')}}"></script>
    @yield('script')
    @yield('js')

    <div class="position-fixed pos-fixed-bottom-right p-6 z-index-10">
        <a href="#"
           class="gtf-back-to-top bg-white text-primary hover-white bg-hover-primary shadow p-0 w-52px h-52 rounded-circle fs-20 d-flex align-items-center justify-content-center"
           title="Back To Top"><i
                class="fal fa-arrow-up"></i></a>
    </div>

</body>
</html>
