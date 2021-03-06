@extends('layouts.app')
@section('title')| Not Found @stop
@section('content')
    <section class="pt-9 pb-10">
        <div class="container">
            <div class="text-center mb-15">
                <img src="{{asset("website")}}/images/page-404.jpg" alt="Page 404" class="mb-5">
                <h1 class="fs-30 lh-16 text-dark font-weight-600 mb-5">Oops! That page can’t be found.</h1>
                <p class="mb-8">It looks like nothing was found at this location.</p>
                {{Form::open(['route'=>'search_properties', 'method'=>'post'])}}
                    <div class="input-group mb-6 mxw-670 shadow-xxs-2 custom-input-group mb-2">
                        <div class="input-group-prepend">
                            <button class="btn shadow-none text-dark fs-18" type="button"><i class="fal fa-search"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-white shadow-none border-0 z-index-1" name="keyword"
                               placeholder="Enter an address, neighborhood">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                {{Form::close()}}
            </div>
            <div class="row">
                {{--<div class="col-lg-6 mb-6">
                    <h2 class="fs-22 lh-15 text-dark border-bottom pb-2 mb-2 pr-lg-7">Latest Listings</h2>
                    <ul class="list-unstyled row">
                        <li class="col-md-6 lh-26">
                            <a href="single-property-1.html" class="text-body hover-dark">
                                Los Angeles Offices
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="single-property-1.html" class="text-body hover-dark">
                                Los Angeles Offices
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="single-property-1.html" class="text-body hover-dark">
                                Luxury Home in Las Vegas
                            </a></li>
                        <li class="col-md-6 lh-26">
                            <a href="single-property-1.html" class="text-body hover-dark">
                                Luxury Home in Las Vegas
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="single-property-1.html" class="text-body hover-dark">
                                Villa for Rent in Queens
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="single-property-1.html" class="text-body hover-dark">
                                Villa for Rent in Queens
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="single-property-1.html" class="text-body hover-dark">
                                Sacramento Townhome
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="single-property-1.html" class="text-body hover-dark">
                                Sacramento Townhome
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="single-property-1.html" class="text-body hover-dark">
                                San Francisco Offices
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="single-property-1.html" class="text-body hover-dark">
                                San Francisco Offices
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="single-property-1.html" class="text-body hover-dark">
                                Villa for Rent in Queens
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 mb-6">
                    <h2 class="fs-22 lh-15 text-dark border-bottom pb-2 mb-2">Latest Articles</h2>
                    <ul class="list-unstyled row">
                        <li class="col-md-6 lh-26">
                            <a href="blog-details-1.html" class="text-body hover-dark">
                                Search widget on the right
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="blog-details-1.html" class="text-body hover-dark">
                                Los Angeles Offices
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="blog-details-1.html" class="text-body hover-dark">
                                Buying a Home
                            </a></li>
                        <li class="col-md-6 lh-26">
                            <a href="blog-details-1.html" class="text-body hover-dark">
                                Luxury Home in Las Vegas
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="blog-details-1.html" class="text-body hover-dark">
                                Why Live in New York
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="blog-details-1.html" class="text-body hover-dark">
                                Villa for Rent in Queens
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="blog-details-1.html" class="text-body hover-dark">
                                Video in Slider
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="blog-details-1.html" class="text-body hover-dark">
                                Sacramento Townhome
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="blog-details-1.html" class="text-body hover-dark">
                                Full Width Post
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="blog-details-1.html" class="text-body hover-dark">
                                San Francisco Offices
                            </a>
                        </li>
                        <li class="col-md-6 lh-26">
                            <a href="blog-details-1.html" class="text-body hover-dark">
                                Sidebar on the Left
                            </a>
                        </li>
                    </ul>
                </div>--}}
            </div>
        </div>
    </section>
@stop
