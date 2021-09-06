@extends('backend.layouts.master')
@section('title','Add-View Areas')
@section('top-title')Add-View Areas @stop
@section('page-title')Add-View Areas @stop
@section('panel-title')Add-View Areas @stop
@section('content')

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        {{ Form::open(['route'=>'area_store','method'=>'post']) }}

        <div class="col-lg-12 col-sm-12 {{$errors->has('city_id') ? 'has-error' : ''}}">
            {{ Form::label('city_id','Select City : ',['class'=>'control-label'])}}
            {{ Form::select('city_id',$cities, null, ['class'=>'form-control','placeholder'=>'Select City','id'=>'name'])}}
            @if ($errors->has('city_id'))
                <span class="help-block">
                     <strong>{{ $errors->first('city_id') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-lg-12 col-sm-12 {{$errors->has('name') ? 'has-error' : ''}}">
            {{ Form::label('name','Area Name : ',['class'=>'control-label'])}}
            {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Eg: Central City','id'=>'name'])}}
            @if ($errors->has('name'))
                <span class="help-block">
                     <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-md-12 col-xs-12"><hr></div>

        <div class="col-md-12 col-xs-12">
            {{ Form::button('Save Area',['type'=>'submit','id'=>'saveArea','class'=>'btn btn-primary']) }}
        </div>
        {{ Form::close() }}
    </div>

    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
        <h5 class="bg-transparent">Area List</h5>
        <table class="table table-bordered table-striped" id="dataTable">
            <thead>
            <tr>
                <th width="5%">#SL</th>
                <th width="35%">Name</th>
                <th width="35%">City</th>
                <th width="10%">Status</th>
                <th width="15%">Action</th>
            </tr>
            </thead>
            <tbody>
            @php $i=0; @endphp
            @foreach($areas as $info)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$info->name}}</td>
                    <td>{{$info->city->name}}</td>
                    <td>{{$info->status == 0 ? "Block" : "Active"}}</td>
                    <td>
                        <a class="btn btn-sm btn-info edit" href="{{ route('area_edit',$info->id) }}">
                            <i class="demo-pli-pen-5"></i>
                        </a>
                        &nbsp;
                        <button class="btn btn-sm btn-danger erase"
                                data-id="{{$info->id}}"
                                data-url="{{ route('area_erase') }}">
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
