<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | Home</title>
    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

<!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <meta name="description" content="ABAR Real Estate">
    <meta name="author" content="">
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
    <link rel="stylesheet" href="{{asset('website/style/vendors/timepicker/bootstrap-timepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/style/vendors/mapbox-gl/mapbox-gl.min.css')}}">
    <!-- Themes core CSS -->
    <link rel="stylesheet" href="{{asset('website/style/themes.css')}}">
    <!-- Favicons -->
    <link rel="icon" href="{{asset('website/images/favicon.ico')}}">
    <style>
        .checked{
            color: #fff !important;
            background: #0b0b0b !important;
            padding: 10px;
            border-right: 20px;
        }
    </style>
</head>
<body>
    <header class="main-header position-absolute fixed-top m-0 navbar-dark header-sticky header-sticky-smart header-mobile-xl">
        <div class="sticky-area">
            <div class="container container-xxl">
                <div class="d-flex align-items-center">
                    <nav class="navbar navbar-expand-xl bg-transparent px-0 w-100 w-xl-auto">
                        <a class="navbar-brand mr-7" href="{{route('index')}}">
                            <img src="{{asset('storage/'.company()->logo)}}" alt="{{company()->name}}" class="normal-logo">
                            <img src="{{asset('storage/'.company()->logo)}}" alt="{{company()->name}}" class="sticky-logo">
                        </a>
                        <a class="d-block d-xl-none ml-auto mr-4 position-relative text-white p-2" href="#">
                            <i class="fal fa-heart fs-large-4"></i>
                            <span class="badge badge-primary badge-circle badge-absolute">1</span>
                        </a>
                        <button class="navbar-toggler border-0 px-0" type="button" data-toggle="collapse"
                                data-target="#primaryMenu02"
                                aria-controls="primaryMenu02" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="text-white fs-24"><i class="fal fa-bars"></i></span>
                        </button>
                        <div class="collapse navbar-collapse mt-3 mt-xl-0" id="primaryMenu02">
                            <ul class="navbar-nav hover-menu main-menu px-0 mx-xl-n4">
                                <li id="navbar-item-home" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                    <a class="nav-link p-0"
                                       href="{{route('index')}}">
                                        Home
                                    </a>
                                </li>
                                <li id="navbar-item" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                    <a class="nav-link p-0"
                                       href="{{route('all_properties')}}">
                                        All Properties
                                    </a>
                                </li>
                                <li id="navbar-item" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                    <a class="nav-link p-0"
                                       href="{{route('services')}}">
                                       Services
                                    </a>
                                </li>
                                {{--<li id="navbar-item" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                    <a class="nav-link p-0"
                                       href="{{route('agents')}}">
                                       Agents
                                    </a>
                                </li>--}}
                                <li id="navbar-item" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                    <a class="nav-link p-0"
                                       href="{{route('packages')}}">
                                        Packages
                                    </a>
                                </li>

                                <li id="navbar-item-pages" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item dropdown py-2 py-lg-5 px-0 px-lg-4">
                                    <a class="nav-link dropdown-toggle p-0"
                                       href="#" data-toggle="dropdown" >
                                        Pages
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu pt-3 pb-0 pb-lg-3" aria-labelledby="navbar-item-pages">
                                        {{--<li class="dropdown-item">
                                            <a id="navbar-link-compare"
                                               class="dropdown-link"
                                               href="{{route('comparison')}}">
                                               Compare
                                            </a>
                                        </li>--}}
                                        <li class="dropdown-item">
                                            <a id="navbar-link-news"
                                               class="dropdown-link"
                                               href="{{route('tc_pp')}}">
                                               T&C- Privacy Policy
                                            </a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a id="navbar-link-faqs"
                                               class="dropdown-link"
                                               href="{{route('faq')}}" >
                                               FAQs
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="navbar-item" aria-haspopup="true" aria-expanded="false"
                                    class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                    <a class="nav-link p-0"
                                       href="{{route('contact')}}">
                                       Contact Us
                                    </a>
                                </li>
                            </ul>
                            <div class="d-block d-xl-none">
                                <ul class="navbar-nav flex-row ml-auto align-items-center justify-content-lg-end flex-wrap py-2">
                                    @if(auth()->user())

                                        <li class="nav-item ml-auto w-100 w-sm-auto">
                                            <a class="btn btn-primary btn-lg"
                                               href="{{route('property_add')}}">
                                                Add listing
                                                <img src="{{asset('website')}}/images/add-listing-icon.png" alt="Add listing"
                                                     class="ml-1">
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link pl-3 pr-2"  href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">SIGN
                                                OUT</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    @else
                                        <li class="nav-item ">
                                            <a class="nav-link pl-3 pr-2" data-toggle="modal" href="#login-register-modal">SIGN IN</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="ml-auto d-none d-xl-block">
                        <ul class="navbar-nav flex-row ml-auto align-items-center justify-content-lg-end flex-wrap py-2">
                            @if(auth()->user())

                                <li class="nav-item">
                                    <a class="btn btn-outline-light btn-lg text-white rounded-lg bg-hover-primary border-hover-primary hover-white d-none d-lg-block"
                                       href="dashboard-add-new-property.html">
                                        Add listing
                                        <img src="{{asset('website')}}/images/add-listing-icon.png" alt="Add listing"
                                             class="ml-1 normal-button-icon">
                                        <img src="{{asset('website')}}/images/add-listing-icon-primary.png"
                                             alt="Add listing"
                                             class="ml-1 sticky-button-icon">
                                    </a>
                                    <a class="btn btn-primary btn-lg d-block d-lg-none"
                                       href="dashboard-add-new-property.html">
                                        Add listing
                                        <img src="{{asset('website')}}/images/add-listing-icon.png" alt="Add listing"
                                             class="ml-1">
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link pl-3 pr-2"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">SIGN
                                        OUT</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @else
                            <li class="nav-item ">
                                <a class="nav-link pl-3 pr-2" data-toggle="modal" href="#login-register-modal">SIGN
                                    IN</a>
                            </li>
                            @endif
                            {{--<li class="divider"></li>
                            <li class="nav-item mr-auto mr-lg-6">
                                <a class="nav-link px-2 position-relative" href="#">
                                    <i class="fal fa-heart fs-large-4"></i>
                                    <span class="badge badge-primary badge-circle badge-absolute">1</span>
                                </a>
                            </li>--}}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main id="content">
    <section class="d-flex flex-column">
            <div style="background-image: url('{{asset('storage/'.homeCover()->url)}}')"
                 class="bg-cover d-flex align-items-center custom-vh-100">
                <div class="container pt-lg-15 py-8" data-animate="zoomIn">
                    <p class="text-white fs-md-22 fs-18 font-weight-500 letter-spacing-367 mb-6 text-center text-uppercase">
                        Let us guide your home</p>
                    <h2 class="text-white display-2 text-center mb-sm-13 mb-8">{{homeCover()->title}}</h2>
                    {{Form::open(['route'=>'search_properties', 'method'=>'post', 'class'=>'property-search py-lg-0 z-index-2 position-relative d-none d-lg-block'])}}
                        <div class="row no-gutters">
                            <div class="col-md-5 col-lg-4 col-xl-3">
                                <input class="search-field" type="hidden" name="status" value=1
                                       data-default-value="">
                                <ul class="nav nav-pills property-search-status-tab">
                                    <li class="nav-item bg-secondary rounded-top" role="presentation">
                                        <a href="#" role="tab" aria-selected="true"
                                           class="nav-link btn shadow-none rounded-bottom-0 text-white text-btn-focus-secondary text-uppercase d-flex align-items-center fs-13 rounded-bottom-0 bg-active-white text-active-secondary letter-spacing-087 flex-md-1 px-4 py-2 active"
                                           data-toggle="pill" data-value=1>
                                            <svg class="icon icon-villa fs-22 mr-2">
                                                <use xlink:href="#icon-villa"></use>
                                            </svg>
                                            for sale
                                        </a>
                                    </li>
                                    <li class="nav-item bg-secondary rounded-top" role="presentation">
                                        <a href="#" role="tab" aria-selected="true"
                                           class="nav-link btn shadow-none rounded-bottom-0 text-white text-btn-focus-secondary text-uppercase d-flex align-items-center fs-13 rounded-bottom-0 bg-active-white text-active-secondary letter-spacing-087 flex-md-1 px-4 py-2"
                                           data-toggle="pill" data-value=0>
                                            <svg class="icon icon-building fs-22 mr-2">
                                                <use xlink:href="#icon-building"></use>
                                            </svg>
                                            for rent
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="bg-white px-6 rounded-bottom rounded-top-right pb-6 pb-lg-0">
                            <div class="row align-items-center"
                                 id="accordion-4">
                                <div class="col-md-6 col-lg-3 col-xl-3 pt-6 pt-lg-0 order-1">
                                    <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Home
                                        Type</label>
                                    {{Form::select('home_type_id', homeTypes(), null, ['placeholder'=>'Select Home Type', 'class'=>"form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input", "title"=>"Select", "data-style"=>"p-0 h-24 lh-17 text-dark"])}}
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-5 pt-6 pt-lg-0 order-2">
                                    <label class="text-uppercase font-weight-500 letter-spacing-093">Search</label>
                                    <div class="position-relative">
                                        <input type="text" name="keyword"
                                               class="form-control bg-transparent shadow-none border-top-0 border-right-0 border-left-0 border-bottom rounded-0 h-24 lh-17 pl-0 pr-4 font-weight-600 border-color-input placeholder-muted"
                                               placeholder="Enter Property Name Or address...">
                                        <i class="far fa-search position-absolute pos-fixed-right-center pr-0 fs-18 mt-n3"></i>
                                    </div>
                                </div>

                                <div class="col-sm pr-lg-0 pt-6 pt-lg-0 order-3">
                                    <a href="#advanced-search-filters-4"
                                       class="btn advanced-search btn-accent h-lg-100 w-100 shadow-none text-secondary rounded-0 fs-14 fs-sm-16 font-weight-600 text-left d-flex align-items-center collapsed"
                                       data-toggle="collapse" data-target="#advanced-search-filters-4"
                                       aria-expanded="true"
                                       aria-controls="advanced-search-filters-4">
                                        Advanced Search
                                    </a>
                                </div>
                                <div class="col-sm pt-6 pt-lg-0 order-sm-4 order-5">
                                    <button type="submit"
                                            class="btn btn-primary shadow-none fs-16 font-weight-600 w-100 py-lg-2 lh-213">
                                        Search
                                    </button>
                                </div>
                                <div id="advanced-search-filters-4"
                                     class="col-12 pt-4 pb-sm-4 order-sm-5 order-4 collapse"
                                     data-parent="#accordion-4">
                                    <div class="row">

                                        <div class="col-sm-6 col-lg-3 pt-6">
                                            <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">All
                                                States</label>
                                            <select
                                                class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input"
                                                name="state"
                                                title="All States" data-style="p-0 h-24 lh-17 text-dark">
                                                <option value={{null}}>Any</option>
                                                @foreach(states() as $state)
                                                    <option>{{$state->state}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-lg-3 pt-6">
                                            <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">All
                                                Cities</label>
                                            <select
                                                class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input"
                                                name="city"
                                                title="All Cities" data-style="p-0 h-24 lh-17 text-dark">
                                                <option value={{null}}>All Cities</option>
                                                @foreach(cities() as $city)
                                                    <option>{{$city->city}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-lg-3 pt-6">
                                            <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Bedrooms</label>
                                            <select
                                                class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input"
                                                name="bedroom"
                                                title="All Bedrooms" data-style="p-0 h-24 lh-17 text-dark">
                                                <option value={{null}}>Any</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-lg-3 pt-6">
                                            <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Bathrooms</label>
                                            <select
                                                class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input"
                                                title="All Bathrooms" data-style="p-0 h-24 lh-17 text-dark"
                                                name="bathroom">
                                                <option value={{null}}>Any</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                            </select>
                                        </div>


                                        <div class="col-sm-6 col-lg-3 pt-6 slider-range slider-range-secondary">
                                            <label for="price-1-4" class="mb-4 text-gray-light">Price Range</label>
                                            <div data-slider="true"
                                                 data-slider-options='{"min":1,"max":1000000,"values":[100,100000],"type":"currency"}'>
                                            </div>
                                            <div class="text-center mt-2">
                                                <input id="price-1-4" type="text" readonly name="price"
                                                       class="border-0 amount text-center text-body font-weight-500 bg-transparent">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-12 pt-6 pb-2">
                                            <a class="lh-17 d-inline-block other-feature collapsed"
                                               data-toggle="collapse"
                                               href="#other-feature-4"
                                               role="button"
                                               aria-expanded="false" aria-controls="other-feature-4" >
                                                <span class="fs-15 text-heading font-weight-500 hover-primary">Other Features</span>
                                            </a>
                                        </div>
                                        <div class="collapse row mx-0 w-100" id="other-feature-4">

                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check1-4"
                                                           name="features[balcony]">
                                                    <label class="custom-control-label" for="check1-4">Balcony</label>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check2-4"
                                                           name="features[dining]">
                                                    <label class="custom-control-label text-capitalize" for="check2-4">dining</label>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check3-4"
                                                           name="features[drawing]">
                                                    <label class="custom-control-label text-capitalize" for="check3-4">drawing</label>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check4-4"
                                                           name="features[public_gasline]">
                                                    <label class="custom-control-label text-capitalize" for="check4-4">public gas line</label>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check5-4"
                                                           name="features[public_waterline]">
                                                    <label class="custom-control-label text-capitalize" for="check5-4">public water line</label>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check6-4"
                                                           name="features[ac]">
                                                    <label class="custom-control-label" for="check6-4">Air Conditioning</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check7-4"
                                                           name="features[laundry]">
                                                    <label class="custom-control-label" for="check7-4">Laundry</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check8-4"
                                                           name="features[washer]">
                                                    <label class="custom-control-label" for="check8-4">Washer</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check9-4"
                                                           name="features[barbeque]">
                                                    <label class="custom-control-label" for="check9-4">Barbeque</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check10-4"
                                                           name="features[lawn]">
                                                    <label class="custom-control-label" for="check10-4">Lawn</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check11-4"
                                                           name="features[sauna]">
                                                    <label class="custom-control-label" for="check11-4">Sauna</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check12-4"
                                                           name="features[wifi]">
                                                    <label class="custom-control-label" for="check12-4">WiFi</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check13-4"
                                                           name="features[dryer]">
                                                    <label class="custom-control-label" for="check13-4">Dryer</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check14-4"
                                                           name="features[microwave]">
                                                    <label class="custom-control-label"
                                                           for="check14-4">Microwave</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check15-4"
                                                           name="features[swimming_pool]">
                                                    <label class="custom-control-label" for="check15-4">Swimming
                                                        Pool</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check16-4"
                                                           name="features[window_covering]">
                                                    <label class="custom-control-label" for="check16-4">Window
                                                        Coverings</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check17-4"
                                                           name="features[gym]">
                                                    <label class="custom-control-label" for="check17-4">Gym</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check18-4"
                                                           name="features[outdoor_shower]">
                                                    <label class="custom-control-label" for="check18-4">Outdoor
                                                        Shower</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check19-4"
                                                           name="features[tv_cable]">
                                                    <label class="custom-control-label" for="check19-4">TV Cable</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check20-4"
                                                           name="features[refrigerator]">
                                                    <label class="custom-control-label"
                                                           for="check20-4">Refrigerator</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{Form::close()}}
                    {{Form::open(['route'=>'search_properties', 'method'=>'post', 'class'=>'property-search property-search-mobile d-lg-none z-index-2 position-relative bg-white rounded mx-md-10'])}}
                        <div class="row align-items-lg-center" id="accordion-4-mobile">
                            <div class="col-12">
                                <div class="form-group mb-0 position-relative">
                                    <a href="#advanced-search-filters-4-mobile"
                                       class="text-secondary btn advanced-search shadow-none pr-3 pl-0 d-flex align-items-center position-absolute pos-fixed-left-center py-0 h-100 border-right collapsed"
                                       data-toggle="collapse" data-target="#advanced-search-filters-4-mobile"
                                       aria-expanded="true"
                                       aria-controls="advanced-search-filters-4-mobile" style="z-index:9 !important;">
                                    </a>
                                    <input type="text"
                                           class="form-control form-control-lg border shadow-none pr-9 pl-11 bg-white placeholder-muted"
                                           name="keyword"
                                           placeholder="Search...">

                                    <button type="submit"
                                            class="btn position-absolute pos-fixed-right-center p-0 text-heading fs-20 px-3 shadow-none h-100 border-left">
                                        <i class="far fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="advanced-search-filters-4-mobile" class="col-12 pt-2 px-7 collapse"
                                 data-parent="#accordion-4-mobile">
                                <div class="row mx-n2">

                                    <div class="col-sm-6 pt-4 px-2">
                                        <select
                                            class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                            title="Select" data-style="btn-lg py-2 h-52 bg-transparent" name="type">
                                            <option>All status</option>
                                            <option value=0>For Rent</option>
                                            <option value=1>For Sale</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 pt-4 px-2">
                                        {{Form::select('home_type_id', homeTypes(), null,
                                                ['placeholder'=>'Select Home Type',  'class'=>"form-control border shadow-none form-control-lg selectpicker bg-transparent", "title"=>"All Types", "data-style"=>"btn-lg py-2 h-52 bg-transparent"])}}

                                    </div>
                                    <div class="col-sm-6 pt-4 px-2">
                                        <select
                                            class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                            name="state"
                                            title="All States" data-style="btn-lg py-2 h-52 bg-transparent">
                                            <option value={{null}}>Any</option>
                                            @foreach(states() as $state)
                                                <option>{{$state->state}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6 pt-4 px-2">
                                        <select
                                            class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                            title="All Cities" data-style="btn-lg py-2 h-52 bg-transparent" name="city">
                                            <option value={{null}}>All Cities</option>
                                            @foreach(cities() as $city)
                                                <option>{{$city->city}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6 pt-4 px-2">
                                        <select
                                            class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                            name="bedroom"
                                            title="Bedrooms" data-style="btn-lg py-2 h-52 bg-transparent">
                                            <option value="{{null}}">Any</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 pt-4 px-2">
                                        <select class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                            name="bathrooms"
                                            title="Bathrooms" data-style="btn-lg py-2 h-52 bg-transparent">
                                            <option value="{{null}}">Any</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 pt-6 slider-range slider-range-secondary">
                                        <label for="price-4-mobile" class="mb-4 text-white">Price Range</label>
                                        <div data-slider="true"
                                             data-slider-options='{"min":0,"max":1000000,"values":[100,100000],"type":"currency"}'></div>
                                        <div class="text-center mt-2">
                                            <input id="price-4-mobile" type="text" readonly
                                                   class="border-0 amount text-center bg-transparent font-weight-500"
                                                   name="price">
                                        </div>
                                    </div>

                                    <div class="col-12 pt-4 pb-2">
                                        <a class="lh-17 d-inline-block other-feature collapsed" data-toggle="collapse"
                                           href="#other-feature-4-mobile"
                                           role="button"
                                           aria-expanded="false" aria-controls="other-feature-4-mobile">
                                            <span class="fs-15 font-weight-500 hover-primary">Other Features</span>
                                        </a>
                                    </div>
                                    <div class="collapse row mx-0 w-100" id="other-feature-4-mobile">
                                        <div class="col-sm-6 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check1-4-mobile"
                                                       name="features[balcony]">
                                                <label class="custom-control-label" for="check1-4-mobile">Balcony</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check1-4-mobile"
                                                       name="features[balcony]">
                                                <label class="custom-control-label" for="check1-4-mobile">Balcony</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check2-4-mobile"
                                                       name="features[dining]">
                                                <label class="custom-control-label text-capitalize" for="check2-4-mobile">dining</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check3-4-mobile"
                                                       name="features[drawing]">
                                                <label class="custom-control-label text-capitalize" for="check3-4-mobile">drawing</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check4-4-mobile"
                                                       name="features[public_gasline]">
                                                <label class="custom-control-label text-capitalize" for="check4-4-mobile">public gas line</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check5-4-mobile"
                                                       name="features[public_waterline]">
                                                <label class="custom-control-label text-capitalize" for="check5-4-mobile">public water line</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check6-4-mobile"
                                                       name="features[ac]">
                                                <label class="custom-control-label" for="check6-4-mobile">Air Conditioning</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check7-4-mobile"
                                                       name="features[laundry]">
                                                <label class="custom-control-label" for="check7-4-mobile">Laundry</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check8-4-mobile"
                                                       name="features[washer]">
                                                <label class="custom-control-label" for="check8-4-mobile">Washer</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check9-4-mobile"
                                                       name="features[barbeque]">
                                                <label class="custom-control-label" for="check9-4-mobile">Barbeque</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check10-4-mobile"
                                                       name="features[lawn]">
                                                <label class="custom-control-label" for="check10-4-mobile">Lawn</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check11-4-mobile"
                                                       name="features[sauna]">
                                                <label class="custom-control-label" for="check11-4-mobile">Sauna</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check12-4-mobile"
                                                       name="features[wifi]">
                                                <label class="custom-control-label" for="check12-4-mobile">WiFi</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check13-4-mobile"
                                                       name="features[dryer]">
                                                <label class="custom-control-label" for="check13-4-mobile">Dryer</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check14-4-mobile"
                                                       name="features[microwave]">
                                                <label class="custom-control-label"
                                                       for="check14-4-mobile">Microwave</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check15-4-mobile"
                                                       name="features[swimming_pool]">
                                                <label class="custom-control-label" for="check15-4-mobile">Swimming
                                                    Pool</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check16-4-mobile"
                                                       name="features[window_covering]">
                                                <label class="custom-control-label" for="check16-4-mobile">Window
                                                    Coverings</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check17-4-mobile"
                                                       name="features[gym]">
                                                <label class="custom-control-label" for="check17-4-mobile">Gym</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check18-4-mobile"
                                                       name="features[outdoor_shower]">
                                                <label class="custom-control-label" for="check18-4-mobile">Outdoor
                                                    Shower</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check19-4-mobile"
                                                       name="features[tv_cable]">
                                                <label class="custom-control-label" for="check19-4-mobile">TV Cable</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check20-4-mobile"
                                                       name="features[refrigerator]">
                                                <label class="custom-control-label"
                                                       for="check20-4-mobile">Refrigerator</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </section>
        {{--Section for Sell Property --}}
        <section class="pt-lg-12 pb-lg-10 py-11">
            <div class="container container-xxl">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-heading">Best Properties For Sale</h2>
                        <span class="heading-divider"></span>
                        <p class="mb-6">Choose the best one for you. We are here to help you</p>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <a href="{{route('all_properties',['for'=>encrypt(1)])}}"
                           class="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">See all properties
                            <i class="far fa-long-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="slick-slider slick-dots-mt-0 custom-arrow-spacing-30"
                     data-slick-options='{"slidesToShow": 4, "autoplay":true,"dots":true,"responsive":[{"breakpoint": 1600,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":2,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"arrows":false,"dots":true,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>
                    @foreach($sells as $sell)
                        <div class="box box pb-7 pt-2" data-animate="fadeInUp">
                            @include('website.InfoProperty', ['info' => $sell])
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{--Section for Property Types--}}
        <section>
            <div class="bg-gray-02 py-lg-13 pt-11 pb-6">
                <div class="container container-xxl">
                    <div class="row">
                        <div class="col-lg-4 pr-xl-13" data-animate="fadeInLeft">
                            <h2 class="text-heading lh-1625">Explore <br>
                                by Property Type</h2>
                            <span class="heading-divider"></span>
                            <p class="mb-6">
                                 Lets find your dream with our various types of properties.
                            </p>
                            <a href="{{route('all_properties')}}"
                               class="btn btn-lg text-secondary btn-accent">{{count($sells)+count($rents)}} Available Properties
                                <i class="far fa-long-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="col-lg-8" data-animate="fadeInRight">
                            <div class="slick-slider arrow-haft-inner custom-arrow-xxl-hide mx-0"
                                 data-slick-options='{"slidesToShow": 4, "autoplay":true,"dots":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 3,"arrows":false,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 2,"arrows":false,"autoplay":true}}]}'>
                                @foreach($types as $type)
                                    <div class="box px-0 py-6">
                                        <a href="{{route('all_properties', ['home_type'=>encrypt($type->id)])}}"
                                           class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                                            <img src="{{asset('storage/'.$type->icon)}}" class="card-img-top"
                                                 alt="Apartment">
                                            <div class="card-body px-0 pt-5 pb-0">
                                                <h4 class="card-title fs-16 lh-2 text-dark mb-0">{{$type->name}}</h4>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{--Section for Rental Property --}}
        <section class="pt-lg-12 pb-lg-11 py-11">
            <div class="container container-xxl">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-heading">Best Properties For Rent</h2>
                        <span class="heading-divider"></span>
                        <p class="mb-6">We are here to help you to find your easiest daily life.</p>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <a href="{{route('all_properties',['for'=>encrypt(0)])}}"
                           class="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">See all properties
                            <i class="far fa-long-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="slick-slider slick-dots-mt-0 custom-arrow-spacing-30"
                     data-slick-options='{"slidesToShow": 4,"dots":true,"arrows":false,"responsive":[{"breakpoint": 1600,"settings": {"slidesToShow":3}},{"breakpoint": 992,"settings": {"slidesToShow":2,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"arrows":false,"dots":true,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>
                    @foreach($rents as $rent)
                        <div class="box box pb-7 pt-2" data-animate="fadeInUp">
                            @include('website.InfoProperty', ['info' => $rent])
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{--Find through address section--}}
        <section>
            <div class="bg-single-image pt-lg-13 pb-lg-12 py-11 bg-secondary">
                <div class="container container-xxl">
                    <div class="row align-items-center">
                        <div class="col-lg-6 pr-xl-8 pb-lg-0 pb-6" data-animate="fadeInLeft">
                            <a href="#" class="hover-shine d-block">
                                <img src="{{asset('website')}}/images/single-image-01.jpg" class="rounded-lg w-100"
                                     alt="Find your neighborhood">
                            </a>
                        </div>
                        <div class="col-lg-6 pl-xl-8" data-animate="fadeInRight">
                            <h2 class="text-white lh-1625">Find your<br/>
                                neighborhood</h2>
                            <span class="heading-divider"></span>
                            <p class="mb-6 text-white">
                                Search an address where you want to find your best relaxation life
                            </p>
                            {{Form::open(['route'=>'search_properties', 'method'=>'post'])}}
                            <div class="input-group input-group-lg pr-sm-17">
                                <input type="text"
                                       class="form-control fs-13 font-weight-500 text-gray-light rounded-lg rounded-right-0 border-0 shadow-none h-52 bg-white"
                                       name="keyword" placeholder="Enter an address, neighbourhood">
                                <button type="submit"
                                        class="btn btn-primary fs-18 rounded-left-0 rounded-lg px-6 border-0">
                                    <i class="far fa-search"></i>
                                </button>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-lg-12 pb-lg-15 py-11">
            <div class="container container-xxl">
                <h2 class="text-heading">Services We Provide</h2>
                <span class="heading-divider"></span>
                <p class="mb-7">We are also provide you amazing services to shine your life style with you dream property.</p>
                <div class="slick-slider mx-n2"
                     data-slick-options='{"slidesToShow": 5,"arrows":false, "autoplay":false,"dots":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":3}},{"breakpoint": 992,"settings": {"slidesToShow":3}},{"breakpoint": 768,"settings": {"slidesToShow": 2}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>
                    @foreach($services as $service)
                        <div class="box px-2" data-animate="fadeInUp">
                            <div class="card text-white bg-overlay-gradient-8 hover-zoom-in">
                                <img src="{{asset('storage/'.$service->serviceImages[0]->url)}}" class="card-img img-fluid img-thumbnail"
                                     alt="{{$service->name}}" style="height: 250px">
                                <div class="card-img-overlay d-flex justify-content-end flex-column p-4">
                                    <h2 class="card-title mb-0 fs-20 lh-182">
                                        <a href="{{route('service_dtl', $service->id)}}"
                                           class="text-white">{{$service->name}}</a>
                                    </h2>
                                    <p class="card-text fs-13 font-weight-500 letter-spacing-087">{{$service->type}} | <span
                                            class="ml-2 fs-15 font-weight-bold">${{$service->price}}</span></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        <div class="box px-2" data-animate="fadeInUp">
                            <div class="card text-white bg-overlay-gradient-8">
                                <img src="{{asset('website')}}/images/properties-city-01.jpg" class="card-img img-fluid"
                                     alt="All Services" style="height: 250px">
                                <div class="card-img-overlay d-flex justify-content-end flex-column p-4">
                                    <h2 class="card-title mb-0 fs-20 lh-182">
                                        <a href="{{route('services')}}"
                                           class="text-white">View All Services</a>
                                    </h2>
                                    <p class="card-text fs-13 font-weight-500 letter-spacing-087">Maintenances & Developments</p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>

        <section class="pt-lg-12 pb-lg-15 py-11">
            <div class="container container-xxl">
                <h2 class="text-heading">Destinations We Love The Most</h2>
                <span class="heading-divider"></span>
                <p class="mb-7">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p>
                <div class="slick-slider mx-n2"
                     data-slick-options='{"slidesToShow": 5,"arrows":false, "autoplay":false,"dots":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":3}},{"breakpoint": 992,"settings": {"slidesToShow":3}},{"breakpoint": 768,"settings": {"slidesToShow": 2}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>

                    <div class="box px-2" data-animate="fadeInUp">
                        <div class="card text-white bg-overlay-gradient-8 hover-zoom-in">
                            <img src="{{asset('website')}}/images/properties-city-01.jpg" class="card-img"
                                 alt="New York">
                            <div class="card-img-overlay d-flex justify-content-end flex-column p-4">
                                <h2 class="card-title mb-0 fs-20 lh-182"><a href="single-property-1.html"
                                                                            class="text-white">New York</a></h2>
                                <p class="card-text fs-13 font-weight-500 letter-spacing-087">FROM<span
                                        class="ml-2 fs-15 font-weight-bold">$540.000 - $900.000</span></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{--Section Buy-Sell-Rent opt--}}
        <section class="bg-accent pt-10 pb-lg-11 pb-8 bg-patten-04">
            <div class="container container-xxl">
                <h2 class="text-dark text-center mxw-751 fs-26 lh-184 px-md-8">
                    We have the most listings and constant updates.
                    So you’ll never miss out.</h2>
                <span class="heading-divider mx-auto"></span>
                <div class="row mt-8">
                    <div class="col-lg-4 mb-6 mb-lg-0" data-animate="zoomIn">
                        <div
                            class="card border-hover shadow-2 shadow-hover-lg-1 pl-5 pr-6 py-6 h-100 hover-change-image">
                            <div class="row no-gutters">
                                <div class="col-sm-3">
                                    <img src="{{asset('website')}}/images/group-16.png"
                                         alt="Buy a new home">
                                </div>
                                <div class="col-sm-9">
                                    <div class="card-body p-0 pl-0 pl-sm-5 pt-5 pt-sm-0">
                                        <a href="{{route('all_properties', ['for'=>encrypt(1)])}}"
                                           class="d-flex align-items-center text-dark hover-secondary"><h4
                                                class="fs-20 lh-1625 mb-1">Buy a new home </h4>
                                            <span
                                                class="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                          <svg class="icon icon-long-arrow"><use
                                  xlink:href="#icon-long-arrow"></use></svg>
                        </span>
                                        </a>
                                        <p class="mb-0">
                                            Buy your dream home/property from our best selection. We are here to provide you best one.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-6 mb-lg-0" data-animate="zoomIn">
                        <div
                            class="card border-hover shadow-2 shadow-hover-lg-1 pl-5 pr-6 py-6 h-100 hover-change-image">
                            <div class="row no-gutters">
                                <div class="col-sm-3">
                                    <img src="{{asset('website')}}/images/group-17.png"
                                         alt="Sell a home">
                                </div>
                                <div class="col-sm-9">
                                    <div class="card-body p-0 pl-0 pl-sm-5 pt-5 pt-sm-0">
                                        <a href="{{route('property_add')}}"
                                           class="d-flex align-items-center text-dark hover-secondary"><h4
                                                class="fs-20 lh-1625 mb-1">Sell a home </h4>
                                            <span
                                                class="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                          <svg class="icon icon-long-arrow"><use
                                  xlink:href="#icon-long-arrow"></use></svg>
                        </span>
                                        </a>
                                        <p class="mb-0">
                                            Want to sell property? Don't worry! Just login and add your listing. We are arranged a suitable panel for your listing.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-6 mb-lg-0" data-animate="zoomIn">
                        <div
                            class="card border-hover shadow-2 shadow-hover-lg-1 pl-5 pr-6 py-6 h-100 hover-change-image">
                            <div class="row no-gutters">
                                <div class="col-sm-3">
                                    <img src="{{asset('website')}}/images/group-21.png"
                                         alt="Rent a home">
                                </div>
                                <div class="col-sm-9">
                                    <div class="card-body p-0 pl-0 pl-sm-5 pt-5 pt-sm-0">
                                        <a href="{{route('all_properties', ['for'=>encrypt(0)])}}"
                                           class="d-flex align-items-center text-dark hover-secondary"><h4
                                                class="fs-20 lh-1625 mb-1">Rent a home </h4>
                                            <span
                                                class="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                          <svg class="icon icon-long-arrow"><use
                                  xlink:href="#icon-long-arrow"></use></svg>
                        </span>
                                        </a>
                                        <p class="mb-0">
                                            Choose the best one to live your shining rental life. We care about your needs.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{--Section Partner--}}
        <section>
            <div class="container container-xxl">
                <div class="py-lg-8 py-6 border-top">
                    <div class="slick-slider mx-0 partners"
                         data-slick-options='{"slidesToShow": 6, "autoplay":true,"dots":false,"arrows":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":4}},{"breakpoint": 992,"settings": {"slidesToShow":3}},{"breakpoint": 768,"settings": {"slidesToShow": 3}},{"breakpoint": 576,"settings": {"slidesToShow": 2}}]}'>
                        <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                            <a href="#" class="item position-relative hover-change-image">
                                <img src="{{asset('website')}}/images/partner-hover-1.png"
                                     class="hover-image position-absolute pos-fixed-top" alt="Partner 1">
                                <img src="{{asset('website')}}/images/partner-1.png" alt="Partner 1"
                                     class="image">
                            </a>
                        </div>
                        <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                            <a href="#" class="item position-relative hover-change-image">
                                <img src="{{asset('website')}}/images/partner-hover-2.png"
                                     class="hover-image position-absolute pos-fixed-top" alt="Partner 2">
                                <img src="{{asset('website')}}/images/partner-2.png" alt="Partner 2"
                                     class="image">
                            </a>
                        </div>
                        <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                            <a href="#" class="item position-relative hover-change-image">
                                <img src="{{asset('website')}}/images/partner-hover-3.png"
                                     class="hover-image position-absolute pos-fixed-top" alt="Partner 3">
                                <img src="{{asset('website')}}/images/partner-3.png" alt="Partner 3"
                                     class="image">
                            </a>
                        </div>
                        <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                            <a href="#" class="item">
                                <img src="{{asset('website')}}/images/partner-4.png" alt=""
                                     class="image">
                            </a>
                        </div>
                        <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                            <a href="#" class="item position-relative hover-change-image">
                                <img src="{{asset('website')}}/images/partner-hover-5.png"
                                     class="hover-image position-absolute pos-fixed-top" alt="Partner 5">
                                <img src="{{asset('website')}}/images/partner-5.png" alt="Partner 5"
                                     class="image">
                            </a>
                        </div>
                        <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                            <a href="#" class="item">
                                <img src="{{asset('website')}}/images/partner-6.png" alt=""
                                     class="image">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="compare" class="compare">
            <button
                class="btn shadow btn-open bg-white bg-hover-accent text-secondary rounded-right-0 d-flex justify-content-center align-items-center w-30px h-140 p-0">
            </button>
            <div class="list-group list-group-no-border bg-dark py-3" id="">
                <div class="list-group-item bg-transparent text-white text-center fs-18 py-0">
                    Compare Property
                </div>
                <form action="{{route('comparison')}}" method="get">
                    <span id="comp_result"></span>
                </form>
            </div>
        </div>

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
    <script src="{{asset('website/style/vendors/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('website/style/vendors/hc-sticky/hc-sticky.min.js')}}"></script>
    <script src="{{asset('website/style/vendors/jparallax/TweenMax.min.js')}}"></script>
    <script src="{{asset('website/style/vendors/mapbox-gl/mapbox-gl.js')}}"></script>
    <!-- Theme scripts -->
    <script src="{{asset('website/style/theme.js')}}"></script>
    <script src="{{asset('js/customJS.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.session@1.0.0/jquery.session.min.js"></script>

    <div class="position-fixed pos-fixed-bottom-right p-6 z-index-10">
        <a href="#"
           class="gtf-back-to-top bg-white text-primary hover-white bg-hover-primary shadow p-0 w-52px h-52 rounded-circle fs-20 d-flex align-items-center justify-content-center"
           title="Back To Top"><i
                class="fal fa-arrow-up"></i></a>
    </div>

</body>
</html>
