@extends('backend.layouts.master')
@section('css')
    @include('backend.layouts.customCss')
@stop
@section('title','Edit Property')
@section('top-title')Edit Property @stop
@section('page-title')Edit Property  @stop
@section('panel-title')Edit Property  @stop
{{--@section('right-title')--}}
{{--<a href="{{ route('service_add') }}" class="btn btn-success"> + Add New Service</a>--}}
{{--@stop--}}
{{--{{dd(asset('storage'))}}--}}
@section('content')
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <ul class="nav nav-tabs nav-pills">
            <li class="nav-item col">
                <a class="nav-link active bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                   id="description-tab" data-toggle="pill" data-number="1."
                   href="#Description"
                   role="tab"
                   aria-controls="description" aria-selected="true"><span class="number">1.</span>
                    Description
                </a>
            </li>
            <li class="nav-item col">
                <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                   id="media-tab"
                   data-toggle="pill" data-number="2."
                   href="#Media"
                   role="tab"
                   aria-controls="media" aria-selected="false"><span class="number">2.</span> Media</a>
            </li>
            <li class="nav-item col">
                <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                   id="detail-tab"
                   data-toggle="pill" data-number="4."
                   href="#Detail"
                   role="tab"
                   aria-controls="detail" aria-selected="false"><span class="number">4.</span>
                    Detail</a>
            </li>
            <li class="nav-item col">
                <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                   id="amenities-tab"
                   data-toggle="pill" data-number="5."
                   href="#Amenities"
                   role="tab"
                   aria-controls="amenities" aria-selected="false"><span class="number">5.</span>
                    Amenities</a>
            </li>
            <li class="nav-item col">
                <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                   id="attachments-tab"
                   data-toggle="pill" data-number="6."
                   href="#Attachments"
                   role="tab"
                   aria-controls="attachments" aria-selected="false"><span class="number">6.</span>
                    Attachments</a>
            </li>
        </ul>
        {{ Form::model($data, ['route'=>'property_update','method'=>'post', 'files' => true]) }}
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="tab-content">
            <div id="Description" class="tab-pane fade in active">
                <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                     id="heading-media">
                    <h5 class="mb-0">
                        <a class="btn btn-lg collapse-parent btn-block border shadow-none"
                           data-toggle="collapse" data-number="2."
                           data-target="#description-collapse"
                           aria-expanded="true"
                           aria-controls="media-collapse">
                            <span class="number">1.</span> Description
                        </a>
                    </h5>
                </div>
                <div id="description-collapse" class=""
                     aria-labelledby="heading-description"
                     data-parent="#collapse-tabs-accordion">
                    <div class="card-body py-4 py-md-0 px-0">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="card mb-6">
                                    <div class="card-body p-6">
                                        <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                                            <label for="title" class="text-heading">Title
                                                <span class="text-muted">*</span>
                                            </label>
                                            {{Form::text('title', old('title'), ['class'=>'form-control form-control-lg border-0', 'id'=>'title', "required"])}}
                                            @if ($errors->has('title'))
                                                <span class="help-block">
                                                     <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        @if(type())
                                        <div class="form-group mb-0 {{$errors->has('for') ? 'has-error' : ''}}">
                                            <label for="for" class="text-heading">Property Status
                                                <span class="text-muted">*</span>
                                            </label>

                                            {{Form::select('for', ['0'=>'For Rent', '1'=>'For Sale'], old('for'),['class'=>'form-control border-0 selectpicker',"id"=>"for", "required"])}}
                                            @if ($errors->has('for'))
                                                <span class="help-block">
                                                     <strong>{{ $errors->first('for') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        @endif
                                        <div class="form-group mb-0 {{$errors->has('home_type_id') ? 'has-error' : ''}}">
                                            <label for="for" class="text-heading">Property Type/Category
                                                <span class="text-muted">*</span>
                                            </label>
                                            {{Form::select('home_type_id', $homeTypes, old('home_type_id'),['class'=>'form-control border-0 selectpicker',"id"=>"home_type_id", 'placeholder'=>'Select Property Type', "required"])}}
                                            @if ($errors->has('home_type_id'))
                                                <span class="help-block">
                                                     <strong>{{ $errors->first('home_type_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="card mb-6">
                                    <div class="card-body p-6">
                                        <div class="form-row mx-n2">
                                            <div class="form-group {{$errors->has('price') ? 'has-error' : ''}}">
                                                <label for="price" class="text-heading">Price in $
                                                    <span class="text-muted"> *(only numbers)</span>
                                                </label>
                                                {{Form::number('price', old('price'), ['class'=>'form-control form-control-lg border-0', "id"=>"price"])}}
                                                @if($errors->has('price'))
                                                    <span class="help-block">
                                                        <strong>{{$errors->first('price')}}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row mx-n2">
                                            <div class="form-group {{$errors->has('tax') ? 'has-error' : ''}}">
                                                <label for="tax" class="text-heading">Tax Rate <span class="text-muted">(Yearly)</span></label>
                                                {{Form::number('tax', $data->feature->tax, ['class'=>'form-control form-control-lg border-0', "id"=>"tax"])}}
                                                @if($errors->has('tax'))
                                                    <span class="help-block">
                                                        <strong>{{$errors->first('tax')}}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="card-body p-6">
                                    <h4 class="card-title mb-0 text-heading fs-22 lh-15">
                                        Upload your property CoverPic
                                        <span class="text-muted"></span>
                                    </h4>
                                    <div class="cover_image" style="padding: 20px;"></div>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <div class="card mb-12">
                                    <div class="card-body p-6">
                                        <div class="form-group mb-0 {{$errors->has('description') ? 'has-error' : ''}}">
                                            <label for="description-01"
                                                   class="text-heading">Description</label>
                                            {!! Form::textarea('description',old('description'),['class'=>'form-control', 'rows' => 6, 'cols' => 40,'placeholder'=>'Property Details.......']) !!}
                                            @if($errors->has('description'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('description')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Media" class="tab-pane fade">
                <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                     id="heading-media">
                    <h5 class="mb-0">
                        <a class="btn btn-lg collapse-parent btn-block border shadow-none"
                           data-toggle="collapse" data-number="2."
                           data-target="#media-collapse"
                           aria-expanded="true"
                           aria-controls="media-collapse">
                            <span class="number">2.</span> Media
                        </a>
                    </h5>
                </div>
                <div id="media-collapse" class=""
                     aria-labelledby="heading-media"
                     data-parent="#collapse-tabs-accordion">
                    <div class="card-body py-4 py-md-0 px-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-12">
                                    <div class="card-body p-6">
                                        <h4 class="card-title mb-0 text-heading fs-22 lh-15">
                                            Upload photos of your property
                                            <span class="text-muted">(Remain Max {{20 - count($data->images)}} Pics)</span>
                                        </h4>
                                        <div class="input-images" style="padding: 20px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card mb-12">
                                    <div class="card-body p-6">
                                        <h4 class="card-title mb-0 text-heading fs-22 lh-15"> Video Option / Virtual Tour</h4>
                                        <p class="card-text mb-5">Put your property embedded video link from matterport or youtube </p>
                                        <div class="form-row mx-n2">
                                            <div class="col-md-6 col-lg-6 col-xxl-6 px-2">
                                                <div class="form-group mb-md-0 {{$errors->has('youtube_video') ? 'has-error' : ''}}">
                                                    <label for="embed-video-id" class="text-heading">Youtube Video Link</label>
                                                    {!! Form::text('youtube_video',$data->document? $data->document->youtube_video : null,['class'=>'form-control border-0', 'placeholder'=>'Youtube Video Link...']) !!}
                                                    @if($errors->has('youtube_video'))
                                                        <span class="help-block">
                                                            <strong>{{$errors->first('youtube_video')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-xxl-6 px-2">
                                                <div class="form-group mb-md-0 {{$errors->has('matterport_video') ? 'has-error' : ''}}">
                                                    <label for="embed-video-id" class="text-heading">Matterport Video Link</label>
                                                    {!! Form::text('matterport_video',$data->document ? $data->document->matterport_video : null,['class'=>'form-control border-0', 'placeholder'=>'Matterport Video Link...']) !!}
                                                    @if($errors->has('matterport_video'))
                                                        <span class="help-block">
                                                            <strong>{{$errors->first('matterport_video')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div id="Location" class="tab-pane fade">
                <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                     id="heading-location">
                    <h5 class="mb-0">
                        <a class="btn btn-block collapse-parent border shadow-none"
                           data-toggle="collapse" data-number="3."
                           data-target="#location-collapse"
                           aria-expanded="true"
                           aria-controls="location-collapse">
                            <span class="number">3.</span> Location
                        </a>
                    </h5>
                </div>
                <div id="location-collapse" class=""
                     aria-labelledby="heading-location"
                     data-parent="#collapse-tabs-accordion">
                    <div class="card-body py-4 py-md-0 px-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-6">
                                    <div class="card-body p-6">
                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15"> Listing Location</h3>
                                        <p class="card-text mb-5">Enter Address of the exact location and choice from the suggestions</p>
                                        <div class="form-group {{$errors->has('address') ? 'has-error' : ''}}">
                                            <label for="address" class="text-heading">Address <span class="text-muted">(*)</span></label>
                                            {!! Form::text('address',old('address'),['class'=>'form-control form-control-lg border-0', 'id' =>"address", "autocomplete"=>"off", 'placeholder'=>'Search for your location...', "required"]) !!}
                                            @if($errors->has('address'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('address')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-row mx-n2">
                                            <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                <div class="form-group">
                                                    <label for="state" class="text-heading">State/Province*</label>
                                                    {!! Form::text('state',old('state'),['class'=>'form-control form-control-lg border-0', 'id' =>"state", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                                    @if($errors->has('state'))
                                                        <span class="help-block">
                                                            <strong>{{$errors->first('state')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                <div class="form-group">
                                                    <label for="city"
                                                           class="text-heading">City</label>
                                                    {!! Form::text('city',old('city'),['class'=>'form-control form-control-lg border-0', 'id' =>"city", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                                    @if($errors->has('city'))
                                                        <span class="help-block">
                                                            <strong>{{$errors->first('city')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row mx-n2">
                                            <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                <div class="form-group">
                                                    <label for="postal_code"
                                                           class="text-heading">postal_code</label>
                                                    {!! Form::text('postal_code',old('postal_code'),['class'=>'form-control form-control-lg border-0', 'id' =>"postal_code", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                                    @if($errors->has('postal_code'))
                                                        <span class="help-block">
                                                            <strong>{{$errors->first('postal_code')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                <div class="form-group">
                                                    <label for="postal_code"
                                                           class="text-heading">Country/Region*</label>
                                                    {!! Form::text('country',old('country'),['class'=>'form-control form-control-lg border-0', 'id' =>"country", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                                    @if($errors->has('country'))
                                                        <span class="help-block">
                                                            <strong>{{$errors->first('country')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row mx-n2">
                                            <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                <div class="form-group">
                                                    <label for="street"
                                                           class="text-heading">Street Number</label>
                                                    {!! Form::text('street',old('street'),['class'=>'form-control form-control-lg border-0', 'id' =>"street", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                                    @if($errors->has('street'))
                                                        <span class="help-block">
                                                            <strong>{{$errors->first('street')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-6">
                                    <div class="card-body p-6">
                                        <div class="form-row mx-n2">
                                            <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                <div class="form-group mb-md-0">
                                                    <div id="propertyMap"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row mx-n2">
                                            <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                <div class="form-group">
                                                    <label for="area"
                                                           class="text-heading">Area</label>
                                                    {!! Form::text('area',old('area'),['class'=>'form-control form-control-lg border-0', 'id' =>"area", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                                    @if($errors->has('area'))
                                                        <span class="help-block">
                                                            <strong>{{$errors->first('area')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row mx-n2">
                                            <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                <div class="form-group mb-md-0">
                                                    <label for="latitude"
                                                           class="text-heading">Latitude </label>
                                                    {!! Form::text('lat',old('lat'),['class'=>'form-control form-control-lg border-0', 'id' =>"latitude", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                                    @if($errors->has('lat'))
                                                        <span class="help-block">
                                                            <strong>{{$errors->first('lat')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                <div class="form-group mb-md-0">
                                                    <label for="longitude"
                                                           class="text-heading">Longitude</label>
                                                    {!! Form::text('long',old('long'),['class'=>'form-control form-control-lg border-0', 'id' =>"longitude", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                                    @if($errors->has('long'))
                                                        <span class="help-block">
                                                            <strong>{{$errors->first('long')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}
            <div id="Detail" class="tab-pane fade">
                <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                     id="heading-detail">
                    <h5 class="mb-0">
                        <a class="btn btn-block collapse-parent border shadow-none"
                           data-toggle="collapse" data-number="4."
                           data-target="#detail-collapse"
                           aria-expanded="true"
                           aria-controls="detail-collapse">
                            <span class="number">4.</span> Detail
                        </a>
                    </h5>
                </div>
                <div id="detail-collapse" class=""
                     aria-labelledby="heading-detail"
                     data-parent="#collapse-tabs-accordion">
                    <div class="card-body py-4 py-md-0 px-0">
                        <div class="card mb-6">
                            <div class="card-body p-6">
                                <h3 class="card-title mb-0 text-heading fs-22 lh-15">Listing Detail</h3>
                                <p class="card-text mb-5"></p>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('mortgage_term') ? 'has-error' : ''}}">
                                            <label for="mortgage_term" class="text-heading">Mortgage term <span class="text-muted">(Year)</span></label>
                                            {{Form::number('mortgage_term', $data->feature->mortgage_term, ['class'=>'form-control form-control-lg border-0', "id"=>"mortgage_term"])}}
                                            @if($errors->has('mortgage_term'))
                                                <span class="help-block">
                                                        <strong>{{$errors->first('mortgage_term')}}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('insurance') ? 'has-error' : ''}}">
                                            <label for="tax" class="text-heading">Property Insurance <span class="text-muted">(Yearly)</span></label>
                                            {{Form::number('insurance', $data->feature->insurance, ['class'=>'form-control form-control-lg border-0', "id"=>"insurance"])}}
                                            @if($errors->has('insurance'))
                                                <span class="help-block">
                                                        <strong>{{$errors->first('insurance')}}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('hoa_fee') ? 'has-error' : ''}}">
                                            <label for="fee" class="text-heading">Homeowners Association Fee <span
                                                    class="text-muted">(monthly)</span>
                                            </label>
                                            {{Form::number('hoa_fee', $data->feature->hoa_fee, ['class'=>'form-control form-control-lg border-0', "id"=>"hoa_fee"])}}
                                            @if($errors->has('hoa_fee'))
                                                <span class="help-block">
                                                        <strong>{{$errors->first('hoa_fee')}}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('interest_rate') ? 'has-error' : ''}}">
                                            <label for="fee" class="text-heading"> Interest Rate
                                            </label>
                                            {{Form::number('interest_rate', $data->feature->interest_rate, ['class'=>'form-control form-control-lg border-0', "id"=>"interest_rate"])}}
                                            @if($errors->has('interest_rate'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('interest_rate')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('size') ? 'has-error' : ''}}">
                                            <label for="size-in-ft" class="text-heading ">Size in Sqr/ft
                                                <span class="text-muted">(only numbers)</span>
                                            </label>
                                            {!! Form::number('size',old('size'),['class'=>'form-control form-control-lg border-0', 'id' =>"size", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                            @if($errors->has('size'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('size')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('built_year') ? 'has-error' : ''}}">
                                            <label for="year-built"
                                                   class="text-heading">Year built <span
                                                    class="text-muted">(numeric)</span></label>
                                            {!! Form::number('built_year',$data->feature->built_year,['class'=>'form-control form-control-lg border-0', 'id' =>"built_year", "autocomplete"=>"off", 'placeholder'=>date("Y") ]) !!}
                                            @if($errors->has('built_year'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('built_year')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('available_from') ? 'has-error' : ''}}">
                                            <label for="year-built"
                                                   class="text-heading">Available from
                                                <span class="text-muted">*(date)</span></label>
                                            {!! Form::text('available_from',old('available_from'),['class'=>'form-control form-control-lg border-0 date', 'id' =>"available_from", "autocomplete"=>"off", 'placeholder'=>date("Y/m/d"), "required" ]) !!}
                                            @if($errors->has('available_from'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('available_from')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('bedroom') ? 'has-error' : ''}}">
                                            <label for="year-built"
                                                   class="text-heading">Bedrooms
                                                <span class="text-muted">(numeric)</span></label>
                                            {!! Form::number('bedroom',$data->feature->bedroom,['class'=>'form-control form-control-lg border-0', 'id' =>"bedroom", "autocomplete"=>"off", 'placeholder'=>'3/4']) !!}
                                            @if($errors->has('bedroom'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('bedroom')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('bathroom') ? 'has-error' : ''}}">
                                            <label for="year-built"
                                                   class="text-heading">Bathrooms
                                                <span class="text-muted">(numeric)</span></label>
                                            {!! Form::number('bathroom', $data->feature->bathroom,['class'=>'form-control form-control-lg border-0', 'id' =>"bathroom", "autocomplete"=>"off", 'placeholder'=>'3/4']) !!}
                                            @if($errors->has('bathroom'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('bathroom')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('livable_room') ? 'has-error' : ''}}">
                                            <label for="year-built"
                                                   class="text-heading">Livable Room
                                                <span class="text-muted">(numeric)</span></label>
                                            {!! Form::number('livable_room', $data->feature->livable_room,['class'=>'form-control form-control-lg border-0', 'id' =>"livable_room", "autocomplete"=>"off", 'placeholder'=>'4/5']) !!}
                                            @if($errors->has('livable_room'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('livable_room')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('balcony') ? 'has-error' : ''}}">
                                            <label for="year-built"
                                                   class="text-heading">Balcony
                                                <span class="text-muted">(numeric)</span></label>
                                            {!! Form::number('balcony', $data->feature->balcony,['class'=>'form-control form-control-lg border-0', 'id' =>"balcony", "autocomplete"=>"off", 'placeholder'=>'4/5']) !!}
                                            @if($errors->has('balcony'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('balcony')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('level') ? 'has-error' : ''}}">
                                            <label for="year-built"
                                                   class="text-heading">Level <span
                                                    class="text-muted">(numeric)</span></label>
                                            {!! Form::number('level', $data->feature->level,['class'=>'form-control form-control-lg border-0', 'id' =>"level", "autocomplete"=>"off", 'placeholder'=>'4/5']) !!}
                                            @if($errors->has('level'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('level')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('total_unit') ? 'has-error' : ''}}">
                                            <label for="year-built"
                                                   class="text-heading">Total Unit <span
                                                    class="text-muted">(numeric)</span></label>
                                            {!! Form::number('total_unit', $data->feature->total_unit,['class'=>'form-control form-control-lg border-0', 'id' =>"total_unit", "autocomplete"=>"off", 'placeholder'=>'4/5']) !!}
                                            @if($errors->has('total_unit'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('total_unit')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('unit_per_level') ? 'has-error' : ''}}">
                                            <label for="year-built"
                                                   class="text-heading">Unit Per Level <span
                                                    class="text-muted">(numeric)</span></label>
                                            {!! Form::number('unit_per_level', $data->feature->unit_per_level,['class'=>'form-control form-control-lg border-0', 'id' =>"unit_per_level", "autocomplete"=>"off", 'placeholder'=>'4/5']) !!}
                                            @if($errors->has('unit_per_level'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('unit_per_level')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('lot') ? 'has-error' : ''}}">
                                            <label for="year-built"
                                                   class="text-heading">LOT</label>
                                            {!! Form::text('lot', $data->feature->lot,['class'=>'form-control form-control-lg border-0', 'id' =>"lot", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                            @if($errors->has('lot'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('lot')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('heating') ? 'has-error' : ''}}">
                                            <label for="heating"
                                                   class="text-heading">Heating</label>
                                            {!! Form::text('heating', $data->feature->heating,['class'=>'form-control form-control-lg border-0', 'id' =>"heating", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                            @if($errors->has('heating'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('heating')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('cooling') ? 'has-error' : ''}}">
                                            <label for="cooling"
                                                   class="text-heading">Cooling</label>
                                            {!! Form::text('cooling', $data->feature->cooling,['class'=>'form-control form-control-lg border-0', 'id' =>"cooling", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                            @if($errors->has('cooling'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('cooling')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('parking') ? 'has-error' : ''}}">
                                            <label for="parking"
                                                   class="text-heading">Parking System</label>
                                            {!! Form::text('parking', $data->feature->parking,['class'=>'form-control form-control-lg border-0', 'id' =>"parking", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                            @if($errors->has('parking'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('parking')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('total_parking_space') ? 'has-error' : ''}}">
                                            <label for="total_parking_space"
                                                   class="text-heading">Total Parking Space</label>
                                            {!! Form::number('total_parking_space', $data->feature->total_parking_space,['class'=>'form-control form-control-lg border-0', 'id' =>"total_parking_space", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                            @if($errors->has('total_parking_space'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('total_parking_space')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('flooring') ? 'has-error' : ''}}">
                                            <label for="total_parking_space"
                                                   class="text-heading">Flooring</label>
                                            {!! Form::text('flooring', $data->feature->flooring,['class'=>'form-control form-control-lg border-0', 'id' =>"flooring", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                            @if($errors->has('flooring'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('flooring')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('roof') ? 'has-error' : ''}}">
                                            <label for="total_parking_space"
                                                   class="text-heading">Roof</label>
                                            {!! Form::text('roof', $data->feature->roof,['class'=>'form-control form-control-lg border-0', 'id' =>"roof", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                            @if($errors->has('roof'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('roof')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('fireplace') ? 'has-error' : ''}}">
                                            <label for="total_parking_space"
                                                   class="text-heading">Fireplace</label>
                                            {!! Form::text('fireplace', $data->feature->fireplace,['class'=>'form-control form-control-lg border-0', 'id' =>"fireplace", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                            @if($errors->has('fireplace'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('fireplace')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('spa') ? 'has-error' : ''}}">
                                            <label for="total_parking_space"
                                                   class="text-heading">Spa</label>
                                            {!! Form::text('spa', $data->feature->spa,['class'=>'form-control form-control-lg border-0', 'id' =>"spa", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                            @if($errors->has('spa'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('spa')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('water') ? 'has-error' : ''}}">
                                            <label for="water"
                                                   class="text-heading">Water</label>
                                            {!! Form::text('water', $data->feature->water,['class'=>'form-control form-control-lg border-0', 'id' =>"water", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                            @if($errors->has('water'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('water')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('outdoor_feature') ? 'has-error' : ''}}">
                                            <label for="outdoor_feature"
                                                   class="text-heading">Outdoor Features</label>
                                            {!! Form::text('outdoor_feature', $data->feature->outdoor_feature,['class'=>'form-control form-control-lg border-0', 'id' =>"outdoor_feature", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                            @if($errors->has('outdoor_feature'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('outdoor_feature')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('scenery_view') ? 'has-error' : ''}}">
                                            <label for="scenery_view"
                                                   class="text-heading">Scenery</label>
                                            {!! Form::text('scenery_view', $data->feature->scenery_view,['class'=>'form-control form-control-lg border-0', 'id' =>"scenery_view", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                            @if($errors->has('scenery_view'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('scenery_view')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('allowed_pet') ? 'has-error' : ''}}">
                                            <label for="allowed_pet"
                                                   class="text-heading">Allowed Pets</label>
                                            {!! Form::text('allowed_pet', $data->feature->allowed_pet,['class'=>'form-control form-control-lg border-0', 'id' =>"allowed_pet", "autocomplete"=>"off", 'placeholder'=>'']) !!}
                                            @if($errors->has('allowed_pet'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('allowed_pet')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('construction_materials') ? 'has-error' : ''}}">
                                            <label for="basement"
                                                   class="text-heading">Construction Materials</label>
                                            {!! Form::textarea('construction_materials', $data->feature->construction_materials,['class'=>'form-control border-0', 'rows' => 10, 'cols' => 30,'placeholder'=>'construction materials.....'/*,'id'=>'demo-summernote'*/]) !!}
                                            @if($errors->has('construction_materials'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('construction_materials')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group {{$errors->has('other_feature') ? 'has-error' : ''}}">
                                            <label for="other_feature"
                                                   class="text-heading">Other Features</label>
                                            {!! Form::textarea('other_feature', $data->feature->other_feature,['class'=>'form-control border-0', 'rows' => 10, 'cols' => 30,'placeholder'=>'other feature.....'/*,'id'=>'demo-summernote'*/]) !!}
                                            @if($errors->has('other_feature'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('other_feature')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                {{--<div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group mb-0">
                                            <label for="owner"
                                                   class="text-heading">Owner/ Agent notes
                                                (not visible on
                                                front end)</label>
                                            <textarea class="form-control border-0"
                                                      id="owner"
                                                      name="owner"></textarea>
                                        </div>
                                    </div>
                                </div>--}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div id="Amenities" class="tab-pane fade">
                <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                     id="heading-amenities">
                    <h5 class="mb-0">
                        <a class="btn btn-block collapse-parent border shadow-none"
                           data-toggle="collapse" data-number="5."
                           data-target="#amenities-collapse"
                           aria-expanded="true"
                           aria-controls="amenities-collapse">
                            <span class="number">5.</span> Amenities
                        </a>
                    </h5>
                </div>
                <div id="amenities-collapse" class=""
                     aria-labelledby="heading-amenities"
                     data-parent="#collapse-tabs-accordion">
                    <div class="card-body py-4 py-md-0 px-0">
                        <div class="card mb-6">
                            <div class="card-body p-6">
                                <h3 class="card-title mb-0 text-heading fs-22 lh-15">Amenities </h3>
                                <p class="card-text mb-5"> </p>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-3">
                                        <ul class="list-group list-group-no-border">
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('dining', '1', $data->feature->dining, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">dining</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('drawing',  '1', $data->feature->drawing, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">drawing</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('basement', '1', $data->feature->basement, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">basement</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('public_gasline', '1', $data->feature->public_gasline, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">public gasline</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('public_waterline', '1', $data->feature->public_waterline, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">public waterline</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('furnished', '1', $data->feature->furnished, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">furnished</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('swimming_pool', '1', $data->feature->swimming_pool, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">swimming pool</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <ul class="list-group list-group-no-border">
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('window_covering', '1', $data->feature->window_covering, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">window covering</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('outdoor_shower',  '1', $data->feature->outdoor_shower, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">outdoor shower</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('wifi', '1', $data->feature->wifi, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">wi-Fi</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('ac', '1', $data->feature->ac, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">AC</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('tv_cable', '1', $data->feature->tv_cable, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">TV cable</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('laundry', '1', $data->feature->laundry, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">laundry</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('barbeque', '1', $data->feature->barbeque, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">barbeque</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <ul class="list-group list-group-no-border">
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('gym', '1', $data->feature->gym, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">gym</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('front_yard',  '1', $data->feature->front_yard, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">front yard</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('private_space', '1', $data->feature->private_space, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">private space</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('lawn', '1', $data->feature->lawn, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">lawn</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('sauna', '1', $data->feature->sauna, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">sauna</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('wine_cellar', '1', $data->feature->wine_cellar, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">wine cellar</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <ul class="list-group list-group-no-border">
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('pet_allow', '1', $data->feature->pet_allow, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">pet allowed</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('refrigerator',  '1', $data->feature->refrigerator, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">refrigerator</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('dishwasher', '1', $data->feature->dishwasher, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">dishwasher</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('dryer', '1', $data->feature->dryer, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">dryer</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('microwave', '1', $data->feature->microwave, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">microwave</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                <div class="custom-control custom-checkbox">
                                                    {{Form::checkbox('washer', '1', $data->feature->washer, ['class'=>'custom-control-input'])}}
                                                    <label class="custom-control-label text-capitalize"
                                                           for="attic">washer</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group {{$errors->has('other_appliance') ? 'has-error' : ''}}">
                                            <label for="other_appliance"
                                                   class="text-heading">Other Appliance</label>
                                            {!! Form::textarea('other_appliance',$data->feature->other_appliance,['class'=>'form-control border-0', 'rows' => 10, 'cols' => 30,'placeholder'=>'other appliance.....'/*,'id'=>'demo-summernote'*/]) !!}
                                            @if($errors->has('other_appliance'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('other_appliance')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Attachments" class="tab-pane fade">
                <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                     id="heading-amenities">
                    <h5 class="mb-0">
                        <a class="btn btn-block collapse-parent border shadow-none"
                           data-toggle="collapse" data-number="5."
                           data-target="#attachments-collapse"
                           aria-expanded="true"
                           aria-controls="attachments-collapse">
                            <span class="number">6.</span> Attachments
                        </a>
                    </h5>
                </div>
                <div id="amenities-collapse" class=""
                     aria-labelledby="heading-amenities"
                     data-parent="#collapse-tabs-accordion">
                    <div class="card-body py-4 py-md-0 px-0">
                        <div class="card mb-6">
                            <div class="card-body p-6">
                                <h3 class="card-title mb-0 text-heading fs-22 lh-15">Attachments </h3>
                                <p class="card-text mb-5"> </p>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="other_appliance"
                                                   class="text-heading">Document File (PDF)</label>
                                            {!! Form::file('doc_pdf',['class'=>'form-control border-0', 'accept'=>'application/pdf']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="other_appliance"
                                                   class="text-heading">Other Document File (PDF)</label>
                                            {!! Form::file('other_pdf',['class'=>'form-control border-0', 'accept'=>'application/pdf']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Update Property</button>
            </div>
        </div>
        {{Form::close()}}
        <hr>
        <ul class="nav nav-tabs nav-pills">
            <li class="nav-item col">
                <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214"
                   id="description-tab" data-toggle="pill" data-number="1. "
                   href="#Description"
                   role="tab"
                   aria-controls="description" aria-selected="true"><span class="number"># </span>
                    Description
                </a>
            </li>
            <li class="nav-item col">
                <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214"
                   id="media-tab"
                   data-toggle="pill" data-number="2."
                   href="#Media"
                   role="tab"
                   aria-controls="media" aria-selected="false"><span class="number"> >> </span> Media</a>
            </li>
            <li class="nav-item col">
                <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214"
                   id="detail-tab"
                   data-toggle="pill" data-number="4."
                   href="#Detail"
                   role="tab"
                   aria-controls="detail" aria-selected="false"><span class="number"> >> </span>
                    Detail</a>
            </li>
            <li class="nav-item col">
                <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214"
                   id="amenities-tab"
                   data-toggle="pill" data-number="5."
                   href="#Amenities"
                   role="tab"
                   aria-controls="amenities" aria-selected="false"><span class="number"> >> </span>
                    Amenities</a>
            </li>
            <li class="nav-item col">
                <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                   id="attachments-tab"
                   data-toggle="pill" data-number="6."
                   href="#Attachments"
                   role="tab"
                   aria-controls="attachments" aria-selected="false"><span class="number"> >> </span>
                    Attachments</a>
            </li>
        </ul>
    </div>
    @php
      foreach($data->images as $idx=>$img){
        $imgs[]= [
            "id" => $idx,
            "src" => asset("storage/".$img->url)
            ];
      }
    @endphp
@endsection

@section('js')
    {{--JS FOR IMAGE UPLOAD OPTION--}}
    <script>
        let pics = {{20-count($data->images)}};
        let prev_imgs = <?php echo json_encode($imgs) ?>;

        $('.input-images').imageUploader(
            {
                preloaded: prev_imgs,
                label: 'Drag & Drop your property images here or click on area to browse (max '+pics+')',
                maxFiles: pics,
                extensions: ['.jpg', '.JPG', '.jpeg', '.JPEG', '.png', '.PNG', '.svg', '.SVG'],
                imagesInputName: 'url',
            }
        );

        let preCover = [
            {id: 1, src: '{{asset("storage/".$data->cover_image)}}'},
        ];
        $('.cover_image').imageUploader({
                preloaded: preCover,
                maxFiles: 1,
                imagesInputName: 'cover_image',
                preloadedInputName:"preloaded",
                extensions: ['.jpg', '.JPG', '.jpeg', '.JPEG', '.png', '.PNG', '.svg', '.SVG', '.gif', '.GIF'],
            }
        );
    </script>
@stop

