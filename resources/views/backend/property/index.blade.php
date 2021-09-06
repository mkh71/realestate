@extends('backend.layouts.master')
@section('css')
    @include('backend.layouts.customCss')
@stop
@section('title','View Property')
@section('page-title')View Property  @stop
@section('page-menu')
    <li class="{{$status == 1 ? 'menu-active' : ''}}"><a href="{{route('property_index', ['status'=>1])}}">Activated</a></li>
    <li class="{{$status == 0 ? 'menu-active' : ''}}"><a href="{{route('property_index', ['status'=>0])}}">Pending</a></li>
    <li class="{{$status == 2 ? 'menu-active' : ''}}"><a href="{{route('property_index', ['status'=>2])}}">Booked</a></li>
    <li class="{{$status == 4 ? 'menu-active' : ''}}"><a href="{{route('property_index', ['status'=>4])}}">Released</a></li>
    <li class="{{$status == 3 ? 'menu-active' : ''}}"><a href="{{route('property_index', ['status'=>3])}}">Denied</a></li>
    <li class="{{$status == 5 ? 'menu-active' : ''}}"><a href="{{route('property_index', ['status'=>5])}}">Hold/Expired</a></li>
@stop
@section('right-title')
    <a class="btn btn-mint btn-success" href="{{route('property_add')}}">
        <b style="padding: 1px 5px; margin-right: 2px; border-radius:100%; background: orange">+</b> ADD
    </a>
@stop
@section('panel-title')
    <div class="d-flex flex-wrap flex-md-nowrap mb-6">
        <div class="mr-0 mr-md-auto">
            <button type="button" class="btn btn-primary">My Properties <span class="badge badge-white">{{count($properties)}}</span></button>
        </div>
    </div>
@stop
{{--@section('right-title')--}}
{{--<a href="{{ route('service_add') }}" class="btn btn-success"> + Add New Service</a>--}}
{{--@stop--}}
{{--{{dd(asset('storage'))}}--}}
@section('content')
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
            <div class="d-flex flex-wrap flex-md-nowrap mb-6">
                <div class="mr-0 mr-md-auto">
                    <h2 class="mb-0 text-heading fs-22 lh-15"><span
                            class="fs-18 font-weight-bold ml-2"></span>
                    </h2>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover bg-white border rounded-lg" id="dataTable">
                    <thead class="thead-sm thead-black">
                    <tr>
                        <th scope="col" class="border-top-0 px-6 pt-5 pb-4">Listing title</th>
                        <th scope="col" class="border-top-0 pt-5 pb-4">Available From</th>
{{--                        <th scope="col" class="border-top-0 pt-5 pb-4">Status</th>--}}
                        <th scope="col" class="border-top-0 pt-5 pb-4">View</th>
                        <th scope="col" class="border-top-0 pt-5 pb-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($properties as $property)
                    <tr class="shadow-hover-xs-2 bg-hover-white">
                        <td class="align-middle pt-6 pb-4 px-6">
                            <div class="media">
                                <div class="w-120px mr-4 position-relative">
                                    <a href="{{route('single_property', $property->id)}}">
                                        <img src="{{asset('storage/'.$property->cover_image)}}"
                                             alt="Home in Metric Way" >
                                    </a>
                                    @if($property->for == 0)
                                        <span class="badge badge-indigo position-absolute pos-fixed-top">For Rent</span>
                                    @else
                                        <span class="badge badge-primary position-absolute pos-fixed-top">For Sell</span>
                                    @endif
                                </div>
                                <div class="media-dtl">
                                    <a href="{{route('single_property', $property->id)}}" class="text-dark hover-primary">
                                        <h5 class="fs-16 mb-0 lh-18">{{$property->title}}</h5>
                                    </a>
                                    <p class="mb-1 font-weight-500">{{$property->address}}</p>
                                    <span class="text-heading lh-15 font-weight-bold fs-18">${{$property->price}}</span>
                                    @if($property->for == 0)
                                        <span class="text-gray-light">/month</span>
                                    @else

                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">{{date('d F, Y', strtotime($property->available_from))}}</td>
                        {{--<td class="align-middle">
                            @if($property->status == 0)
                                <span class="badge text-capitalize font-weight-normal fs-12 badge-yellow">pending</span>
                            @elseif($property->status == 1)
                                <span class="badge text-capitalize font-weight-normal fs-12 badge-success">Activated</span>
                            @elseif($property->status == 2)
                                <span class="badge text-capitalize font-weight-normal fs-12 badge-primary">Booked</span>
                            @elseif($property->status == 3)
                                <span class="badge text-capitalize font-weight-normal fs-12 badge-danger">Denied</span>
                            @elseif($property->status == 4)
                                <span class="badge text-capitalize font-weight-normal fs-12 badge-warning">Released</span>
                            @endif
                        </td>--}}
                        <td class="align-middle">{{$property->user_view}}</td>
                        <td class="align-middle">
                            <a href="{{route('property_edit',$property->id)}}" data-toggle="tooltip" title="Edit" class="d-inline-block fs-18 text-muted hover-primary mr-5">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a data-toggle="tooltip" title="Delete"
                               data-id="{{$property->id}}"
                               data-url="{{ route('property_erase') }}"
                               class="d-inline-block fs-20 text-muted hover-primary erase">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <script>
        $(function(){
            $('#dataTable').DataTable();
        });
    </script>
@stop
