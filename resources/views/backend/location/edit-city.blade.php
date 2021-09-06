@extends('backend.layouts.master')
@section('title','Add-View Cities')
@section('top-title')Add-View Cities @stop
@section('page-title')Add-View Cities @stop
@section('panel-title')Add-View Cities @stop
@section('content')

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        {{ Form::open(['route'=>'city_update','method'=>'post']) }}

        <div class="col-lg-12 col-sm-12 {{$errors->has('name') ? 'has-error' : ''}}">
            <input type="hidden" name="id" value="{{$city->id}}">
            {{ Form::label('name','City Name : ',['class'=>'control-label'])}}
            {{ Form::text('name',$city->name,['class'=>'form-control','placeholder'=>'Eg: New York','id'=>'name'])}}
            @if ($errors->has('name'))
                <span class="help-block">
                     <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-lg-12 col-sm-12">
            {{ Form::label('active','Status : ',['class'=>'control-label'])}}
             &nbsp; &nbsp; Active {{ Form::radio('status', 1, $city->status == 1 ? true : '') }}
            &nbsp; &nbsp; Block {{ Form::radio('status', 0, $city->status == 0 ? true : '') }}
        </div>

        <div class="col-md-12 col-xs-12"><hr></div>

        <div class="col-md-12 col-xs-12">
            {{ Form::button('Save City',['type'=>'submit','id'=>'saveCity','class'=>'btn btn-primary']) }}
        </div>
        {{ Form::close() }}
    </div>
@endsection
