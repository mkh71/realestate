@extends('backend.layouts.master')
@section('title','Add-View Home Type')
@section('top-title')Add-View Home Type @stop
@section('page-title')Add-View Home Type @stop
@section('panel-title')Add-View Home Type @stop
@section('content')

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        {{ Form::open(['route'=>'types.store','method'=>'post', 'files'=>true]) }}

        <div class="col-lg-12 col-sm-12 {{$errors->has('name') ? 'has-error' : ''}}">
            {{ Form::label('name','Type Name : ',['class'=>'control-label'])}}
            {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Eg: Family','id'=>'name'])}}
            @if ($errors->has('name'))
                <span class="help-block">
                     <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-lg-12 col-sm-12"><br><br>
            {{ Form::label('image','Type Icon (PNG|Small Icon) : ',['class'=>'control-label'])}}
            {{ Form::file('image',['class'=>'form-control','placeholder'=>'Type Icon'])}}
        </div>

        <div class="col-md-12 col-xs-12"><hr></div>

        <div class="col-md-12 col-xs-12">
            {{ Form::button('Save Type',['type'=>'submit','id'=>'saveType','class'=>'btn btn-primary']) }}
        </div>
        {{ Form::close() }}
    </div>

    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
        <h5 class="bg-transparent">Home Type List</h5>
        <table class="table table-bordered table-striped" id="dataTable">
            <thead>
            <tr>
                <th width="5%">#SL</th>
                <th width="35%">Name</th>
                <th width="35%">Icon</th>
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
                    <td><img src="{{asset('storage/'.$info->icon)}}" style="height: 70px; width: 70px" class="img-fluid"></td>
                    <td>
                        <input data-id="{{$info->id}}" {{ $info->status ? 'checked' : '' }}
                               class="toggle-class"
                               type="checkbox"
                               data-onstyle="success" data-offstyle="danger"
                               data-toggle="toggle" data-on="Active"
                               data-off="InActive"
                               data-url = "{{route('status')}}"
                               value="HomeType"
                        >
                    </td>
                    <td>
                        <a class="btn btn-sm btn-info edit" href="{{ route('types.edit',$info->id) }}">
                            <i class="demo-pli-pen-5"></i>
                        </a>
                        <button class="btn btn-sm btn-danger erase"
                                data-id="{{$info->id}}"
                                data-url="{{ route('delete') }}"
                                value="HomeType">
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
