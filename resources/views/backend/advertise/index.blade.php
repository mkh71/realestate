@extends('backend.layouts.master')
@section('css')
    @include('backend.layouts.customCss')
@stop
@section('title', $for == 0 ? 'Rent Advertise Request' : 'Sell Advertise Request' )
@section('page-title')
    {{$for == 0 ? 'Rent Advertise Request' : 'Sell Advertise Request'}}
@stop
@section('page-menu')
    <li class="{{$status == 1 ? 'menu-active' : ''}}"><a href="{{route('advertise_request', ['status'=>1,'for'=>$for])}}">Accepted Advertise</a></li>
    <li class="{{$status == 2 ? 'menu-active' : ''}}"><a href="{{route('advertise_request', ['status'=>2,'for'=>$for])}}">Complete Advertise</a></li>
    <li class="{{$status == 3 ? 'menu-active' : ''}}"><a href="{{route('advertise_request', ['status'=>3,'for'=>$for])}}">Denied Advertise</a></li>
@stop
@section('panel-title') {{$for == 0 ? 'Rent Advertise Request List' : 'Sell Advertise Request List'}} @stop
@section('content')
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="small_scroll">
        <table class="table table-hover bg-white border rounded-lg" id="dataTable">
            <thead class="thead-sm thead-black">
            <tr>
                <th scope="col" class="border-top-0 px-6 pt-5 pb-4">Listing title</th>
                <th scope="col" class="border-top-0 pt-5 pb-4">Available From</th>
                <th scope="col" class="border-top-0 pt-5 pb-4">Name</th>
                <th scope="col" class="border-top-0 pt-5 pb-4">Email</th>
                <th scope="col" class="border-top-0 pt-5 pb-4">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($infos as $property)
                <tr class="shadow-hover-xs-2 bg-hover-white">
                    <td class="align-middle pt-6 pb-4 px-6">
                        <div class="media">
                            <div class="w-120px mr-4 position-relative">
                                <a href="{{route('single_property', $property->id)}}">
                                    <img src="{{asset('storage/'.$property->cover_image)}}"
                                         alt="Home in Metric Way" >
                                </a>
                                @if($property->for == 0)
                                    <span class="badge badge-indigo position-absolute pos-fixed-top">for rent</span>
                                @else
                                    <span class="badge badge-primary position-absolute pos-fixed-top">for rent</span>
                                @endif
                            </div>
                            <div class="media-dtl">
                                <a href="{{route('single_property', $property->id)}}" class="text-dark hover-primary">
                                    <h5 class="fs-16 mb-0 lh-18">{{$property->title}}</h5>
                                </a>
                                <p class="mb-1 font-weight-500">{{$property->address}}</p>
                                <span class="text-heading lh-15 font-weight-bold fs-14">${{$property->price}}</span>
                                @if($property->for == 0)
                                    <span class="text-gray-light">/month</span>
                                @else

                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">{{date('d F, Y', strtotime($property->available_from))}}</td>
                    <td class="align-middle"><a href="{{route('user_profile', $property->user->id)}}">{{$property->user->name}}</a></td>
                    <td class="align-middle"><a href="mailto:"{{$property->user->email}}>{{$property->user->email}}</a></td>

                    <td class="align-middle">
                        <a href="{{route('accept_advertise', $property->id)}}" class="btn btn-sm btn-info edit btn-active-mint">
                            <i class="fa fa-thumbs-up"></i>
                        </a>

                        <a href="#" data-target="#my_modal" data-toggle="modal"
                           class="btn btn-sm btn-danger identifyingClass"
                           data-id="{{$property->id}}"
                           data-for="{{$for}}"
                        >
                            <i class="demo-pli-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="my_modal" tabindex="-1" role="dialog"
     aria-labelledby="my_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mxw-571" role="document">
        <div class="modal-content">
            <div class="modal-header border-0 p-0">
                <div class="row w-100 no-gutters">
                    <a class="text-center col-sm-8 ml-0 py-4 px-6 fs-18" id="">Deny Request</a>
                    <div class="nav-item col-sm-4 ml-0 d-flex align-items-center justify-content-end">
                        <button type="button" class="close m-0 fs-23" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body p-4 py-sm-7 px-sm-8">
                <div class="p-0" id="">
                    <div class="" id="login">
                        <form method="POST" action="{{ route('deny_request') }}">
                            @csrf
                            <input type="hidden" name="id" id="id" value="" />
                            <input type="hidden" name="for" id="for" value="" />
                            <div class="form-group-lg">
                                <label for="basement"
                                       class="text-heading">Deny Note</label>
                                <textarea name="admin_note" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Deny Request</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(function(){
            $('#dataTable').DataTable();
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $(".identifyingClass").click(function () {

                var id = $(this).data('id');
                var x = $(this).data('for');
                $(".modal-body #id").val(id);
                $(".modal-body #for").val(x);
            })
        });
    </script>

@stop
