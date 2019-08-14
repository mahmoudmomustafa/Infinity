@extends('layouts.app')

@section('content')
<div class="contain">
    <div class="container py-5">
        <div class="login">
            <div class="row mx-0">
                <div class="col-lg-5 col-md-12 form">
                    <h2 class="p-4 font-weight-bold" style="color:#28cefe">
                        <img src="/img/infinity.svg" width="40"> | Infinity
                    </h2>
                    <h4 class="p-4 font-weight-bold" style="color:#ccdacd">
                        Login To Your Account Now..
                    </h4>
                    <div class="log-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group input">
                                <label for="email" class="font-weight-bold"
                                    style="color:#ccdacd">{{ __('EMail Address') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group input">
                                <label for="email" class="font-weight-bold"
                                    style="color:#ccdacd">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group input " style="display: inline-flex;padding-top:0">
                                <div class="col-md-6">
                                    <div class="form-check pt-2">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="font-weight-bold" style="color:#ccdacd" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="forget">
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row input">
                                <div class="col-md-5 m-auto">
                                    <button type="submit" class="w-100 btn btn-success">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                                <div class="col-md-5 m-auto">
                                    <a class="w-100 btn btn-outline-light" href="{{route('register')}}">
                                        {{ __('Register') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-0 col-sm-0 col-md-7 img ">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection