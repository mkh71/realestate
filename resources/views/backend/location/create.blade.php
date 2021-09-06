@extends('backend.layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Add Brand 
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('city_index') }}" class="btn btn-success"> All Brand List</a></li>
      </ol>
    </section>

 <section class="content" style="margin-top: 10px;">
      <div class="row">
        <div class="col-lg-8 col-xs-8 col-sm-offset-2">
        	<div class="box">
        		<div class="box-header">
        			<h4>City Create</h4>
        		</div>
        		<div class="box-body">
        			<form method="POST" class="user" action="{{ route('city_store') }}" enctype="multipart/form-data">
          @csrf

          <div class="form-group row">
              <label for="name" class="col-sm-3">City Name</label>
              <div class="form-input col-sm-9">
                  <input type="text" class="form-control " name="name" id="name" placeholder="Enter City Name" value="{{old('name')}}" required>
                  <div class="valid-feedback">
                    {{ ($errors->has('name')) ? $errors->first('name') : ''}}
                  </div>
              </div>
          </div>

          <div class="form-group row">
              <label for="latitude" class="col-sm-3">Latitude</label>
              <div class="form-input col-sm-9">
                  <input type="float" class="form-control" name="latitude" id="latitude" placeholder="Enter latitude" value="{{old('latitude')}}" required>
                  <div class="valid-feedback">
                    {{ ($errors->has('latitude')) ? $errors->first('latitude') : ''}}
                  </div>
              </div>
          </div>

          <div class="form-group row">
              <label for="longitude" class="col-sm-3">Longitude</label>
              <div class="form-input col-sm-9">
                  <input type="float" class="form-control" name="longitude" id="longitude" placeholder="Enter Longitude" value="{{old('longitude')}}" required>
                  <div class="valid-feedback">
                    {{ ($errors->has('longitude')) ? $errors->first('longitude') : ''}}
                  </div>
              </div>
          </div>

         

          <button class="btn btn-primary" type="submit">Add City</button>
      </form>
        		</div>
        	</div>
        </div>
      </div>
    </section>
@endsection