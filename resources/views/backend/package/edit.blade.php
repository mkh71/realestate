@extends('backend.layouts.master')
@section('title','Edit Types')
@section('top-title')Edit HomeType @stop
@section('page-title')Edit HomeType @stop
@section('panel-title')Edit HomeType @stop
@section('content')

    <div class="col-lg-12 col-sm-12">
        {{ Form::model($data, ['route'=>['packages.update', $data->id],'method'=>'put']) }}

        <div class="form-group row">
            <div class="col-lg-4 col-sm-12 {{$errors->has('name') ? 'has-error' : ''}}">
                <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
                {{ Form::label('name','Package Name : ',['class'=>'control-label'])}}
                {{ Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Eg: Daily','id'=>'name'])}}
                @if ($errors->has('name'))
                    <span class="help-block">
                     <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>

            <div class="col-lg-4 col-sm-12 {{$errors->has('day') ? 'has-error' : ''}}">
                <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
                {{ Form::label('day','Package Validity (Day): ',['class'=>'control-label'])}}
                {{ Form::select('day',['1'=>'1 / Daily','7'=>'7 / Weekly', '30'=>'30 / Monthly', '90'=>'90 / Quarterly'], old('day'), ['class'=>'select2 form-control','placeholder'=>'Select Day','id'=>'name', 'required'])}}
                @if ($errors->has('day'))
                    <span class="help-block">
                     <strong>{{ $errors->first('day') }}</strong>
                </span>
                @endif
            </div>

            <div class="col-lg-4 col-sm-12 {{$errors->has('price') ? 'has-error' : ''}}">
                <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
                {{ Form::label('price','Package Price $: ',['class'=>'control-label'])}}
                {{ Form::text('price',old('price'),['class'=>'form-control','placeholder'=>'22','id'=>'price'])}}
                @if ($errors->has('price'))
                    <span class="help-block">
                     <strong>{{ $errors->first('price') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-4 col-sm-4 {{$errors->has('item') ? 'has-error' : ''}}">
                <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
                {{ Form::label('item','Property Item(s) : ',['class'=>'control-label'])}}
                {{ Form::number('item', old('item'), ['class'=>'select2 form-control','placeholder'=>'Item No','id'=>'name', 'required'])}}
                @if ($errors->has('item'))
                    <span class="help-block">
                     <strong>{{ $errors->first('item') }}</strong>
                </span>
                @endif
            </div>

            <div class="col-lg-4 col-sm-4 {{$errors->has('note') ? 'has-error' : ''}}">
                <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
                {{ Form::label('note','Package Note : ',['class'=>'control-label'])}}
                {{ Form::textarea('note', old('note'), ['class'=>'form-control', 'placeholder'=>''])}}
                @if ($errors->has('note'))
                    <span class="help-block">
                     <strong>{{ $errors->first('note') }}</strong>
                </span>
                @endif
            </div>
            <div class="col-lg-4 col-sm-4" style="padding: 10px;">
                <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
                {{ Form::label('active','Status : ',['class'=>'control-label'])}}
                &nbsp; &nbsp; Active {{ Form::radio('status', 1, $data->status == 1 ? true : '') }}
                &nbsp; &nbsp; Block {{ Form::radio('status', 0, $data->status == 0 ? true : '') }}
            </div>
        </div>


        <div class="col-md-12 col-xs-12"><hr></div>

        <div class="col-md-12 col-xs-12">
            {{ Form::button('Update Package',['type'=>'submit','id'=>'update','class'=>'btn btn-primary']) }}
        </div>
        {{ Form::close() }}
    </div>
@endsection
