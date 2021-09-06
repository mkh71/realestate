@extends('backend.layouts.master')
@section('title','Edit Types')
@section('page-title') Edit HomeType @stop
@section('panel-title') Edit HomeType @stop
@extends('backend.layouts.master')
@section('content')
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        {{ Form::model($data, ['route'=>['types.update', $data->id],'method'=>'put', 'files'=>true]) }}

        <div class="col-lg-6 col-sm-6 {{$errors->has('name') ? 'has-error' : ''}}">
            {{ Form::label('name','Type Name : ',['class'=>'control-label'])}}
            {{ Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Eg: Central City','id'=>'name'])}}
            @if ($errors->has('name'))
                <span class="help-block">
                     <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-lg-6 col-sm-6">
            {{ Form::label('image','Type Icon (PNG|Small Icon) : ',['class'=>'control-label'])}}
            {{ Form::file('image',['class'=>'form-control','placeholder'=>'Type Icon'])}}
        </div>
        <div class="col-lg-12 col-sm-12">
            {{ Form::label('active','Status : ',['class'=>'control-label'])}}
            &nbsp; &nbsp; Active {{ Form::radio('status', 1, $data->status == 1 ? true : '') }}
            &nbsp; &nbsp; Block {{ Form::radio('status', 0, $data->status == 0 ? true : '') }}
        </div>
        <div class="col-md-12 col-xs-12"><hr></div>

        <div class="col-md-12 col-xs-12">
            {{ Form::button('Save Type',['type'=>'submit','id'=>'saveType','class'=>'btn btn-primary']) }}
        </div>
        {{ Form::close() }}
    </div>
@endsection
