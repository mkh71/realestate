@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="nav nav-tabs row w-100 no-gutters" id="myTab" role="tablist">
                            <a class="nav-item col-sm-3 ml-0 nav-link pr-6 py-2 pl-6 fs-18 bg-secondary
                            rounded-top btn shadow-none rounded-bottom-0
                            text-white text-btn-focus-secondary text-uppercase d-flex align-items-center
                            rounded-bottom-0 bg-active-primary text-active-white letter-spacing-087
                            flex-md-1 px-4 active"
                               id="login-tab"
                               data-toggle="tab"
                               href="#login"
                               role="tab"
                               aria-controls="login"
                               aria-selected="true"
                            >
                                <i class="far fa-user-lock"></i> &nbsp; &nbsp;
                                Login
                            </a>

                            <a class="nav-item col-sm-3 ml-0 nav-link py-2 px-6 bg-secondary rounded-top
                               btn shadow-none rounded-bottom-0
                               text-white text-btn-focus-secondary text-uppercase d-flex align-items-center
                               fs-13 rounded-bottom-0 bg-active-primary text-active-white letter-spacing-087
                               flex-md-1 px-4"
                               id="register-tab"
                               data-toggle="tab"
                               href="#register"
                               role="tab"
                               aria-controls="register"
                               aria-selected="false"
                            ><i class="far fa-address-card"></i> &nbsp; &nbsp;
                               {{-- <svg class="icon icon-building fs-22 mr-2">
                                    <use xlink:href="#icon-building"></use>
                                </svg>--}}
                                Register
                            </a>

                        {{--<a class="nav-item col-sm-3 ml-0 nav-link pr-6 py-4 pl-9 active fs-18"
                           id="login-tab"
                           data-toggle="tab"
                           href="#login"
                           role="tab"
                           aria-controls="login"
                           aria-selected="true">
                            Login
                        </a>
                        <a class="nav-item col-sm-3 ml-0 nav-link py-4 px-6 fs-18"
                           id="register-tab"
                           data-toggle="tab"
                           href="#register"
                           role="tab"
                           aria-controls="register"
                           aria-selected="false">
                            Register
                        </a>--}}
                    </div>
                </div>

                <div class="card-body">
                    <div class="tab-content shadow-none p-0" id="myTabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel"
                             aria-labelledby="login-tab">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="username" class="sr-only">Username</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18"
                                              id="inputGroup-sizing-lg">
                                          <i class="far fa-user"></i>
                                        </span>
                                        </div>
                                        <input id="username" type="text"
                                               class="form-control border-0 shadow-none fs-13 @error('username') is-invalid @enderror" name="username"
                                               value="{{ old('username') }}" required autocomplete="username" autofocus
                                               placeholder="Username / Your email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                          <i class="far fa-lock"></i>
                                        </span>
                                        </div>
                                        <input id="password" type="password" class="border-0 shadow-none fs-13 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                                               placeholder="Password">
                                        <div class="input-group-append">
                                        <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                                          <i class="far fa-eye-slash" onclick="sPass()" id="ShowPass"></i>
                                        </span>
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember-me">
                                            Remember Me
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="d-inline-block ml-auto text-orange fs-15">
                                            Lost Password?
                                        </a>
                                    @endif
                                </div>
                                {{--<div class="d-flex p-2 border re-capchar align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="verify"
                                               name="verify">
                                        <label class="form-check-label" for="verify">
                                            I'm not a robot
                                        </label>
                                    </div>
                                    <a href="#" class="d-inline-block ml-auto">
                                        <img src="{{asset('website')}}/images/re-captcha.png" alt="Re-capcha">
                                    </a>
                                </div>--}}
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Log in</button>
                            </form>
                            {{--<div class="divider text-center my-2">
                              <span class="px-4 bg-white lh-17 text">
                                or continue with
                              </span>
                            </div>
                            <div class="row no-gutters mx-n2">
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block facebook text-white px-0">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block google px-0">
                                        <img src="{{asset('website')}}/images/google.png" alt="Google">
                                    </a>
                                </div>
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block twitter text-white px-0">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                            </div>--}}
                        </div>
                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <form class="form">
                                <div class="form-group mb-4">
                                    <label for="full-name" class="sr-only">Full name</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                          <i class="far fa-address-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow-none fs-13"
                                               id="full-name" name="full-name" required
                                               placeholder="Full name">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="username01" class="sr-only">Username</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                          <i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow-none fs-13"
                                               id="username01" name="username01" required
                                               placeholder="Username / Your email">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password01" class="sr-only">Password</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                          <i class="far fa-lock"></i>
                                        </span>
                                        </div>
                                        <input type="password" class="form-control border-0 shadow-none fs-13"
                                               id="password2" name="password" required
                                               placeholder="Password">
                                        <div class="input-group-append">
                                        <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                                          <i class="far fa-eye-slash" onclick="sPass()" id="ShowPass"></i>
                                        </span>
                                        </div>
                                    </div>
                                    <p class="form-text">Minimum 8 characters with 1 number and 1 letter</p>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign up</button>
                            </form>
                            {{--<div class="divider text-center my-2">
                              <span class="px-4 bg-white lh-17 text">
                                or continue with
                              </span>
                            </div>
                            <div class="row no-gutters mx-n2">
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block facebook text-white px-0">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block google px-0">
                                        <img src="{{asset('website')}}/images/google.png" alt="Google">
                                    </a>
                                </div>
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block twitter text-white px-0">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="mt-2">By creating an account, you agree to HomeID
                                <a class="text-heading" href="#"><u>Terms of Use</u> </a> and
                                <a class="text-heading" href="#"><u>Privacy Policy</u></a>.
                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script>
        function sPass() {
            var passL = document.getElementById("password");
            var passR = document.getElementById("password2");
            if (passL.type === "password") {
                passL.type = "text";
            } else {
                passL.type = "password";
            }

            if (passR.type === "password") {
                passR.type = "text";
            } else {
                passR.type = "password";
            }
        }
    </script>
@endsection
