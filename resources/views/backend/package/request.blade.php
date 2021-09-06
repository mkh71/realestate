@extends('backend.layouts.master')
@section('title', 'Package Request' )
@section('page-title') Package Request @stop
@section('page-menu')
    <li class="{{$status == 1 ? 'menu-active' : ''}}"><a href="{{route('package_request', 1)}}">Current User-Pack</a></li>
    <li class="{{$status == 2 ? 'menu-active' : ''}}"><a href="{{route('package_request', 2)}}">Expired Package</a></li>
{{--    <li class="{{$status == 3 ? 'menu-active' : ''}}"><a href="{{route('service_request', 3)}}">Denied Request</a></li>--}}
@stop
@section('panel-title') Package Request @stop
@section('content')
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="small_scroll">
        <table class="table table-hover bg-white border rounded-lg" id="dataTable">
            <thead class="thead-sm thead-black">
            <tr>
                <th>User Name</th>
                <th>Package Name</th>
                <th>Date</th>
                <th>Payment</th>
                @if($status == 1)
                    <th>Activated At</th>
                    <th>Expire time</th>
                @endif

                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <form method="post" action="{{route('accept_service')}}">
                @csrf
                @foreach($infos as $data)
                    <input type="hidden" name="id" value="{{ $data->id}}">
                    <tr class="shadow-hover-xs-2 bg-hover-white">
                        <td class="align-middle"><a href="{{route('user_profile', $data->user->id)}}">{{$data->user->name}}</a></td>
                        <td class="align-middle" title="Package Detail">{{$data->package->name}}</td>
                        <td class="align-middle">{{date('d F, Y', strtotime($data->created_at))}}</td>
                        <td class="align-middle">{{$data->payment->amount}}</td>
                        @if($status == 1)
                            <td class="align-middle">{{date('d F, Y H:i:s', strtotime($data->active_at))}}</td>
                            <td class="align-middle">{{date('d F, Y H:i:s', strtotime($data->expire_at))}}</td>
                        @endif
                        <td>
                            {{--@if($status != 3)
                                <a href="#" data-target="#my_modal" title="Deny Request" data-toggle="modal"
                                   class="btn btn-sm btn-danger identifyingClass"
                                   data-id="{{$data->id}}"
                                >
                                    <i class="demo-pli-trash"></i>
                                </a>
                            @endif--}}
                            @if($status != 0 )
                                <a href="{{route('pack_off', $data->id)}}" title="Expire Pack" class="btn btn-sm btn-danger">
                                    <i class="fa fa-eye-slash"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </form>
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
                            <form method="POST" action="{{ route('deny_service') }}">
                                @csrf
                                <input type="hidden" name="id" id="id" value="" />
                                <div class="form-group-lg">
                                    <label for="basement"
                                           class="text-heading">Deny Note</label>
                                    <textarea name="admin_note" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                                <hr>
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
                $(".modal-body #id").val(id);
            })
        });
    </script>

@stop
