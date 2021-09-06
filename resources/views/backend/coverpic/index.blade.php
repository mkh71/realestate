@extends('backend.layouts.master')
@section('title','Cover Pic')
@section('top-title')Add-View Cover Pic @stop
@section('page-title')Add-View Cover Pic @stop
@section('panel-title')UPDATE Cover Pic @stop
@section('content')
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        {{ Form::open(['route'=>'coverpic.update','method'=>'post', 'files'=>'true']) }}

        <div class="col-lg-12 col-sm-12 {{$errors->has('home_cover') ? 'has-error' : ''}}">
            {{ Form::label('','Home Image : ',['class'=>'control-label'])}}
            {{ Form::file('home_cover',['class'=>'form-control',"accept"=>"image/*"])}}
            @if ($errors->has('home_cover'))
                <span class="help-block">
                     <strong>{{ $errors->first('home_cover') }}</strong>
                </span>
            @endif
            <br>
            {{ Form::textarea('home_title', $infos[0]->title, ['class'=>'form-control', 'placeholder'=>'Find Your Dream Home'])}}
        </div>
        <div class="col-lg-12 col-sm-12 {{$errors->has('service_cover') ? 'has-error' : ''}}">
            {{ Form::label('','Service Image : ',['class'=>'control-label'])}}
            {{ Form::file('service_cover',['class'=>'form-control',"accept"=>"image/*"])}}
            @if ($errors->has('service_cover'))
                <span class="help-block">
                     <strong>{{ $errors->first('service_cover') }}</strong>
                </span>
            @endif
            <br>
            {{ Form::textarea('service_title', $infos[1]->title, ['class'=>'form-control', 'placeholder'=>'Find Your Dream Home'])}}
        </div>
        <hr>
        <div class="col-lg-12 col-sm-12 {{$errors->has('contact_cover') ? 'has-error' : ''}}">
            {{ Form::label('','Contact Image : ',['class'=>'control-label'])}}
            {{ Form::file('contact_cover',['class'=>'form-control',"accept"=>"image/*"])}}
            @if ($errors->has('contact_cover'))
                <span class="help-block">
                     <strong>{{ $errors->first('contact_cover') }}</strong>
                </span>
            @endif
            <br>
            {{ Form::textarea('contact_title', $infos[2]->title, ['class'=>'form-control', 'placeholder'=>'Find Your Dream Home'])}}
        </div>

        <div class="col-md-12 col-xs-12"><hr></div>

        <div class="col-md-12 col-xs-12">
            {{ Form::button('Save Cover Pics',['type'=>'submit','id'=>'saveType','class'=>'btn btn-primary']) }}
        </div>
        {{ Form::close() }}
    </div>

    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
        <h5 class="bg-transparent">Cover Pic List</h5>
        <table class="table table-bordered table-striped" id="dataTable">
            <thead>
            <tr>
                <th>#SL</th>
                <th>Pic For</th>
                <th>Image</th>
                <th>Title</th>
            </tr>
            </thead>
            <tbody>
            @php $i=0; @endphp
            @foreach($infos as $info)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$info->type}}</td>
                    <td>
                        <img src="{{asset('storage/'.$info->url)}}" width="100px" height="80px">
                    </td>
                    <td>{{$info->title}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script>
        $(function(){
            $('#dataTable').DataTable();
        });
    </script>
@stop
