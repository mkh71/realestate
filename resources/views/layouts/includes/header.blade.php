<header class="main-header navbar-light header-sticky header-sticky-smart header-mobile-xl">
    <div class="sticky-area">
        <div class="container container-xxl">
            <nav class="navbar navbar-expand-xl px-0 w-100">
                <a class="navbar-brand mr-7" href="{{route('index')}}">
                    <img src="{{asset('storage/'.company()->logo)}}" alt="Abar Real Estate"
                         class="d-none d-xl-inline-block">
                    <img src="{{asset('storage/'.company()->logo)}}" alt="Abar Real Estate"
                         class="d-inline-block d-xl-none">
                </a>
                <div class="d-flex d-xl-none ml-auto">
                    {{--<a class="d-block mr-4 position-relative text-white p-2" href="#">
                        <i class="fal fa-heart fs-large-4"></i>
                        <span class="badge badge-primary badge-circle badge-absolute">1</span>
                    </a>--}}
                    <button class="navbar-toggler border-0 px-0 ml-0" type="button" data-toggle="collapse"
                            data-target="#primaryMenu05"
                            aria-controls="primaryMenu05" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="text-white fs-24"><i class="fal fa-bars"></i></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse mt-3 mt-xl-0 flex-grow-0" id="primaryMenu05">
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
                                       href="{{route('comparison')}}" >
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
                <div class="ml-auto d-none d-xl-block">
                    <ul class="navbar-nav flex-row ml-auto align-items-center justify-content-lg-end flex-wrap py-2">
                        @if(auth()->user())
                            <li class="nav-item">
                                <a class="btn btn-lg text-heading border bg-hover-primary border-hover-primary hover-white d-none d-lg-block"
                                   href="{{route('property_add')}}">
                                    Add listing
                                    <img src="{{asset('website')}}/images/add-listing-icon-primary.png" alt="Add listing"
                                         class="ml-1">
                                </a>
                                <a class="btn btn-primary btn-lg d-block d-lg-none"
                                   href="{{route('property_add')}}">
                                    Add listing
                                    <img src="{{asset('website')}}/images/add-listing-icon.png" alt="Add listing"
                                         class="ml-1">
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link pl-3 pr-2" href="{{ route('logout') }}"
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

                        {{--<li class="nav-item mr-auto mr-lg-6">
                            <a class="nav-link px-2 position-relative" href="#">
                                <i class="fal fa-heart fs-large-4"></i>
                                <span class="badge badge-primary badge-circle badge-absolute">1</span>
                            </a>
                        </li>--}}

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
