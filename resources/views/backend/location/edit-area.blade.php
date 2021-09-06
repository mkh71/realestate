@extends('backend.layouts.master')
@section('title','Add-View Areas')
@section('top-title')Add-View Areas @stop
@section('page-title')Add-View Areas @stop
@section('panel-title')Add-View Areas @stop
@section('content')

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        {{ Form::open(['route'=>'area_update','method'=>'post']) }}

        <div class="col-lg-12 col-sm-12 {{$errors->has('city_id') ? 'has-error' : ''}}">
            {{ Form::label('city_id','Select City : ',['class'=>'control-label'])}}
            {{ Form::select('city_id',$cities, $area->city_id, ['class'=>'form-control','placeholder'=>'Select City','id'=>'name'])}}
            @if ($errors->has('city_id'))
                <span class="help-block">
                     <strong>{{ $errors->first('city_id') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-lg-12 col-sm-12 {{$errors->has('name') ? 'has-error' : ''}}">
            {{ Form::label('name','Area Name : ',['class'=>'control-label'])}}
            {{ Form::text('name',$area->name,['class'=>'form-control','placeholder'=>'Eg: Central City','id'=>'name'])}}
            @if ($errors->has('name'))
                <span class="help-block">
                     <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-lg-12 col-sm-12">
            {{ Form::label('active','Status : ',['class'=>'control-label'])}}
            &nbsp; &nbsp; Active {{ Form::radio('status', 1, $area->status == 1 ? true : '') }}
            &nbsp; &nbsp; Block {{ Form::radio('status', 0, $area->status == 0 ? true : '') }}
        </div>

        <input type="hidden" name="id" value="{{$area->id}}">
        <div class="col-md-12 col-xs-12"><hr></div>

        <div class="col-md-12 col-xs-12">
            {{ Form::button('Save Area',['type'=>'submit','id'=>'saveArea','class'=>'btn btn-primary']) }}
        </div>
        {{ Form::close() }}
    </div>
@endsection
