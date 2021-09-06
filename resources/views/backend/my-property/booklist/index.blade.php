@extends('backend.layouts.master')
@section('css')
    @include('backend.layouts.customCss')
@stop
@section('title', $for == 0 ? 'Rent Request' : ($for == 1 ? 'Buy Request' : 'Tour Request'))
@section('page-title')
    {{$for == 0 ? 'Long Rent Request' : ($for == 1 ? 'Buy Request' : ($for == 2 ? "Short Rent Request" : 'Tour Request'))}}
@stop
@section('page-menu')
    <li class="{{$status == 1 ? 'menu-active' : ''}}"><a href="{{route('get_request', ['status'=>1,'for'=>$for])}}">Accepted Request</a></li>
    <li class="{{$status == 2 ? 'menu-active' : ''}}"><a href="{{route('get_request', ['status'=>2,'for'=>$for])}}">Complete Request</a></li>
    <li class="{{$status == 3 ? 'menu-active' : ''}}"><a href="{{route('get_request', ['status'=>3,'for'=>$for])}}">Denied Request</a></li>
@stop
@section('panel-title') {{$for == 0 ? 'Rent Request List' : ($for == 1 ? 'Buy Request List' : 'Tour Request List')}} @stop
@section('content')
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="small_scroll">
        <table class="table table-bordered table-striped" id="dataTable">
            <thead>
            <tr>
                <th>#SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Expected Date</th>
                <th>Message</th>
                <th>Admin Note</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php $i=0; @endphp
            @foreach($infos as $data)
                <tr style="background-color: #6eb5ff40">
                    <td></td>
                   <th colspan="5" class="align-middle">
                       <div class="media">
                           <div class="w-120px mr-4 position-relative">
                               <a href="{{route('single_property', $data[0]->property->id)}}">
                                   <img src="{{asset('storage/'.$data[0]->property->cover_image)}}"
                                        alt="Home in Metric Way" >
                               </a>
                               @if($data[0]->property->for == 0)
                                   <span class="badge badge-indigo position-absolute pos-fixed-top">for rent</span>
                               @else
                                   <span class="badge badge-primary position-absolute pos-fixed-top">for rent</span>
                               @endif
                           </div>
                           <div class="media-dtl">
                               <a href="{{route('single_property', $data[0]->property->id)}}" class="text-dark hover-primary">
                                   <h5 class="fs-16 mb-0 lh-17">{{$data[0]->property->title}}</h5>
                               </a>
                               <p class="mb-1 font-weight-400 fs-12">{{$data[0]->property->address}}</p>
                               <span class="text-heading lh-15 font-weight-bold fs-14">${{$data[0]->property->price}}</span>
                               @if($data[0]->property->for == 0)
                                   <span class="text-gray-light">/month</span>
                               @else

                               @endif
                           </div>
                       </div>
                   </th>
                    <th colspan="2" class="align-middle text-center">
                        Available From : {{date('d F, Y', strtotime($data[0]->property->available_from))}}
                    </th>
                </tr>
                <form method="post" action="{{route('accept_request')}}">
                    @csrf
                @foreach($data as $info)
                       <input type="hidden" name="for" value="{{$for}}">
                       <input type="hidden" name="id" value="{{ $info->id}}">
                    <tr>
                        <td>{{++$i}}</td>
                        @if($for == 3)
                            <td>{{$info->name}}</td>
                            <td> <a href="mailto:"{{$info->email}}>{{$info->email}}</a></td>
                            <td> <a href="tel:"{{$info->mobile}}>{{$info->mobile}}</a></td>
                            <td>{{$info->schedule}}</td>
                        @else
                            <td><a href="{{route('user_profile', $data->user->id)}}">{{$info->user->name}}</a></td>
                            <td><a href="mailto:"{{$info->user->email}}>{{$info->user->email}}</a></td>
                            <td><a href="tel:"{{$info->user->mobile}}>{{$info->user->mobile}}</a></td>
                            <td><input type="date" name="date" class="form-control" value="{{$info->user->date}}" /></td>
                        @endif
                        <td>{{$info->message}}</td>
                        <td><input type="text" name="admin_note" class="form-control" value="{{$info->admin_note}}" /></td>
                        <td>

                            @if($status ==1)
                                <a href="{{route('complete_request', [$info->id,$for])}}" class="btn btn-sm btn-info edit btn-active-mint" title="Complete Request">
                                    <i class="fa fa-list"></i>
                                </a>
                            @else
                            <button type="submit" class="btn btn-sm btn-info edit btn-active-mint" title="Accept Request">
                                <i class="fa fa-thumbs-up"></i>
                            </button>
                            @endif
                            <a href="#" data-target="#my_modal" data-toggle="modal"
                               class="btn btn-sm btn-danger identifyingClass"
                               data-id="{{$info->id}}"
                               data-for="{{$for}}"
                               title="Deny Request"
                            >
                                <i class="demo-pli-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </form>
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
