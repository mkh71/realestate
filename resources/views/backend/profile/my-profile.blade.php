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
    <form action="{{route('profile_update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <input type="hidden" name="id" value="{{$user->id}}">

            <div class="col-md-4 col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-warning panel-colorful media middle pad-all">
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
                            <img src="{{$user->image ? asset('storage/'.$user->image) : asset('website/images/urban.png')}}" class="image-fluid" height="330px" width="100%">
                        </div>
                        <div class="col-12">
                            <div class="card-body p-6">
                                <div class="profile_image" style="padding: 20px;"></div>
                            </div>
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
                                        <td><input type="text" class="form-control" name="email" value="{{$user->email}}"></td>
                                    </tr>
                                    <tr>
                                        <th>Phone 1</th>
                                        <td><input type="text" class="form-control" name="phone" value="{{$user->phone}}"></td>
                                    </tr>
                                    <tr>
                                        <th>Phone 2</th>
                                        <td><input type="text" class="form-control" name="phone2" value="{{$user->phone2 ?? null}}"></td>
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

                            <h5 class="">
                                About
                            </h5>
                            <div class="panel-body">
                                <textarea class="form-control" name="details">{{$user->details}}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="">
                                National ID No
                            </h5>
                            <div class="panel-body">
                                <input type="text" class="form-control" name="nid" value="{{$user->nid}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="">
                                Region
                            </h5>
                            <div class="panel-body">
                                <input type="text" class="form-control" name="region" value="{{$user->region}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="">
                                Facebook
                            </h5>
                            <div class="panel-body">
                                <input type="text" class="form-control" name="facebook" value="{{$user->facebook}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="">
                                Twitter
                            </h5>
                            <div class="panel-body">
                                <input type="text" class="form-control" name="twitter" value="{{$user->twitter}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="">
                                Skype
                            </h5>
                            <div class="panel-body">
                                <input type="text" class="form-control" name="skype" value="{{$user->skype}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="">
                                Instagram
                            </h5>
                            <div class="panel-body">
                                <input type="text" class="form-control" name="instagram" value="{{$user->instagram}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-info panel-colorful media middle pad-all">
                            <div class="media-left">
                                <div class="pad-hor">
                                    <i class="fa fa-lock" style="font-size: 15px"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <p class="mar-no">Change Password</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-12">
                            <table class="table table-hover table-striped ">
                                <thead></thead>
                                <tbody>
                                <tr>
                                    <th>New Password</th>
                                    <td><input type="password" class="form-control" name="password"></td>
                                </tr>
                                <tr>
                                    <th>Confirm New Password</th>
                                    <td><input type="password" class="form-control" name="password_confirmation" id="password-confirm" ></td>
                                </tr>
                                <tr>
                                    <th>Enter Old Password </th>
                                    <td><input type="password" class="form-control" name="old_password" ></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
            <button type="submit" class="btn btn-primary btn-active-mint btn-block">Update Profile</button>
        </div>
    </form>
@stop
@section('js')
    <script>
        $(function(){
            $('#dataTable').DataTable();
        });

        $('.profile_image').imageUploader({
                maxFiles: 1,
                label: 'Upload Your New Image',
                imagesInputName: 'image',
                extensions: ['.jpg', '.JPG', '.jpeg', '.JPEG', '.png', '.PNG', '.svg', '.SVG', '.gif', '.GIF'],
            }
        );
    </script>
@stop
