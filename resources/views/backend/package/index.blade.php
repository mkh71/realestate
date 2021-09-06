@extends('backend.layouts.master')
@section('title','Add-View Package')
@section('top-title')Add-View Package @stop
@section('page-title')Add-View Package @stop
@section('panel-title')Add-View Package @stop
@section('content')

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        {{ Form::open(['route'=>'packages.store','method'=>'post']) }}

        <div class="col-lg-12 col-sm-12 {{$errors->has('name') ? 'has-error' : ''}}">
            <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
            {{ Form::label('name','Package Name : ',['class'=>'control-label'])}}
            {{ Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Eg: Daily','id'=>'name'])}}
            @if ($errors->has('name'))
                <span class="help-block">
                     <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <br>
        <div class="col-lg-12 col-sm-12 {{$errors->has('day') ? 'has-error' : ''}}">
            <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
            {{ Form::label('day','Package Validity (Day): ',['class'=>'control-label'])}}
            {{ Form::select('day',['1'=>'1 / Daily','7'=>'7 / Weekly', '30'=>'30 / Monthly', '90'=>'90 / Quarterly'], null, ['class'=>'select2 form-control','placeholder'=>'Select Day','id'=>'name', 'required'])}}
            @if ($errors->has('day'))
                <span class="help-block">
                     <strong>{{ $errors->first('day') }}</strong>
                </span>
            @endif
        </div>
        <br>
        <div class="col-lg-12 col-sm-12 {{$errors->has('item') ? 'has-error' : ''}}">
            <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
            {{ Form::label('item','Property Item(s) : ',['class'=>'control-label'])}}
            {{ Form::number('item', 1, ['class'=>'select2 form-control','placeholder'=>'Item No','id'=>'name', 'required'])}}
            @if ($errors->has('item'))
                <span class="help-block">
                     <strong>{{ $errors->first('item') }}</strong>
                </span>
            @endif
        </div>
        <hr>
        <div class="col-lg-12 col-sm-12 {{$errors->has('price') ? 'has-error' : ''}}">
            <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
            {{ Form::label('price','Package Price $: ',['class'=>'control-label'])}}
            {{ Form::text('price',old('price'),['class'=>'form-control','placeholder'=>'22','id'=>'price'])}}
            @if ($errors->has('price'))
                <span class="help-block">
                     <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <br>
        <div class="col-lg-12 col-sm-12 {{$errors->has('note') ? 'has-error' : ''}}">
            <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
            {{ Form::label('note','Package Note : ',['class'=>'control-label'])}}
            {{ Form::textarea('note', old('note'), ['class'=>'form-control', 'placeholder'=>''])}}
            @if ($errors->has('note'))
                <span class="help-block">
                     <strong>{{ $errors->first('note') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-md-12 col-xs-12"><hr></div>

        <div class="col-md-12 col-xs-12">
            {{ Form::button('Save Package',['type'=>'submit','id'=>'savePackage','class'=>'btn btn-primary']) }}
        </div>
        {{ Form::close() }}
    </div>

    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
        <h5 class="bg-transparent">Package List</h5>
        <table class="table table-bordered table-striped" id="dataTable">
            <thead>
            <tr>
                <th width="5%">#SL</th>
                <th width="35%">Name</th>
                <th width="35%">Validity</th>
                <th width="35%">Price</th>
                <th width="10%">Status</th>
                <th width="15%">Action</th>
            </tr>
            </thead>
            <tbody>
            @php $i=0; @endphp
            @foreach($infos as $info)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$info->name}}</td>
                    <td>{{$info->day}} Day(s)</td>
                    <td>$ {{$info->price}}</td>
                    <td>
                        <input data-id="{{$info->id}}" {{ $info->status ? 'checked' : '' }}
                               class="toggle-class"
                               type="checkbox"
                               data-onstyle="success" data-offstyle="danger"
                               data-toggle="toggle" data-on="Active"
                               data-off="InActive"
                               data-url = "{{route('status')}}"
                               value="Package"
                        >
                    </td>
                    <td>
                        <a class="btn btn-sm btn-info edit" href="{{ route('packages.edit',$info->id) }}">
                            <i class="demo-pli-pen-5"></i>
                        </a>
                        <button class="btn btn-sm btn-danger erase"
                                data-id="{{$info->id}}"
                                data-url="{{ route('delete') }}"
                                value="Package">
                            <i class="demo-pli-trash"></i>
                        </button>
                    </td>
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
