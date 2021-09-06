@extends('backend.layouts.master')
@section('title', 'Service Request' )
@section('page-title') Service Request @stop
@section('page-menu')
    <li class="{{$status == 1 ? 'menu-active' : ''}}"><a href="{{route('service_request', 1)}}">Accepted Request</a></li>
    <li class="{{$status == 2 ? 'menu-active' : ''}}"><a href="{{route('service_request', 2)}}">Complete Request</a></li>
    <li class="{{$status == 3 ? 'menu-active' : ''}}"><a href="{{route('service_request', 3)}}">Denied Request</a></li>
@stop
@section('panel-title') Service Request @stop
@section('content')
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="small_scroll">
        <table class="table table-hover bg-white border rounded-lg" id="dataTable">
            <thead class="thead-sm thead-black">
            <tr>
                <th>User Name</th>
                <th>Service Name</th>
                <th>Date</th>
                <th>Address</th>
                <th>Details</th>
                <th>Admin Note</th>
                <th>Price</th>
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
                    <td class="align-middle" title="Service Detail"><a href="{{route('service_dtl', $data->service->id)}}">{{$data->service->name}}</a></td>
                    <td class="align-middle">{{date('d F, Y', strtotime($data->date))}}</td>
                    <td class="align-middle">{{$data->address}}</td>
                    <td class="align-middle">{{$data->details}}</td>
                    <td><input type="text" name="admin_note" class="form-control" value="{{$data->admin_note}}" /></td>
                    <td><input type="text" name="price" class="form-control" value="{{$data->price}}" /></td>

                    <td>
                        @if($status != 1 && $status != 2 )
                            <a href="{{route('accept_service', $data->id)}}" title="Accept Request" class="btn btn-sm btn-info edit btn-active-mint">
                                <i class="fa fa-thumbs-up"></i>
                            </a>
                        @endif

                            @if($status != 3)
                            <a href="#" data-target="#my_modal" title="Deny Request" data-toggle="modal"
                               class="btn btn-sm btn-danger identifyingClass"
                               data-id="{{$data->id}}"
                            >
                                <i class="demo-pli-trash"></i>
                            </a>
                        @endif
                        @if($status != 0 && $status != 2 )
                            <a href="{{route('complete_service', $data->id)}}" title="Complete Request" class="btn btn-sm btn-success edit btn-active-mint">
                                <i class="fa fa-list"></i>
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
