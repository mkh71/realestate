@extends('backend.layouts.master')
@section('title','Company Settings')
@section('top-title')Company Settings @stop
@section('page-title')Company Settings @stop
@section('panel-title')Company Settings @stop
@section('content')
    <div class="col-6">
        {{ Form::model($company,['route'=>['company.update'],'method'=>'post','files'=>true]) }}
        <div class="row">
            <div class="col-lg-12">
                <h1 class="btn-primary btn btn-block text-center text-uppercase"> Profile Settings </h1>
                <br>
            </div>
            <div class="col-lg-4 col-sm-4 {{$errors->has('name') ? 'has-error' : ''}}">
                {{ Form::label('','Company Name : ',['class'=>'control-label'])}}
                {{ Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Eg: Abar Real Estate'])}}
                @if ($errors->has('name'))
                    <span class="help-block">
                         <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                <br>
            </div>

            <div class="col-lg-4 col-sm-4 {{$errors->has('phone') ? 'has-error' : ''}}">
                {{ Form::label('','Phone 1 : ',['class'=>'control-label'])}}
                {{ Form::text('phone',old('phone'),['class'=>'form-control','placeholder'=>'Eg: 01***-******'])}}
                @if ($errors->has('phone'))
                    <span class="help-block">
                         <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
                <br>
            </div>


            <div class="col-lg-4 col-sm-4 {{$errors->has('phone1') ? 'has-error' : ''}}">
                {{ Form::label('','Phone 2 : ',['class'=>'control-label'])}}
                {{ Form::text('phone1',old('phone'),['class'=>'form-control','placeholder'=>'Eg: 01***-******'])}}
                @if ($errors->has('phone1'))
                    <span class="help-block">
                         <strong>{{ $errors->first('phone1') }}</strong>
                    </span>
                @endif
                <br>
            </div>

            <div class="col-lg-4 col-sm-4 {{$errors->has('fax') ? 'has-error' : ''}}">
                {{ Form::label('','Fax : ',['class'=>'control-label'])}}
                {{ Form::text('fax',old('fax'),['class'=>'form-control','placeholder'=>''])}}
                @if ($errors->has('fax'))
                    <span class="help-block">
                         <strong>{{ $errors->first('fax') }}</strong>
                    </span>
                @endif
                <br>
            </div>

            <div class="col-lg-4 col-sm-4 {{$errors->has('gmail') ? 'has-error' : ''}}">
                {{ Form::label('','E-Mail Address: ',['class'=>'control-label'])}}
                {{ Form::text('gmail',old('gmail'),['class'=>'form-control','placeholder'=>'Eg: example@gmail.com'])}}
                @if ($errors->has('gmail'))
                    <span class="help-block">
                         <strong>{{ $errors->first('gmail') }}</strong>
                    </span>
                @endif
                <br>
            </div>

            <div class="col-lg-4 col-sm-12 {{$errors->has('address') ? 'has-error' : ''}}">
                {{ Form::label('','Company Address : ',['class'=>'control-label'])}}
                {{ Form::textarea('address',old('address'),['class'=>'form-control',"row"=>"2"])}}
                @if ($errors->has('address'))
                    <span class="help-block">
                         <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
                <br>
            </div>


            <div class="col-lg-6 col-sm-12 {{$errors->has('about') ? 'has-error' : ''}}">
                {{ Form::label('','About Company : ',['class'=>'control-label'])}}
                {{ Form::textarea('about',old('address'),['class'=>'form-control',"id"=>"demo-summernote"])}}
                @if ($errors->has('about'))
                    <span class="help-block">
                         <strong>{{ $errors->first('about') }}</strong>
                    </span>
                @endif
                <br>
            </div>

            <div class="col-lg-6 col-sm-12 {{$errors->has('about_footer') ? 'has-error' : ''}}">
                {{ Form::label('','About Company for Footer : ',['class'=>'control-label'])}}
                {{ Form::textarea('about_footer',old('about_footer'),['class'=>'form-control',"id"=>"demo-summernote"])}}
                @if ($errors->has('about_footer'))
                    <span class="help-block">
                         <strong>{{ $errors->first('about_footer') }}</strong>
                    </span>
                @endif
                <br>
            </div>


            <div class="col-lg-12">
                <h1 class="btn btn-primary text-center btn-block text-uppercase"> Social Setting </h1>
                <br>
            </div>

            <div class="col-lg-3 col-sm-4 {{$errors->has('instagram') ? 'has-error' : ''}}">
                {{ Form::label('','Instagram: ',['class'=>'control-label'])}}
                {{ Form::text('instagram',old('instagram'),['class'=>'form-control','placeholder'=>'Social'])}}
                @if ($errors->has('instagram'))
                    <span class="help-block">
                         <strong>{{ $errors->first('instagram') }}</strong>
                    </span>
                @endif
                <br>
            </div>

            <div class="col-lg-3 col-sm-4 {{$errors->has('facebook') ? 'has-error' : ''}}">
                {{ Form::label('','Facebook: ',['class'=>'control-label'])}}
                {{ Form::text('facebook',old('facebook'),['class'=>'form-control','placeholder'=>'Social'])}}
                @if ($errors->has('facebook'))
                    <span class="help-block">
                         <strong>{{ $errors->first('facebook') }}</strong>
                    </span>
                @endif
                <br>
            </div>


            <div class="col-lg-3 col-sm-4 {{$errors->has('twitter') ? 'has-error' : ''}}">
                {{ Form::label('','Twitter: ',['class'=>'control-label'])}}
                {{ Form::text('twitter',old('twitter'),['class'=>'form-control','placeholder'=>'Social'])}}
                @if ($errors->has('twitter'))
                    <span class="help-block">
                         <strong>{{ $errors->first('twitter') }}</strong>
                    </span>
                @endif
                <br>
            </div>


            <div class="col-lg-3 col-sm-4 {{$errors->has('whatsapp') ? 'has-error' : ''}}">
                {{ Form::label('','WhatsApp: ',['class'=>'control-label'])}}
                {{ Form::text('whatsapp',old('whatsapp'),['class'=>'form-control','placeholder'=>'Social'])}}
                @if ($errors->has('whatsapp'))
                    <span class="help-block">
                         <strong>{{ $errors->first('whatsapp') }}</strong>
                    </span>
                @endif
                <br>
            </div>



            <div class="col-lg-12">
                <h1 class="btn btn-primary text-center btn-block text-uppercase"> Logo Setting </h1>
                <br>
            </div>


            <div class="col-lg-3 col-sm-4 {{$errors->has('logo') ? 'has-error' : ''}}">
                {{ Form::label('','Menu Logo : ',['class'=>'control-label'])}}
                {{ Form::file('logo',['class'=>'form-control',"accept"=>"image/*"])}}
                @if ($errors->has('logo'))
                    <span class="help-block">
                         <strong>{{ $errors->first('logo') }}</strong>
                    </span>
                @endif
                <br>
                <div class="" style="height: 80px; width: 100px;">
                    <img src="{{asset('storage/'.$company->logo)}}" height="100%" width="100%">
                </div>
            </div>

            <div class="col-lg-3 col-sm-4 {{$errors->has('favicon') ? 'has-error' : ''}}">
                {{ Form::label('','Title bar icon : ',['class'=>'control-label'])}}
                {{ Form::file('favicon',['class'=>'form-control',"accept"=>"image/*"])}}
                @if ($errors->has('favicon'))
                    <span class="help-block">
                         <strong>{{ $errors->first('favicon') }}</strong>
                    </span>
                @endif
                <br>
                <div class="" style="height: 80px; width: 100px;">
                    <img src="{{asset('storage/'.$company->favicon)}}" height="100%" width="100%">
                </div>
            </div>

            <div class="col-lg-3 col-sm-4 {{$errors->has('mobile_logo') ? 'has-error' : ''}}">
                {{ Form::label('','Mobile Logo : ',['class'=>'control-label'])}}
                {{ Form::file('mobile_logo',['class'=>'form-control',"accept"=>"image/*"])}}
                @if ($errors->has('mobile_logo'))
                    <span class="help-block">
                         <strong>{{ $errors->first('mobile_logo') }}</strong>
                    </span>
                @endif
                <br>
                <div class="" style="height: 80px; width: 100px;">
                    <img src="{{asset('storage/'.$company->mobile_logo)}}" height="100%" width="100%">
                </div>
            </div>

            <div class="col-lg-3 col-sm-4 {{$errors->has('footer_logo') ? 'has-error' : ''}}">
                {{ Form::label('','Footer Logo : ',['class'=>'control-label'])}}
                {{ Form::file('footer_logo',['class'=>'form-control',"accept"=>"image/*"])}}
                @if ($errors->has('footer_logo'))
                    <span class="help-block">
                         <strong>{{ $errors->first('footer_logo') }}</strong>
                    </span>
                @endif
                <br>
                <div class="" style="height: 80px; width: 100px;">
                    <img src="{{asset('storage/'.$company->footer_logo)}}" height="100%" width="100%">
                </div>
            </div>

            <div class="col-lg-12">
                <h1 class="btn btn-primary text-center btn-block text-uppercase"> Terms & Conditions  </h1>
                <br>
            </div>

            <div class="col-lg-6 col-sm-12 {{$errors->has('privacy_policy') ? 'has-error' : ''}}">
                {{ Form::label('','Privacy Policy : ',['class'=>'control-label'])}}
                {{ Form::textarea('privacy_policy',old('privacy_policy'),['class'=>'form-control',"id"=>"demo-summernote"])}}
                @if ($errors->has('privacy_policy'))
                    <span class="help-block">
                         <strong>{{ $errors->first('privacy_policy') }}</strong>
                    </span>
                @endif
                <br>
            </div>

            <div class="col-lg-6 col-sm-12 {{$errors->has('terms_condition') ? 'has-error' : ''}}">
                {{ Form::label('','Terms & Conditions : ',['class'=>'control-label'])}}
                {{ Form::textarea('terms_condition',old('terms_condition'),['class'=>'form-control',"id"=>"demo-summernote"])}}
                @if ($errors->has('terms_condition'))
                    <span class="help-block">
                         <strong>{{ $errors->first('terms_condition') }}</strong>
                    </span>
                @endif
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-sm-12">
                {{ Form::submit('Update Company',['class'=>'btn btn-info btn-block']) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
