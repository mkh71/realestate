@extends('backend.layouts.master')
@section('title','User Profile')
@section('page-title')User Profile @stop
@section('content')
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <ul class="list-group list-group-no-border">
                <li class="list-group-item px-0 pt-0 pb-2 {{$user->status ? 'panel-success panel-colorful': 'panel-danger panel-colorful'}}">
                    <div class="custom-control custom-checkbox text-center">
                        <label class="custom-control-label text-capitalize"
                               for="attic">Is Active</label>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-sm-6 col-lg-3">
            <ul class="list-group list-group-no-border">
                <li class="list-group-item px-0 pt-0 pb-2 {{$user->isRenter ? 'panel-success panel-colorful': 'panel-danger panel-colorful'}}">
                    <div class="custom-control custom-checkbox text-center">
                        <label class="custom-control-label text-capitalize"
                               for="attic">Is Renter</label>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-sm-6 col-lg-3">
            <ul class="list-group list-group-no-border">
                <li class="list-group-item px-0 pt-0 pb-2 {{$user->isSeller ? 'panel-success panel-colorful': 'panel-danger panel-colorful'}}">
                    <div class="custom-control custom-checkbox text-center">
                        <i class="fa fa-user"></i>
                        <label class="custom-control-label text-capitalize"
                               for="attic">Is Seller</label>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-sm-6 col-lg-3">
            <ul class="list-group list-group-no-border">
                <li class="list-group-item px-0 pt-0 pb-2 {{$user->isBuyer ? 'panel-success panel-colorful': 'panel-danger panel-colorful'}}">
                    <div class="custom-control custom-checkbox text-center">
                        <label class="custom-control-label text-capitalize"
                               for="attic">Is Buyer</label>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('panel-card')
    <div class="row">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">

            <div class="col-md-4 col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-success panel-colorful media middle pad-all">
                            <div class="media-left">
                                <div class="pad-hor">
                                    <i class="fa fa-user" style="font-size: 15px"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <p class="mar-no">Personal Info</p>
                            </div>
                        </div>

                    </div>
                    <div class="panel-body">
                        <div class="col-12">
                            <img src="{{$user->image ? asset('storage'.$user->image) : asset('website/images/urban.png')}}" class="image-fluid" height="300px" width="100%">
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-hover table-striped ">
                                    <thead></thead>
                                    <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <td><input type="text" class="form-control" name="name" value="{{$user->name}}"></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><a href="mailto:"{{$user->email}}>{{$user->email}}</a></td>
                                        </tr>
                                        <tr>
                                            <th>Phone 1</th>
                                            <td><a href="tel:"{{$user->phone}}>{{$user->phone}}</a></td>
                                        </tr>
                                        <tr>
                                            <th>Phone 2</th>
                                            <td><a href="tel:"{{$user->phone2}}>{{$user->phone2 ?? ""}}</a></td>
                                        </tr>

                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-info panel-colorful media middle pad-all">
                            <div class="media-left">
                                <div class="pad-hor">
                                    <i class="fa fa-list" style="font-size: 15px"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <p class="mar-no">User Detail</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-12">

                            <h4 class="">
                                About
                            </h4>
                            <div class="panel-body">
                               {{$user->details}}
                            </div>
                        </div>
                        <div class="col-12">
                            <h4 class="">
                                National ID No
                            </h4>
                            <div class="panel-body">
                                {{$user->email}}
                            </div>
                        </div>
                        <div class="col-12">
                            <h4 class="">
                                Region
                            </h4>
                            <div class="panel-body">
                                {{$user->region}}
                            </div>
                        </div>
                        <div class="col-12">
                            <h4 class="">
                                Facebook
                            </h4>
                            <div class="panel-body">
                                {{$user->facebook}}
                            </div>
                        </div>
                        <div class="col-12">
                            <h4 class="">
                                Twitter
                            </h4>
                            <div class="panel-body">
                                {{$user->twitter}}
                            </div>
                        </div>
                        <div class="col-12">
                            <h4 class="">
                                Skype
                            </h4>
                            <div class="panel-body">
                                {{$user->skype}}
                            </div>
                        </div>
                        <div class="col-12">
                            <h4 class="">
                                Instagram
                            </h4>
                            <div class="panel-body">
                                {{$user->instagram}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
@section('js')
    <script>
        $(function(){
            $('#dataTable').DataTable();
        });
    </script>
@stop
