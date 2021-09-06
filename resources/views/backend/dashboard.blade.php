@extends('backend.layouts.master')
@section('title','Home')
@section('page-title')Welcome back to the Dashboard.@stop
@section('content')
        {{--@foreach($categories as $category)--}}
        <a href="{{route('admin')}}">
            <div class="col-md-3">
                <div class="panel panel-info panel-colorful media middle pad-all">
                    <div class="media-left">
                        <div class="pad-hor">
                            <i class="fa fa-list" style="font-size: 30px"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <p class="mar-no">User</p>
                        <p class="text-2x mar-no text-primary">100</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{route('admin')}}">
            <div class="col-md-3">
                <div class="panel panel-warning panel-colorful media middle pad-all">
                    <div class="media-left">
                        <div class="pad-hor">
                            <i class="fa fa-list" style="font-size: 30px"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <p class="mar-no">Booking Requests</p>
                        <p class="text-2x mar-no text-primary">100</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{route('admin')}}">
            <div class="col-md-3">
                <div class="panel panel-success panel-colorful media middle pad-all">
                    <div class="media-left">
                        <div class="pad-hor">
                            <i class="fa fa-list" style="font-size: 30px"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <p class="mar-no">Booked</p>
                        <p class="text-2x mar-no text-primary">200</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{route('admin')}}">
            <div class="col-md-3">
                <div class="panel panel-dark panel-colorful media middle pad-all">
                    <div class="media-left">
                        <div class="pad-hor">
                            <i class="fa fa-list" style="font-size: 30px"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <p class="mar-no">Released</p>
                        <p class="text-2x mar-no text-white">200</p>
                    </div>
                </div>
            </div>
        </a>

        <section class="content">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <table id="RequTable" class="table table-bordered table-striped">
                    <caption>Booking List</caption>
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Building</th>
                        <th>Apartment</th>
                        <th>Advance</th>
                        <th>Booked From</th>
                        <th>Dues</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </section>
@endsection
@section('js')
    <script>
        $(function(){
            $('#RequTable').DataTable();
        });
    </script>
@endsection
