@extends('renterDashboard.home')
@section('title')| My Profile @stop
@section('panel-title') My Profile @stop
@section('content')
    <form action="{{route('profile_update')}}" method="post" enctype="multipart/form-data"> @csrf
        <?php $user  = auth()->user(); ?>
        <input type="hidden" name="id" value="{{auth()->id()}}">
        <div class="row mb-6">
            <div class="col-lg-6">
                <div class="card mb-6">
                    <div class="card-body px-6 pt-6 pb-5">
                        <div class="row">
                            <div class="col-sm-4 col-xl-12 col-xxl-7 mb-6">
                                <h3 class="card-title mb-0 text-heading fs-22 lh-15">Photo</h3>
                                <p class="card-text">Upload your profile photo.</p>
                            </div>
                            <div class="col-sm-8 col-xl-12 col-xxl-5">
                                <img src="{{$user->image ? asset('storage/'.$user->image) : asset('website/images/my-profile.png')}}" alt="My Profile" class="w-100">
                                <div class="custom-file mt-4 h-auto">
                                    <input type="file" class="custom-file-input" hidden id="customFile" name="image[]">
                                    <label class="btn btn-secondary btn-lg btn-block" for="customFile">
                                        <span class="d-inline-block mr-1"><i class="fal fa-cloud-upload"></i></span>Upload
                                        profile image</label>
                                    <div class="profile_image" style="padding: 20px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-6">
                    <div class="card-body px-6 pt-6 pb-5">
                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">Contact information</h3>

                        <div class="form-group col-12 px-4">
                            <label for="lastName" class="text-heading">Name</label>
                            <input type="text" class="form-control form-control-lg border-0" id="lastName"
                                   name="name" value="{{$user->name}}">
                        </div>


                        <div class="form-group col-12 px-4">
                            <label for="phone" class="text-heading">Phone 1</label>
                            <input type="text" class="form-control form-control-lg border-0" id="phone"
                                   name="phone" value="{{$user->phone}}">
                        </div>
                        <div class="form-group col-12 px-4">
                            <label for="mobile" class="text-heading">Phone 2</label>
                            <input type="text" class="form-control form-control-lg border-0" id="mobile"
                                   name="phone" value="{{$user->phone2}}">
                        </div>

                        <div class="form-group col-12 px-4 mb-md-0">
                            <label for="email" class="text-heading">Email</label>
                            <input type="email" class="form-control form-control-lg border-0" id="email"
                                   name="email" value="{{$user->email}}">
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-6">
                    <div class="card-body px-6 pt-6 pb-5">
                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">User detail</h3>

                        <div class="form-group mb-7">
                            <label for="website" class="text-heading">Region
                            </label>
                            <input type="url" class="form-control form-control-lg border-0" id="website" name="region" value="{{$user->region}}">
                        </div>
                        <div class="form-group">
                            <label for="facebook" class="text-heading">National ID No</label>
                            <input type="url" class="form-control form-control-lg border-0" id="facebook"
                                   name="nid" value="{{$user->nid}}">
                        </div>
                        <div class="form-group">
                            <label for="facebook" class="text-heading">Facebook Url</label>
                            <input type="url" class="form-control form-control-lg border-0" id="facebook"
                                   name="facebook" value="{{$user->facebook}}">
                        </div>
                        <div class="form-group">
                            <label for="pinterest" class="text-heading">Skype Url</label>
                            <input type="url" class="form-control form-control-lg border-0" id="pinterest"
                                   name="instagram" value="{{$user->skype}}">
                        </div>
                        <div class="form-group">
                            <label for="instagram" class="text-heading">Instagram Url</label>
                            <input type="url" class="form-control form-control-lg border-0" id="instagram"
                                   name="instagram" value="{{$user->instagram}}">
                        </div>
                        <div class="form-group">
                            <label for="twitter" class="text-heading">Twitter Url</label>
                            <input type="url" class="form-control form-control-lg border-0" id="twitter"  name="twitter" value="{{$user->twitter}}">
                        </div>
                    </div>
                </div>

                <div class="card mb-6 mb-lg-0">
                    <div class="card-body px-6 pt-6 pb-5">
                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">About</h3>

                        <div class="form-group mb-0">
                            <textarea class="form-control" name="details">{{$user->details}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body px-6 pt-6 pb-5">
                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">Change password</h3>
                        <div class="form-group">
                            <label for="oldPassword" class="text-heading">Old Password</label>
                            <input type="password" class="form-control form-control-lg border-0" id="oldPassword"
                                   name="old_password">
                        </div>
                        <div class="form-row mx-n4">
                            <div class="form-group col-md-6 col-lg-12 col-xxl-6 px-4">
                                <label for="newPassword" class="text-heading">New Password</label>
                                <input type="password" class="form-control form-control-lg border-0" id="newPassword"
                                       name="password">
                            </div>
                            <div class="form-group col-md-6 col-lg-12 col-xxl-6 px-4">
                                <label for="confirmNewPassword" class="text-heading">Confirm New Password</label>
                                <input type="password" class="form-control form-control-lg border-0"
                                       id="confirmNewPassword" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="d-flex justify-content-end flex-wrap">
{{--            <button class="btn btn-lg bg-hover-white border rounded-lg mb-3">Delete Profile</button>--}}
            <button type="submit" class="btn btn-lg btn-primary ml-4 mb-3">Update Profile</button>
        </div>
    </form>
@stop
