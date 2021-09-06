@extends('backend.layouts.master')
@section('title','Add-View Service')
@section('page-title')Add-View Service @stop
@section('panel-title')Add-View Service @stop
{{--@section('right-title')--}}
{{--<a href="{{ route('service_add') }}" class="btn btn-success"> + Add New Service</a>--}}
{{--@stop--}}
{{--{{dd(asset('storage'))}}--}}
@section('content')
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            {{ Form::open(['route'=>'service_store','method'=>'post', 'files' => true]) }}

            <div class="form-group row">
                <div class="col-lg-4 col-sm-12 {{$errors->has('type') ? 'has-error' : ''}}">
                    {{ Form::label('type','Select Service Type : ',['class'=>'control-label'])}}
                    <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
                    {{ Form::select('type',['Development'=>'Development', 'Maintenance'=>'Maintenance'], null, ['class'=>'form-control','placeholder'=>'Select Service Type','id'=>'Type'])}}
                    @if ($errors->has('type'))
                        <span class="help-block">
                             <strong>{{ $errors->first('type') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-lg-4 col-sm-12 {{$errors->has('name') ? 'has-error' : ''}}">
                    {{ Form::label('name','Service Name : ',['class'=>'control-label'])}}
                    <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
                    {{ Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Eg: Central City','id'=>'name'])}}
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
                    {{ Form::label('image','Service Image (First One is as CoverImage): ',['class'=>'control-label'])}}

                    {{ Form::file('image[]', ['class'=>'form-control','multiple']) }}

                    @if($errors->has('image'))
                        <span class="help-block">
                            <strong>{{$errors->first('image')}}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-lg-8 col-sm-12 {{$errors->has('details') ? 'has-error' : ''}}">
                    <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
                    {{ Form::label('details','Details : ',['class'=>'control-label'])}}

                    {!! Form::textarea('details',old('details'),['class'=>'form-control', 'rows' => 3, 'cols' => 30,'placeholder'=>'Service Details.......','id'=>'demo-summernote']) !!}
                    @if($errors->has('details'))
                        <span class="help-block">
                            <strong>{{$errors->first('details')}}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-md-12 col-xs-12"></div>

            <div class="col-md-12 col-xs-12">
                {{ Form::button('Save Service',['type'=>'submit','id'=>'saveArea','class'=>'btn btn-primary btn-md']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>

    <div class="row">
        <hr>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <h5 class="bg-transparent">Service List</h5>
        <table class="table table-bordered table-striped" id="dataTable">
            <thead>
            <tr>
                <th>#SL</th>
                <th>Service Name</th>
                <th>Type</th>
                <th>Images</th>
{{--                <th>Details</th>--}}
                <th>Price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

                @php $i=0; @endphp
                @foreach($datas as $data)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->type }}</td>
                        <td>
                            @foreach( $data->serviceImages as $img)
                                <img src="{{asset('storage/'.$img->url)}}" width="40px" height="50px" class="img-fluid">
                            @endforeach
                        </td>
{{--                        <td> {!! $data->details!=null ? substr($data->details, 0, 50):"" !!} </td>--}}
                        <td> $ {{ $data->price }} </td>
                        <td>
                            <a class="btn btn-sm btn-info edit" href="{{ route('service_edit',$data->id) }}">
                                <i class="demo-pli-pen-5"></i>
                            </a>
                            &nbsp;
                            <button class="btn btn-sm btn-danger erase"
                                    data-id="{{$data->id}}"
                                    data-url="{{ route('service_erase') }}">
                                <i class="demo-pli-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
@section('js')
    <script>
        $(function(){
            $('#dataTable').DataTable();
        });
    </script>
@stop
