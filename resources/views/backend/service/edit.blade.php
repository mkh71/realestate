@extends('backend.layouts.master')
@section('title','Edit Service')
@section('top-title')Edit Service @stop
@section('page-title')Edit Service @stop
@section('panel-title')Edit Service @stop
@section('content')

    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        {{ Form::model($data, ['route'=>'service_update','method'=>'post', 'files' => true]) }}

        <div class="form-group row">
            <div class="col-lg-4 col-sm-12 {{$errors->has('type') ? 'has-error' : ''}}">
                {{ Form::label('type','Select Service Type : ',['class'=>'control-label'])}}
                <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
                {{ Form::select('type',['Development'=>'Development', 'Maintenance'=>'Maintenance'], old('type'), ['class'=>'form-control','placeholder'=>'Select Service Type','id'=>'Type'])}}
                @if ($errors->has('type'))
                    <span class="help-block">
                             <strong>{{ $errors->first('type') }}</strong>
                        </span>
                @endif
            </div>

            <div class="col-lg-4 col-sm-12 {{$errors->has('name') ? 'has-error' : ''}}">
                {{ Form::label('name','Service Name : ',['class'=>'control-label'])}}
                <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
                {{ Form::text('name',$data->name,['class'=>'form-control','placeholder'=>'Eg: Central City','id'=>'name'])}}
                @if ($errors->has('name'))
                    <span class="help-block">
                             <strong>{{ $errors->first('name') }}</strong>
                        </span>
                @endif
            </div>

            <div class="col-lg-4 col-sm-12 {{$errors->has('price') ? 'has-error' : ''}}">
                <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
                {{ Form::label('price','Service Price : ',['class'=>'control-label'])}}
                {{ Form::number('price',old('price'),['class'=>'form-control','placeholder'=>'Eg: Price','id'=>'price'])}}
                @if ($errors->has('price'))
                    <span class="help-block">
                             <strong>{{ $errors->first('price') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-4 col-sm-12 {{$errors->has('image') ? 'has-error' : ''}}">
                <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
                {{ Form::label('image','Service Image : ',['class'=>'control-label'])}}

                {{ Form::file('image[]', ['class'=>'form-control','multiple']) }}

                @if($errors->has('image'))
                    <span class="help-block">
                            <strong>{{$errors->first('image')}}</strong>
                        </span>
                @endif
                <br>
                <div class="col-12">
                    <h5>Choose Image to delete.</h5>
                    @foreach( $data->serviceImages as $img)
                        {{ Form::checkbox('prev_image[]', $img->id) }}
                        <img src="{{asset('storage/'.$img->url)}}" width="40px" height="50px" class="img-fluid">
                    @endforeach
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 {{$errors->has('details') ? 'has-error' : ''}}">
                <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
                {{ Form::label('details','Details : ',['class'=>'control-label'])}}

                {!! Form::textarea('details',old('details'),['class'=>'form-control', 'rows' => 3, 'cols' => 30,'placeholder'=>'Product Details.......','id'=>'demo-summernote']) !!}
                @if($errors->has('details'))
                    <span class="help-block">
                        <strong>{{$errors->first('details')}}</strong>
                    </span>
                @endif
            </div>

            <div class="col-lg-12 col-sm-12">
                {{ Form::label('active','Status : ',['class'=>'control-label'])}}
                &nbsp; &nbsp; Active {{ Form::radio('status', 1, $data->status == 1 ? true : '') }}
                &nbsp; &nbsp; Block {{ Form::radio('status', 0, $data->status == 0 ? true : '') }}
            </div>
            <input type="hidden" name="id" value="{{$data->id}}">
        </div>

        <div class="col-md-12 col-xs-12"></div>

        <div class="col-md-12 col-xs-12">
            {{ Form::button('Save Service',['type'=>'submit','id'=>'saveArea','class'=>'btn btn-primary btn-md']) }}
        </div>
        {{ Form::close() }}
    </div>
@endsection
