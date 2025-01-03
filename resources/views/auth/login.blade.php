@extends('layouts.authentication.master')
@section('title', 'Login')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<style>

</style>
    <div class="container-fluid p-0" >
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card logincolor" style="background-image:url({{ asset('front_assets/images/1x/banner.png') }})">
                    <div>
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="{{ route('login') }}">
                                @csrf
                                {{-- <div><a class="logo" href="{{ route('login') }}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/login.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div> --}}
                                <h4 class="align-center">Next Client Admin Dashboard</h4>
                                {{-- <h7>Login to account</h7> --}}
                                <p>Enter your email & password to login</p>
                                <!-- Email Address -->

                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input class="form-control" type="email" id="email" name="email"
                                        placeholder="Test@gmail.com">
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" type="password" id="password" name="password"
                                        placeholder="*********">
                                </div>

                                <!-- Remember Me -->
                                <div class="form-group mb-0">

                                    @if (Route::has('register'))
                                        {{-- <p class="mt-4 mb-0">Don't have an account?<a class="ms-2" href="{{ route('register') }}">register</a></p> --}}
                                    @endif
                                    <button class="btn btn-primary btn-block" type="submit">Log in</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
