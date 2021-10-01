@extends('layouts.base')
@section('title', 'Login')
@section('style')
    <link rel="stylesheet" href="{{asset("/frontEnd/css/login.css")}}" />
@endsection
@section('content')
    <div class="global-container container">
        <div class="card login-form">
            <div class="card-body">
                <h2 class="text-login"> {{__('login')}}</h2>
                <div class="card-text">
                    <!--
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label class="label" for="exampleInputEmail1">{{ __('email') }}</label>
                            <input value="" name="email" type="email"
                                   class="form-control form-control-sm @error('email') is-invalid @enderror" id="email"
                                   required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="label" for="exampleInputPassword1">{{__('password')}}</label>
                            <a href="#" style="float:right;font-size:15px;">{{__('forgotpass')}}</a>
                            <input value="hjk1234567" name="password" type="password"
                                   class="form-control form-control-sm @error('password') is-invalid @enderror"
                                   id="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn-login btn-block">{{__('login')}}</button>
                        <div class="sign-up">
                            {{__('noaccount')}} <a href="{{route('register')}}">{{__('register')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
