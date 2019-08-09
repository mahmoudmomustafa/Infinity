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
                        Create an Account Now..
                    </h4>
                    <div class="log-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            {{-- name --}}
                            <div class="form-group input">
                                <label for="name" class="font-weight-bold"
                                    style="color:#ccdacd">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- userName --}}
                            <div class="form-group input">
                                <label for="userName" class="font-weight-bold"
                                    style="color:#ccdacd">{{ __('User Name') }}</label>
                                <input id="userName" type="text"
                                    class="form-control @error('userName') is-invalid @enderror" name="userName"
                                    value="{{ old('userName') }}" required autocomplete="userName">
                                @if ($errors->has('userName'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('userName') }}</strong>
                                </span>
                                @endif
                            </div>
                            {{-- email --}}
                            <div class="form-group input">
                                <label for="email" class="font-weight-bold"
                                    style="color:#ccdacd">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- pass --}}
                            <div class="form-group input">
                                <label for="password" class="font-weight-bold"
                                    style="color:#ccdacd">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- repass --}}
                            <div class="form-group input">
                                <label for="password-confirm" class="font-weight-bold"
                                    style="color:#ccdacd">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                            {{-- btns --}}
                            <div class="form-group row input">
                                <div class="col-md-5 m-auto">
                                    <button type="submit" class="w-100 btn btn-success">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                <div class="col-md-5 m-auto">
                                    <a class="w-100 btn btn-outline-light" href="{{route('login')}}">
                                        {{ __('Login') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-0 col-sm-0 col-md-7 img-up ">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection