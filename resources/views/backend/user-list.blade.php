@extends('backend.layouts.master')
@section('title',$type.'List')
@section('page-title'){{$type}} List @stop
@section('panel-title'){{$type}} List @stop
@section('content')
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <h5 class="bg-transparent">{{$type}} List</h5>
        <table class="table table-bordered table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @php $i=0; @endphp
            @foreach($infos as $info)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$info->user->name}}</td>
                    <td><a href="mailto:{{$info->user->email}}">{{$info->user->email}}</a> </td>
                    <td><a href="tel:{{$info->user->phone}}">{{$info->user->phone}}</a></td>
                    <td>
                        <input data-id="{{$info->user->id}}" {{ $info->user->status ? 'checked' : '' }}
                               class="toggle-class"
                               type="checkbox"
                               data-onstyle="success" data-offstyle="danger"
                               data-toggle="toggle" data-on="Active"
                               data-off="InActive"
                               data-url = "{{route('status')}}"
                               value="User"
                        >
                    </td>
                    <td>
                        <a class="btn btn-sm btn-info edit" title="View User Profile" href="{{ route('user_profile',$info->user->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <button class="btn btn-sm btn-danger erase"
                                title="Deactivate This User"
                                data-id="{{$info->user->id}}"
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
